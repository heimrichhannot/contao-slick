<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2014 Heimrich & Hannot GmbH
 * @package owlcarousel
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

namespace HeimrichHannot\OwlCarousel;

class ContentOwlCarousel extends \ContentGallery
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_owlcarousel';

	/**
	 * Return if there are no files
	 * @return string
	 */
	public function generate()
	{
		// show gallery instead of owlcarousel in backend mode
		if (TL_MODE == 'BE')
		{
			return parent::generate();
		}

		parent::generate();

		$objConfig = OwlConfigModel::findByPk($this->owlConfig);

		if ($objConfig === null) return;

		// Map content fields to owl fields
		$this->arrData['owlMultiSRC']      = $this->arrData['multiSRC'];
		$this->arrData['owlOrderSRC']      = $this->arrData['orderSRC'];
		$this->arrData['owlSortBy']        = $this->arrData['sortBy'];
		$this->arrData['owlUseHomeDir']    = $this->arrData['useHomeDir'];
		$this->arrData['owlSize']          = $this->arrData['size'];
		$this->arrData['owlFullsize']      = $this->arrData['fullsize'];
		$this->arrData['owlNumberOfItems'] = $this->arrData['numberOfItems'];
		$this->arrData['owlCustomTpl']     = $this->arrData['customTpl'];

		$objGallery = new OwlCarousel(OwlCarousel::createSettings($this->arrData, $objConfig));

		$this->Template->class .= ' ' . OwlConfig::getCssClassFromModel($objConfig) . ' owl-carousel';
		$this->Template->images = $objGallery->getImages();

		return $this->Template->parse();
	}
}
