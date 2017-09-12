<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 *
 * @package slick
 * @author  Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

namespace HeimrichHannot\Slick;

class SlickConfig extends \Controller
{
    public static function createConfigJs($objConfig, $debug = false)
    {
        if (!static::isJQueryEnabled()) {
            return false;
        }

        $cache = !$GLOBALS['TL_CONFIG']['debugMode'];

        $objT = new \FrontendTemplate('jquery.slick');

        $arrData = static::createConfig($objConfig);
        $objT->setData($arrData['config']);
        $objT->config       = static::createConfigJSON($objConfig);
        $objT->selector     = static::getSlickContainerSelectorFromModel($objConfig);
        $objT->wrapperClass = static::getSlickCssClassFromModel($objConfig);

        if ($objConfig->initCallback) {
            $objT->initCallback = $objConfig->initCallback;
        }

        if ($objConfig->afterInitCallback) {
            $objT->afterInitCallback = $objConfig->afterInitCallback;
        }

        $strFile         = 'assets/js/' . $objT->wrapperClass . '.js';
        $strFileMinified = 'assets/js/' . $objT->wrapperClass . '.min.js';

        $objFile         = new \File($strFile, file_exists(TL_ROOT . '/' . $strFile));
        $objFileMinified = new \File($strFileMinified, file_exists(TL_ROOT . '/' . $strFileMinified));
        $minify          = class_exists('MatthiasMullie\Minify\JS');

        // simple file caching
        if (static::doRewrite($objConfig, $objFile, $objFileMinified, $minify, $debug)) {
            $strChunk = $objT->parse();

            if (!$objFile->write($objT->parse())) {
                \System::log('Unable to create slick config js file within assets/js, check file permissions!', __METHOD__, TL_ERROR);

                return false;
            }

            $objFile->close();

            // minify js
            if ($minify) {
                $objFileMinified = new \File($strFileMinified);
                $objMinify       = new \MatthiasMullie\Minify\JS();
                $objMinify->add($strChunk);
                $objFileMinified->write(rtrim($objMinify->minify(), ";") . ";"); // append semicolon, otherwise "(intermediate value)(...) is not a function"
                $objFileMinified->close();
            }
        }

        $GLOBALS['TL_JAVASCRIPT']['slick']             = 'system/modules/slick/assets/vendor/slick-carousel/slick/slick' . ($cache ? '.min.js|static' : '.js');
        $GLOBALS['TL_JAVASCRIPT']['slick-functions']   = 'system/modules/slick/assets/js/jquery.slick-functions' . ($cache ? '.min.js|static' : '.js');
        $GLOBALS['TL_JAVASCRIPT'][$objT->wrapperClass] = $cache ? ($strFileMinified . '|static') : $strFile;
    }

    public static function isJQueryEnabled()
    {
        global $objPage;

        $blnMobile = ($objPage->mobileLayout && \Environment::get('agent')->mobile);

        $intId     = ($blnMobile && $objPage->mobileLayout) ? $objPage->mobileLayout : $objPage->layout;
        $objLayout = \LayoutModel::findByPk($intId);

        return $objLayout->addJQuery;
    }

    public static function createConfig($objConfig)
    {
        \Controller::loadDataContainer('tl_slick_spread');

        $arrConfig  = [];
        $arrObjects = [];

        foreach ($objConfig->row() as $key => $value) {
            if (strstr($key, 'slick_') === false) {
                continue;
            }

            if (!isset($GLOBALS['TL_DCA']['tl_slick_spread']['fields'][$key])) {
                continue;
            }

            $arrData = $GLOBALS['TL_DCA']['tl_slick_spread']['fields'][$key];

            $slickKey = substr($key, 6); // trim slick_ prefix

            if ($arrData['eval']['rgxp'] == 'digit') {
                $value = intval($value);
            }

            if ($arrData['inputType'] == 'checkbox' && !$arrData['eval']['multiple']) {
                $value = (bool)filter_var($value, FILTER_VALIDATE_BOOLEAN);
            }

            if ($arrData['eval']['multiple'] || $arrData['inputType'] == 'multiColumnEditor') {
                $value = deserialize($value, true);
            }

            if ($arrData['eval']['isJsObject']) {
                $arrObjects[] = $slickKey;
            }

            // check type as well, otherwise
            if ($value === '') {
                continue;
            }

            if ($key == 'slick_responsive') {
                $arrResponsive = [];

                foreach ($value as $config) {
                    if (empty($config['slick_settings'])) {
                        continue;
                    }

                    $objResponsiveConfig = SlickConfigModel::findByPk($config['slick_settings']);

                    if ($objResponsiveConfig === null) {
                        continue;
                    }

                    $config['breakpoint'] = $config['slick_breakpoint'];
                    unset($config['slick_breakpoint']);

                    $settings = static::createConfig($objResponsiveConfig);

                    if ($settings['config']['unslick']) {
                        $config['settings'] = 'unslick';
                    } else {
                        $config['settings'] = $settings['config'];
                    }

                    unset($config['slick_settings']);


                    $arrResponsive[] = $config;
                }

                if (empty($arrResponsive)) {
                    $value = false;
                } else {
                    $value = $arrResponsive;
                }
            }

            if ($key == 'slick_asNavFor') {

                if($value > 0)
                {
                    $objTargetConfig = SlickConfigModel::findByPk($value);

                    if ($objTargetConfig !== null) {
                        $value = static::getSlickContainerSelectorFromModel($objTargetConfig);
                    } else {
                        $value = null; // should be null by default
                    }
                }

                if(!$value){
                    continue;
                }
            }

            if ($key) {
                $arrConfig[$slickKey] = $value;
            }
        }

        // remove responsive settings, otherwise center wont work
        if (empty($arrResponsive)) {
            unset($arrConfig['responsive']);
        }

        $arrReturn = [
            'config'  => $arrConfig,
            'objects' => $arrObjects,
        ];

        return $arrReturn;
    }

    public static function getSlickContainerSelectorFromModel($objConfig)
    {
        return '.' . static::getSlickCssClassFromModel($objConfig) . ' .slick-container';
    }

    public static function getSlickCssClassFromModel($objConfig)
    {
        $strClass = static::stripNamespaceFromClassName($objConfig);

        return 'slick_' . substr(md5($strClass . '_' . $objConfig->id), 0, 6);
    }

    public static function stripNamespaceFromClassName($obj)
    {
        $classname = get_class($obj);

        if (preg_match('@\\\\([\w]+)$@', $classname, $matches)) {
            $classname = $matches[1];
        }

        return $classname;
    }

    public static function createConfigJSON($objConfig)
    {
        $arrConfig = static::createConfig($objConfig);

        $strJson = '';

        if (!is_array($arrConfig['config'])) {
            return $strJson;
        }

        $strJson = json_encode($arrConfig['config']);

        if (is_array($arrConfig['objects'])) {
            foreach ($arrConfig['objects'] as $key) {
                // remove quotes from callbacks
                $strJson = preg_replace('#"' . $key . '":"(.+?)"#', '"' . $key . '":$1', $strJson);
            }
        }

        $strJson = ltrim($strJson, '{');
        $strJson = rtrim($strJson, '}');

        return $strJson;
    }

    public static function doRewrite($objConfig, $objFile, $objFileMinified, $minify, $debug)
    {
        if (!file_exists(TL_ROOT . DIRECTORY_SEPARATOR . $objFile->value)) {
            return true;
        }

        if ($minify && !file_exists(TL_ROOT . DIRECTORY_SEPARATOR . $objFileMinified->value)) {
            return true;
        }

        $rewrite = $objConfig->tstamp > ($objFile->mtime + 60) || $objFile->size == 0 || $debug;

        // do not check changes to responsive config, if parent config has been changed (performance)
        if ($rewrite) {
            return $rewrite;
        }

        $arrResponsive = deserialize($objConfig->slick_responsive, true);

        if (!empty($arrResponsive)) {
            foreach ($arrResponsive as $config) {
                if (empty($config['slick_settings'])) {
                    continue;
                }

                $objResponsiveConfig = SlickConfigModel::findByPk($config['slick_settings']);

                if ($objResponsiveConfig === null) {
                    continue;
                }

                if ($objResponsiveConfig->tstamp > $objFile->mtime) {
                    $rewrite = true;
                    break;
                }
            }
        }

        return $rewrite;
    }

    public static function getCssClassForContent($id)
    {
        return 'slick-content-' . $id;
    }

    public static function getCssClassFromModel($objConfig)
    {
        return static::getSlickCssClassFromModel($objConfig) . (strlen($objConfig->cssClass) > 0 ? ' ' . $objConfig->cssClass : '') . ' slick_uid_' . uniqid();
    }
}

