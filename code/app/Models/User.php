<?php 

namespace App;
use \Vendor\DefaultModel;

class User extends DefaultModel
{
    protected $table_name = 'users';

    public function findFromUsername($username)
    {
        return $this->connection->execute(
            'SELECT * FROM users WHERE name = :username',
            [':username' => $username]
        )->fetchObject();
    }

    public function create($username, $password)
    {
        $this->connection->execute(
            'INSERT INTO users (name, password) VALUES (:username, :password)',
            [
                ':username' => $username,
                ':password' => md5($password),
            ]
        );
        return $this->findFromUsername($username);
    }

    

    public function is_admin($id)
    {
        return $this->find($id)->is_admin;
    }

}