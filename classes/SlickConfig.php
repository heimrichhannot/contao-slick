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

class SlickConfig extends \Controller
{
	public static function createConfigJs($objConfig, $debug=true)
	{
		if(!static::isJQueryEnabled()) return false;

		$objT = new \FrontendTemplate('jquery.slick');

		$objT->config = static::createConfigJSON($objConfig);
		$objT->cssClass = static::getCssClassFromModel($objConfig);

		$strFile = 'assets/js/' . $objT->cssClass . '.js';

		$objFile = new \File($strFile, file_exists(TL_ROOT . '/' . $strFile));

		// simple file caching
		if($objConfig->tstamp > $objFile->mtime || $objFile->size == 0 || $debug)
		{
			$objFile->write($objT->parse());
			$objFile->close();
		}

		$GLOBALS['TL_JAVASCRIPT']['slick'] = 'system/modules/slick/assets/vendor/slick.js/slick/slick.js|static';
		$GLOBALS['TL_JAVASCRIPT'][$objT->cssClass] = $strFile . (!$debug ? '|static' : '');
	}

	public static function isJQueryEnabled()
	{
		global $objPage;

		$blnMobile = ($objPage->mobileLayout && \Environment::get('agent')->mobile);

		$intId = ($blnMobile && $objPage->mobileLayout) ? $objPage->mobileLayout : $objPage->layout;
		$objLayout = \LayoutModel::findByPk($intId);

		return $objLayout->addJQuery;
	}

	public static function getCssClassForContent($id)
	{
		return 'slick-content-'.  $id;
	}

	public static function getCssClassFromModel($objConfig)
	{
		$strClass = static::stripNamespaceFromClassName($objConfig);

		return 'slick_' . substr(md5($strClass .'_'. $objConfig->id), 0, 6) . ' .slick-container';
	}

	public static function createConfigJSON($objConfig)
	{
		$arrConfig = static::createConfig($objConfig);

		$strJson = '';

		if(!is_array($arrConfig['config'])) return $strJson;

		$strJson = json_encode($arrConfig['config']);

		if(is_array($arrConfig['objects']))
		{
			foreach ($arrConfig['objects'] as $key)
			{
				// remove quotes from callbacks
				$strJson = preg_replace('#"' . $key . '":"(.+?)"#', '"' . $key . '":$1', $strJson);
			}
		}

		$strJson = ltrim($strJson, '{');
		$strJson = rtrim($strJson, '}');
		
		return $strJson;
	}

	public static function createConfig($objConfig)
	{
		\Controller::loadDataContainer('tl_slick_spread');

		$arrConfig = array();
		$arrObjects = array();

		foreach($objConfig->row() as $key => $value)
		{
			if(strstr($key, 'slick_') === false) continue;

			if(!isset($GLOBALS['TL_DCA']['tl_slick_spread']['fields'][$key])) continue;

			$arrData = $GLOBALS['TL_DCA']['tl_slick_spread']['fields'][$key];

			$slickKey = substr($key, 6); // trim slick_ prefix

			if($arrData['eval']['rgxp'] == 'digit')
			{
				$value = intval($value);
			}

			if($arrData['inputType'] == 'checkbox' && !$arrData['eval']['multiple'])
			{
				$value = (bool) filter_var($value, FILTER_VALIDATE_BOOLEAN);
			}

			if($arrData['eval']['multiple'] || $arrData['inputType'] == 'multiColumnWizard')
			{
				$value = deserialize($value, true);
			}

			if($arrData['eval']['isJsObject'])
			{
				$arrObjects[] = $slickKey;
			}

			// check type as well, otherwise
			if($value === '') continue;

			if($key == 'slick_responsive')
			{
				$arrResponsive = array();

				foreach($value as $config)
				{
					if(empty($config['slick_settings'])) continue;

					$objResponsiveConfig = SlickConfigModel::findByPk($config['slick_settings']);

					if($objResponsiveConfig === null) continue;

					$config['breakpoint'] = $config['slick_breakpoint'];
					unset($config['slick_breakpoint']);

					$settings = static::createConfig($objResponsiveConfig);

					if($settings['config']['unslick'])
					{
						$config['settings'] = 'unslick';
					}
					else
					{
						$config['settings'] = $settings['config'];
					}

					unset($config['slick_settings']);


					$arrResponsive[] = $config;
				}

				if(empty($arrResponsive))
				{
					$value = false;
				}
				else
				{
					$value = $arrResponsive;
				}
			}

			if($key == 'slick_asNavFor')
			{
				$objTargetConfig = SlickConfigModel::findByPk($value);

				if($objTargetConfig !== null)
				{
					$value = '.' . static::getCssClassFromModel($objTargetConfig);
				}
			}

			$arrConfig[$slickKey] = $value;
		}

		// remove responsive settings, otherwise center wont work
		if(empty($arrResponsive))
		{
			unset($arrConfig['responsive']);
		}

		$arrReturn = array
		(
			'config' 	=> $arrConfig,
			'objects'	=> $arrObjects
		);

		return $arrReturn;
	}

	public static function stripNamespaceFromClassName($obj)
	{
		$classname = get_class($obj);

		if (preg_match('@\\\\([\w]+)$@', $classname, $matches)) {
			$classname = $matches[1];
		}

		return $classname;
	}
}

