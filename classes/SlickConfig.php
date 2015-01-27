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
		$objT = new \FrontendTemplate('jquery.slick');
		
		$objT->config = rtrim(ltrim(json_encode(static::createConfig($objConfig)), '{'), '}');
		$objT->cssClass = static::getCssClassFromModel($objConfig);
		
		$strFile = 'assets/js/' . $objT->cssClass . '.js';
		
		$objFile = new \File($strFile, file_exists(TL_ROOT . '/' . $strFile));
		
		// simple file caching
		if($objConfig->tstamp > $objFile->mtime || $objFile->size == 0 || $debug)
		{
			$objFile->write($objT->parse());
			$objFile->close();
		}
		
		$GLOBALS['TL_JAVASCRIPT']['slick_' . $objT->cssClass] = $strFile;
	}

	public static function getCssClassForContent($id)
	{
		return 'slick-content-'.  $id;
	}
	
	public static function getCssClassFromModel($objConfig)
	{
		$strClass = static::stripNamespaceFromClassName($objConfig);

		return 'slick_' . substr(md5($strClass .'_'. $objConfig->id), 0, 6);
	}
	
	public static function createConfig($objConfig)
	{
		\Controller::loadDataContainer('tl_slick_spread');
		
		$arrConfig = array();
		
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

					$config['slick_settings'] = static::createConfig($objResponsiveConfig);

					// trim slick_ prefix
					array_walk($config, function (&$value, $key) use (&$config) {
						$config[substr($key, 6)] = $value;
					});

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

			$arrConfig[$slickKey] = $value;
		}
		
		// remove responsive settings, otherwise center wont work
		if(empty($arrResponsive))
		{
			unset($arrConfig['responsive']);
		}

		return $arrConfig;
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

