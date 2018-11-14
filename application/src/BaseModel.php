<?php

function match_return($v_arr,$user_input)
{
  foreach ($v_arr as $v_name => $v_value)
  {
    if($v_name == $user_input)
    {
      return $v_name; # To be used when each v is also an array or you plan to use it in some way.
    }
    else
    {
      die("Provided input could not be found in the tables declarations list![match_return]");
    }
  }
}

function v_matching($v_arr,$user_input)
{
  foreach ($v_arr as $k => $v)
  {
    if($k == $user_input)
    {
      return True;
    }
    else
    {
      die("Provided input could not be found in the tables declarations list![v_matching] Your input was $user_input.");
    }
  }
}

class BaseModel
{
  protected $cfg;
  protected $pdo;
  public function __construct()
  {
    try {
      $this->cfg = json_decode(file_get_contents(dirname(__DIR__)."/db_config.json"));
    } catch (\Exception $e) {
      echo "Failed to open db config file.<\ br>";
      $e->getMessage();
    }
  }
  public function init()
  {
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
  public function select($table,$q=NULL)
  {
    switch($this->cfg->connection->driver)
    {
      case 'mysql':
        if($q!=null)
        {
          if(is_array($q) && v_matching($this->cfg->tables,$table) == True && v_matching(match_return($this->cfg->tables,$table),$q[0]) == True)
          { # The above checks if all args are mapped in the config json file.
            try
            {

                $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $q[0] = ?");
                $stmt->execute($q[1]);
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
#// DEBUG:
$bugsquasher = new BaseModel;
$bugsquasher->init();
$bugsquasher->select("mycrud",array("title","First"));
 ?>
