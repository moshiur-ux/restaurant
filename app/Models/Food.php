<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Food extends Model
{
    use HasFactory;
    protected $fillable =['name','description','price','category_id','image'];
    
    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id','category_id');

    }

}
