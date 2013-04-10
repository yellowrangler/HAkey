<?php

class musicDBinit extends DBinit
{
    
    //-------------------------------------------------------------
    // Private 
    //------------------------------------------------------------- 
    private static $CONSTdatabase = "musicdb";
 
       
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
