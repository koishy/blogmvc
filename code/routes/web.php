<?php 

Router::get('/', '\\App\\Controllers\\HomeController::index');
Router::get('/article/{id}', '\\App\\Controllers\\HomeController::article');
Router::get('/login', '\\App\\Controllers\\HomeController::login');
Router::post('/login', '\\App\\Controllers\\HomeController::signin');
Router::get('/signup', '\\App\\Controllers\\HomeController::signupForm');
Router::post('/signup', '\\App\\Controllers\\HomeController::signup');
Router::get('/create', '\\App\\Controllers\\HomeController::create');
Router::post('/create', '\\App\\Controllers\\HomeController::store');
Router::get('/article/{id}/edit', '\\App\\Controllers\\HomeController::edit');
Router::post('/article/{id}', '\\App\\Controllers\\HomeController::patch');
Router::post('/article/{id}/delete', '\\App\\Controllers\\HomeController::delete');
Router::post('/article/{id}/comment', '\\App\\Controllers\\CommentsController::create');
Router::post('/article/{id}/comment/{cid}/remove', '\\App\\Controllers\\CommentsController::remove');

 ?>