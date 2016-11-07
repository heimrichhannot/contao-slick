<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package slick
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

/**
 * Fields // TODO: translate
 */

$GLOBALS['TL_LANG']['tl_slick_spread']['slickConfig'] = array('Slick-Karussell Konfiguration', 'Wählen Sie aus der Liste eine Slick-Karussell Konfiguration aus.');
$GLOBALS['TL_LANG']['tl_slick_spread']['addSlick'] = array('Slick-Karussell hinzufügen', 'Slick-Karussell Unterstützung aktivieren');
$GLOBALS['TL_LANG']['tl_slick_spread']['addGallery'] = array('Galerie hinzufügen', 'Eine Bildergalerie erzeugen.');
$GLOBALS['TL_LANG']['tl_slick_spread']['slickMultiSRC'] = array('Quelldateien', 'Bitte wählen Sie eine oder mehr Dateien oder Ordner aus der Dateiübersicht. Wenn Sie einen Ordner auswählen, werden die darin enthaltenen Dateien automatisch eingefügt.');
$GLOBALS['TL_LANG']['tl_slick_spread']['slickOrderSRC'] = array('Sortierreihenfolge', 'Die Sortierreihenfolge der Elemente.');
$GLOBALS['TL_LANG']['tl_slick_spread']['slickSortBy'] = array('Sortieren nach', 'Bitte wählen Sie die Sortierreihenfolge aus.');
$GLOBALS['TL_LANG']['tl_slick_spread']['slickUseHomeDir'] = array('Benutzerverzeichnis verwenden', 'Das Benutzerverzeichnis als Dateiquelle verwenden, wenn sich ein Benutzer angemeldet hat.');
$GLOBALS['TL_LANG']['tl_slick_spread']['slickSize'] = array('Bildgröße', 'Hier können Sie die Abmessungen des Bildes und den Skalierungsmodus festlegen.');
$GLOBALS['TL_LANG']['tl_slick_spread']['slickFullsize'] = array('Großansicht/Neues Fenster', 'Großansicht des Bildes in einer Lightbox bzw. den Link in einem neuem Browserfenster öffnen.');
$GLOBALS['TL_LANG']['tl_slick_spread']['slickNumberOfItems'] = array('Gesamtzahl der Bilder', 'Hier können Sie die Gesamtzahl der Bilder begrenzen. Geben Sie 0 ein, um alle anzuzeigen.');
$GLOBALS['TL_LANG']['tl_slick_spread']['slickCustomTpl'] = array('Individuelles Template', 'Hier können Sie das Standard-Template überschreiben.');

$GLOBALS['TL_LANG']['tl_slick_spread']['slick_accessibility'] = array('accessibility', 'Aktiviert Tab- und Pfeiltasten-Navigation. Standard: true');

$GLOBALS['TL_LANG']['tl_slick_spread']['slick_adaptiveHeight'] = array('adaptiveHeight', 'Aktiviert adaptive Höhe der Slides. Standard: false');

$GLOBALS['TL_LANG']['tl_slick_spread']['slick_appendArrows'] = array('appendArrows', 'Stelle ändern, an der die Navigations-Pfeile angehangt werden (Selektor, htmlString, Array, Element, jQuery-Objekt). Standard: $(element)');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_appendDots'] = array('appendDots', 'Stelle ändern, an der die Navigations-Punkte angehangt werden (Selektor, htmlString, Array, Element, jQuery-Objekt). Standard: $(element)');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_arrows'] = array('arrows', 'Vor-/Zurück-Pfeile aktivieren. Standard: true');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_asNavFor'] = array('asNavFor', 'Benutze das Slick-Karussel als Navigation für ein anderes Slick-Karussel. Standard: null');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_prevArrow'] = array('prevArrow', 'HTML des Zurück-Pfeils');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_nextArrow'] = array('nextArrow', 'HTML des Nächster-Pfeils');

$GLOBALS['TL_LANG']['tl_slick_spread']['slick_autoplay'] = array('autoplay', 'Automatisches Abspielen aktivieren. Standard: false');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_autoplaySpeed'] = array('autoplaySpeed', 'Geschwindigkeit des Übergangseffekt für automatisches Abspielen. Standard: 3000');

$GLOBALS['TL_LANG']['tl_slick_spread']['slick_centerMode'] = array('centerMode', 'Enables centered view with partial prev/next slides. Use with odd numbered slidesToShow counts. Standard: false');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_centerPadding'] = array('centerPadding', 'Seitlicher Abstand im zentrierten Modus. (px oder %) Standard: 50px');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_cssEase'] = array('cssEase', 'CSS3-Easing. Standard: ease');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_customPaging'] = array('customPaging', 'Benutzerdefiniertes Paginierungs-Templates. Fügen Sie hier einen global verfügbaren JS-Funktion-Callback hinzu, wie Test.customPaging. Standard: n/a');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_dots'] = array('dots', 'Punkte für aktives Slide anzeigen. Standard: false');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_dotsClass'] = array('dotsClass', 'CSS-Klasse des Slide-Indikator-Containers. Standard: slick-dots');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_draggable'] = array('draggable', 'Dragging auf Desktop-Rechners aktivieren. Standard: true');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_easing'] = array('easing', 'animate() Fallback-Easing. Standard: linear');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_edgeFriction'] = array('edgeFriction', 'Resistance when swiping edges of non-infinite carousels. Standard: 0.15');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_fade'] = array('fade', 'Verblassen aktivieren. Standard: false');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_focusOnSelect'] = array('focusOnSelect', 'Slide fokussieren. Standard: false');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_infinite'] = array('infinite', 'Slider immer wiederholen. Standard: true');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_initialSlide'] = array('initialSlide', 'Slide der als ersts angezeigt werden soll. Standard: 0');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_lazyLoad'] = array('lazyLoad', 'Mögliche Werte für Lazy-Load-Techniken: \'ondemand\' oder \'progressive\'. Standard: ondemand');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_mobileFirst'] = array('mobileFirst', 'Mobile-First-Berechnung für Responsive-Einstellungen verwenden. Standard: false');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_pauseOnHover'] = array('pauseOnHover', 'Automatische Wiedergabe bei hover pausieren. Standard: true');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_pauseOnFocus'] = array('pauseOnFocus', 'Automatische Wiedergabe bei fokussieren des Sliders pausieren. Standard: true');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_pauseOnDotsHover'] = array('pauseOnDotsHover', 'Automatische Wiedergabe wenn ein Indikator gehovert wird. Standard: false');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_respondTo'] = array('respondTo', 'Element, auf dessen Breite die Responsiveness reagieren soll. kann \'window\', \'slider\' oder \'min\' (das kleinere von beiden) sein. Standard: window');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_responsive'] = array('responsive', 'Enables settings sets at given screen width. Add additional breakpoints and settings. Standard: null');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_rows'] = array('rows', 'Setting this to more than 1 initializes grid mode. Use slidesPerRow to set how many slides should be in each row. Standard: 1');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_slide'] = array('slide', 'Slide-Element-Query. Standard: empty');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_slidesPerRow'] = array('slidesPerRow', 'With grid mode intialized via the rows option, this sets how many slides are in each grid row. Standard: 1');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_slidesToShow'] = array('slidesToShow', 'Anzahl sichtbarer Slides. Standard: 1');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_slidesToScroll'] = array('slidesToScroll', 'Anzahl an Slides, die gescrollt werden sollen. Standard: 1');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_speed'] = array('speed', 'Übergangs-Geschwindigkeit. Standard: 3000');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_swipe'] = array('swipe', 'Touch-Swipe aktivieren. Standard: true');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_swipeToSlide'] = array('swipeToSlide', 'Swipe to slide irrespective of slidesToScroll. Standard: false');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_touchMove'] = array('touchMove', 'Slide-Bewegung per Touch aktivieren. Standard: true');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_touchThreshold'] = array('touchThreshold', 'To advance slides, the user must swipe a length of (1/touchThreshold) * the width of the slider. Standard: 5');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_useCSS'] = array('useCSS', 'CSS-Transitions aktivieren/deaktivieren. Standard: true');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_useTransform'] = array('useTransform', 'CSS-Transforms aktivieren/deaktivieren. Standard: true');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_variableWidth'] = array('variableWidth', 'Automatische Slide-Breiten-Berechnung deaktvieren. Standard: false');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_vertical'] = array('vertical', 'Slides vertikal wechseln. Standard: false');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_verticalSwiping'] = array('verticalSwiping', 'Swipe-Richtung zu vertikal ändern. Standard: false');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_rtl'] = array('rtl', 'Slides von rechts-nach-links (RTL) wechseln. Standard: false');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_waitForAnimate'] = array('waitForAnimate', 'Ignores requests to advance the slide while animating. Standard: true');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_zIndex'] = array('zIndex', 'zIndex-Wert der Slides anpassen, nützlich für IE9 und älter. Standard: 1000');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_unslick'] = array('unslick', 'Slick deaktivieren, nützlich mit Responsive-Einstellungen. Standard: false');
$GLOBALS['TL_LANG']['tl_slick_spread']['initCallback'] = array('init callback', 'Geben sie eine global erreichbare Javascipt-Funktion an wie z.B. MySlick.initCallback um Zugriff auf den slick "init" callback zu erhalten, welcher vor der Inizialisierung des Slick Carousel aufgerufen werden muss. Standard: n/a');
$GLOBALS['TL_LANG']['tl_slick_spread']['afterInitCallback'] = array('after init callback', 'Geben sie eine global erreichbare Javascipt-Funktion an wie z.B. MySlick.afterInitCallback die nach der Inizialisierung des Slick Carousel aufgerufen werden soll. Standard: n/a');
$GLOBALS['TL_LANG']['tl_slick_spread']['cssClass'] = array('CSS-Klasse', 'Hier können Sie CSS-Klassen, durch Leerzeichen getrennt hinterlegen, die dem Slick-Karussell Elternelement hinzugefügt werden.');
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_shuffleOrder'] = array('Zufällige Reihenfolge aktivieren.', 'Elemente des Sliders werden in zufälliger Reihenfolge dargestellt.');
/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_legend'] = 'Slick Karussell Einstellungen';
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_gallery'] = 'Galerie-Einstellungen';
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_config'] = 'Slick Karussell Einstellungen';

/**
 * Popup
 */
$GLOBALS['TL_LANG']['tl_carousel_spread']['editSlickConfig'][0] = 'Slick Konfiguration bearbeiten';
$GLOBALS['TL_LANG']['tl_carousel_spread']['editSlickConfig'][1] = 'Slick Konfiguration ID %s bearbeiten';
