<?php

namespace HeimrichHannot\Slick;

class Hooks extends \Controller
{

	private static $strSpreadDca = 'tl_slick_spread';

	public function parseArticlesHook(&$objTemplate, $arrArticle, $objModule)
	{
		if (!$arrArticle['addGallery']) return;

		$objArchive = \NewsArchiveModel::findByPk($arrArticle['pid']);

		if ($objArchive === null) return;

		$objConfig = SlickConfigModel::findByPk($objArchive->slickConfig);

		if ($objConfig === null) return;

		// set size from module
		$arrArticle['slickSize'] = $objModule->imgSize;

		$objGallery = new Slick(Slick::createSettings($arrArticle, $objConfig));

		$objTemplate->gallery = $objGallery->parse();
	}


	/**
	 * Spread Fields to existing DataContainers
	 * @param string $strName
	 * @return boolean false if Datacontainer not supported
	 */
	public function loadDataContainerHook($strName)
	{
		if (!is_array($GLOBALS['TL_SLICK']['SUPPORTED']) || !in_array($strName, array_keys($GLOBALS['TL_SLICK']['SUPPORTED']))) return false;

		$this->loadDataContainer(static::$strSpreadDca);

		if (!is_array($GLOBALS['TL_DCA'][static::$strSpreadDca]['fields'])) return false;

		$dc = &$GLOBALS['TL_DCA'][$strName];

		foreach ($GLOBALS['TL_SLICK']['SUPPORTED'][$strName] as $strPalette => $replace) {

			$arrFields    = array();
			$arrFieldKeys = array();
			$arrSelectors = array();
			$arrSubFields = array();

			preg_match_all('#\[\[(?P<constant>.+)\]\]#', $replace, $matches);

			if (!isset($matches['constant'][0])) continue;

			$strConstant       = $matches['constant'][0];
			$strReplacePalette = @constant($matches['constant'][0]);

			$pos    = strpos($replace, '[[' . $strConstant . ']]');
			$search = str_replace('[[' . $strConstant . ']]', '', $replace);

			// prepend slick config palette
			if ($pos < 1) {
				$replace = $GLOBALS['TL_DCA'][static::$strSpreadDca]['palettes'][$strReplacePalette] . $search;
			} // append slick config palette
			else {
				$replace = $search . $GLOBALS['TL_DCA'][static::$strSpreadDca]['palettes'][$strReplacePalette];
			}

			$arrFields = static::getPaletteFields($strReplacePalette, $dc);

			$arrFieldKeys = array_keys($arrFields);

			// inject palettes
			// create palette if not existing
			if (!isset($dc['palettes'][$strPalette])) {
				$dc['palettes'][$strPalette] = $replace;
			} else {
				$dc['palettes'][$strPalette] = str_replace($search, $replace, $dc['palettes'][$strPalette]);
			}

			// inject subplattes & selectors
			$arrSelectors = array_intersect($GLOBALS['TL_DCA'][static::$strSpreadDca]['palettes']['__selector__'], $arrFieldKeys);

			if (!empty($arrSelectors)) {
				$dc['palettes']['__selector__'] = array_merge(is_array($dc['palettes']['__selector__']) ? $dc['palettes']['__selector__'] : array(), $arrSelectors);

				foreach ($arrSelectors as $key) {
					$arrFields = array_merge($arrFields, static::getPaletteFields($key, $dc, 'subpalettes'));

				}

				$dc['subpalettes'] = array_merge(is_array($dc['subpalettes']) ? $dc['subpalettes'] : array(), $GLOBALS['TL_DCA'][static::$strSpreadDca]['subpalettes']);
			}

			// inject fields
			$dc['fields'] = array_merge($arrFields, $dc['fields']);
		}

		\System::loadLanguageFile(static::$strSpreadDca);

		// add language to TL_LANG palette
		$GLOBALS['TL_LANG'][$strName] = array_merge($GLOBALS['TL_LANG'][$strName], $GLOBALS['TL_LANG'][static::$strSpreadDca]);
	}

	protected static function getPaletteFields($strPalette, $dc, $type = 'palettes')
	{
		$boxes = trimsplit(';', $GLOBALS['TL_DCA'][static::$strSpreadDca][$type][$strPalette]);

		$arrFields = array();

		if (!empty($boxes)) {
			foreach ($boxes as $k => $v) {
				$eCount    = 1;
				$boxes[$k] = trimsplit(',', $v);

				foreach ($boxes[$k] as $kk => $vv) {
					if (preg_match('/^\[.*\]$/', $vv)) {
						++$eCount;
						continue;
					}

					if (preg_match('/^\{.*\}$/', $vv)) {
						unset($boxes[$k][$kk]);
					} else {
						if (isset($GLOBALS['TL_DCA'][static::$strSpreadDca]['fields'][$vv])) {
							$arrField = $GLOBALS['TL_DCA'][static::$strSpreadDca]['fields'][$vv];
						} else if (isset($dc['fields'][$vv])) {
							$arrField = $dc['fields'][$vv];
						} else{
							continue;
						}

						$arrFields[$vv] = $arrField;

						// orderSRC support
						if (isset($arrField['eval']['orderField'])) {
							$arrFields[$arrField['eval']['orderField']] = $GLOBALS['TL_DCA'][static::$strSpreadDca]['fields'][$arrField['eval']['orderField']];
						}
					}
				}
			}

			// Unset a box if it does not contain any fields
			if (count($boxes[$k]) < $eCount) {
				unset($boxes[$k]);
			}
		}

		return $arrFields;
	}

}
