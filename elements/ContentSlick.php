<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package slick
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

namespace HeimrichHannot\Slick;

class ContentSlick extends \ContentGallery
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_slick';

    /**
     * Return if there are no files
     * @return string
     */
    public function generate()
    {
        // show gallery instead of slickcarousel in backend mode
        if (TL_MODE == 'BE') {
            return parent::generate();
        }

        parent::generate();

        if (!$this->slickConfig) {
            return '';
        }

        $objConfig = SlickConfigModel::findByPk($this->slickConfig);

        if ($objConfig === null) {
            return '';
        }

        // Map content fields to slick fields
        $this->arrData['slickMultiSRC']      = $this->arrData['multiSRC'];
        $this->arrData['slickOrderSRC']      = $this->arrData['orderSRC'];
        $this->arrData['slickSortBy']        = $this->arrData['sortBy'];
        $this->arrData['slickUseHomeDir']    = $this->arrData['useHomeDir'];
        $this->arrData['slickSize']          = $this->arrData['size'];
        $this->arrData['slickFullsize']      = $this->arrData['fullsize'];
        $this->arrData['slickNumberOfItems'] = $this->arrData['numberOfItems'];
        $this->arrData['slickCustomTpl']     = $this->arrData['customTpl'];

        $objGallery = new Slick(Slick::createSettings($this->arrData, $objConfig));

        $this->Template->class  .= ' ' . SlickConfig::getCssClassFromModel($objConfig) . ' slick';
        $this->Template->images = $objGallery->getImages();

        return $this->Template->parse();
    }
}
