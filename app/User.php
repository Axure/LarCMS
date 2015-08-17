<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends \Eloquent implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     *
     * @return array
     *   The Group objects that this user belongs to.
     */
    public function getGroup() {
        return Article::belongsTo('Group');
    }

    /**
     * Get the list of groups that are managed by this user.
     *
     * @return array
     */
//    public function managedUsers() {
////        return $this->hasMany('User', '');
////        return $this->hasManyThrough('User', 'Group', 'admin_id', 'user_id');
//        return $this->managedGroup()->users();
//    }

    public function joinedGroup() {
//        return $this->belongsToMany('Group', 'member_relation', 'user_id', 'member_id');
        return $this->belongsTo('Group');
    }

//    public function managedGroup() {
//        return $this->belongsToMany('Group', 'manager_relation', 'user_id', 'admin_id');
//    }

//    /**
//     * Get the list of articles that are managed by this user.
//     *
//     * @return array
//     */
//    public function managedArticles() {
//        return $this->hasMany('Article', 'User');
//    }

    public function publishedArticles()
    {
        return $this->hasMany('App\Article');
    }

    public function publishedComments()
    {
        return $this->hasMany('App\Comment');
    }

    public function managedComments()
    {
        return $this->hasManyThrough('App\Comment', 'App\Article');
    }

//    public function managedComments()
//    {
//        return $this->hasManyThrough('Comment', 'User'); // Too young, too simple.
//    }

}
