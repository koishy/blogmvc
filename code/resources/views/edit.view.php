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
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            -webkit-flex-direction: column;
            -moz-flex-direction: column;
            -ms-flex-direction: column;
            -o-flex-direction: column;
            flex-direction: column;
            font-family: 'Roboto';
        }
        a
        {
            color: #333;
            text-decoration: underline;
            text-decoration-color: teal;
        }
        .card
        {
            color: #333s;
            border-radius: 3px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.2);
            background: white;
            padding: 20px;
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            -webkit-flex-direction: column;
            -moz-flex-direction: column;
            -ms-flex-direction: column;
            -o-flex-direction: column;
            flex-direction: column;
        }
        input[type=text], input[type=password] 
        {
            border: 1px solid rgba(0,0,0,0.3);
            padding: 10px;
            border-radius: 5px;
        }
        #c
        {
            height: 100vh;
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            justify-content: center;
            -ms-align-items: center;
            align-items: center;
            background: #f1f2f3;
        }
        h1
        {
            margin-bottom: 20px;
        }
        #edit > div
        {
            -ms-align-items: center;
            align-items: center;
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;

            padding-top: 10px;
            justify-content: space-between;
        }
        #edit > div > label
        {
            padding-right: 30px;
        }
        input
        {
            font-family: Roboto;
        }
        input[type=submit]
        {
            width: 100%;
            margin-top: 10px;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0, 128, 128, 0.2);
            padding: 10px;
            border-radius: 5px;
            border: none;
            background: teal;
            color: #fff;            
        }
        .error
        {
            color: crimson;
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
        @media screen and (max-width: 500px)
        {
            #c
            {
                flex:1;
                flex-direction: column;
                align-items: stretch;
            }
            #c div
            {
                -webkit-flex-direction: column;
                -moz-flex-direction: column;
                -ms-flex-direction: column;
                -o-flex-direction: column;
                flex-direction: column;
                -ms-align-items: stretch;
                align-items: stretch;
            }
            .card
            {
                box-shadow: none;
                height: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="breadcrumb">
        <a href="/">Articles</a>
        <div class="separator">/</div>
        <a href="/article/<?= $article->id ?>"><?= $article->title ?></a>
        <div class="separator">/</div>
        Edit
    </div>
    <div id="c">
        <div class="card">
            <form action="/article/<?= $id ?>" method="POST" id="edit">
                <h1>Edit article</h1>
                <?php if (isset($errors)): ?>
                    <span class="error">
                        <?= $errors[0] ?>
                    </span>
                <?php endif ?>
                <div>
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" value="<?=$article->title?>">
                </div>
                

                <div style="flex-direction: column; align-items: flex-start;">
                    <label for="content" style="padding: 10px 0px">Text:</label>
                    <textarea name="content" id="content" style="resize: none; width: 100%; height: 200px;"><?=$article->content?></textarea>
                </div>
                <input type="submit" value="Edit">
            </form>
            <form action="/article/<?= $id ?>/delete" method="POST">
                
                <input type="submit" value="Delete" style="width: 100%; background: crimson;">
            </form>
        </div>

    </div>
</body>
</html>