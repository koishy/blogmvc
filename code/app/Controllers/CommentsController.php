<?php 

namespace App\Controllers;

class CommentsController
{


    public function create($params)
    {
        if (!\Vendor\Auth::id() || strlen($_POST['content']) < 1) {
            header('Location: /article/'.$params['id']);
            return;
        }

        $comment = new \App\Comment;

        $comment->create($params['id'], $_POST['content']);



        header('Location: /article/'.$params['id']);
    }


 
    public function remove($params)
    {
        if (!comment_own($params['cid'])) {
            header('Location: /article/'.$params['id']);
            return;
        }

        $comment = new \App\Comment;

        $comment->delete($params['cid']);
        header('Location: /article/'.$params['id']);
    }
}