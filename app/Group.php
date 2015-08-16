<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends \Eloquent
{
    /**
     * The table used.
     *
     * @var object
     */
    protected $table = 'groups';

    /**
     * Get the list of users in this group.
     *
     * @return array
     *   The users.
     */
    public function users() {
        return $this->hasMany('App\User');
    }
}
