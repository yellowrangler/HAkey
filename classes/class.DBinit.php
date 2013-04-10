<?php

class DBinit
{
    
    //-------------------------------------------------------------
    // Private 
    //------------------------------------------------------------- 
    private $DBhost;
    private $DBuser;
    private $DBpassword;
    private $log;
    private $sqlerr;
    private $Database;
    
    
    private function setDBhost($DBhost)
    {
        $this->DBhost = $DBhost;
    }
    
    private function setDBuser($DBuser)
    {
        $this->DBuser = $DBuser;
    }
       
    private function setDBpassword($DBpassword)
    {
        $this->DBpassword = $DBpassword;
    }
    
    private function setDatabase($database)
    {
        // open connection to host
        $this->DBconn = mysql_connect($this->DBhost, $this->DBuser, $this->DBpassword);
        if (!$this->DBconn) 
        {
            $this->log = new ErrorLog();
            $this->sqlerr = mysql_error();
            $this->log->writeLog("DB error: $this->sqlerr - Error doing mysql_connect to $database");
        }

        // pick the database to use
        if (!mysql_select_db($database, $this->DBconn)) 
        {
            $this->log = new ErrorLog();
            $this->sqlerr = mysql_error();
            $this->log->writeLog("DB error: $this->sqlerr - Error doing mysql_select_db to $database");
        }	
        
        $this->Database = $database;
    }
    
    //-------------------------------------------------------------
    // Public 
    //-------------------------------------------------------------
    public $DBconn;
        
    // Constructor    
    public function __construct ($database)
    {
        global $HOMElocation;
        
        //----------------------------------------------------------------------------------------------------------
        // Define special globals
        //----------------------------------------------------------------------------------------------------------
        switch($HOMElocation)
        {
            //----------------------------------------------------------------------------------------------------------
            // Define MySQL db
            //----------------------------------------------------------------------------------------------------------
            case "Home":
                $this->DBhost = "turksandcaicos";
                $this->DBuser = "root";
                $this->DBpassword = "tarryc";
                break;
                
            case "iPage";
                //----------------------------------------------------------------------------------------------------------
                // Define MySQL db
                //----------------------------------------------------------------------------------------------------------
                $this->DBhost = "yellowranglercom.ipagemysql.com";
                $this->DBuser = "tarryc";
                $this->DBpassword = "tarryc";
                break;       
        }  // end of switch

        $this->setDatabase($database);
    }
      
    public function getDBhost()
    {
        return $this->DBhost;
    }
    
    public function getDBuser()
    {
         return $this->DBuser;
    }
       
    public function getDBpassword()
    {
         return $this->DBpassword;
    }
    
    public function getDatabase()
    {
         return $this->Database;
    }
    
    public function getDBconn()
    {
         return $this->DBconn;
    }
    
}  // end of class

?>
