<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $primaryKey = 'categoryId';
    protected $fillable = ['categoryName'];

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class, 'categoryId');
    }
}
