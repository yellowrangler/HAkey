<?php

class Sessions
{
    //-------------------------------------------------------------
    // Private 
    //------------------------------------------------------------- 
    private $sessionLog ;
    private $sessionTimout;
    private $sessionSeperator;
    private $sessionID;
    private $sessionsTbl;
    private $sessionName;

      
    private function setSessionId()
    { 
        if (session_id() == "") session_start(); 
        
        $this->sessionID = session_id(); 
    }
    
    private function setSessionName($name)
    { 
        $this->sessionName = $name;
    }
    
    private function setSessionTimout($timeout)
    { 
        $this->sessionTimout = $timeout;
    }
    
    private function setSessionLog($log)
    { 
        $this->sessionLog = $log;
    }
    
    private function setSessionSeperator($seperator)
    { 
        $this->sessionSeperator = $seperator;
    }
    
    private function getSessionTableData($name, $id)
    { 
        //
        // insert session information into sessionstbl
        //
        $sql = "SELECT * from sessionstbl 
                    where phpsessionid = '$id' 
                    and sessiondatatype = '$name'";
    
                    
        if (!$sqlReturnBuffer = mysql_query($sql, $this->sessionsTbl->DBconn))
        {
            $log = new ErrorLog();
            $sqlerr = mysql_error();
            $log->writeLog("SQL error: $sqlerr - Error doing mysql_select_db to $this->sessionsTbl->getDatabase()");
            $log->writeLog("SQL: $sql");
            
            return NULL;
        }
        
        $sqlRows = mysql_num_rows($sqlReturnBuffer);
        if ($sqlRows >  1) 
        {
            $log = new ErrorLog();
            $sqlerr = mysql_error();
            $log->writeLog("Logic error: Error doing mysql_select_db to $this->sessionsTbl->getDatabase()");
            $log->writeLog("MSG: Too many rows returned on session id sessionID ='$id' rows = '$sqlRows'");
            
            return NULL;
        }
        else if ($sqlRows ==  0)
        {
           return NULL;
        }
        
        return mysql_fetch_assoc($sqlReturnBuffer);

    }
    

    private function SessionExpired($date)
    { 
        //
        //get datetime from mysql and check if > 24hrs. If so return error
        //
        $phpdateNOW = strtotime("now");
        $phpdate = strtotime( $date );
        
        $timediff = $phpdateNOW - $phpdate;
        if ($timediff >= $this->sessionTimout)
        {
            return 1;
        }
        
        return NULL;
    }
    
    private function saveSessionTableData($id, $name, $data)
    {
        //
        //get datetime from php and then format it for mysql
        //
        $phpdate = strtotime("now");
        $mysqldate = date( 'Y-m-d H:i:s', $phpdate);
        
        //
        // insert session information into sessionstbl
        //
    
        $sql = "INSERT INTO sessionstbl (phpsessionid, sessiondatatype, sessiondata, sessiondatetime)  
                    VALUES ('$id', '$name', '$data', '$mysqldate')";
    
        if (!$sqlReturnBuffer = mysql_query($sql, $this->sessionsTbl->DBconn))
        {
            $log = new ErrorLog();
            $sqlerr = mysql_error();
            $log->writeLog("SQL error: $sqlerr - Error doing insert to $this->sessionsTbl->getDatabase()");
            $log->writeLog("SQL: $sql");
            
            return NULL;
        }            
        
        return 1;
        
    }
    
    private function setSessionValues($name)
    { 
        $this->setSessionName($name);
        $this->setSessionTimout(86400);
        $this->setSessionLog("Y");
        $this->setSessionSeperator("\n");
    }
    
    private function clearSessionData($name, $id)
    {
        //
        // build sql to delete session data 
        //
        $sql = "DELETE from sessionstbl where phpsessionid = '$id' and sessiondatatype = '$name' ";
        if (!$sqlReturnBuffer = mysql_query($sql, $this->sessionsTbl->DBconn))
        {
            $log = new ErrorLog();
            $sqlerr = mysql_error();
            $log->writeLog("SQL error: $sqlerr - Error doing delete to $this->sessionsTbl->getDatabase()");
            $log->writeLog("SQL: $sql");
            
            return NULL;
        }
    
        return 1;
        
    }
    
    private function GC()
    { 
        
        //
        //Log garbage collection
        //
        $log = new AccessLog();
       
        $log->writeLog("Garbage collection started for session data");      

        $sessionNbr = 0;
        
        //
        // select session information from sessionstbl
        //
        $sql = "SELECT * from sessionstbl";
    
        if (!$sqlReturnBuffer = mysql_query($sql, $this->sessionsTbl->DBconn))
        {
            $log = new ErrorLog();
            $sqlerr = mysql_error();
            $log->writeLog("SQL error: $sqlerr - GC Error doing search on $this->sessionsTbl->getDatabase()");
            $log->writeLog("SQL: $sql");
            
            return NULL;
        } 
                
        $sqlRows = mysql_num_rows($sqlReturnBuffer);
        if ($sqlRows >  0) 
        {	
            while ($sqlResults = mysql_fetch_assoc($sqlReturnBuffer))
            {
                $date =  $sqlResults['sessiondatetime'];
                $sessionName =  $sqlResults['sessiondatatype'];
                $sessionData =  $sqlResults['sessiondata'];
                $sessionID =  $sqlResults['phpsessionid'];
                
                
                If ($this->SessionExpired($date))
                {
                    $this->clearSessionData($sessionName, $sessionID);
                    
                    $sessionNbr++;
                }
              
            } // end of while
                    
        } // end of if
     
        $log->writeLog("Garbage collection finished for session data - Items removed = '$sessionNbr'");         
            
    } 
    
    //-------------------------------------------------------------
    // Protected 
    //-------------------------------------------------------------

    
    
    //-------------------------------------------------------------
    // Public 
    //-------------------------------------------------------------
    
    
    // Constructor    
    public function __construct ($name)
    {
        $this->sessionsTbl = new sessionsDBinit();
         
        $this->setSessionId();
        $this->setSessionValues($name);
    }
    
    public function getSessionData()
    { 
        $sqlResult = $this->getSessionTableData($this->sessionName, $this->sessionID);
        
        If ($this->SessionExpired($sqlResult['sessiondatetime']))
        {
            $this->clearSessionData($this->sessionName, $this->sessionID);
            
            return NULL;
        }
        
        //
        // take raw session data  and explode into array.
        //
        $sessionData = explode($this->sessionSeperator, $sqlResult['sessiondata']);

        return $sessionData;
    }
    
    public function saveSessionData($data)
    { 
        //
        // first delete all old data for this session
        //
        $this->clearSessionData($this->sessionName, $this->sessionID);
              
        //
        // take array of data and implode into single flat field seperated by session token seperators
        //
        $sessionData = implode($this->sessionSeperator, $data);
   
        //
        // save session data to table
        //
        $this->saveSessionTableData($this->sessionID, $this->sessionName, $sessionData);
     }
    
    public function deleteSessionData()
    {
        //
        // delete all old data for this session
        //
        $this->clearSessionData($this->sessionName, $this->sessionID);
        
    }
    
}

?>
