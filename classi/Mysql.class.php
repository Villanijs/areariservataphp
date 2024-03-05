<?php 
class Mysql 
{
    private $host; 
    private $user; 
    private $pass; 
    private $db;  

    protected $handle; 

    public function __construct($host,$user,$pass,$db)
    {
        $this->host = $host; 
        $this->user = $user; 
        $this->pass = $pass; 
        $this->db = $db; 


        $dns="mysql:host=".$host.";dbname=".$db;
        //Provo a creare l'istanza della classe PDO 
        try 
        {
            $this->handle = new PDO($dns,$user,$pass);
             echo "connessione stailita";
          // throw new PDOException("connessione errata");
        }
        catch(PDOException $e)
        {
            exit("Connessione non stabilita ".$e->getMessage());
        }
    } 


    //Inserimento 

    public function Scrivi($q,$arr) 
    {
        //$this->handle->query($q)
        //stato
     $stato =    $this->handle->prepare($q); 
    

     try
     {
          $stato->execute($arr);
          return true;
     } 
     catch(PDOException $e)
     {
        return false;
     }

    //  if($stato->rowCount() == 0 )
    //  return false; 

    //  return true;
    }  
//Fetch di una tabella
    public function SelectFetch($q) 
    {
        $leggi = $this->handle->query($q); 

        return $leggi->fetchAll();
    }
//fetch di un record da valore univoco----

    public function GetarrRecord($tab, $field,$val)
    {
        $q = "SELECT * FROM $tab WHERE $field='$val'"; 
        $leggi = $this->handle->query($q); 

      $arr =  $leggi->fetch(PDO::FETCH_ASSOC);

      return $arr;


    }  

    
}

?>