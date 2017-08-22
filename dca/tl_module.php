<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package slick
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

$dc = &$GLOBALS['TL_DCA']['tl_module'];

$dc['config']['onload_callback']['slick'] = ['HeimrichHannot\Slick\Backend\Module', 'modifyDC'];

$dc['palettes']['slick_newslist'] = $dc['palettes']['newslist'];
$dc['palettes']['slick_eventlist'] = $dc['palettes']['eventlist'];