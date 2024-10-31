<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //seeder
    use HasFactory;

    protected $table = 'subcategory';

    protected $primaryKey = 'subCategoryId';
    protected $fillable = ['subCategoryName', 'subCategoryImagePath', 'categoryId'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
