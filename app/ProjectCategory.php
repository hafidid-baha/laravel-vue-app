<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'icon',
        'tag',
    ];

    // protected $table = 'project_category';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];
}