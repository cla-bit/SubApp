<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name', 'url'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    /**
     * Subscribers to a particular website.
     */

     public function subscribers()
    {
        return $this->belongsToMany(User::class, 'subscriptions');
    }
}
