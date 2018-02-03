<?php

namespace Confee\Domains\Conferences;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $table = 'editions';

    protected $fillable = [
        'conference_id', 'name', 'venue', 'start_date',
    ];

    public function conference()
    {
        return $this->belongsTo(Conference::class, 'conference_id');
    }
}
