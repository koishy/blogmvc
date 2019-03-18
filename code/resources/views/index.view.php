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
    </div>
    <nav>
        <h1 id="heading">Articles: </h1>
        <ul class="controls">
                
            <?php if (\Vendor\Auth::id()): ?>
                <li><?= \Vendor\Auth::User()->name ?></li>
                <li><a href="/create">Create new article</a></li>  
                <li><a href="/signout">Sign Out</a></li>              
            <?php else: ?>
                <li><a href="/signup">Sign up</a></li>
                <li><a href="/login">Sign in</a></li>
            <?php endif ?>

        </ul>
    </nav>
    <section class="articles">
        
        <?php foreach ($articles as $article): ?>

            <a href="/article/<?=$article->id?>" style="text-decoration: none;">
        <section class="article">
            <div class="r">
                <h1 class="title"><?=htmlspecialchars($article->title)?></h1>    
                <p class="text"><?=htmlspecialchars($article->content)?></p>
            </div>
            <div class="l">
            <?php 
                if (canedit($article->id)):
             ?>
            <a href="/article/<?=$article->id?>/edit" style="padding: 10px; display: block;">Edit</a>
            <?php endif ?>
            </div>

        </section></a>

        <?php endforeach ?>
    </section>

</body>
</html>