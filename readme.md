# Cached Valuestore

[![Latest Stable Version](https://poser.pugx.org/timacdonald/cached-valuestore/v/stable)](https://packagist.org/packages/timacdonald/cached-valuestore) [![Total Downloads](https://poser.pugx.org/timacdonald/cached-valuestore/downloads)](https://packagist.org/packages/timacdonald/cached-valuestore) [![License](https://poser.pugx.org/timacdonald/cached-valuestore/license)](https://packagist.org/packages/timacdonald/cached-valuestore)

This is an extension of [`spatie/valuestore`](https://github.com/spatie/valuestore) that introduces a local cache in the class. Thanks to Spatie for providing such a great package ecosystem. This is an under appreciated awesome package IMO.

## Installation

You can install using [composer](https://getcomposer.org/) from [Packagist](https://packagist.org/packages/timacdonald/cached-valuestore)

```
$ composer require timacdonald/cached-valuestore
```

## Usage

Please refer to the [original package docs](https://github.com/spatie/valuestore) for general usage. The only new method is the ability to clear the cache - however this is done when persisting so you probably won't ever need it.

```php
$valuestore->clearCache();
```

## Thanksware

You are free to use this package, but I ask that you reach out to someone (not me) who has previously, or is currently, maintaining or contributing to an open source library you are using in your project and thank them for their work. Consider your entire tech stack: packages, frameworks, languages, databases, operating systems, frontend, backend, etc.

## Upgrade v1 > v2

- The cache is now an instance variable rather than a static variable.
- Any calls to `Valuestore::clearCache();` need to be replaced with `$valuestore->clearCache();`.