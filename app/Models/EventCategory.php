<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventCategory extends Model
{
    protected $table = 'event_categories';

    protected $fillable = [
        'title',
        'subtitle',
        'params',
        'event_judge_id',
        'event_item_id',
    ];

    protected $casts = [
        'params' => 'collection',
    ];

    public function child():HasMany
    {
        return $this->hasMany(EventItem::class, 'event_category_id' );
    }
    public function judge():HasMany
    {
        return $this->hasMany(EventJudge::class, 'event_category_id' );
    }




}
