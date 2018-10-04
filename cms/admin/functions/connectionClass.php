<?php
 
class connectionClass extends mysqli{
    private $host="localhost",$dbname="test",$dbpass="",$dbuser="root";
    public $con;
    
    public function __construct() {
       $this->con=$this->connect($this->host, $this->dbuser, $this->dbpass, $this->dbname);
    }
}
