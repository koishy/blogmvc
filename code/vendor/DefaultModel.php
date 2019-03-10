<?php 

namespace Vendor;

class DefaultModel
{
    protected $table_name;
    protected $connection;

    public function __construct()
    {
        $this->connection = new \Vendor\Connection();
        $this->connection->connect();
    }

    public function all()
    {
        $fetched = $this->connection->execute('SELECT * FROM '.$this->table_name)->fetchAll(\PDO::FETCH_OBJ);
        return $fetched;
    }
    public function find($id)
    {
        $fetched = $this->connection->execute(
            'SELECT * FROM '.$this->table_name.' WHERE id = :id LIMIT 1',
            [':id' => $id]
        )->fetchObject();
        return $fetched ? $fetched : die('Error 404');
    }
}

?>