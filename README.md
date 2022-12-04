# Filtering Eloquent Queries Based on HTTP Requests

[![Latest Version on Packagist](https://img.shields.io/packagist/v/laraset/laravel-filter.svg?style=flat)](https://packagist.org/packages/laraset/laravel-filter)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/laraset/laravel-filter.svg?style=flat)](https://packagist.org/packages/laraset/laravel-filter)

This package contains a filter class to make HTTP requests filterable using Eloquent queries.

## Installation

```bash
composer require laraset/laravel-filter
```

## Usage

To use it properly just add Filters folder inside App\Http namespace like this:

```php
<?php

namespace App\Http\Filters;

use Laraset\LaravelFilter\Filter;
use Illuminate\Database\Eloquent\Builder;

class TestFilter extends Filter
{
    /**
     * Apply filters.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Builder $builder)
    {
        parent::apply($builder);

        // Place for filters to be used without query parameters, like default sort.

        return $builder;
    }

    /**
     * Test filter.
     *
     * @param  string|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function test($value = null)
    {
        // To call this function ?test= parameter has to be in the query.

        return $this->builder;
    }
}
```

This filter class can then be used inside controller class to reduce the amount of code to be written for request handlers.

```php
public function index(Request $request, TestFilter $filter)
{
    $tests = Test::filter($filter)
        ->get();

    //
}
```

## Credits

- [Evgenij Myasnikov](https://github.com/emyasnikov)

I got the idea to filter HTTP requests by reading an [article](https://pineco.de/filtering-eloquent-queries-based-on-http-requests/) written by [D. Nagy Gergő](https://github.com/iamgergo) and used parts of the code here.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
