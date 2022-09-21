# Slick

> If you are on Contao 4, please use https://github.com/heimrichhannot/contao-slick-bundle or https://github.com/heimrichhannot/contao-tiny-slider-bundle.

> This bundle is NOT actively maintained anymore! 

A content slider/carousel for contao based on [kenwheelers slick carousel](http://kenwheeler.github.io/slick/).

**This extension does not include the default `slick-theme.css` to provide the most customizable slider for developers. If you require the default theme, include the `/system/modules/slick/assets/vendor/slick-carousel/slick/slick-theme.css` by your own.**  

## Features

- global carousel configurations
- supports newslists
- supports content elements
- responsive

## Dev notes

### Update slick

- bower install --save slick.js
- check assets/vendor/slick.js/slick.js for new options and add them to tl_slick_spread.js dca

