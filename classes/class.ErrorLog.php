<?php

class ErrorLog extends Log
{

    //-------------------------------------------------------------
    // Private 
    //------------------------------------------------------------- 
    private static $CONSTfileName = "error.log";  
       
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
