# Cached Valuestore

This is an extension of [`spatie/valuestore`](https://github.com/spatie/valuestore) that introduces a local cache in the class. Thanks to Spatie for providing such a great package ecosystem. This is an under appreciated awesome package IMO.

---
*This is a fork of [Cached Valuestore](https://github.com/timacdonald/cached-valuestore) by [Tim MacDonald](https://github.com/timacdonald) until he finds time to update his. If he can find it between two awesomes features/improvement he brings to [Laravel](https://laravel.com/).*

**A very big thank you to him for all the work he does!**

In order to facilitate the use of this fork we allowed ourselves to put our own vendor rather than having to indicate the location of the repository in the compser.json file. But we left the original namespace.
---

## Installation

You can install using [composer](https://getcomposer.org/) from [Packagist](https://packagist.org/packages/axn/cached-valuestore)

```
$ composer require axn/cached-valuestore
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