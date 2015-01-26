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


class ContentOwlCarouselContentStart extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_owlcarousel_content_start';


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

		$this->Template->class .= ' ' . OwlConfig::getCssClassFromModel($objConfig) . ' owl-carousel ' . OwlConfig::getCssClassForContent($this->id);
		$this->Template->syncid = OwlConfig::getCssClassForContent($this->id);

		return $this->Template->parse();
	}

	/**
	 * Generate the content element
	 */
	protected function compile(){}
}