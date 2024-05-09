<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_cat_id', 'img'];


    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(ParentCategory::class, 'parent_cat_id', 'id');
    }

    public function uploadImg($img)
    {
        $file = $img;
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('categories/', $filename);
        $image = $filename;

        return $image;
    }
}
