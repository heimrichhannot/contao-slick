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

$GLOBALS['TL_LANG']['tl_slick_spread']['slickConfig']        = ['Slick-Karussell Konfiguration', 'Wählen Sie aus der Liste eine Slick-Karussell Konfiguration aus.'];
$GLOBALS['TL_LANG']['tl_slick_spread']['addSlick']           = ['Slick-Karussell hinzufügen', 'Slick-Karussell Unterstützung aktivieren'];
$GLOBALS['TL_LANG']['tl_slick_spread']['addGallery']         = ['Galerie hinzufügen', 'Eine Bildergalerie erzeugen.'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slickMultiSRC']      = ['Quelldateien', 'Bitte wählen Sie eine oder mehr Dateien oder Ordner aus der Dateiübersicht. Wenn Sie einen Ordner auswählen, werden die darin enthaltenen Dateien automatisch eingefügt.'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slickOrderSRC']      = ['Sortierreihenfolge', 'Die Sortierreihenfolge der Elemente.'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slickSortBy']        = ['Sortieren nach', 'Bitte wählen Sie die Sortierreihenfolge aus.'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slickUseHomeDir']    = ['Benutzerverzeichnis verwenden', 'Das Benutzerverzeichnis als Dateiquelle verwenden, wenn sich ein Benutzer angemeldet hat.'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slickSize']          = ['Bildgröße', 'Hier können Sie die Abmessungen des Bildes und den Skalierungsmodus festlegen.'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slickFullsize']      = ['Großansicht/Neues Fenster', 'Großansicht des Bildes in einer Lightbox bzw. den Link in einem neuem Browserfenster öffnen.'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slickNumberOfItems'] = ['Gesamtzahl der Bilder', 'Hier können Sie die Gesamtzahl der Bilder begrenzen. Geben Sie 0 ein, um alle anzuzeigen.'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slickCustomTpl']     = ['Individuelles Template', 'Hier können Sie das Standard-Template überschreiben.'];

$GLOBALS['TL_LANG']['tl_slick_spread']['slick_accessibility'] = ['accessibility', 'Aktiviert Tab- und Pfeiltasten-Navigation. Standard: true'];

$GLOBALS['TL_LANG']['tl_slick_spread']['slick_adaptiveHeight'] = ['adaptiveHeight', 'Aktiviert adaptive Höhe der Slides. Standard: false'];

$GLOBALS['TL_LANG']['tl_slick_spread']['slick_appendArrows'] = ['appendArrows', 'Stelle ändern, an der die Navigations-Pfeile angehangt werden (Selektor, htmlString, Array, Element, jQuery-Objekt). Standard: $(element)'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_appendDots']   = ['appendDots', 'Stelle ändern, an der die Navigations-Punkte angehangt werden (Selektor, htmlString, Array, Element, jQuery-Objekt). Standard: $(element)'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_arrows']       = ['arrows', 'Vor-/Zurück-Pfeile aktivieren. Standard: true'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_asNavFor']     = ['asNavFor', 'Benutze das Slick-Karussel als Navigation für ein anderes Slick-Karussel. Standard: null'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_prevArrow']    = ['prevArrow', 'HTML des Zurück-Pfeils'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_nextArrow']    = ['nextArrow', 'HTML des Nächster-Pfeils'];

$GLOBALS['TL_LANG']['tl_slick_spread']['slick_autoplay']      = ['autoplay', 'Automatisches Abspielen aktivieren. Standard: false'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_autoplaySpeed'] = ['autoplaySpeed', 'Geschwindigkeit des Übergangseffekt für automatisches Abspielen. Standard: 3000'];

$GLOBALS['TL_LANG']['tl_slick_spread']['slick_pausePlay']   = ['pause/play hinzufügen', 'Füge Pause und Play Schaltflächen hinzu.'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_pauseButton'] = ['pause button', 'HTML der Pause Schaltfläche'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_playButton']  = ['play button', 'HTML der Play Schaltfläche'];


$GLOBALS['TL_LANG']['tl_slick_spread']['slick_centerMode']       = ['centerMode', 'Enables centered view with partial prev/next slides. Use with odd numbered slidesToShow counts. Standard: false'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_centerPadding']    = ['centerPadding', 'Seitlicher Abstand im zentrierten Modus. (px oder %) Standard: 50px'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_cssEase']          = ['cssEase', 'CSS3-Easing. Standard: ease'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_customPaging']     = ['customPaging', 'Benutzerdefiniertes Paginierungs-Templates. Fügen Sie hier einen global verfügbaren JS-Funktion-Callback hinzu, wie Test.customPaging. Standard: n/a'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_dots']             = ['dots', 'Punkte für aktives Slide anzeigen. Standard: false'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_dotsClass']        = ['dotsClass', 'CSS-Klasse des Slide-Indikator-Containers. Standard: slick-dots'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_draggable']        = ['draggable', 'Dragging auf Desktop-Rechners aktivieren. Standard: true'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_easing']           = ['easing', 'animate() Fallback-Easing. Standard: linear'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_edgeFriction']     = ['edgeFriction', 'Resistance when swiping edges of non-infinite carousels. Standard: 0.15'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_fade']             = ['fade', 'Verblassen aktivieren. Standard: false'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_focusOnSelect']    = ['focusOnSelect', 'Slide fokussieren. Standard: false'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_infinite']         = ['infinite', 'Slider immer wiederholen. Standard: true'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_initialSlide']     = ['initialSlide', 'Slide der als ersts angezeigt werden soll. Standard: 0'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_lazyLoad']         = ['lazyLoad', 'Mögliche Werte für Lazy-Load-Techniken: \'ondemand\' oder \'progressive\'. Standard: ondemand'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_mobileFirst']      = ['mobileFirst', 'Mobile-First-Berechnung für Responsive-Einstellungen verwenden. Standard: false'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_pauseOnHover']     = ['pauseOnHover', 'Automatische Wiedergabe bei hover pausieren. Standard: true'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_pauseOnFocus']     = ['pauseOnFocus', 'Automatische Wiedergabe bei fokussieren des Sliders pausieren. Standard: true'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_pauseOnDotsHover'] = ['pauseOnDotsHover', 'Automatische Wiedergabe wenn ein Indikator gehovert wird. Standard: false'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_respondTo']        = ['respondTo', 'Element, auf dessen Breite die Responsiveness reagieren soll. kann \'window\', \'slider\' oder \'min\' (das kleinere von beiden) sein. Standard: window'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_responsive']       = ['responsive', 'Enables settings sets at given screen width. Add additional breakpoints and settings. Standard: null'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_rows']             = ['rows', 'Setting this to more than 1 initializes grid mode. Use slidesPerRow to set how many slides should be in each row. Standard: 1'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_slide']            = ['slide', 'Slide-Element-Query. Standard: empty'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_slidesPerRow']     = ['slidesPerRow', 'With grid mode intialized via the rows option, this sets how many slides are in each grid row. Standard: 1'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_slidesToShow']     = ['slidesToShow', 'Anzahl sichtbarer Slides. Standard: 1'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_slidesToScroll']   = ['slidesToScroll', 'Anzahl an Slides, die gescrollt werden sollen. Standard: 1'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_speed']            = ['speed', 'Übergangs-Geschwindigkeit. Standard: 3000'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_swipe']            = ['swipe', 'Touch-Swipe aktivieren. Standard: true'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_swipeToSlide']     = ['swipeToSlide', 'Swipe to slide irrespective of slidesToScroll. Standard: false'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_touchMove']        = ['touchMove', 'Slide-Bewegung per Touch aktivieren. Standard: true'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_touchThreshold']   = ['touchThreshold', 'To advance slides, the user must swipe a length of (1/touchThreshold) * the width of the slider. Standard: 5'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_useCSS']           = ['useCSS', 'CSS-Transitions aktivieren/deaktivieren. Standard: true'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_useTransform']     = ['useTransform', 'CSS-Transforms aktivieren/deaktivieren. Standard: true'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_variableWidth']    = ['variableWidth', 'Automatische Slide-Breiten-Berechnung deaktvieren. Standard: false'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_vertical']         = ['vertical', 'Slides vertikal wechseln. Standard: false'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_verticalSwiping']  = ['verticalSwiping', 'Swipe-Richtung zu vertikal ändern. Standard: false'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_rtl']              = ['rtl', 'Slides von rechts-nach-links (RTL) wechseln. Standard: false'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_waitForAnimate']   = ['waitForAnimate', 'Ignores requests to advance the slide while animating. Standard: true'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_zIndex']           = ['zIndex', 'zIndex-Wert der Slides anpassen, nützlich für IE9 und älter. Standard: 1000'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_unslick']          = ['unslick', 'Slick deaktivieren, nützlich mit Responsive-Einstellungen. Standard: false'];
$GLOBALS['TL_LANG']['tl_slick_spread']['initCallback']           = ['init callback', 'Geben sie eine global erreichbare Javascipt-Funktion an wie z.B. MySlick.initCallback um Zugriff auf den slick "init" callback zu erhalten, welcher vor der Inizialisierung des Slick Carousel aufgerufen werden muss. Standard: n/a'];
$GLOBALS['TL_LANG']['tl_slick_spread']['afterInitCallback']      = ['after init callback', 'Geben sie eine global erreichbare Javascipt-Funktion an wie z.B. MySlick.afterInitCallback die nach der Inizialisierung des Slick Carousel aufgerufen werden soll. Standard: n/a'];
$GLOBALS['TL_LANG']['tl_slick_spread']['cssClass']               = ['CSS-Klasse', 'Hier können Sie CSS-Klassen, durch Leerzeichen getrennt hinterlegen, die dem Slick-Karussell Elternelement hinzugefügt werden.'];
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_randomActive']     = ['Zufälliges aktives Element', 'Das aktive Element zufällig wählen.'];

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_legend']  = 'Slick Karussell Einstellungen';
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_gallery'] = 'Galerie-Einstellungen';
$GLOBALS['TL_LANG']['tl_slick_spread']['slick_config']  = 'Slick Karussell Einstellungen';

/**
 * Popup
 */
$GLOBALS['TL_LANG']['tl_carousel_spread']['editSlickConfig'][0] = 'Slick Konfiguration bearbeiten';
$GLOBALS['TL_LANG']['tl_carousel_spread']['editSlickConfig'][1] = 'Slick Konfiguration ID %s bearbeiten';
