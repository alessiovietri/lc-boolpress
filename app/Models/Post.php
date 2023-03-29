<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'img',
        'category_id'
    ];

    protected $hidden = [
        'img'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'full_img_path',
        'formatted_created_at'
    ];

    public function getFullImgPathAttribute()
    {
        $fullPath = null;

        if ($this->img) {
            $fullPath = asset('storage/'.$this->img);
        }

        return $fullPath;
    }

    public function getFormattedCreatedAtAttribute()
    {
        return date('d/m/Y \a\l\l\e H:i', strtotime($this->created_at));
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
