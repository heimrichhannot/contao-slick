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

class ModuleSlickEventList extends \ModuleEventlist
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_eventlist';

	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['eventlist'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		parent::generate();

		$objConfig = SlickConfigModel::findByPk($this->slickConfig);

		if($objConfig !== null)
		{
			$this->Template->class .= ' ' . SlickConfig::getCssClassFromModel($objConfig) . ' slick';
		}

		return $this->Template->parse();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		parent::compile();

		// HOOK: add custom logic
		if (isset($GLOBALS['TL_HOOKS']['compileSlickEventList']) && is_array($GLOBALS['TL_HOOKS']['compileSlickEventList']))
		{
			foreach ($GLOBALS['TL_HOOKS']['compileSlickEventList'] as $callback)
			{
				$this->import($callback[0]);
				$this->{$callback[0]}->{$callback[1]}($this->Template, $this, $this->objModel);
			}
		}
	}
}