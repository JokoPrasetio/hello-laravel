<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function posts(){
        return $this->hasMany(post::class);
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sluggable(): array 
    {
        return[
            'slug' =>[
                'source' => 'name'
            ]
            ];
    }


}
