<?php 
    class Controlli extends Mysql
    {

        public static function Vuoti() 
        {
            foreach($_POST as $v) 
            {
                if(!$v)
                return true;
            }
            return false;
        } 

        public static function ChkMail($string) 
        {
            if(filter_var($string,FILTER_VALIDATE_EMAIL)) 
            return true; 

            return false;
        }  

        public static function MinChars($string,$num)  
        {
            if(strlen($string)<$num)
            return false; 

            return true;
        }

         

        public function Doppione($tab,$field,$val) 
        {
            $q = "SELECT * FROM $tab WHERE $field='$val'";  

            $esegui = $this->handle->query($q); 

            if($esegui->rowCount() != 0)
            return true; 
            return false;
        }



    }
?>