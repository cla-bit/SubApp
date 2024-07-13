<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table='posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=[
        'website_id',
        'title',
        'description',
    ];

    /**
     * Get the website that owns the post
     */
    public function website()
    {
        return $this->belongsTo(Website::class,'website_id');
    }

}
