<?php
class database {

  // Change this
  private $db_host      = "localhost";
  private $db_username  = "root";
  private $db_password  = "";
  private $db_name      = "";

  private $connected = false;
  private $connection;
  private $sql_query;
  private $query_counter = 0;
  
  public function database() {
    $this->connection = @mysql_connect($this->db_host, $this->username, $this->db_password);
    if ($this->connection) {
      if (mysql_select_db($this->db_name, $this->connection)) {
        $this->connected = true;
        mysql_query("SET NAMES 'utf8'", $this->connection);
        mysql_query("SET CHARACTER SET 'utf8'", $this->connection);
      }
    }
  }
  
  public function __destruct() {
    if ($this->connected) {
      $this->connected = false;
      mysql_close($this->connection);
    }
  }
  
  public function getLastQuery() {
    return $this->sql_query;
  }
  
  public function query($query) {
    if ($this->connected) {
      $this->sql_query = $query;
      $this->query_counter++;
      $result = mysql_query($this->sql_query, $this->connection);
      return $result;
    }
  }
  
  public function select($fields, $table, $where = "", $order = "", $limit = "") {
    if ($this->connected) {
      if (!empty($where)) {
        $where = " WHERE ".$where;
      }
      if (!empty($order)) {
        $order = " ORDER BY ".$order;
      }
      if (!empty($limit)) {
        $limit = " LIMIT ".$limit;
      }
      $result = $this->query("SELECT ".$fields." FROM ".$table.$where.$order.$limit);
      return $result;
    }
  }
  
  public function getTableRows($result) {
    return mysql_num_rows($result);
  }
  
  public function insert($table, $fields, $values) {
    if ($this->connected) {
      $this->query("INSERT INTO ".$table." (".$fields.") VALUES (".$values.")");
    }
  }
  
  public function delete($table, $where = "") {
    if ($this->connected) {
      if (!empty($where)) {
        $where = " WHERE ".$where;
      }
      $this->query("DELETE FROM ".$table.$where);
    }
  }

  public function update($table, $fields, $where = "") {
    if ($this->connected) {
      if (!empty($where)) {
        $where = " WHERE ".$where;
      }
      $this->query("UPDATE ".$table." SET ".$fields.$where);
    }
  }
  
  public function fetch($result) {
    if ($this->connected) {
      return mysql_fetch_assoc($result);
    }
  }
  
  public function getQueryCount() {
    if ($this->connected) {
      return $this->query_counter;
    }
  }
  
}
?>