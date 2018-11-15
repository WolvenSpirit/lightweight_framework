<?php
 class BaseModel
{
  protected $model;
  protected $pdo;
  protected $columns;
  public function __construct()
  {

  }
  public function init($model_class)
  {
    $this->model = $model_class;
    $this->columns = get_class_vars($model_class); // Should return array.
    /**
     * The above maps table_model, 
     * provided that the class model has the table name
     * and has the columns as properties.
     */
    switch($this->cfg->connection->driver)
    {
        case 'mysql' || 'mysqli':
          $this->pdo = new PDO(
            "mysql:host=".$this->cfg->connection->host.";
            dbname=".$this->cfg->connection->dbname,
            $this->cfg->connection->username,
            $this->cfg->connection->password
          );
          break;
        case 'posgres' || 'postgresql':
          die("posgresql to be implemented, sorry.");
          break;
        default:
            print($this->cfg->connection->driver." isn't supported.");
    }
  }
  public function select($column,$column_val=NULL)
  { ### BELOW THIS LINE ~~~~~~~~~~~~~~~ TO BE RE-WRITTEN ~~~~~~~~~~~~~~~~
    switch($this->cfg->connection->driver)
    {
      case 'mysql':
        if($column!=null)
        {
          if(is_array($q))
          { 
            try
            {
                 $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $column = ?");
                $stmt->execute($column_val);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (\PDOException $e)
            {
                print($e->getMessage());
            }
          }
        }
        break;
      default:
          print($this->cfg->connection->driver." isn't supported.");
    }
  }
}