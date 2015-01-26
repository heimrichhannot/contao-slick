<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package owlcarousel
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

namespace HeimrichHannot\OwlCarousel;


class ContentOwlCarouselNavStart extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_owlcarousel_nav_start';


	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$this->strTemplate = 'be_wildcard';
			$this->Template = new \BackendTemplate($this->strTemplate);
			$this->Template->title = $this->headline;
		}

		parent::generate();

		$objConfig = OwlConfigModel::findByPk($this->owlConfig);

		if ($objConfig === null) return;

		OwlConfig::createConfigJs($objConfig);

		$objSlider = \ContentModel::findByPk($this->owlContentSlider);

		if($objSlider === null) return;

		$this->Template->class .= ' owl-carousel-nav ' . OwlConfig::getCssClassFromModel($objConfig) . ' owl-carousel';
		$this->Template->syncTo = OwlConfig::getCssClassForContent($this->owlContentSlider);


		return $this->Template->parse();
	}

	/**
	 * Generate the content element
	 */
	protected function compile(){}
}