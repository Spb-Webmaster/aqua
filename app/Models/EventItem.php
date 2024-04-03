<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventItem extends Model
{
    protected $table = 'event_items';

    protected $fillable = [
       'title',
        'subtitle',
        'number',
        'flag',
        'name',
        'country',
        'category',
        'score',
        'params_sport',
        'params_score',
        'params_judge',
        'event_category_id',
        'event_judge_id',
    ];
    protected $casts = [
        'params_sport' => 'collection',
        'params_score' => 'collection',
        'params_judge' => 'collection',
    ];
    public function parent():BelongsTo
    {
        return $this->belongsTo(EventCategory::class,  'id');
    }

}
