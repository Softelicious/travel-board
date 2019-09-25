<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use \Spatie\Tags\HasTags;

    public function getDataAttribute()
    {
        return explode(',', $this->data);
    }
    protected $fillable = [
        'name', 'description', 'image', 'likes'
    ];
    protected $table = 'tickets';
}
