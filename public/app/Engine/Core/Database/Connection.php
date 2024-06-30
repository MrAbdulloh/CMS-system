<?php

namespace App\Engine\Core\Database;

// connect database
class Connection
{
    private $link;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $dan = new \PDO("mysql:host=db;dbname=dbname", "root", "password");
        $this->link = $dan;
        return $this;
    }

    public function execute($sql)
    {
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }

    public function query($sql)
    {
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

        if ($result === false) {
            return [];
        }
        return $result;
    }
}