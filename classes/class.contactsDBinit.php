<?php

class contactsDBinit extends DBinit
{
    
    //-------------------------------------------------------------
    // Private 
    //------------------------------------------------------------- 
    private static $CONSTdatabase = "contactsdb";
 
       
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
