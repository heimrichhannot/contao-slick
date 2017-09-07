<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2014 Heimrich & Hannot GmbH
 * @package slick
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

class SlickRunOnce extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        if (class_exists('\\HeimrichHannot\\Slick\\SlickUpdater')) {
            \HeimrichHannot\Slick\SlickUpdater::run();
        }
    }
}

$objRunOnce = new SlickRunOnce();
$objRunOnce->run();