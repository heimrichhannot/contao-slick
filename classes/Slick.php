<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package slick
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

namespace HeimrichHannot\Slick;


class Slick extends \Frontend
{
	/**
	 * Current record
	 * @var array
	 */
	protected $arrData = array();

	/**
	 * Current record
	 * @var \Model
	 */
	protected $objSettings;

	/**
	 * Files object
	 * @var \FilesModel
	 */
	protected $objFiles;


	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_slick';

	public function __construct($objSettings)
	{
		$this->arrData = $objSettings->row();
		$this->objSettings = $objSettings;
		$this->Template = new \FrontendTemplate($this->strTemplate);
		$this->getFiles();
	}


	public function getImages()
	{
		global $objPage;

		$images = array();
		$auxDate = array();
		$objFiles = $this->objFiles;

		if($objFiles === null) return '';

		// Get all images
		while ($objFiles->next())
		{
			// Continue if the files has been processed or does not exist
			if (isset($images[$objFiles->path]) || !file_exists(TL_ROOT . '/' . $objFiles->path))
			{
				continue;
			}

			// Single files
			if ($objFiles->type == 'file')
			{
				$objFile = new \File($objFiles->path, true);

				if (!$objFile->isGdImage)
				{
					continue;
				}

				$arrMeta = $this->getMetaData($objFiles->meta, $objPage->language);

				// Use the file name as title if none is given
				if ($arrMeta['title'] == '')
				{
					$arrMeta['title'] = specialchars($objFile->basename);
				}

				// Add the image
				$images[$objFiles->path] = array
				(
					'id'        => $objFiles->id,
					'uuid'      => $objFiles->uuid,
					'name'      => $objFile->basename,
					'singleSRC' => $objFiles->path,
					'alt'       => $arrMeta['title'],
					'imageUrl'  => $arrMeta['link'],
					'caption'   => $arrMeta['caption']
				);

				$auxDate[] = $objFile->mtime;
			}

			// Folders
			else
			{
				$objSubfiles = \FilesModel::findByPid($objFiles->uuid);

				if ($objSubfiles === null)
				{
					continue;
				}

				while ($objSubfiles->next())
				{
					// Skip subfolders
					if ($objSubfiles->type == 'folder')
					{
						continue;
					}

					$objFile = new \File($objSubfiles->path, true);

					if (!$objFile->isGdImage)
					{
						continue;
					}

					$arrMeta = $this->getMetaData($objSubfiles->meta, $objPage->language);

					// Use the file name as title if none is given
					if ($arrMeta['title'] == '')
					{
						$arrMeta['title'] = specialchars($objFile->basename);
					}

					// Add the image
					$images[$objSubfiles->path] = array
					(
						'id'        => $objSubfiles->id,
						'uuid'      => $objSubfiles->uuid,
						'name'      => $objFile->basename,
						'singleSRC' => $objSubfiles->path,
						'alt'       => $arrMeta['title'],
						'imageUrl'  => $arrMeta['link'],
						'caption'   => $arrMeta['caption']
					);

					$auxDate[] = $objFile->mtime;
				}
			}
		}

		// Sort array
		switch ($this->slickSortBy)
		{
			default:
			case 'name_asc':
				uksort($images, 'basename_natcasecmp');
				break;

			case 'name_desc':
				uksort($images, 'basename_natcasercmp');
				break;

			case 'date_asc':
				array_multisort($images, SORT_NUMERIC, $auxDate, SORT_ASC);
				break;

			case 'date_desc':
				array_multisort($images, SORT_NUMERIC, $auxDate, SORT_DESC);
				break;

			case 'meta': // Backwards compatibility
			case 'custom':
				if ($this->slickOrderSRC != '')
				{
					$tmp = deserialize($this->owlOrderSRC);

					if (!empty($tmp) && is_array($tmp))
					{
						// Remove all values
						$arrOrder = array_map(function(){}, array_flip($tmp));

						// Move the matching elements to their position in $arrOrder
						foreach ($images as $k=>$v)
						{
							if (array_key_exists($v['uuid'], $arrOrder))
							{
								$arrOrder[$v['uuid']] = $v;
								unset($images[$k]);
							}
						}

						// Append the left-over images at the end
						if (!empty($images))
						{
							$arrOrder = array_merge($arrOrder, array_values($images));
						}

						// Remove empty (unreplaced) entries
						$images = array_values(array_filter($arrOrder));
						unset($arrOrder);
					}
				}
				break;

			case 'random':
				shuffle($images);
				break;
		}

		$images = array_values($images);

		// Limit the total number of items (see #2652)
		if ($this->slickNumberOfItems > 0)
		{
			$images = array_slice($images, 0, $this->slickNumberOfItems);
		}

		$offset = 0;
		$total = count($images);
		$limit = $total;

		$intMaxWidth = (TL_MODE == 'BE') ? floor((640 / $total)) : floor((\Config::get('maxImageWidth') / $total));
		$strLightboxId = 'lightbox[lb' . $this->id . ']';
		$body = array();

		$strTemplate = 'slick_default';

		// Use a custom template
		if (TL_MODE == 'FE' && $this->owlGalleryTpl != '')
		{
			$strTemplate = $this->owlGalleryTpl;
		}

		SlickConfig::createConfigJs($this->objSettings, true);

		$objTemplate = new \FrontendTemplate($strTemplate);
		$objTemplate->setData($this->arrData);

		$this->Template->setData($this->arrData);
		$this->Template->class .= ' ' . SlickConfig::getCssClassFromModel($this->objSettings) . ' slick';

		for ($i=$offset; $i<$limit; $i++)
		{
			$objImage = new \stdClass();
			$images[$i]['size'] = $this->slickSize;
			$images[$i]['fullsize'] = $this->slickFullsize;
			$this->addImageToTemplate($objImage, $images[$i], $intMaxWidth, $strLightboxId);
			$body[$i] = $objImage;
		}

		$objTemplate->body = $body;
		$objTemplate->headline = $this->headline; // see #1603

		return $objTemplate->parse();
	}

	public function parse()
	{
		$this->Template->images = $this->getImages();
		return $this->Template->parse();
	}

	protected function getFiles()
	{
		// Use the home directory of the current user as file source
		if ($this->slickUseHomeDir && FE_USER_LOGGED_IN)
		{
			$this->import('FrontendUser', 'User');

			if ($this->User->assignDir && $this->User->homeDir)
			{
				$this->slickMultiSRC = array($this->User->homeDir);
			}
		}
		else
		{
			$this->slickMultiSRC = deserialize($this->slickMultiSRC);
		}

		// Return if there are no files
		if (!is_array($this->slickMultiSRC) || empty($this->slickMultiSRC))
		{
			return '';
		}

		// Get the file entries from the database
		$this->objFiles = \FilesModel::findMultipleByUuids($this->slickMultiSRC);

		if ($this->objFiles === null)
		{
			if (!\Validator::isUuid($this->slickMultiSRC[0]))
			{
				return '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
			}

			return '';
		}
	}

	public static function createSettings(array $arrData=array(), SlickConfigModel $objConfig)
	{
		\Controller::loadDataContainer('tl_slick_spread');

		$objSettings = $objConfig;

		foreach($arrData as $key => $value)
		{
			if(substr($key, 0, 5) != 'slick') continue;

			$arrData = &$GLOBALS['TL_DCA']['tl_slick_spread']['fields'][$key];

			if($arrData['eval']['multiple'] || $key == 'slickOrderSRC')
			{
				$value = deserialize($value, true);
			}

			$objSettings->{$key} = $value;
		}

		return $objSettings;
	}

	/**
	 * Set an object property
	 * @param string
	 * @param mixed
	 */
	public function __set($strKey, $varValue)
	{
		$this->arrData[$strKey] = $varValue;
	}


	/**
	 * Return an object property
	 * @param string
	 * @return mixed
	 */
	public function __get($strKey)
	{
		if (isset($this->arrData[$strKey]))
		{
			return $this->arrData[$strKey];
		}

		return parent::__get($strKey);
	}


	/**
	 * Check whether a property is set
	 * @param string
	 * @return boolean
	 */
	public function __isset($strKey)
	{
		return isset($this->arrData[$strKey]);
	}

} 