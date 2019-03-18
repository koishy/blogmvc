<?php 

namespace App\Controllers;

class HomeController
{

    public static function index($params)
    {
        $articles = new \App\Article();

        return view('index', [
            'articles' => $articles->all()
        ]);
    }

    public static function signout($params)
    {
        unset($_SESSION['user_id']);

        header('Location: /');
    }

    public static function article($params)
    {
        $article = new \App\Article;

        $article = $article->find($params['id']);
        $comments = new \App\Comment;
        $comments = $comments->get($params['id']);


        return view('article', ['article' => $article, 'comments' => $comments]);
    }

    public static function create($params)
    {
        if (!\Vendor\Auth::id()) header('Location: /');
        return view('create');
    }

    public static function store($params)
    {
        if (!\Vendor\Auth::id()) header('Location: /');
        $article = new \App\Article;
        $id = $article->create($_POST['title'], $_POST['content']);
        header('Location: /article/'.$id);
    }

    public static function edit($params)
    {
        if (!canedit($params['id'])) header('Location: /');
        $article = new \App\Article;
        $article = $article->find($params['id']);

        return view('edit', ['id' => $params['id'], 'article' => $article]);
    }

    public static function patch($params)
    {
        $article = new \App\Article;
        if (!canedit($params['id'])) header('Location: /');

        $article->edit($params['id'], $_POST['title'], $_POST['content']);

        header('Location: /article/'.$params['id']);
    }

    public static function delete($params)
    {
        $article = new \App\Article;
        if (!canedit($params['id'])) header('Location: /');

        $article->delete($params['id']);

        header('Location: /');
    }

    public static function signupForm($params)
    {
        return view('signup');
    }

    public static function signup($params)
    {
        $user = new \App\User;
        if ($user->findFromUsername($_POST['username']))
        {
            return view('login', ['errors' => ['Username already taken']]);
        }
        $user = $user->create($_POST['username'], $_POST['password']);

        $_SESSION['user_id'] = $user->id;
        header('Location: /');
    }

    public static function login($params)
    {
        return view('login');
    }

    public static function signin($params)
    {
        $user = new \App\User;
        $user = $user->findFromUsername($_POST['username']);

        if ($user->password == md5($_POST['password']))
        {
            $_SESSION['user_id'] = $user->id;
            header('Location: /');


        }
        else
        {
            return view('login', ['errors' => ['Wrong username or password']]);
        }

    }
}