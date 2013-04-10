<?php

class smsSend
{
    
    //-------------------------------------------------------------
    // Private 
    //-------------------------------------------------------------
    private $from;
    private $to;    
    private $tag;
    private $message;
    private $subject;
    
    private $carrier;
    private $log;


    private function setTo($to)
    {
        $this->carrier = new smsCarriers();
        
        $this->to = $to."@".$this->carrier->getAddressfromTag($this->tag);
    }
    
     
    private function setFrom($from)
    { 
        $this->from = "From: $from";
    }
    
    private function setMessage($message)
    {
        $this->message = $message;
    }
    
    private function setTag($tag)
    {
        $this->tag = $tag;
    }
    
    private function setSubject($subject)
    {
        $this->subject = $subject;
    }
    
    private function logSMS()
    {
        $this->log = new SMSLog();
        
        $this->log->writeLog("SMS Message start");
        $this->log->writeLog("From : $this->from, to : $this->to");
        $this->log->writeLog("Carrier = $this->tag");
        $this->log->writeLog("Subject = $this->subject");
        $this->log->writeLog("Message = $this->message");
        $this->log->writeLog("SMS Message end");
    }
    
    //-------------------------------------------------------------
    // Public 
    //-------------------------------------------------------------
    
    // Constructor    
    public function __construct($tag, $to, $from, $message, $subject)
    {
        $this->setTag($tag);
        $this->setTo($to);
        $this->setFrom($from);
        $this->setMessage($message);    
        $this->setSubject($subject);  
    }
    
    //
    // send message
    //
    public function sendMessage()
    {
        mail("$this->to", "$this->subject", "$this->message", "$this->from"); 
        
        $this->logSMS();
    }
    
    
} // end of class
?>
