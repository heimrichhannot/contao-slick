# Change Log
All notable changes to this project will be documented in this file.

## [1.6.4] - 2018-09-13

### Fixed
- do not drop `tl_content` database fields

## [1.6.3] - 2018-09-11

### Fixed
- #27, Headline-Field is not displayed for content slick gallery

## [1.6.2] - 2018-09-11

### Fixed
- #25, `tl_slick_spread.php` needs to load Datacontainer `tl_content` to work with internal cache

## [1.6.1] - 2018-03-14

### Fixed
- set `rows` initial to `0` otherwise an additional `div` wrapper will be added, see https://github.com/kenwheeler/slick/issues/3110
- play and pause button localization

## [1.6.0] - 2018-02-28

### Added
- play and pause buttons

## [1.5.3] - 2018-02-23

### Fixed
- `Uncaught TypeError: Cannot read property 'add' of null` (https://github.com/kenwheeler/slick/issues/1953), check that `.slick-initialized` not set before init slick

## [1.5.2] - 2017-11-16

### Fixed
- restored fix for `(intermediate value)(...) is not a function` error

## [1.5.1] - 2017-11-14

### Fixed
- prevent contao from adding `<!-- TEMPLATE START -->` and `<!-- TEMPLATE END -->` to generated js files by disabling `debugMode` while parsing template

## [1.5.0] - 2017-11-13

### Changed
- slick.js updated from version `1.6.0` to `1.8.0`
- `slick_slide` default value changed from `div` to `''`
- `slick_mobileFirst` default value changed from `true` to `false`
- `slick_speed` default value changed from `3000` to `300` 
 

## [1.4.15] - 2017-11-13

### Fixed
- Database update: `tl_content` tried to drop `slickgalleryTpl` and `slickConfig`

## [1.4.14] - 2017-11-07

### Fixed
- Spread datacontainer hook for `tl_content` tried to drop `slickgalleryTpl` and `slickConfig` occasionally

## [1.4.13] - 2017-11-07

### Fixed

- breakpoint widths in be

### Changed
- increased required minimum multi_column_editor version to 1.2.10

## [1.4.12] - 2017-11-01

### Fixed

- `\StringUtil::specialchars()` not available in contao 3.x, replaced with old `specialchars` function (should be changed with contao 5.x)

## [1.4.11] - 2017-10-27

### Added
- option for enabled/disabling slick gallery in news reader: useSlickGallery

## [1.4.10] - 2017-09-12

### Fixed
- `asNavFor` when no nav is set 
- reduced unnecessary sql queries
- adjusted image meta data handling for contao 4

## [1.4.9] - 2017-08-28

### Changed
- renamed `news_full.html5` gallery template to `news_full_gallery.html5`

## [1.4.8] - 2017-08-22

### Fixed
- `tl_module.customTpl` options for modules `slick_newslist` and `slick_eventlist` 

## [1.4.7] - 2017-08-21

### Fixed
- minify js

## [1.4.6] - 2017-08-21

### Changed
- always minify js

## [1.4.5] - 2017-08-21

### Changed
- removed `slick_shuffleOrder` (not working and not possible with `asNavFor`) and added `slick_randomActive`

## [1.4.4] - 2017-08-15

### Fixed

- issue #20

## [1.4.3] - 2017-07-28

### Fixed

- issue #17 and #18

## [1.4.2] - 2017-07-27

### Fixed

- set default `galleryTpl` value to `slick_default`

## [1.4.1] - 2017-07-27

### Fixed

- load required `tl_content` datacontainer, within `tl_slick_spread`

## [1.4.0] - 2017-07-27

### Changed

- replaced multicolumneditor with `heimrichhannot/contao-multi_column_editor` and fixed responsive configuration handling for contao 4

## [1.3.11] - 2017-07-21

### Added
- add `slick_uid_*` class to each slider with a unique identifier, required by multiple galleries for multiple sliders on one page  

## [1.3.10] - 2017-06-07

### Fixed
- `asNavFor` handling
- PHP7 compatibility

## [1.3.9] - 2017-06-07

### Changed
- removed .idea folder

## [1.3.8] - 2017-06-07

### Fixed
- slickConfig default value

## [1.3.7] - 2017-06-07

### Fixed
- slick_asNavFor default value

## [1.3.6] - 2017-04-12

### Fixed
- php7 compatibility
