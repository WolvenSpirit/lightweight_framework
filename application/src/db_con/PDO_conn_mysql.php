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

  public function select($table,$column): array
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
      # INFO - $columns == $properties == $entity_properties == $column_properties - sometimes in different filtered states.
  public function insert(string $table, array $data,array $columns_properties): bool
  {
    if($table != null && $data != null)
    {
      if(is_array($data) && is_string($table))
      {
        try
          {
            $columns = implode(',', $columns_properties);
          $query = "INSERT INTO $table ($columns) VALUES (?, ?, ?)";
          $stmt= $this->pdo->prepare($query);
          $stmt->execute($data);
          return True;
          }
          catch(\PDOException $e)
          {
            printf($e->getMessage());
          }
      }
    }
  }
}
 ?>
