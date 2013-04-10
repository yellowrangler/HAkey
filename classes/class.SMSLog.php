<?php

class SMSLog extends Log
{
    
    //-------------------------------------------------------------
    // Global 
    //------------------------------------------------------------- 
    

    //-------------------------------------------------------------
    // Private 
    //------------------------------------------------------------- 
    private static $CONSTfileName = "smsaccess.log";  
       
    //-------------------------------------------------------------
    // Public 
    //-------------------------------------------------------------
    
    // Constructor    
    public function __construct ()
    {
        global $WWBlogDirectory;
        
        
        parent::__construct(self::$CONSTfileName, $WWBlogDirectory);
    }
    
}  // end of class

?>
