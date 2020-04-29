# imagepreparation

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

Image Preparation will create a full, small and a thumbnail version of the image submited as a post to the method resizeImage of the class imagepreparation. It will save the images to the Laravel's public directory and to AWS S3 specified in the configuration. Also it will save the details of the images to a new table images in the database.


## Installation

Via Composer

``` bash

$ composer.phar require intervention/image

$ composer require victorycto/imagepreparation
```

## Usage

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/victorycto/imagepreparation.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/victorycto/imagepreparation.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/victorycto/imagepreparation/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/victorycto/imagepreparation
[link-downloads]: https://packagist.org/packages/victorycto/imagepreparation
[link-travis]: https://travis-ci.org/victorycto/imagepreparation
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/victorycto
[link-contributors]: ../../contributors
