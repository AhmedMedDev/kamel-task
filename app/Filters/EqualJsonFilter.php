<?php

namespace App\Filters;

use Abbasudo\Purity\Filters\Filter;
use Closure;
use Illuminate\Database\Eloquent\Builder;

class EqualJsonFilter extends Filter
{
    /**
     * Operator string to detect in the query params.
     *
     * @var string
     */
    protected static string $operator = '$json_eq';


    /**
     * Apply filter logic to $query.
     *
     * @return Closure
     */
    public function apply(): Closure
    {
        return function (Builder $query) {
            foreach ($this->values as $filter) {
                $query->where($this->column, $filter);
            }
        };
    }
}
