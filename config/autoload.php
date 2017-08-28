<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(
    [
        'HeimrichHannot',
    ]
);


/**
 * Register the classes
 */
ClassLoader::addClasses(
    [
        // Elements
        'HeimrichHannot\Slick\ContentSlickSlideStart'     => 'system/modules/slick/elements/ContentSlickSlideStart.php',
        'HeimrichHannot\Slick\ContentSlick'               => 'system/modules/slick/elements/ContentSlick.php',
        'HeimrichHannot\Slick\ContentSlickSlideStop'      => 'system/modules/slick/elements/ContentSlickSlideStop.php',
        'HeimrichHannot\Slick\ContentSlickNavStop'        => 'system/modules/slick/elements/ContentSlickNavStop.php',
        'HeimrichHannot\Slick\ContentSlickContentStop'    => 'system/modules/slick/elements/ContentSlickContentStop.php',
        'HeimrichHannot\Slick\ContentSlickSlideSeparator' => 'system/modules/slick/elements/ContentSlickSlideSeparator.php',
        'HeimrichHannot\Slick\ContentSlickNavStart'       => 'system/modules/slick/elements/ContentSlickNavStart.php',
        'HeimrichHannot\Slick\ContentSlickContentStart'   => 'system/modules/slick/elements/ContentSlickContentStart.php',

        // Models
        'HeimrichHannot\Slick\SlickConfigModel'           => 'system/modules/slick/models/SlickConfigModel.php',

        // Modules
        'HeimrichHannot\Slick\ModuleSlickNewsList'        => 'system/modules/slick/modules/ModuleSlickNewsList.php',
        'HeimrichHannot\Slick\ModuleSlickEventList'       => 'system/modules/slick/modules/ModuleSlickEventList.php',

        // Classes
        'HeimrichHannot\Slick\SlickConfig'                => 'system/modules/slick/classes/SlickConfig.php',
        'HeimrichHannot\Slick\Hooks'                      => 'system/modules/slick/classes/Hooks.php',
        'HeimrichHannot\Slick\Slick'                      => 'system/modules/slick/classes/Slick.php',
        'HeimrichHannot\Slick\SlickUpdater'               => 'system/modules/slick/classes/SlickUpdater.php',
        'HeimrichHannot\Slick\Backend\Module'             => 'system/modules/slick/classes/Backend/Module.php',
    ]
);


/**
 * Register the templates
 */
TemplateLoader::addFiles(
    [
        'jquery.slick'             => 'system/modules/slick/templates/jquery',
        'ce_slick_content_start'   => 'system/modules/slick/templates/elements',
        'ce_slick_nav_stop'        => 'system/modules/slick/templates/elements',
        'ce_slick_content_stop'    => 'system/modules/slick/templates/elements',
        'ce_slick_nav_start'       => 'system/modules/slick/templates/elements',
        'ce_slick_nav_separator'   => 'system/modules/slick/templates/elements',
        'ce_slick'                 => 'system/modules/slick/templates/elements',
        'ce_slick_slide_separator' => 'system/modules/slick/templates/elements',
        'mod_newslist'             => 'system/modules/slick/templates/modules',
        'mod_eventlist'            => 'system/modules/slick/templates/modules',
        'block_slick'              => 'system/modules/slick/templates/block',
        'news_full_gallery'        => 'system/modules/slick/templates/news',
        'slick_default'            => 'system/modules/slick/templates/gallery',
    ]
);
