<?php 

namespace Vendor;

class Connection
{
    private $pdo_connection;
    private $query_result;

    public function connect()
    {

        $config = require($_SERVER['DOCUMENT_ROOT'].'/config.php');
        try
        {
            $this->pdo_connection = new \PDO(
                $config['database_type'].':host='.$config['host'].';dbname='.$config['database'],
                $config['username'],
                $config['password'],   
            );
        }
        catch (PDOException $e)
        {
            throw new Exception("Unable to connect", 1);   
        }
        return $this;
    }    

    public function get_pdo()
    {
        return $this->pdo_connection;
    }

    public function executeRaw($query)
    {
        $statement = $this->pdo_connection->prepare($query);
        $this->query_result = $statement->execute();
        $this->query_result =  $statement;
        return $this->query_result;
    }

    public function execute($query, $params = [])
    {
        try
        {    
            $statement = $this->pdo_connection->prepare($query);
            $statement->execute($params);   
        }
        catch (PDOException $e)
        {
            die($e->message);
        }
        $this->query_result = $statement;
        return $this->query_result;
    }

    public function fetchObject()
    {
        if (!isset($this->query_result))
        {
            throw new Exception("No query found in the chain", 1);
        }
        $fetched = $this->query_result->fetchAll(PDO::FETCH_OBJ);
        return $this->query_result;
    }
}

?>