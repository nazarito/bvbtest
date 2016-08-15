<?php

class Model
{

    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "yourclub";
    public $con;
    public $r;


    public function connect()
    {
        if (!$this->con) {
            $myconn = @mysql_connect($this->db_host, $this->db_user, $this->db_pass);
            if ($myconn) {
                $seldb = @mysql_select_db($this->db_name, $myconn);
                if ($seldb) {
                    $this->con = true;
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return true;
        }


    }

    public function disconnect()
    {

        if ($this->con) {
            if (@mysql_close()) {
                $this->con = false;
                return true;
            } else {
                return false;
            }
        }

    }


    private function tableExists($table)
    {
        $tablesInDb = @mysql_query('SHOW TABLES FROM ' . $this->db_name . ' LIKE "' . $table . '"');
        if ($tablesInDb) {
            if (mysql_num_rows($tablesInDb) == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function select($table, $rows, $where, $order)
    {

        $q = 'SELECT ' . $rows . ' FROM ' . $table;

        if ($where != '')
            $q .= ' WHERE ' . $where;
        if ($order != '')
            $q .= ' ORDER BY ' . $order;

        if ($this->tableExists($table)) {
            $query = @mysql_query($q);

            if ($query) {

                $this->numResults = mysql_num_rows($query);

                for ($i = 0; $i < $this->numResults; $i++) {
                    $this->r[] = mysql_fetch_assoc($query);

                }
                if ($this->r == array()) {
                    $this->r = array();
                    return $this->r;
                } else {
                    return $this->r;
                }
            } else {

                return false;
            }
        } else
            return false;
    }


    public function insert($table, $values, $rows)
    {
        if ($this->tableExists($table)) {
            $insert = 'INSERT INTO ' . $table;

            for ($i = 0; $i < count($rows); $i++) {
                if (is_string($rows[$i]))
                    $rows[$i] = '' . $rows[$i] . '';
            }
            $rows = implode(',', $rows);
            $insert .= ' (' . $rows . ')';

            for ($i = 0; $i < count($values); $i++) {
                if (is_string($values[$i]))
                    $values[$i] = '"' . $values[$i] . '"';
            }
            $values = implode(',', $values);
            $insert .= ' VALUES (' . $values . ')';

            $ins = @mysql_query($insert);
            if ($ins) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function delete($table, $where)
    {
        if ($this->tableExists($table)) {
            if ($where == 'deletetable') {
                $delete = 'DELETE ' . $table;
            } else {
                $delete = 'DELETE FROM ' . $table . ' WHERE ' . $where;
            }
            $del = @mysql_query($delete);
            if ($del) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function update()
    {
    }

    public function howRows($table, $rows ,$where) {

        $q = 'SELECT ' . $rows . ' FROM ' . $table;

        if ($where != '')
            $q .= ' WHERE ' . $where;

        if ($this->tableExists($table)) {
            $query = @mysql_query($q);

            if ($query) {

                $this->numResults = mysql_num_rows($query);

                return $this->numResults;
            }
        }
    }


    private $result0 = array(); // Результат возвращаемый от запроса

    public function getResult()
    {
        return $this->result0;
    }
    public function addAdvert($values,$rows) {

        $this->insert("adverts",$values,$rows);
    }
}

?>