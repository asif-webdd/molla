<?php

namespace App\Models\Admin;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $with = ['sub_cats'];

    protected $fillable = ['root', 'name', 'slug', 'icon', 'banner', 'create_by', 'status'];


    public function sub_cats(){
        return $this->hasMany(self::class, 'root');
    }


    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
