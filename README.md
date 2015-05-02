# Minifine

[![Build Status](https://travis-ci.org/PeeHaa/Minifine.svg)](https://travis-ci.org/PeeHaa/Minifine) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/PeeHaa/Minifine/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/PeeHaa/Minifine/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/PeeHaa/Minifine/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/PeeHaa/Minifine/?branch=master) [![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/PeeHaa/Minifine/master/LICENSE)

## Installation

Simply include this library into your projects using composer:

    "require": {
        "php": ">=5.5",
        "peehaa/minifine": "1.0.*"
    },

## Requirements

PHP 5.5+

## Usage

### Basic usage

Only a couple of lines are needed to use Minifine. First an instance needs to be created. After that you can start combining and minifying resources:

    <?php
    $minifier = (new \Minifine\Factory())->build('/path/to/resources', true);

    <head>
        <meta charset="UTF-8">
        <title>Page title</title>
        <?= $minifier->css(['/css/bootstrap.min.css', '/css/jquery.ui.min.css', '/css/theme.css', '/css/custom.css'], '/css/min.css'); ?>
    </head>

results in:

    <head>
        <meta charset="UTF-8">
        <title>Page title</title>
        <link rel="stylesheet" href="/css/min.css">
    </head>

And:

            <?= $minifier->js(['/js/jquery-1.11.2.min.js', '/js/bootstrap.min.js', '/js/custom.js'], '/js/min.js'); ?>
        </body>
    </html>

results in:

            <script src="/js/min.js"></script>
        </body>
    </html>

For more advanced usages like using different minifiers and/or chaining minifiers please consult [the documentation](https://minifine.pieterhordijk.com/documentation/advanced-usage.php).

## Documentation

The documentation (including the contribution guidelines) can be found on the [project's website](https://minifine.pieterhordijk.com).

## License

[MIT](http://spdx.org/licenses/MIT)
