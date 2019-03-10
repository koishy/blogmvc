<?php 

function canedit($id)
{
    $article = new \App\Article;
    $user = new \App\User;
    if (!\Vendor\Auth::id()) return false;
    return (
        (
            $article->belongsTo($id, \Vendor\Auth::id())
        ) 
        || $user->is_admin(\Vendor\Auth::id() )
    );
}
function comment_own($id)
{
    $comment = new \App\Comment;
    $user = new \App\User;
    if (\Vendor\Auth::id() == null) return false;
    return (
        (
            $comment->belongsTo($id, \Vendor\Auth::id())
        ) 
        || $user->is_admin(\Vendor\Auth::id())
    );
}
?>