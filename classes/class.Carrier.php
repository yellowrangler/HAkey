<?php

class Carrier
{
    
    //-------------------------------------------------------------
    // Private 
    //-------------------------------------------------------------
    private $name; 
    private $tag;   
    private $address;    
 

    private function setName($name)
    {
        $this->name = $name;
    }
    
    private function setTag($tag)
    {
        $this->tag = $tag;
    }
       
    private function setAddress($address)
    {
        $this->address = $address;
    }
   
    
    //-------------------------------------------------------------
    // Public 
    //-------------------------------------------------------------
    
    // Constructor    
    public function Carrier ($name, $tag, $address)
    {
        $this->setName($name);
        $this->setTag($tag);
        $this->setAddress($address);
    }
    
    
    public function getName()
    {
        return($this->name);
    }
    
    public function getTag()
    {
         return($this->tag);
    }
       
    public function getAddress()
    {
         return($this->address);
    }
    
}  // end of class

?>
