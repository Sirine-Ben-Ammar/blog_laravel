<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['user_id','title','content','photo','slug'];
    public function user()
    {
        return $this->belongsTo('App\models\User', 'user_id');
    }
    public function getFeaturedAttribute($photo)
    {
        return asset($photo);
    }

    public function tags()
    {
        return $this->belongsToMany('App\models\Tag');
    }
}
