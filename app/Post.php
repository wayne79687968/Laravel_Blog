<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    /**
     * Post belongs to User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
        return $this->belongsTo('App\User');
    }

    // public function setPostImageAttribute($value)
    // {
    //     $this->arttributes['post_image'] = asset($value);
    // }

    public function getPostImageAttribute($value)
    {
        if ($value) {
            return asset('storage/' . $value);
        } else {
            return "";
        }
    }

    /**
     * User has many Comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
