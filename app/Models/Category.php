<?php

namespace App\Models;

use App\Models\Food;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','category_id','id'];
    
    public function Food()
    {
        return $this->hasOne(Food::class,'category_id' ,'id');


    }
}
