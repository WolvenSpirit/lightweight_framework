<?php
Class PDO_mysql_conn
{
  protected $conn_cfg;
  protected $pdo;

  function __construct($config)
  {
    $this->conn_cfg = $config;
    $this->pdo = new PDO(
      "mysql:host=".$config->connection->host.";
      dbname=".$config->connection->dbname,
      $config->connection->username,
      $config->connection->password
    );
  }

  public function get_pdo()
  {
    return $this->pdo; // return the obj to perform manual queries.
  }

  public function select($table,$column)
  {
        if(null != $column)
        {
          if(is_array($column))
          {
            try
            {
                $q = "SELECT * FROM $table WHERE $column[0] = ?";
                # die($q); # DEBUG
                $stmt = $this->pdo->prepare($q);
                $stmt->execute([$column[1]]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (\PDOException $e)
            {
                print($e->getMessage());
            }
          }
        }
        else {
          $stmt = $this->pdo->query("SELECT * FROM $table");
          $stmt->execute();
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return $result;
        }
  }
}
 ?>
