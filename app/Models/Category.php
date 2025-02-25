<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    private String $name;
    private String $descrpition;

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
