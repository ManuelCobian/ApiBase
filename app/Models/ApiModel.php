<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\FilterScope;
use App\Models\Scopes\IncludeScope;
use App\Models\Scopes\SelectScope;
use App\Models\Scopes\SortScope;

class ApiModel extends Model
{
    protected static function booted(): void
    {
        static::addGlobalScope(new FilterScope);
        static::addGlobalScope(new SelectScope);
        static::addGlobalScope(new SortScope);
        static::addGlobalScope(new IncludeScope);
    }

     public function scopeGetOrPaginate($query)
    {
        if (request('per_page')) {
            return $query->paginate(request('per_page'));
        }

        return $query->get();
    }
}
