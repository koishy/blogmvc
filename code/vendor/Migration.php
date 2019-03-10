<?php 

namespace Vendor;

class Migration
{
    public static function migrate($q)
    {
        $conn = new \Vendor\Connection();
        $conn->connect();
        $conn->execute($q);
    }
}