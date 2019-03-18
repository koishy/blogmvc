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
            height: 100vh;
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
            background: #f1f2f3;
        }
        a
        {
            color: #333;
            text-decoration: underline;
            text-decoration-color: teal;
        }
        .card
        {
            color: #333;
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
        #c
        {
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            -ms-align-items: center;
            align-items: center;
            justify-content: center;
            flex: 1;
        }
        @media screen and (max-width: 500px)
        {
            body
            {
                align-items: stretch;
                justify-content: stretch;
            }
            .card
            {
                width: 100vw;
                height: 100%;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                box-shadow: none;
                border-radius: 0;
            }
            #c
            {
                -ms-align-items: flex-start;
                align-items: flex-start;
            }
            .card div
            {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>
<body>
    <div class="breadcrumb">
        <a href="/">Articles</a>
        <div class="separator">/</div>
        Sign Up
    </div>
    <div id="c">
        <form action="/signup" method="POST" class="card">
            <h1>Sign up</h1>
            <?php if (isset($errors)): ?>
                <span class="error">
                    <?= $errors[0] ?>
                </span>
            <?php endif ?>
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
            </div>
            

            <div>
                <label for="username">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <input type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>