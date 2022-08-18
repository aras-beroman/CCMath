<?php

namespace App\Models;

use Exception;
use mysqli;

class Model
{
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database;
    protected $table;
    protected $charset = 'utf8';
    protected $primaryKey;
    private $query;
    private $connection;

    public function __construct()
    {
        $this->connection = @new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die('Database Connection Failed - '.$this->connection->connect_error);
        }

        $this->connection->set_charset($this->charset);
    }

    public function query($query)
    {
        $result =  mysqli_query($this->connection, $query);

        if ($this->connection->errno) {
            return 'Error! Unable to handle the query - '.$this->connection->error;
        }

        if ($result && $result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }


    public function insert($keyValueArray)
    {

        try {
            if (is_array($keyValueArray)) {
                $columns = implode(',',array_keys($keyValueArray));
                $values = "'" . implode ( "', '", array_values($keyValueArray) ) . "'";
                $query = "INSERT INTO {$this->table} ({$columns}) VALUES({$values})";

                if (mysqli_query($this->connection, $query)) {
                    return true;
                } else {
                    return 'Error! - '.$query.' - '. mysqli_error($this->connection);
                }
            } else {
                throw new Exception('array_keys() expects parameter 1 to be array, int given');
            }

        } catch (Exception $exception) {

            http_response_code(500);
            header('Content-Type: application/json');

            $response = [
                'success' => false,
                'message' => $exception->getMessage(),
            ];

            echo json_encode($response);
        }
    }

    public function update($array)
    {
        $newArr = [];

        foreach ($array as $key => $value) {
            $newArr[] = ($key . ' = ' . "'" . $value . "'");
        }

        $values = implode(',',$newArr);
        $this->query = "UPDATE {$this->table} SET {$values}";

        return $this;
    }

    public function delete($key)
    {
        $query = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = {$key}";

        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            return ('Error! deleting record: ' . mysqli_error($this->connection));
        }
    }

    public function all()
    {
        $query = "SELECT * FROM {$this->table}";
        $result =  mysqli_query($this->connection, $query);

        if ($this->connection->errno) {
            return ('Error! Unable to handle the query - '.$this->connection->error);
        }

        if ($result && $result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function where($column,$value)
    {
        $this->query = $this->query." WHERE {$column} = {$value}";
        $this->doUpdate($this->query);
    }

    public function groupBy($column)
    {
        $query = "SELECT {$column}, COUNT(*) AS amount FROM {$this->table} GROUP BY {$column} ORDER BY {$column} ASC";
        $result =  mysqli_query($this->connection, $query);

        if ($this->connection->errno) {
            return ('Error! Unable to handle the query - '.$this->connection->error);
        }

        if ($result && $result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    private function doUpdate($query)
    {
        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            return ('Error! '.$query.' - '.  mysqli_error($this->connection));
        }
    }

}