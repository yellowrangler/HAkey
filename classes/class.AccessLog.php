<?php

class AccessLog extends Log
{
    //-------------------------------------------------------------
    // Private 
    //------------------------------------------------------------- 
    private static $CONSTfileName = "access.log";  
       
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
