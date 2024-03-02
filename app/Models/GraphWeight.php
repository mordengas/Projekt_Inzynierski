<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GraphWeight extends Model
{
    protected $table = 'graph_weights';

    protected $fillable = [
        'start',
        'destination',
        'weight',
    ];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::where('start', 'like', '%'.$search.'%')
                ->orWhere('destination', 'like', '%'.$search.'%')
                ->orWhere('weight', 'like', '%'.$search.'%');
    }
}
