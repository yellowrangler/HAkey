<?php

class userDBinit extends DBinit
{
    
    //-------------------------------------------------------------
    // Private 
    //------------------------------------------------------------- 
    private static $CONSTdatabase = "userdb";
 
       
    //-------------------------------------------------------------
    // Public 
    //-------------------------------------------------------------
    
    // Constructor    
    public function __construct ()
    {
        parent::__construct(self::$CONSTdatabase);
    }
    
}  // end of class

?>
