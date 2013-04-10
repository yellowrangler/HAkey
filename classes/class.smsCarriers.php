<?php

class smsCarriers
{
    
    //-------------------------------------------------------------
    // Private 
    //-------------------------------------------------------------
    private static $carrier;
    private static $CarrierTable;
    
    private $currentCarrier;
    private $tmpInstance;
    
     
    private function addCarrier2Table($name, $tag, $address)
    {
        self::$carrier = new Carrier($name, $tag, $address);
         
        array_push(self::$CarrierTable, self::$carrier);
    }
    
      
    private function buildCarrierTable()
    {        
        
        self::$CarrierTable = (array) null;
        
        //
        // carrier table
        //
        $this->addCarrier2Table("Verizon", "verizon", "vtext.com");
        $this->addCarrier2Table("T-Mobile" ,"tmobile", "tomomail.net");
        $this->addCarrier2Table("Sprint", "sprint", "messaging.sprintpcs.com");
        $this->addCarrier2Table("AT&amp;T", "att", "txt.att.net");
        $this->addCarrier2Table("Virgin Mobile", "virgin", "vmobl.com");
        $this->addCarrier2Table("Alltel", "alltel", "message.alltel.com");
        $this->addCarrier2Table("Boost Mobile", "boostmobile", "myboostmobile.com");
        $this->addCarrier2Table("Centennial Wireless", "centennialwireless", "myblue.com");
        $this->addCarrier2Table("Einstein PCS", "einsteinpcs", "einsteinmms.com");
        $this->addCarrier2Table("Nextel", "nextel", "messaging.nextel.com");
        $this->addCarrier2Table("US Cellular", "uscellular", "mms.uscc.net");
        
        reset(self::$CarrierTable);

     }
    
    private function getCarrier()
    {
        return current(self::$CarrierTable);
    }
    
    private function getFirst()
    {
        return reset(self::$CarrierTable);
    }
    
   
    private function getNext()
    {
        return next(self::$CarrierTable);
    }
    
    
    public function getPrev()
    {
        return prev(self::$CarrierTable);
    }
    
    //-------------------------------------------------------------
    // Public 
    //-------------------------------------------------------------
    
    // Constructor    
    public function smsCarriers()
    {
        $this->buildCarrierTable();    
    }
    
    //
    // get current
    //
    public function getCurrentName()
    {
        $this->currentCarrier = $this->getCarrier();
        
        return $this->currentCarrier->getName();
    }
    
    public function getCurrentAddress()
    {
        $this->currentCarrier = $this->getCarrier();
        
        return $this->currentCarrier->getAddress();
    }
    
    public function getCurrentTag()
    {
         $this->currentCarrier = $this->getCarrier();
        
        return $this->currentCarrier->getTag();
    }
      
    //
    // get next
    //
    public function getNextName()
    {
        if ($this->getNext())
        {
            return $this->getCurrentName();
        }
        else
        {
            return NULL;
        }
    }
    
    public function getNextAddress()
    {
        if ($this->getNext())
        {
            return $this->getCurrentAddress ();
        }
        else
        {
            return NULL;
        }
    }
    
    public function getNextTag()
    {
        if ($this->getNext())
        {
            return $this->getCurrentTag();
        }
        else
        {
            return NULL;
        }
    }
 
    //
    // get previous
    //
    public function getPrevName()
    {
        if ($this->getPrev())
        {
            return $this->getCurrentName();
        }
        else
        {
            return NULL;
        }
    }
    
    public function getPrevAddress()
    {
        if ($this->getPrev())
        {
            return $this->getCurrentAddress();
        }
        else
        {
            return NULL;
        }
    }
    
    public function getPrevTag()
    {
        if ($this->getPrev())
        {
            return $this->getCurrentTag();
        }
        else
        {
            return NULL;
        }
    }
    
    //
    // get address from tag
    //
    public function getAddressfromTag ($tag)
    {
        $this->getFirst();
        
        do {
            if ($tag == $this->getCurrentTag())
            {
                return $this->getCurrentAddress();
                
                break;
            }
          
        } while ($this->getNextTag());
        
        return NULL;
    }
}
?>
