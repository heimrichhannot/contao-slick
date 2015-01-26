<?php

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['loadDataContainer'][] = array('\HeimrichHannot\Slick\Hooks', 'loadDataContainerHook');
$GLOBALS['TL_HOOKS']['parseArticles'][]     = array('\HeimrichHannot\Slick\Hooks', 'parseArticlesHook');

/**
 * Supported TL_DCA Entities, spreading efa palette to
 */
// News support
$GLOBALS['TL_SLICK']['SUPPORTED']['tl_module']['slick_newslist'] = 'skipFirst;[[SLICK_PALETTE_PRESETCONFIG]]';
$GLOBALS['TL_SLICK']['SUPPORTED']['tl_news_archive']['default']  = 'jumpTo;[[SLICK_PALETTE_PRESETCONFIG]]';
$GLOBALS['TL_SLICK']['SUPPORTED']['tl_news']['default']          = 'addImage;[[SLICK_PALETTE_GALLERY]]';

// Content support
$GLOBALS['TL_SLICK']['SUPPORTED']['tl_content']['slick']               = '[[SLICK_PALETTE_CONTENT]]';
$GLOBALS['TL_SLICK']['SUPPORTED']['tl_content']['slick-content-start'] = '[[SLICK_PALETTE_CONTENT_SLIDER_START]]';

// Owl carousel config support
$GLOBALS['TL_SLICK']['SUPPORTED']['tl_slick_config']['default'] = 'title;[[SLICK_PALETTE_FLAT]]';


/**
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD']['system'], 1, array(
	'slick_config' => array
	(
		'tables' => array('tl_slick_config'),
		'icon'   => 'system/modules/slick/assets/slick.png'
	)
));


/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['news']['slick_newslist'] = '\HeimrichHannot\Slick\ModuleSlickNewsList';

if (TL_MODE == 'FE') {
	/**
	 * CSS
	 */
	$GLOBALS['TL_USER_CSS']['slick'] = 'system/modules/slick/assets/vendor/slick/slick/slick.css|screen|static|1.3.15';


	/**
	 * Javascript
	 */
	$GLOBALS['TL_JAVASCRIPT']['slick'] = 'system/modules/slick/assets/vendor/slick/slick/slick.js|static';
}

/**
 * Content elements
 */
array_insert($GLOBALS['TL_CTE'], 3, array(
	'slick' => array(
		'slick-slider'          => 'HeimrichHannot\Slick\ContentSlick',
		'slick-content-start'   => 'HeimrichHannot\Slick\ContentSlickContentStart',
		'slick-slide-separator' => 'HeimrichHannot\Slick\ContentSlickSlide',
		'slick-slide-start'     => 'HeimrichHannot\Slick\ContentSlickSlideStart',
		'slick-slide-stop'      => 'HeimrichHannot\Slick\ContentSlickSlideStop',
		'slick-content-stop'    => 'HeimrichHannot\Slick\ContentSlickContentStop',
		'slick-nav-start'       => 'HeimrichHannot\Slick\ContentSlickNavStart',
		'slick-nav-separator'   => 'HeimrichHannot\Slick\ContentSlickNavSlide',
		'slick-nav-stop'        => 'HeimrichHannot\Slick\ContentSlickNavStop',
	)
));

/**
 * Intend elements
 */
$GLOBALS['TL_WRAPPERS']['start'][]     = 'slick-content-start';
$GLOBALS['TL_WRAPPERS']['start'][]     = 'slick-slide-start';
$GLOBALS['TL_WRAPPERS']['start'][]     = 'slick-nav-start';
$GLOBALS['TL_WRAPPERS']['stop'][]      = 'slick-content-stop';
$GLOBALS['TL_WRAPPERS']['stop'][]      = 'slick-slide-stop';
$GLOBALS['TL_WRAPPERS']['stop'][]      = 'slick-nav-stop';
$GLOBALS['TL_WRAPPERS']['separator'][] = 'slick-slide-separator';
$GLOBALS['TL_WRAPPERS']['separator'][] = 'slick-nav-separator';

/**
 * Models
 */
$GLOBALS['TL_MODELS']['tl_slick_config'] = 'HeimrichHannot\Slick\SlickConfigModel';