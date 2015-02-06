<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package slick
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

$this->import('\HeimrichHannot\Slick\Constants');

// Content Fields
\Controller::loadDataContainer('tl_content');
\Controller::loadLanguageFile('tl_content');

// reusable palettes extension for tl_news, tl_content, tl_module etc
$GLOBALS['TL_DCA']['tl_slick_spread'] = array
(
	'palettes'    => array
	(
		'__selector__'             => array('addSlick', 'addGallery'),
		SLICK_PALETTE_DEFAULT      => '{slick_legend},addSlick;',
		SLICK_PALETTE_PRESETCONFIG => '{slick_config},slickConfig;',
		SLICK_PALETTE_GALLERY      => '{slick_gallery},addGallery;',
		SLICK_PALETTE_CONTENT      => '{type_legend},type;{slick_config},slickConfig;{source_legend},multiSRC,sortBy,useHomeDir;{image_legend},size,fullsize,numberOfItems;{template_legend:hide},slickgalleryTpl,customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop',
	),
	'subpalettes' => array
	(
		'addSlick'   => '	slick_accessibility,
							slick_adaptiveHeight,
							slick_appendArrows,
							slick_appendDots,
							slick_arrows,
							slick_asNavFor,
							slick_prevArrow,
							slick_nextArrow,
							slick_autoplay,
							slick_autoplaySpeed,
							slick_centerMode,
							slick_centerPadding,
							slick_cssEase,
							slick_customPaging,
							slick_dots,
							slick_dotsClass,
							slick_draggable,
							slick_easing,
							slick_edgeFriction,
							slick_fade,
							slick_focusOnSelect,
							slick_infinite,
							slick_initialSlide,
							slick_lazyLoad,
							slick_mobileFirst,
							slick_pauseOnHover,
							slick_pauseOnDotsHover,
							slick_respondTo,
							slick_responsive,
							slick_rtl,
							slick_slide,
							slick_slidesToShow,
							slick_slidesToScroll,
							slick_speed,
							slick_swipe,
							slick_swipeToSlide,
							slick_touchMove,
							slick_touchThreshold,
							slick_useCSS,
							slick_variableWidth,
							slick_vertical,
							slick_waitForAnimate,
							slick_unslick
							',
		'addGallery' => 'slickMultiSRC,slickSortBy,slickUseHomeDir,slickSize,slickFullsize,slickNumberOfItems,slickgalleryTpl,slickCustomTpl',
	),
	'fields'      => array
	(
		'slickConfig'            => array
		(
			'label'      => &$GLOBALS['TL_LANG']['tl_slick_spread']['slickConfig'],
			'inputType'  => 'select',
			'exclude'    => true,
			'foreignKey' => 'tl_slick_config.title',
			'sql'        => "int(10) unsigned NOT NULL",
			'wizard'     => array
			(
				array('tl_slick_spread', 'editSlickConfig')
			),
		),
		'addSlick'               => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['addSlick'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'eval'      => array
			(
				'submitOnChange' => true,
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		// START: Gallery fields
		'addGallery'             => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['addGallery'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'eval'      => array
			(
				'submitOnChange' => true,
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slickMultiSRC'          => $GLOBALS['TL_DCA']['tl_content']['fields']['multiSRC'],
		'slickOrderSRC'          => $GLOBALS['TL_DCA']['tl_content']['fields']['orderSRC'],
		'slickSortBy'            => $GLOBALS['TL_DCA']['tl_content']['fields']['sortBy'],
		'slickUseHomeDir'        => $GLOBALS['TL_DCA']['tl_content']['fields']['useHomeDir'],
		'slickSize'              => $GLOBALS['TL_DCA']['tl_content']['fields']['size'],
		'slickFullsize'          => $GLOBALS['TL_DCA']['tl_content']['fields']['fullsize'],
		'slickNumberOfItems'     => $GLOBALS['TL_DCA']['tl_content']['fields']['numberOfItems'],
		'slickCustomTpl'         => $GLOBALS['TL_DCA']['tl_content']['fields']['customTpl'],
		'slickgalleryTpl'        => array
		(
			'label'            => &$GLOBALS['TL_LANG']['tl_content']['galleryTpl'],
			'exclude'          => true,
			'inputType'        => 'select',
			'options_callback' => array('tl_slick_spread', 'getGalleryTemplates'),
			'eval'             => array('tl_class' => 'w50'),
			'sql'              => "varchar(64) NOT NULL default ''"
		),
		// END: Gallery fields
		// START: Slick JS defaults / options
		'slick_accessibility'    => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_accessibility'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'default'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_adaptiveHeight'   => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_adaptiveHeight'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		//		slick_appendArrows,
		//		slick_appendDots,
		'slick_arrows'           => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_arrows'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'default'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		//		slick_asNavFor,
		'slick_prevArrow'        => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_prevArrow'],
			'inputType' => 'text',
			'exclude'   => true,
			'default'   => '<button type="button" data-role="none" class="slick-prev">Previous</button>',
			'eval'      => array
			(
				'tl_class'  => 'clr long',
				'allowHtml' => true
			),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'slick_nextArrow'        => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_nextArrow'],
			'inputType' => 'text',
			'exclude'   => true,
			'default'   => '<button type="button" data-role="none" class="slick-next">Next</button>',
			'eval'      => array
			(
				'tl_class'  => 'long',
				'allowHtml' => true
			),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'slick_autoplay'         => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_autoplay'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_autoplaySpeed'    => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_autoplaySpeed'],
			'inputType' => 'text',
			'default'   => 3000,
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
				'rgxp'     => 'digit'
			),
			'sql'       => "smallint(5) unsigned NOT NULL default '0'"
		),
		'slick_centerMode'       => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_centerMode'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_centerPadding'    => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_centerPadding'],
			'inputType' => 'text',
			'default'   => '50px',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'slick_cssEase'          => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_cssEase'],
			'inputType' => 'text',
			'default'   => 'ease',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'slick_customPaging'     => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_customPaging'],
			'inputType' => 'text',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class'   => 'long clr',
				'isJsObject' => true,
			),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'slick_dots'             => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_dots'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'clr w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_dotsClass'        => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_dotsClass'],
			'inputType' => 'text',
			'default'   => 'slick-dots',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'slick_draggable'        => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_draggable'],
			'inputType' => 'checkbox',
			'default'   => true,
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_easing'           => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_easing'],
			'inputType' => 'text',
			'default'   => 'linear',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50 clr',
			),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'slick_edgeFriction'     => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_edgeFriction'],
			'inputType' => 'text',
			'default'   => 0.35,
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
				'rgxp'     => 'digit'
			),
			'sql'       => "float(9,2) unsigned NOT NULL default '0.00'"
		),
		'slick_fade'             => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_fade'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_focusOnSelect'    => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_focusOnSelect'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_infinite'         => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_infinite'],
			'inputType' => 'checkbox',
			'default'   => true,
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_initialSlide'     => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_initialSlide'],
			'inputType' => 'text',
			'default'   => 0,
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'clr w50',
				'rgxp'     => 'digit'
			),
			'sql'       => "smallint(5) unsigned NOT NULL default '0'"
		),
		'slick_lazyLoad'         => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_lazyLoad'],
			'inputType' => 'select',
			'default'   => 'ondemand',
			'options'   => array('ondemand', 'progressive'),
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'slick_mobileFirst'		 => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_mobileFirst'],
			'inputType' => 'checkbox',
			'default'   => true,
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_pauseOnHover'     => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_pauseOnHover'],
			'inputType' => 'checkbox',
			'default'   => true,
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_pauseOnDotsHover' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_pauseOnDotsHover'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_respondTo'        => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_respondTo'],
			'inputType' => 'text',
			'default'   => 'window',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'slick_responsive'       => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_responsive'],
			'inputType' => 'multiColumnWizard',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class'     => 'clr',
				'columnFields' => array
				(
					'slick_breakpoint' => array
					(
						'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_breakpoint'],
						'exclude'   => true,
						'inputType' => 'text',
						'eval'      => array
						(
							'style' => 'width:100px',
							'rgxp'  => 'digit'
						)
					),
					'slick_settings'   => array
					(
						'label'            => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_settings'],
						'inputType'        => 'select',
						'options_callback' => array('tl_slick_spread', 'getConfigurations'),
						'eval'             => array
						(
							'style'              => 'width:400px',
							'includeBlankOption' => true
						)
					),
				)
			),
			'sql'       => "blob NULL"
		),
		'slick_rtl'              => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_rtl'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_slide'            => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_slide'],
			'inputType' => 'text',
			'default'   => 'div',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50 clr',
			),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'slick_slidesToShow'     => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_slidesToShow'],
			'inputType' => 'text',
			'default'   => 1,
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
				'rgxp'     => 'digit'
			),
			'sql'       => "smallint(5) unsigned NOT NULL default '0'"
		),
		'slick_slidesToScroll'   => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_slidesToScroll'],
			'inputType' => 'text',
			'default'   => 1,
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
				'rgxp'     => 'digit'
			),
			'sql'       => "smallint(5) unsigned NOT NULL default '0'"
		),
		'slick_speed'            => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_speed'],
			'inputType' => 'text',
			'default'   => 500,
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
				'rgxp'     => 'digit'
			),
			'sql'       => "smallint(5) unsigned NOT NULL default '0'"
		),
		'slick_swipe'            => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_swipe'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'default'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50 clr',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_swipeToSlide'     => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_swipeToSlide'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_touchMove'        => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_touchMove'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'default'   => true,
			'eval'      => array
			(
				'tl_class' => 'clr w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_touchThreshold'   => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_touchThreshold'],
			'inputType' => 'text',
			'default'   => 5,
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'clr w50',
				'rgxp'     => 'digit'
			),
			'sql'       => "smallint(5) unsigned NOT NULL default '0'"
		),
		'slick_useCSS'           => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_useCSS'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'default'   => true,
			'eval'      => array
			(
				'tl_class' => 'clr w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_variableWidth'    => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_variableWidth'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_vertical'         => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_vertical'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_waitForAnimate'   => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_waitForAnimate'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'default'   => true,
			'eval'      => array
			(
				'tl_class' => 'w50',
			),
			'sql'       => "char(1) NOT NULL default ''"
		),
		'slick_unslick'          => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_unslick'],
			'inputType' => 'checkbox',
			'exclude'   => true,
			'default'   => true,
			'eval'      => array
			(
				'tl_class'   => 'w50',
				'isJsObject' => true
			),
			'sql'       => "char(1) NOT NULL default ''"
		)
		// END: Slick JS defaults / options
	)
);

// flat palette, renders widtout submitOnChange Field
$GLOBALS['TL_DCA']['tl_slick_spread']['palettes'][SLICK_PALETTE_FLAT] = str_replace('addSlick', $GLOBALS['TL_DCA']['tl_slick_spread']['subpalettes']['addSlick'], $GLOBALS['TL_DCA']['tl_slick_spread']['palettes']['default']);


// Gallery Support -- not tl_content type present, set isGallery as default for multiSRC
$GLOBALS['TL_DCA']['tl_slick_spread']['fields']['slickMultiSRC']['eval']['orderField'] = 'slickOrderSRC';
$GLOBALS['TL_DCA']['tl_slick_spread']['fields']['slickMultiSRC']['eval']['isGallery']  = true;

// Content Support -- set isGallery by type
$GLOBALS['TL_DCA']['tl_content']['fields']['multiSRC']['load_callback'][] = array('tl_slick_spread', 'setFileTreeFlags');


class tl_slick_spread extends \Backend
{
	/**
	 * Return all gallery templates as array
	 * @return array
	 */
	public function getGalleryTemplates()
	{
		return $this->getTemplateGroup('slick_');
	}

	public function setFileTreeFlags($varValue, DataContainer $dc)
	{

		if ($dc->activeRecord) {
			if ($dc->activeRecord->type == 'slick') {
				$GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['isGallery'] = true;
			}
		}

		return $varValue;
	}

	public function editSlickConfig(DataContainer $dc)
	{
		return ($dc->value < 1) ? '' : ' <a href="contao/main.php?do=slickconfig&amp;act=edit&amp;id=' . $dc->value . '&amp;popup=1&amp;nb=1&amp;rt=' . REQUEST_TOKEN . '" title="' . sprintf(specialchars($GLOBALS['TL_LANG']['tl_slick_spread']['editSlickConfig'][1]), $dc->value) . '" style="padding-left:3px" onclick="Backend.openModalIframe({\'width\':768,\'title\':\'' . specialchars(str_replace("'", "\\'", sprintf($GLOBALS['TL_LANG']['tl_slick_spread']['editSlickConfig'][1], $dc->value))) . '\',\'url\':this.href});return false">' . Image::getHtml('alias.gif', $GLOBALS['TL_LANG']['tl_slick_spread']['editSlickConfig'][0], 'style="vertical-align:top"') . '</a>';
	}

	public function getConfigurations(\Widget $objWidget)
	{
		$arrOptions = array();

		$objConfig = \HeimrichHannot\Slick\SlickConfigModel::findBy(array('id != ?'), $objWidget->activeRecord->id);

		if ($objConfig === null) return $arrOptions;

		while ($objConfig->next()) {
			$arrOptions[$objConfig->id] = $objConfig->title;
		}

		return $arrOptions;
	}
}