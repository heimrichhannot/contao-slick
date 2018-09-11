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

\Controller::loadDataContainer('tl_content');

// reusable palettes extension for tl_news, tl_content, tl_module etc
$GLOBALS['TL_DCA']['tl_slick_spread'] = [
    'palettes'    => [
        '__selector__'             => ['addSlick', 'addGallery', 'slick_pausePlay'],
        SLICK_PALETTE_DEFAULT      => '{slick_legend},addSlick;',
        SLICK_PALETTE_PRESETCONFIG => '{slick_config},slickConfig;',
        SLICK_PALETTE_GALLERY      => '{slick_gallery},addGallery;',
        SLICK_PALETTE_CONTENT      => '{type_legend},type;{slick_config},slickConfig;{source_legend},multiSRC,sortBy,useHomeDir;{image_legend},size,fullsize,numberOfItems;{template_legend:hide},slickgalleryTpl,customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop',
    ],
    'subpalettes' => [
        'addSlick'        => '	slick_accessibility,
							slick_adaptiveHeight,
							slick_appendArrows,
							slick_appendDots,
							slick_arrows,
							slick_asNavFor,
							slick_prevArrow,
							slick_nextArrow,
							slick_autoplay,
							slick_pausePlay,
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
							slick_pauseOnFocus,
							slick_pauseOnDotsHover,
							slick_respondTo,
							slick_responsive,
							slick_rows,
							slick_slide,
							slick_slidesPerRow,
							slick_slidesToShow,
							slick_slidesToScroll,
							slick_speed,
							slick_swipe,
							slick_swipeToSlide,
							slick_touchMove,
							slick_touchThreshold,
							slick_useCSS,
							slick_useTransform,
							slick_variableWidth,
							slick_vertical,
							slick_verticalSwiping,
							slick_rtl,
							slick_waitForAnimate,
							slick_randomActive,
							slick_zIndex,
							slick_unslick,
							initCallback,
							afterInitCallback,
							cssClass
							',
        'addGallery'      => 'slickMultiSRC,slickSortBy,slickUseHomeDir,slickSize,slickFullsize,slickNumberOfItems,slickgalleryTpl,slickCustomTpl',
        'slick_pausePlay' => 'slick_pauseButton, slick_playButton',
    ],
    'fields'      => [
        'slickConfig'            => [
            'label'      => &$GLOBALS['TL_LANG']['tl_slick_spread']['slickConfig'],
            'inputType'  => 'select',
            'exclude'    => true,
            'foreignKey' => 'tl_slick_config.title',
            'sql'        => "int(10) unsigned NOT NULL default '0'",
            'eval'       => ['tl_class' => 'w50'],
            'wizard'     => [
                ['tl_slick_spread', 'editSlickConfig'],
            ],
        ],
        'addSlick'               => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['addSlick'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'submitOnChange' => true,
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        // START: Gallery fields
        'addGallery'             => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['addGallery'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'submitOnChange' => true,
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slickMultiSRC'          => [
            'label'         => &$GLOBALS['TL_LANG']['tl_slick_spread']['slickMultiSRC'],
            'exclude'       => true,
            'inputType'     => 'fileTree',
            'eval'          => ['multiple' => true, 'fieldType' => 'checkbox', 'orderField' => 'orderSRC', 'files' => true, 'mandatory' => true],
            'sql'           => "blob NULL",
            'load_callback' => [
                ['tl_content', 'setMultiSrcFlags'],
            ],
        ],
        'slickOrderSRC'          => [
            'label' => &$GLOBALS['TL_LANG']['tl_slick_spread']['slickOrderSRC'],
            'sql'   => "blob NULL",
        ],
        'slickSortBy'            => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slickSortBy'],
            'exclude'   => true,
            'inputType' => 'select',
            'options'   => ['custom', 'name_asc', 'name_desc', 'date_asc', 'date_desc', 'random'],
            'reference' => &$GLOBALS['TL_LANG']['tl_content'],
            'eval'      => ['tl_class' => 'w50'],
            'sql'       => "varchar(32) NOT NULL default ''",
        ],
        'slickUseHomeDir'        => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slickUseHomeDir'],
            'exclude'   => true,
            'inputType' => 'checkbox',
            'eval'      => ['tl_class' => 'w50'],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slickSize'              => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slickSize'],
            'exclude'   => true,
            'inputType' => 'imageSize',
            'options'   => System::getImageSizes(),
            'reference' => &$GLOBALS['TL_LANG']['MSC'],
            'eval'      => ['rgxp' => 'natural', 'includeBlankOption' => true, 'nospace' => true, 'helpwizard' => true, 'tl_class' => 'w50'],
            'sql'       => "varchar(64) NOT NULL default ''",
        ],
        'slickFullsize'          => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slickFullsize'],
            'exclude'   => true,
            'inputType' => 'checkbox',
            'eval'      => ['tl_class' => 'w50 m12'],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slickNumberOfItems'     => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slickNumberOfItems'],
            'exclude'   => true,
            'inputType' => 'text',
            'eval'      => ['rgxp' => 'natural', 'tl_class' => 'w50'],
            'sql'       => "smallint(5) unsigned NOT NULL default '0'",
        ],
        'slickCustomTpl'         => [
            'label'            => &$GLOBALS['TL_LANG']['tl_slick_spread']['slickCustomTpl'],
            'exclude'          => true,
            'inputType'        => 'select',
            'options_callback' => ['tl_content', 'getElementTemplates'],
            'eval'             => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
            'sql'              => "varchar(64) NOT NULL default ''",
        ],
        'slickgalleryTpl'        => [
            'label'            => &$GLOBALS['TL_LANG']['tl_content']['galleryTpl'],
            'exclude'          => true,
            'inputType'        => 'select',
            'default'          => 'slick_default',
            'options_callback' => ['tl_slick_spread', 'getGalleryTemplates'],
            'eval'             => ['tl_class' => 'w50'],
            'sql'              => "varchar(64) NOT NULL default ''",
        ],
        // END: Gallery fields
        // START: Slick JS defaults / options
        'slick_accessibility'    => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_accessibility'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'default'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_adaptiveHeight'   => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_adaptiveHeight'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        //		slick_appendArrows,
        //		slick_appendDots,
        'slick_arrows'           => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_arrows'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'default'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_asNavFor'         => [
            'label'            => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_asNavFor'],
            'inputType'        => 'select',
            'options_callback' => ['tl_slick_spread', 'getConfigurations'],
            'eval'             => [
                'includeBlankOption' => true,
                'tl_class'           => 'w50',
            ],
            'sql'              => "int(10) unsigned NOT NULL default '0'",
        ],
        'slick_prevArrow'        => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_prevArrow'],
            'inputType' => 'text',
            'exclude'   => true,
            'default'   => '<button type="button" data-role="none" class="slick-prev">Previous</button>',
            'eval'      => [
                'tl_class'  => 'clr long',
                'allowHtml' => true,
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'slick_nextArrow'        => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_nextArrow'],
            'inputType' => 'text',
            'exclude'   => true,
            'default'   => '<button type="button" data-role="none" class="slick-next">Next</button>',
            'eval'      => [
                'tl_class'  => 'long',
                'allowHtml' => true,
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'slick_pausePlay'        => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_pausePlay'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'submitOnChange' => true,
                'tl_class'       => 'clr'
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_pauseButton'      => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_pauseButton'],
            'inputType' => 'text',
            'exclude'   => true,
            'default'   => '<button type="button" data-role="none" class="slick-pause" aria-label="Pause" tabindex="0" role="button">Pause</button>',
            'eval'      => [
                'tl_class'  => 'long',
                'allowHtml' => true,
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'slick_playButton'       => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_playButton'],
            'inputType' => 'text',
            'exclude'   => true,
            'default'   => '<button type="button" data-role="none" class="slick-play" aria-label="Play" tabindex="0" role="button">Play</button>',
            'eval'      => [
                'tl_class'  => 'long',
                'allowHtml' => true,
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'slick_autoplay'         => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_autoplay'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_autoplaySpeed'    => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_autoplaySpeed'],
            'inputType' => 'text',
            'default'   => 3000,
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
                'rgxp'     => 'digit',
            ],
            'sql'       => "smallint(5) unsigned NOT NULL default '0'",
        ],
        'slick_centerMode'       => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_centerMode'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50 clr',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_centerPadding'    => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_centerPadding'],
            'inputType' => 'text',
            'default'   => '50px',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'slick_cssEase'          => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_cssEase'],
            'inputType' => 'text',
            'default'   => 'ease',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'slick_customPaging'     => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_customPaging'],
            'inputType' => 'text',
            'exclude'   => true,
            'eval'      => [
                'tl_class'   => 'long clr',
                'isJsObject' => true,
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'slick_dots'             => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_dots'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'clr w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_dotsClass'        => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_dotsClass'],
            'inputType' => 'text',
            'default'   => 'slick-dots',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'slick_draggable'        => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_draggable'],
            'inputType' => 'checkbox',
            'default'   => true,
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_easing'           => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_easing'],
            'inputType' => 'text',
            'default'   => 'linear',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50 clr',
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'slick_edgeFriction'     => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_edgeFriction'],
            'inputType' => 'text',
            'default'   => 0.15,
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
                'rgxp'     => 'digit',
            ],
            'sql'       => "decimal(9,2) NOT NULL default '0.00'",
        ],
        'slick_fade'             => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_fade'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_focusOnSelect'    => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_focusOnSelect'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_infinite'         => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_infinite'],
            'inputType' => 'checkbox',
            'default'   => true,
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_initialSlide'     => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_initialSlide'],
            'inputType' => 'text',
            'default'   => 0,
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'clr w50',
                'rgxp'     => 'digit',
            ],
            'sql'       => "smallint(5) unsigned NOT NULL default '0'",
        ],
        'slick_lazyLoad'         => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_lazyLoad'],
            'inputType' => 'select',
            'default'   => 'ondemand',
            'options'   => ['ondemand', 'progressive'],
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'slick_mobileFirst'      => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_mobileFirst'],
            'inputType' => 'checkbox',
            'default'   => false,
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_pauseOnHover'     => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_pauseOnHover'],
            'inputType' => 'checkbox',
            'default'   => true,
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_pauseOnFocus'     => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_pauseOnFocus'],
            'inputType' => 'checkbox',
            'default'   => true,
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_pauseOnDotsHover' => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_pauseOnDotsHover'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_respondTo'        => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_respondTo'],
            'inputType' => 'text',
            'default'   => 'window',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'slick_responsive'       => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_responsive'],
            'inputType' => 'multiColumnEditor',
            'exclude'   => true,
            'eval'      => [
                'tl_class'          => 'clr',
                'multiColumnEditor' => [
                    'fields' => [
                        'slick_breakpoint' => [
                            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_breakpoint'],
                            'exclude'   => true,
                            'inputType' => 'text',
                            'eval'      => [
                                'groupStyle' => 'width:100px',
                                'rgxp'       => 'digit',
                            ],
                        ],
                        'slick_settings'   => [
                            'label'            => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_settings'],
                            'inputType'        => 'select',
                            'options_callback' => ['tl_slick_spread', 'getConfigurations'],
                            'eval'             => [
                                'groupStyle'         => 'width:400px',
                                'includeBlankOption' => true,
                            ],
                        ],
                    ],
                ],
            ],
            'sql'       => "blob NULL",
        ],
        'slick_rows'             => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_rows'],
            'inputType' => 'text',
            'default'   => 0,
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
                'rgxp'     => 'digit',
            ],
            'sql'       => "smallint(5) unsigned NOT NULL default '0'",
        ],
        'slick_rtl'              => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_rtl'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_slide'            => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_slide'],
            'inputType' => 'text',
            'default'   => '',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50 clr',
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'slick_slidesPerRow'     => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_slidesPerRow'],
            'inputType' => 'text',
            'default'   => 1,
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
                'rgxp'     => 'digit',
            ],
            'sql'       => "smallint(5) unsigned NOT NULL default '1'",
        ],
        'slick_slidesToShow'     => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_slidesToShow'],
            'inputType' => 'text',
            'default'   => 1,
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
                'rgxp'     => 'digit',
            ],
            'sql'       => "smallint(5) unsigned NOT NULL default '0'",
        ],
        'slick_slidesToScroll'   => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_slidesToScroll'],
            'inputType' => 'text',
            'default'   => 1,
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
                'rgxp'     => 'digit',
            ],
            'sql'       => "smallint(5) unsigned NOT NULL default '0'",
        ],
        'slick_speed'            => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_speed'],
            'inputType' => 'text',
            'default'   => 300,
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
                'rgxp'     => 'digit',
            ],
            'sql'       => "smallint(5) unsigned NOT NULL default '0'",
        ],
        'slick_swipe'            => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_swipe'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'default'   => true,
            'eval'      => [
                'tl_class' => 'w50 clr',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_swipeToSlide'     => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_swipeToSlide'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_touchMove'        => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_touchMove'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'default'   => true,
            'eval'      => [
                'tl_class' => 'clr w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_touchThreshold'   => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_touchThreshold'],
            'inputType' => 'text',
            'default'   => 5,
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'clr w50',
                'rgxp'     => 'digit',
            ],
            'sql'       => "smallint(5) unsigned NOT NULL default '0'",
        ],
        'slick_useCSS'           => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_useCSS'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'default'   => true,
            'eval'      => [
                'tl_class' => 'clr w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_useTransform'     => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_useTransform'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'default'   => true,
            'eval'      => [
                'tl_class' => 'clr w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_variableWidth'    => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_variableWidth'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_vertical'         => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_vertical'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_verticalSwiping'  => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_verticalSwiping'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_waitForAnimate'   => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_waitForAnimate'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'default'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_zIndex'           => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_zIndex'],
            'inputType' => 'text',
            'default'   => 1000,
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'clr w50',
                'rgxp'     => 'digit',
            ],
            'sql'       => "smallint(5) unsigned NOT NULL default '1000'",
        ],
        'slick_unslick'          => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_unslick'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'tl_class'   => 'w50',
                'isJsObject' => true,
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        'slick_randomActive'     => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['slick_randomActive'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'eval'      => [
                'tl_class'   => 'w50',
                'isJsObject' => true,
            ],
            'sql'       => "char(1) NOT NULL default ''",
        ],
        // END: Slick JS defaults / options

        // init callback must be called before slick object is initialized, provide global callback
        'initCallback'           => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['initCallback'],
            'inputType' => 'text',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50 clr',
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        // after init callback contains the initialized slick slider object
        'afterInitCallback'      => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['afterInitCallback'],
            'inputType' => 'text',
            'exclude'   => true,
            'eval'      => [
                'tl_class' => 'w50',
            ],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
        'cssClass'               => [
            'label'     => &$GLOBALS['TL_LANG']['tl_slick_spread']['cssClass'],
            'exclude'   => true,
            'inputType' => 'text',
            'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''",
        ],
    ],
];

// flat palette, renders widtout submitOnChange Field
$GLOBALS['TL_DCA']['tl_slick_spread']['palettes'][SLICK_PALETTE_FLAT] = str_replace(
    'addSlick',
    $GLOBALS['TL_DCA']['tl_slick_spread']['subpalettes']['addSlick'],
    $GLOBALS['TL_DCA']['tl_slick_spread']['palettes']['default']
);


// Gallery Support -- not tl_content type present, set isGallery as default for multiSRC
$GLOBALS['TL_DCA']['tl_slick_spread']['fields']['slickMultiSRC']['eval']['orderField'] = 'slickOrderSRC';
$GLOBALS['TL_DCA']['tl_slick_spread']['fields']['slickMultiSRC']['eval']['isGallery']  = true;

// Content Support -- set isGallery by type
$GLOBALS['TL_DCA']['tl_content']['fields']['multiSRC']['load_callback'][] = ['tl_slick_spread', 'setFileTreeFlags'];


class tl_slick_spread extends Backend
{
    /**
     * Return all gallery templates as array
     *
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
        return ($dc->value < 1)
            ? ''
            : ' <a href="contao/main.php?do=slick_config&amp;act=edit&amp;id=' . $dc->value . '&amp;popup=1&amp;nb=1&amp;rt=' . REQUEST_TOKEN . '" title="' . sprintf(
                specialchars($GLOBALS['TL_LANG']['tl_slick_spread']['editSlickConfig'][1]),
                $dc->value
            ) . '" style="padding-left:3px" onclick="Backend.openModalIframe({\'width\':768,\'title\':\'' . specialchars(
                str_replace("'", "\\'", sprintf($GLOBALS['TL_LANG']['tl_slick_spread']['editSlickConfig'][1], $dc->value))
            ) . '\',\'url\':this.href});return false">' . Image::getHtml(
                'alias.gif',
                $GLOBALS['TL_LANG']['tl_slick_spread']['editSlickConfig'][0],
                'style="vertical-align:top"'
            ) . '</a>';
    }

    public function getConfigurations($dc)
    {
        $arrOptions = [];

        $objConfig = \HeimrichHannot\Slick\SlickConfigModel::findBy(['id != ?'], $dc->activeRecord->id);

        if ($objConfig === null) {
            return $arrOptions;
        }

        while ($objConfig->next()) {
            $arrOptions[$objConfig->id] = $objConfig->title;
        }

        return $arrOptions;
    }
}
