<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Abbasudo\Purity\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;
    use Filterable;
    use Sortable;

    protected static function boot()
    {
        parent::boot();

        static::observe(\App\Observers\MediaObserver::class);

        static::addGlobalScope('include', function ($query) {
            if (request()->has('include')) {
                
                $includes = request()->query('include');

                array_map(function ($include) use ($query) {

                    $relatedInclude = (strpos($include, '.') !== false) ? explode('.', $include)[0] : $include;

                    if (method_exists($query->getModel(), $relatedInclude)) $query->with($include);

                }, $includes);
            }
        });
    }
}