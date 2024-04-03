<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventJudge extends Model
{

protected $table = 'event_judges';

protected $fillable = [
    'event_category_id',
    'event_item_id',
    'params',
];
    protected $casts = [
        'params' => 'collection',
    ];

}
