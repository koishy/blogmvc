<?php 

namespace App;
use \Vendor\DefaultModel;

class Article extends DefaultModel
{
    protected $table_name = 'articles';

    public function edit($id, $title, $content)
    {
        $this->connection->execute(
            'UPDATE articles SET title=:title, content=:content WHERE id = '.$id,
            [
                ':title' => $title,
                ':content' => $content
            ]
        );

        return $this->find($id);
    }

    public function delete($id)
    {
         $this->connection->execute(
            'DELETE FROM articles WHERE id = '.$id
        );

    }    

    public function belongsTo($id, $user_id)
    {
        return $this->connection->execute(
            'SELECT * FROM articles WHERE user_id=:user_id AND id=:id',
            [
                ':user_id' => $user_id,
                ':id' => $id
            ]
        )->fetchAll(\PDO::FETCH_OBJ) ? true : false;
    }

    public function create($title, $content)
    {
        $this->connection->execute(
            'INSERT INTO articles (title, content, user_id) VALUES (:title, :content, :uid)',
            [
                ':title' => $title,
                ':content' => $content,
                ':uid' => \Vendor\Auth::id()
            ]
        );

        return $this->connection->get_pdo()->lastInsertId();
    }
}