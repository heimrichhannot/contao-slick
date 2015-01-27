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


class ContentSlickNavStart extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_slick_nav_start';


	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$this->strTemplate = 'be_wildcard';
			$this->Template = new \BackendTemplate($this->strTemplate);
			$this->Template->title = $this->headline;
		}

		parent::generate();

		$objConfig = SlickConfigModel::findByPk($this->slickConfig);

		if ($objConfig === null) return;

		SlickConfig::createConfigJs($objConfig);

		$objSlider = \ContentModel::findByPk($this->slickContentSlider);

		if($objSlider === null) return;

		$this->Template->class .= ' slick-nav ' . SlickConfig::getCssClassFromModel($objConfig) . ' slick';
		$this->Template->syncTo = SlickConfig::getCssClassForContent($this->slickContentSlider);


		return $this->Template->parse();
	}

	/**
	 * Generate the content element
	 */
	protected function compile(){}
}