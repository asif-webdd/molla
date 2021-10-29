<?php

namespace App\Models;

use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ["brand_id", "category_id", "create_by", "name", "slug", "model", "price", "offer_price", "offer_date_start", "offer_date_end", "thumbnail", "gallery", "quantity", "sku_code", "featured", "size", "color", "warranty", "warranty_duration", "warranty_conditions", "description", "video", "status"];

    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
