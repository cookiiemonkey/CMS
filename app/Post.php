<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = [
        'published_at'
    ];
    
    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at', 'category_id', 'user_id'
    ];

    /**
     * Delete post image from storage
     * @return void
     */
    public function deleteImage() 
    {
        Storage::delete('image');
    }

    /**
     * Relationships
     */
    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function tags() 
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    /**
     * check if post has tag 
     * 
     * @return array
     */
    public function hasTag($tagId) 
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    /**
     * Makes a scope
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now() );
    }

    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if(!$search) {
            return $query->published();
        }

        return $query->published()->where('title', 'LIKE', "%{$search}%");
    }

}
