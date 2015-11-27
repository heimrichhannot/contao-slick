<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'HeimrichHannot',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Models
	'HeimrichHannot\Slick\SlickConfigModel'           => 'system/modules/slick/models/SlickConfigModel.php',

	// Modules
	'HeimrichHannot\Slick\ModuleSlickNewsList'        => 'system/modules/slick/modules/ModuleSlickNewsList.php',

	// Elements
	'HeimrichHannot\Slick\ContentSlick'               => 'system/modules/slick/elements/ContentSlick.php',
	'HeimrichHannot\Slick\ContentSlickContentStart'   => 'system/modules/slick/elements/ContentSlickContentStart.php',
	'HeimrichHannot\Slick\ContentSlickNavStop'        => 'system/modules/slick/elements/ContentSlickNavStop.php',
	'HeimrichHannot\Slick\ContentSlickNavStart'       => 'system/modules/slick/elements/ContentSlickNavStart.php',
	'HeimrichHannot\Slick\ContentSlickContentStop'    => 'system/modules/slick/elements/ContentSlickContentStop.php',
	'HeimrichHannot\Slick\ContentSlickSlideSeparator' => 'system/modules/slick/elements/ContentSlickSlideSeparator.php',
	'HeimrichHannot\Slick\ContentSlickSlideStop'      => 'system/modules/slick/elements/ContentSlickSlideStop.php',
	'HeimrichHannot\Slick\ContentSlickSlideStart'     => 'system/modules/slick/elements/ContentSlickSlideStart.php',

	// Classes
	'HeimrichHannot\Slick\Slick'                      => 'system/modules/slick/classes/Slick.php',
	'HeimrichHannot\Slick\Hooks'                      => 'system/modules/slick/classes/Hooks.php',
	'HeimrichHannot\Slick\SlickUpdater'               => 'system/modules/slick/classes/SlickUpdater.php',
	'HeimrichHannot\Slick\SlickConfig'                => 'system/modules/slick/classes/SlickConfig.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'jquery.slick'             => 'system/modules/slick/templates/jquery',
	'news_full'                => 'system/modules/slick/templates/news',
	'mod_newslist'             => 'system/modules/slick/templates/modules',
	'slick_default'            => 'system/modules/slick/templates/gallery',
	'ce_slick_slide_separator' => 'system/modules/slick/templates/elements',
	'ce_slick_nav_stop'        => 'system/modules/slick/templates/elements',
	'ce_slick_nav_separator'   => 'system/modules/slick/templates/elements',
	'ce_slick_nav_start'       => 'system/modules/slick/templates/elements',
	'ce_slick_content_start'   => 'system/modules/slick/templates/elements',
	'ce_slick'                 => 'system/modules/slick/templates/elements',
	'ce_slick_content_stop'    => 'system/modules/slick/templates/elements',
	'block_slick'              => 'system/modules/slick/templates/block',
));
