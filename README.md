<p align="center">
    <img src="https://img.icons8.com/nolan/2x/view-details.png">
</p>

# Content Field
> This component is a part of the [**Olympus Zeus Core**][zeus-url] **WordPress** framework.

[![Olympus Component][olympus-image]][olympus-url]
[![CodeFactor Grade][codefactor-image]][codefactor-url]
[![Packagist Version][packagist-image]][packagist-url]

## Installation

Using `composer` in your PHP project:

```sh
composer require getolympus/olympus-content-field
```

## Field initialization

Use the following lines to add a `content field` in your **WordPress** admin pages or custom post type meta fields:  
_Note that the `$identifier` (first `::build()` parameter) is set to `false` useless because no value is stored in database._

```php
return \GetOlympus\Field\Content::build(false, [
    'title'   => 'The Dark Knight',
    'content' => '',
    'debug'   => false,
    'file'    => 'im_the_batman.php',
    'vars'    => [
        'question' => 'Who\'s the Batman?',
        'answers'  => [
            'the-joker'    => 'The Joker',
            'harley-quinn' => 'Harley Quinn',
            'bruce-wayne'  => 'Bruce Wayne, don\'t tell anybody!',
            'gotham-city'  => 'Gotham City',
        ],
    ],
]);
```

## Variables definitions

| Variable      | Type    | Default value if not set | Accepted values |
| ------------- | ------- | ------------------------ | --------------- |
| `title`       | String  | `'File contents'` | *empty* |
| `content`     | String  | *empty* | *empty* |
| `debug`       | Bookean | *empty* | *empty* |
| `file`        | String  | `false` | `true` or `false` |
| `vars`        | Array   | *empty* | *empty* |

Notes:
* Set `content` to display HTML tags. It can be used as a fallback if file doesn't exist
* Set `debug` to `true` to enable the debug mode in case file inclusion fail
* Set `file` to define the PHP file path to include as `include_once` PHP function

## Vars usage

In the included file (`im_the_batman.php` in this example), you can use the `$v` variable as an array:

```php
// Display question
echo '<h2>'.stripslashes($v['question']).'</h2>';
echo '<ul>';

// Display answers choices with radio button
foreach ($v['answers'] as $k => $answer) {
    echo '<li class="'.$k.' is-the-batman">'.stripslashes($answer).'</li>';
}

echo '</ul>';
```

## Content display priority

The component will display, by priority:

1. included `file` path
2. everything in `content`

Note: do not forget to set `debug` to `true` to display an error in the case the `file` does not exist or is not readable.

## Release History

* 0.0.9
- [x] FIX: remove twig dependency from composer

* 0.0.8
- [x] FIX: remove zeus-core dependency from composer

* 0.0.7
- [x] ADD: add new version compatible with Zeus-Core latest version

## Authors and Copyright

Achraf Chouk  
[![@crewstyle][twitter-image]][twitter-url]

Please, read [LICENSE][license-blob] for more information.  
[![MIT][license-image]][license-url]

<https://github.com/crewstyle>  
<https://fr.linkedin.com/in/achrafchouk>

## Contributing

1. Fork it (<https://github.com/GetOlympus/olympus-content-field/fork>)
2. Create your feature branch (`git checkout -b feature/fooBar`)
3. Commit your changes (`git commit -am 'Add some fooBar'`)
4. Push to the branch (`git push origin feature/fooBar`)
5. Create a new Pull Request

---

**Built with ♥ by [Achraf Chouk](http://github.com/crewstyle "Achraf Chouk") ~ (c) since a long time.**

<!-- links & imgs dfn's -->
[olympus-image]: https://img.shields.io/badge/for-Olympus-44cc11.svg?style=flat-square
[olympus-url]: https://github.com/GetOlympus
[zeus-url]: https://github.com/GetOlympus/Zeus-Core
[codefactor-image]: https://www.codefactor.io/repository/github/GetOlympus/olympus-content-field/badge?style=flat-square
[codefactor-url]: https://www.codefactor.io/repository/github/getolympus/olympus-content-field
[license-blob]: https://github.com/GetOlympus/olympus-content-field/blob/master/LICENSE
[license-image]: https://img.shields.io/badge/license-MIT_License-blue.svg?style=flat-square
[license-url]: http://opensource.org/licenses/MIT
[packagist-image]: https://img.shields.io/packagist/v/getolympus/olympus-content-field.svg?style=flat-square
[packagist-url]: https://packagist.org/packages/getolympus/olympus-content-field
[twitter-image]: https://img.shields.io/badge/crewstyle-blue.svg?style=social&logo=twitter
[twitter-url]: http://twitter.com/crewstyle