<?php

class securityKey
{
    //-------------------------------------------------------------
    // Private 
    //------------------------------------------------------------- 
    private $UserName ;
    private $UserID;
    private $Password;
    private $FullName;
    private $Authorizations;
    private $sessionKey;
    
    private static $CONSTnotLoggedInUser = "Guest";
    private static $CONSTnotLoggedInAuthKey = "Public";
    

      
    private function setUserName($UserName)
    {
        $this->UserName = $UserName;
    }
    
    private function setUserID($UserID)
    {
        $this->UserID = $UserID;
    }
    
    private function setPassword($Password)
    {
        $this->Password = $Password;
    }
    
    private function setFullName($FullName)
    {
        $this->FullName = $FullName;
    }
    
    private function setAuthorizations($Authorizations)
    {
        $this->Authorizations = $Authorizations;
    }
    
    private function setSessionKey()
    {
        $this->sessionKey =  new SessionsSecurity();
    }
   
    private function SaveSessionKey($dataArray)
    {
        $this->sessionKey->saveSessionData($dataArray);    
    }

    private function clearSessionKeyVariables()
    {
        $this->setUserName(self::$CONSTnotLoggedInUser);
        $this->setUserID(0);
        $this->setPassword(NULL); 
        $this->setFullName(self::$CONSTnotLoggedInUser);
        
        $temp[0] = self::$CONSTnotLoggedInAuthKey;
        $this->setAuthorizations($temp);
    }
    //-------------------------------------------------------------
    // Protected 
    //-------------------------------------------------------------


    
    //-------------------------------------------------------------
    // Public 
    //-------------------------------------------------------------
    
    // Constructor    
    public function __construct()
    {
        
        $this->setSessionKey();
        
        $sk = $this->GetSessionKey();
        
        $result = $sk->getSessionData();
        
        if (($result == NULL) || (empty($result)) )
        {
            $this->clearSessionKeyVariables();
        }
        else
        {
            $this->setUserName(array_shift($result));
            $this->setUserID(array_shift($result));
            $this->setPassword(array_shift($result)); 
            $this->setFullName(array_shift($result));
            $this->setAuthorizations($result);
        }
    }
    
    public function BuildKey ($UserName, $UserID, $Password, $FullName, $Authorizations)
    {
        $this->setUserName($UserName);
        $this->setUserID($UserID);
        $this->setPassword($Password);     
        $this->setFullName($FullName);
        $this->setAuthorizations($Authorizations);
        
        $dataArray [0] = $UserName;
        $dataArray [1] = $UserID;
        $dataArray [2] = $Password;
        $dataArray [3] = $FullName;
        
        $k = 4;
        for ($i = 0; $i < count($Authorizations); $i++)
        {
            $dataArray [$k++] = $Authorizations[$i];        
        }
        
        $this->SaveSessionKey($dataArray);
    }
    
    public function IsUserLoggedIn()
    {
        $result = $this->sessionKey->getSessionData();
        if ( ($result == NULL) || empty($result) )
        {
            return false;
        }
        else
        {
            $username = $this->GetUserName();
            if ($username == self::$CONSTnotLoggedInUser)
            {
                return false;
            }
            else
            {
                return true;
            }
        }
    }
    
    public function IsUserAuthorized($authKey)
    {
        $authorizations = $this->GetAuthorizations();
        
        if (in_array($authKey, $authorizations)) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function GetUserName()
    {
         return $this->UserName;
    }
    
    public function GetFullName()
    {
         return $this->FullName;
    }

    public function GetAuthorizations()
    {
         return $this->Authorizations;
    }    
    
    public function GetSessionKey()
    {
         return $this->sessionKey;
    }

    public function ClearLogin()
    {
         $this->sessionKey->deleteSessionData();
         
         $this->clearSessionKeyVariables();
    }

}

?>
