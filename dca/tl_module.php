<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package slick
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

$dca = &$GLOBALS['TL_DCA']['tl_module'];

/**
 * Callbacks
 */
$dca['config']['onload_callback']['slick'] = ['HeimrichHannot\Slick\Backend\Module', 'modifyDC'];

/**
 * Palettes
 */
$dca['palettes']['slick_newslist']  = $dca['palettes']['newslist'];
$dca['palettes']['slick_eventlist'] = $dca['palettes']['eventlist'];
$dca['palettes']['newsreader']      = str_replace('news_archives', 'news_archives,useSlickGallery', $dca['palettes']['newsreader']);

/**
 * Fields
 */
$fields = [
    'useSlickGallery' => [
        'label'                   => &$GLOBALS['TL_LANG']['tl_module']['useSlickGallery'],
        'exclude'                 => true,
        'inputType'               => 'checkbox',
        'eval'                    => ['tl_class' => 'w50'],
        'sql'                     => "char(1) NOT NULL default '1'"
    ],
];

$dca['fields'] += $fields;