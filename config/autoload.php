<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package Slick
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
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
	'HeimrichHannot\Slick\SlickConfigModel'                     => 'system/modules/slick/models/SlickConfigModel.php',

	// Modules
	'HeimrichHannot\Slick\ModuleSlickNewsList'                  => 'system/modules/slick/modules/ModuleSlickNewsList.php',

	// Elements
	'HeimrichHannot\OwlCarousel\ContentOwlCarouselSlideStop'    => 'system/modules/slick/elements/ContentOwlCarouselSlideStop.php',
	'HeimrichHannot\OwlCarousel\ContentOwlCarouselContentStart' => 'system/modules/slick/elements/ContentOwlCarouselContentStart.php',
	'HeimrichHannot\OwlCarousel\ContentOwlCarouselNavStop'      => 'system/modules/slick/elements/ContentOwlCarouselNavStop.php',
	'HeimrichHannot\OwlCarousel\ContentOwlCarousel'             => 'system/modules/slick/elements/ContentOwlCarousel.php',
	'HeimrichHannot\OwlCarousel\ContentOwlCarouselNavStart'     => 'system/modules/slick/elements/ContentOwlCarouselNavStart.php',
	'HeimrichHannot\OwlCarousel\ContentOwlCarouselSlideStart'   => 'system/modules/slick/elements/ContentOwlCarouselSlideStart.php',
	'HeimrichHannot\OwlCarousel\ContentOwlCarouselContentStop'  => 'system/modules/slick/elements/ContentOwlCarouselContentStop.php',

	// Classes
	'HeimrichHannot\Slick\Slick'                                => 'system/modules/slick/classes/Slick.php',
	'HeimrichHannot\Slick\Constants'                            => 'system/modules/slick/classes/Constants.php',
	'HeimrichHannot\Slick\Hooks'                                => 'system/modules/slick/classes/Hooks.php',
	'HeimrichHannot\OwlCarousel\SlickUpdater'                   => 'system/modules/slick/classes/SlickUpdater.php',
	'HeimrichHannot\Slick\SlickConfig'                          => 'system/modules/slick/classes/SlickConfig.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'jquery.slick'           => 'system/modules/slick/templates/jquery',
	'news_full'              => 'system/modules/slick/templates/news',
	'mod_newslist'           => 'system/modules/slick/templates/modules',
	'slick_default'          => 'system/modules/slick/templates/gallery',
	'ce_slick_slide_stop'    => 'system/modules/slick/templates/elements',
	'ce_slick_nav_stop'      => 'system/modules/slick/templates/elements',
	'ce_slick_slide_start'   => 'system/modules/slick/templates/elements',
	'ce_slick_nav_start'     => 'system/modules/slick/templates/elements',
	'ce_slick_content_start' => 'system/modules/slick/templates/elements',
	'ce_slick'               => 'system/modules/slick/templates/elements',
	'ce_slick_content_stop'  => 'system/modules/slick/templates/elements',
	'block_slick'            => 'system/modules/slick/templates/block',
));
