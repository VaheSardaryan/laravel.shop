<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['user_id', 'name', 'description', 'price'];

    public function isProductOf(User $user)  {
        return $this->user_id = $user->id;
    }
    public function comments(){
        return $this->belongsToMany(Comment::class, 'product_comments', 'product_id', 'comment_id');
    }
    public function owner(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getThumbnailAttribute()
    {
        return '/img/products/default-product.png';
    }


}
