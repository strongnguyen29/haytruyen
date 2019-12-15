<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use Sluggable;

    protected $guarded = ['id', 'created_at'];

    protected $fillable = ['title'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return ['slug' => ['source' => 'title']];
    }

    /**
     * @return string
     */
    public function getLinkAttribute(): string
    {
        return route('author', ['authorSlug' => $this->slug]);
    }
}
