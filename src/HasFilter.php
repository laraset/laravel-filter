<?php

namespace Laraset\LaravelFilter;

use Illuminate\Database\Eloquent\Builder;

trait HasFilter
{
    /**
     * Apply filters.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Laraset\LaravelFilter\Filter  $filter
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter(Builder $query, Filter $filter)
    {
        return $filter->apply($query);
    }
}
