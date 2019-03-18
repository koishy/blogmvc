<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Articles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600|Roboto" rel="stylesheet">
    <style>
        h1
        {
            font-family: 'Montserrat';
        }
        
        * {margin: 0; padding: 0}
        body
        {
            font-family: 'Roboto';
            background: #f1f2f3;
        }
        .article
        {
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            justify-content: space-between;
            background: #fff;
            padding: 40px;
            border-bottom: 1px solid #ccc;
        }
        .article h1
        {
            text-decoration: underline;
            text-decoration-color: teal;
        }
        .article p
        {
            color: #222;
            padding-top: 20px;
        }
        .article:first-of-type
        {
            border-top: 1px solid #ccc;
        }
        #heading
        {
        }
        nav
        {
            padding: 30px 40px;
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            -ms-align-items: center;
            align-items: center;
            justify-content: space-between;
        }
        nav ul
        {
            list-style: none;
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
        }
        nav ul li
        {
            margin: 0 30px;
        }
        a
        {
            color: #333;
            text-decoration: underline;
            text-decoration-color: teal;
        }
        section
        {
            font-size: 1.1em !important;
        }
        .articles
        {
            box-shadow: 0 5px 30px rgba(0,0,0,0.2);
        }
        .comments
        {
            margin-top: 40px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.2);
            background: white;

        }
        .comment
        {
            border-top: 1px solid #ccc;
            padding: 40px;
            
        }
        .comment h4
        {
            font-family: "Montserrat";
            text-decoration: underline;

            text-decoration-color: teal;
            margin-bottom: 10px;
        }
        #commentform
        {
            padding: 40px;
        }
        #commentform > div
        {
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;

        }
        textarea
        {
            padding: 5px;
            border-radius: 5px 0 0 5px;
        }
        input
        {
            padding: 10px 40px;
            border: none;
            background: teal;
            color: #fff;
            border-radius: 0 5px 5px 0;
        }
        .breadcrumb
        {
            border-bottom: 1px solid #ccc;
            background: white;
            color: #333;
            padding: 10px;
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
        }
        .breadcrumb .separator
        {
            margin: 0 10px;
            color: teal;
        }
    </style>
</head>
<body>
    <div class="breadcrumb">
        <a href="/">Articles</a>
        
        <div class="separator">
            /
        </div>
        <?=htmlspecialchars($article->title)?>
    </div>
    <nav>
        <h1 id="heading">Article: </h1>
        <ul class="controls">
                
                
            <?php if (\Vendor\Auth::id()): ?>
                <li><?= \Vendor\Auth::User()->name ?></li>
                <li><a href="/create">Create new article</a></li>                
            <?php else: ?>
                <li><a href="/signup">Sign up</a></li>
                <li><a href="/login">Sign in</a></li>
            <?php endif ?>

        </ul>
    </nav>
    <section class="articles">
        <section class="article">
            <div>
                <h1 class="title"><?=htmlspecialchars($article->title)?></h1>    
                <p class="text"><?=htmlspecialchars($article->content)?></p>
            </div>
                        <?php 
                if (canedit($article->id)):
             ?>
            <div>
                <a href="/article/<?=$article->id?>/edit" style="padding: 10px; display: block;">Edit</a>
            </div>
        <?php endif ?>
        </section>
    </section>
    
    <section class="comments">
        <?php if (\Vendor\Auth::id()): ?>
            <form action="/article/<?= $article->id ?>/comment" method="post"
                id="commentform" >
                <label for="content">Leave a comment:</label>
                <div>
                    
                <textarea name="content" id="content" style="resize: none; width: 100%; height: 50px;"></textarea>
                <input type="submit" value="Send">
                </div>
            </form>
        <?php endif ?>
        <?php $_C = new \App\Comment; ?>

        <?php foreach ($comments as $comment): ?>
                    
        <section class="comment">
            <h4 class="username"><?= htmlspecialchars($_C->getUsername($comment->id))?></h1>    
            <p class="text"><?=htmlspecialchars($comment->content)?></p>
            <?php if(comment_own($comment->id)): ?>
                          <form method="post" action="/article/<?= $article->id ?>/comment/<?= $comment->id ?>/remove">
                <input type="submit" name="submit" id="submit" value="remove" style="background: crimson; border-radius: 5px;">
            </form>  
            <?php endif ?>
        </section>
        <?php endforeach ?>

    </section>
</body>
</html>