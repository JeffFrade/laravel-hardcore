<?php

namespace Confee\Domains\Conferences;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $table = 'conferences';

    protected $fillable = [
        'name', 'responsible_id',
    ];

    public function editions()
    {
        return $this->hasMany(Edition::class, 'conference_id');
    }
}
