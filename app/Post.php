<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $dates = ['published_at'];

    public static function boot() {
        parent::boot();

        static::saving(function($post) {
            $post->slug = $post->isPublished() ? static::makeSlug($post->published_at, $post->title) : null;
        });
    }

    private static function makeSlug($published_at, $title)
    {
        return $published_at->format('Ymd') . '_' . str_slug($title, '_');
    }

    public function getFormattedPublishedAttribute()
    {
        return $this->published_at->format('F j, Y');
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function isPublished() {
        return $this->published_at && $this->published_at->isPast();
    }

    public function scopePublished($query) {
        return $query->where('published_at', '<=', new DateTime());
    }

}