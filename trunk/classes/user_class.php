<?php
///////////////////////////////////////////////////////////////////////////////
// --- Classes for work with users in SQLite Base for T-Log
///////////////////////////////////////////////////////////////////////////////
// Copyright (C) 2008 by Sergey Agarkov (ZoRg)
// E-Mail: zorgsoft@gmail.com
// WEB: http://mydiary.net.ru
// ICQ: 6371025
///////////////////////////////////////////////////////////////////////////////

class class_User {
    private $dbName = CONST_DBNAME;
    private $dbLogin = CONST_DBLOGIN;
    private $dbPass = CONST_DBLOGIN;

   function getUser ($selectorName, $selectorData) {
        try {
            $db = new PDO ("sqlite:". $this->dbName, $this->dbLogin, $this->dbPass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $errorExcept) {
            die ("Error with Database: ". $errorExcept);
        }
        
        $result = $db->query ("SELECT * FROM users WHERE ".$selectorName."='".$selectorData."'");
        while ($row = $result->fetchObject()) {
            return $row;
        }
    }
    
    function authUser ($userName, $userPass) {
        $userName       = strip_tags ($userName);
        $userPass       = strip_tags ($userPass);
        $userDataRec    = new class_User();
        $userData       = $userDataRec->getUser ("login", strtolower($userName));
        $passHash       = md5($userPass);
        $passDbHash     = $userData->password;
        $authOk         = false;
        if ($passHash!=$passDbHash) {
            $authOk = false;
        } else {
            $authOk = true;
        }
        return $authOk;
    }

}
?>