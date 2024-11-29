<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory, HasSlug, SoftDeletes;

    /**
     * Attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'published',
        'image_mime',
        'image_size',
        'created_by',
        'updated_by',
    ];

    /**
     * Attributes to be cast to native types.
     */
    protected $casts = [
        'price' => 'float',
        'published' => 'boolean',
        'image_size' => 'integer',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key name for Laravel routing.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
