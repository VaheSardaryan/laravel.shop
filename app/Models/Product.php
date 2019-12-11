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


}
