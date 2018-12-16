<?php
namespace Application\Source;

 class BaseModel
{
  protected $cfg;
  public $model;
  protected $pdo;
  public $columns;
  protected $current_mode;
  public $con_object;
  /**
  * Declare the used db conn mechanism's class name in driver classes. Class files should be available in db_conn folder.
  */
  protected $driver_classes = ['mysql_class'=>'PDO_mysql_conn','postgresql_class'=>'PDO_postgresql_conn'];
  public function __construct()
  {

    try {
      $this->cfg = json_decode(file_get_contents("/home/wolven/Desktop/ws_fw_php/application/db_config.json"));
      if($this->cfg !=null)
      {
        return True;
      }
    } catch (\Exception $e) {
      echo "Failed to open db config file.<\ br> ".$e->getMessage();
    }

  }
  public function init(?string $modelx = null) :bool
  {
    // This is important, the user model will always inherit from basemodel
    // and it will ::init its inherited method providing his class name,
    // it should also contain the column fields as properties.
    // This acts as a rudimentary ORM as it maps the table and columns that exist in the db
    // if the model class name and properties provided by the user match up.
    if($modelx != null) # This override is mainly for debugging the BaseModel
    {
      $this->model = $modelx;
    }
    else
    {
      $this->model = get_class($this);
    }

    $this->columns = get_class_vars($this->model); // Should return array.

    $this->model = str_replace("Application\Model\\",null,$this->model); // fix


    # die(var_dump($this->columns)); # DEBUG

    switch($this->cfg->connection->driver)
    {
        case 'mysql' || 'mysqli':
          require_once(dirname(__DIR__).'/src/db_con/PDO_conn_mysql.php');
          try{
          $this->con_object = new $this->driver_classes['mysql_class']($this->cfg);
          return True;
        }catch(\Exception $e)
        {
            printf($e->getMessage());
        }
          break;
        case 'posgres' || 'postgresql':
          die("posgresql to be implemented, sorry. Not big on waiting? write your own and place it along with the other db_conn classes.");
          break;
        default:
            print($this->cfg->connection->driver." isn't supported.");
    }
  }
  public function select(array $column = null) :array
  {
    if($this->cfg->connection->driver == 'mysql' || $this->cfg->connection->driver == 'mysqli' )
    {
      if($this->con_object != null) // @works
      {

        if(is_null($column))
        {
          return $this->con_object->select($this->model, null);
        }
        else if(is_array($column)) // @works
        {
          # die(var_dump(key($column))." <br>".var_dump($column[key($column)])); # DEBUG breakpoint                                                        // column name : value
          return $this->con_object->select($this->model,array(key($column),$column[key($column)]));
        }
        else
        {
          echo "Supplied column doesn't appear to exist in the declared table.";
          return False;
        }
      }
    }
  }
}
