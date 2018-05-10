# Cached Valuestore

[![Latest Stable Version](https://poser.pugx.org/timacdonald/cached-valuestore/v/stable)](https://packagist.org/packages/timacdonald/cached-valuestore) [![Total Downloads](https://poser.pugx.org/timacdonald/cached-valuestore/downloads)](https://packagist.org/packages/timacdonald/cached-valuestore) [![License](https://poser.pugx.org/timacdonald/cached-valuestore/license)](https://packagist.org/packages/timacdonald/cached-valuestore)

This is an extension of [`spatie/valuestore`](https://github.com/spatie/valuestore) that introduces a local cache in the class. The original package reaches out the filesystem on every `get` call. This package caches the values locally.

The cache is a static class property - so the cache will be up-to-date across mutliple instances in a codebase.

Thanks to Spatie for provding such a great package ecosystem. This is an under appreciated awesome package IMO.

## Installation

You can install using [composer](https://getcomposer.org/) from [Packagist](https://packagist.org/packages/timacdonald/cached-valuestore)

```
composer require timacdonald/cached-valuestore
```

## Versioning

This package uses *Semantic Versioning*. You can find out more about what this is and why it matters by reading [the spec](http://semver.org) or for something more readable, check out [this post](https://laravel-news.com/building-apps-composer).

## Usage

Please refer to the [original package docs](https://github.com/spatie/valuestore) for general usage. The only new method is the ability to clear the cache - however this is done when persisting so you probably won't ever need it:

```php
CachedValuestore::clearCache();
```

## Contributing

Please feel free to suggest new ideas or send through pull requests to make this better. If you'd like to discuss the project, feel free to reach out on [Twitter](https://twitter.com/timacdonald87).

## License

This package is under the MIT License. See [LICENSE](https://github.com/timacdonald/cached-valuestore/blob/master/license) file for details.
