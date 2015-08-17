<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends \Eloquent
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentArticles()
    {
        return $this->belongsTo('Article');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commentAuthor()
    {
        return $this->belongsTo('User');
    }
}
