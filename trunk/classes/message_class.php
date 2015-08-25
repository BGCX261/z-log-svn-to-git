<?php
///////////////////////////////////////////////////////////////////////////////
// --- Classes for work with messages in SQLite Base for T-Log
///////////////////////////////////////////////////////////////////////////////
// Copyright (C) 2008 by Sergey Agarkov (ZoRg)
// E-Mail: zorgsoft@gmail.com
// WEB: http://mydiary.net.ru
// ICQ: 6371025
///////////////////////////////////////////////////////////////////////////////

class class_Messages {
        private $dbName = CONST_DBNAME;
        private $dbLogin = CONST_DBLOGIN;
        private $dbPass = CONST_DBLOGIN;
   
    function getMessagesCount() {
        try {
            $db = new PDO ("sqlite:". $this->dbName, $this->dbLogin, $this->dbPass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $errorExcept) {
            die ("Error with Database: ". $errorExcept);
        }
            
            $result = $db->query ("SELECT * FROM messages ORDER BY id DESC LIMIT 1");
            while ($row = $result->fetchObject()) {
                return $row->id;
            }
            
            
        
    }

    // Get Message(s) where:
    //  $fromMessageId - start from message ID, if 0 then get $maxMessages from last
    //  $messageType - from 1-7, if 0 then All message types
    //  $maxMessages - number to get messages
    function getMessages ($fromMessageId = 0, $messageType = 0, $maxMessags = 1) {
        $msgType = $messageType;
        if ($msgType!=0) {
            $msgType = "WHERE type='".$msgType."'";
        } else {
            $msgType = "";
        }
        
        try {
            $db = new PDO ("sqlite:". $this->dbName, $this->dbLogin, $this->dbPass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $errorExcept) {
            die ("Error with Database: ". $errorExcept);
        }
        
        $result = null;
//        if ($fromMessageId>0) {
//            $range_sql = "WHERE id>=".$fromMessageId." AND id<".($fromMessageId+$maxMessags)." ";
//        } else {
//            $range_sql = "";
//        }
//        $result = $db->query ("SELECT * FROM messages ".$range_sql.$msgType." ORDER BY date DESC LIMIT ".$maxMessags);
        $result = $db->query ("SELECT * FROM messages ORDER BY date DESC LIMIT ".$fromMessageId.",".$maxMessags);
        $messagesData = array();
        $aid=0;
        while ($row = $result->fetchObject()) {
            $messagesData[$aid] = $row;
            $user = new class_User();
            $userFullName = $user->getUser('id', $messagesData[$aid]->user_id);
            $messagesData[$aid]->userFullName = $userFullName->login;
            $aid++;
        }
        return $messagesData;
        
    }
}
?>