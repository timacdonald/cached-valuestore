# Cached Valuestore

[![Latest Stable Version](https://poser.pugx.org/timacdonald/cached-valuestore/v/stable)](https://packagist.org/packages/timacdonald/cached-valuestore) [![Total Downloads](https://poser.pugx.org/timacdonald/cached-valuestore/downloads)](https://packagist.org/packages/timacdonald/cached-valuestore) [![License](https://poser.pugx.org/timacdonald/cached-valuestore/license)](https://packagist.org/packages/timacdonald/cached-valuestore)

This is an extension of [`spatie/valuestore`](https://github.com/spatie/valuestore) that introduces a local cache in the class. The original package reaches out the filesystem on every `get` call. This package caches the values locally.

The cache is a static class property - so the cache will be up-to-date across multiple instances in a code base.

Thanks to Spatie for providing such a great package ecosystem. This is an under appreciated awesome package IMO.

## Installation

You can install using [composer](https://getcomposer.org/) from [Packagist](https://packagist.org/packages/timacdonald/cached-valuestore)

```
$ composer require timacdonald/cached-valuestore
```

## Usage

Please refer to the [original package docs](https://github.com/spatie/valuestore) for general usage. The only new method is the ability to clear the cache - however this is done when persisting so you probably won't ever need it:

```php
CachedValuestore::clearCache();
```

## Thanksware

You are free to use this package, but I ask that you reach out to someone (not me) who has previously, or is currently, maintaining or contributing to an open source library you are using in your project and thank them for their work. Consider your entire tech stack: packages, frameworks, languages, databases, operating systems, frontend, backend, etc.