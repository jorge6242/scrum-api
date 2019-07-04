<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backlog extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'estimate_days', 
        'type', 
        'assoc_backlog', 
        'status', 
        'user_id', 
        'project_id',
        'sprint_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sprint()
    {
        return $this->belongsTo('App\Sprint', 'sprint_id', 'id');
    }
}
