<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'prodId';

    protected $fillable = [
        'prodName', 'uom', 'price', 'tax', 'srv', 'other',
        'discId', 'cost', 'addCost', 'stock', 'prodImagePath',
        'isActive', 'subCategoryId', 'categoryId'
    ];

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subCategoryId');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
