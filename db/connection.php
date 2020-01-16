<?php
/**
 * Created by PhpStorm.
 * User: rezakhan
 * Date: 10/13/2019
 * Time: 12:24 PM
 */


/**
 * Class Connection
 * this class is used for all kind of interaction with database
 */
class Connection
{

    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "db_form";
    private static $connection;

    private $where_array = array();
    private $table, $where, $select_column;
    private $or_where = "", $and_where = "";
    private $limit, $group_by, $order_by;

    public function __construct()
    {

    }

    /**
     * @return PDO
     * method is used to create connection with database
     */
    static function createDBConnection()
    {
        try {
            if (!isset(self::$connection)) {
                self::$connection = new PDO("mysql:host=" . self::$servername . ";dbname=" . self::$dbname, self::$username, self::$password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$connection;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * this method is used to insert data into a specific table
     * @param $table_name is the name of the table
     * @param $column_data is an array that holds table column name as key and column value as value
     * @return bool
     */
    function insert($table_name, $column_data)
    {
        $conn = self::createDBConnection();
        $column_count = count($column_data);
        $overwriteArray = array_fill(0, $column_count, '?');
        $field_names = array_keys($column_data);
        $field_values = array_values($column_data);
        $query = "INSERT INTO {$table_name} (" . implode(',', $field_names) . ") VALUES (" . implode(',', $overwriteArray) . ")";
        $statement = $conn->prepare($query);
        $result = $statement->execute($field_values);
        return $result == 1 ? TRUE : FALSE;
    }

    /**
     * this method is used to delete a particular record from table
     * @param $table_name is the name of the table
     * @param $operand is the name of the column which should be deleted
     * @param $value is the value of the column which should be deleted
     * @return bool
     */
    function delete($table_name, $operand, $value)
    {
        $conn = self::createDBConnection();
        $sql = "DELETE FROM {$table_name} WHERE {$operand}={$value}";
        if ($conn->query($sql) === TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * @param $table_name is the name of the table
     * @param $columns_data is an array that holds table column name as key and column value as value
     * @param $operand is the name of the column which should be updated
     * @param $value is the value of the column which should be updated
     * @return bool
     */
    function update($table_name, $columns_data, $operand, $value)
    {
        $conn = self::createDBConnection();
        $total_columns = count($columns_data);
        $field_names = array_keys($columns_data);
        $field_values = array_values($columns_data);
        for ($i = 0; $i < $total_columns; $i++) {
            if ($i != $total_columns - 1) {
                $field_names[$i] = $field_names[$i] . "=?, ";
            } else {
                $field_names[$i] = $field_names[$i] . "=? ";
            }
        }
        $sql = "UPDATE {$table_name} SET " . implode('', $field_names) . " ";
        $sql .= "WHERE {$operand} = {$value}";

        $result = $conn->prepare($sql)->execute($field_values);
        return $result;
    }

    /**
     * this method is used for method chaining, sets column names to select
     * @param $select_column
     * @return $this
     */
    function select($select_column)
    {
        $this->select_column = $select_column;
        return $this;
    }

    /**
     * this method is used for method chaining, sets table names
     * @param $table
     * @return $this
     */
    function from($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * this method is used for method chaining, sets condition
     * @param $column
     * @param $operator
     * @param $value
     * @return $this
     */
    function where($column, $operator, $value)
    {
        $this->where = " {$column}{$operator}?";
        array_push($this->where_array, $value);
        return $this;
    }

    /**
     * this method is used for method chaining, sets condition
     * @param $column
     * @param $operator
     * @param $value
     * @return $this
     */
    function and_where($column, $operator, $value)
    {
        $this->and_where .= " AND {$column}{$operator}?";
        array_push($this->where_array, $value);
        return $this;
    }

    /**
     * this method is used for method chaining, sets condition
     * @param $column
     * @param $operator
     * @param $value
     * @return $this
     */
    function or_where($column, $operator, $value)
    {
        $this->or_where .= " OR {$column}{$operator}?";
        array_push($this->where_array, $value);
        return $this;
    }

    /**
     * this method is used for method chaining, sets group by
     * @param null $column_name
     * @return $this
     */
    function group_by($column_name = null)
    {
        if ($column_name) {
            $this->group_by = " GROUP BY {$column_name}";
        }
        return $this;
    }

    /**
     * this method is used for method chaining, sets limit
     * @param null $limit
     * @return $this
     */
    function limit($limit = null)
    {
        if ($limit) {
            $this->limit = " LIMIT {$limit}";
        }
        return $this;
    }

    /**
     * this method is used for method chaining, sets order by
     * @param $column
     * @param $formula
     * @return $this
     */
    function order_by($column, $formula)
    {
        if ($column) {
            $this->order_by = " ORDER BY {$column} {$formula}";
        }
        return $this;
    }

    /**
     * this method is used for method chaining, get data from database
     * @return array|bool
     */
    function get()
    {
        if (isset($this->table) && isset($this->select_column)) {

            $conn = self::createDBConnection();
            $sql = "SELECT {$this->select_column} FROM {$this->table}";
            if (isset($this->where)) {
                $sql .= " WHERE $this->where";
            }

            if (isset($this->and_where)) {
                $sql .= "$this->and_where";
            }

            if (isset($this->or_where)) {
                $sql .= "$this->or_where";
            }

            if (isset($this->group_by)) {
                $sql .= "$this->group_by";
            }
            if (isset($this->order_by)) {
                $sql .= "$this->order_by";
            }
            if (isset($this->limit)) {
                $sql .= "$this->limit";
            }

            $stmt = $conn->prepare($sql);
            $stmt->execute($this->where_array);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } else {
            return FALSE;
        }
    }

}