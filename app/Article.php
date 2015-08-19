<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * The model for article.
 * @author Hu Zheng <freetiger18@gmail.com>
 */
class Article extends \Eloquent
{
    /**
     * The table used.
     *
     * @var object
     */
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * Contents are html codes.
     *
     * @var array
     */
    protected $fillable = ['title', 'content', 'author'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function author()
    {
        return $this->belongsTo('User');
    }


    /**
     *
     * @return array
     *
     */

//    /**
//     * Check if the user can edit the article.
//     *
//     * @param object $user
//     *   The user to be checked.
//     *
//     * @return bool
//     *   The result.
//     */
//    public function ifEditable($user) {
//
//    }

}
