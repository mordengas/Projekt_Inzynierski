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

}
