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
     * @var array
     */
    protected $fillable = ['title', 'content', 'author'];

    /**
     *
     * @return array
     *   The Group objects that this user belongs to.
     */
    public function getGroup() {

    }

    /**
     * Check if the user can edit the article.
     *
     * @param object $user
     *   The user to be checked.
     *
     * @return bool
     *   The result.
     */
    public function ifEditable($user) {

    }

}
