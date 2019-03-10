<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Articles</title>
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
            justify-content: center;
            -ms-align-items: center;
            align-items: center;
            font-family: 'Roboto';
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
    </style>
</head>
<body>
    <form action="/login" method="POST">
        <h1>Sign in</h1>
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
        <input type="submit" value="Sign In">
    </form>
</body>
</html>