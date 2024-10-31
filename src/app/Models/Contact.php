<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'category_id',
        'last_name',
        'first_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail'
    ];


   public function category()
   {
       return $this->belongsTo(Category::class);
   }

    public function scopeKeywordSearch($query, $name_or_email)
    {
        if (!empty($name_or_email)) {
            $query->where(function ($query) use ($name_or_email) {
                $query->where('last_name', 'like', '%' . $name_or_email . '%')
                      ->orWhere('email', 'like', '%' . $name_or_email . '%');
            });
        }
    }
    
    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
    }
    
    public function scopeDateSearch($query, $created_at)
    {
        if (!empty($created_at)) {
            $query->where('created_at', $created_at);
        }
    }
}