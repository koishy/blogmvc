<?php 

namespace App;
use \Vendor\DefaultModel;

class Comment extends DefaultModel
{
    protected $table_name = 'comments';

    public function get($article)
    {
        return $this->connection->execute(
            'SELECT * FROM comments WHERE post_id = '.$article,
        )->fetchAll(\PDO::FETCH_OBJ);

    }

    public function getUsername($id)
    {
        $usermodel = new \App\User;

        return $usermodel->find($this->connection->execute(
            'SELECT * FROM comments WHERE id = '.$id,
        )->fetchAll(\PDO::FETCH_OBJ)[0]->user_id)->name;
    }
    public function delete($id)
    {
         $this->connection->execute(
            'DELETE FROM comments WHERE id = '.$id
        );

    }   
    public function belongsTo($id, $user_id)
    {
        return $this->connection->execute(
            'SELECT * FROM comments WHERE user_id=:user_id AND id=:id',
            [
                ':user_id' => $user_id,
                ':id' => $id
            ]
        )->fetchAll(\PDO::FETCH_OBJ) ? true : false;
    }

    public function create($pid, $content)
    {
        $this->connection->execute(
            'INSERT INTO comments (content, post_id, user_id) VALUES (:content, :pid, :uid)',
            [
                ':content' => $content,
                ':pid' => $pid,
                ':uid' => \Vendor\Auth::id()
            ]
        );

        return $this->connection->get_pdo()->lastInsertId();
    }
}