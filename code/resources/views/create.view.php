<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Articles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600|Roboto" rel="stylesheet">
    <style>
        body
        {
            font-family: 'Roboto';
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
        a
        {
            color: #333;
            text-decoration: underline;
            text-decoration-color: teal;
        }
        h1
        {
            font-family: 'Montserrat';
        }
        * {margin: 0; padding: 0}
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
        
        form
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
        h1
        {
            margin-bottom: 20px;
        }
        form > div
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
        form > div > label
        {
            padding-right: 30px;
        }
        input
        {
            font-family: Roboto;
        }
        input[type=submit]
        {
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
            #c div label
            {
                padding: 10px 0px;
            }
            form
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
        Create
    </div>
    <div id="c">
        <form action="/create" method="POST">
            <h1>Create new article</h1>
            <?php if (isset($errors)): ?>
                <span class="error">
                    <?= $errors[0] ?>
                </span>
            <?php endif ?>
            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title">
            </div>
            

            <div style="flex-direction: column; align-items: flex-start;">
                <label for="content" style="padding: 10px 0px">Text:</label>
                <textarea name="content" id="content" style="resize: none; width: 100%; height: 200px;"></textarea>
            </div>
            <input type="submit" value="Create">
        </form>        
    </div>
</body>
</html>