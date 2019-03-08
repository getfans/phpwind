<?php

namespace App\Observers;

use App\ModelMorphMap;
use App\Models\Comment;
use App\Models\ForumThread;

class CommentObserver
{
    /**
     * Handle the comment "created" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        $comment->commentable()->update(['last_comment_id' => $comment->id]);
    }
}
