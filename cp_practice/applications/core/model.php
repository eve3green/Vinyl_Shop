<?php
class Model
{
    public $mysqli;
    function __construct()
        {
            $this->mysqli = new mysqli('localhost', 'root', '', 'eshop');
            if ($this->mysqli->connect_error) {
            throw new Exception("Підключення до сервера MySQLнеможливо. Код помилки:".$this->$mysqli->connect_error."\n");
            }
        }
    function __destruct()
        {

        $this->mysqli->close();
        }
    public function get_all()
        {
        }
}
?>