<?php
//////////////////////////////////////////////////////////////////////////////
// --- Classes for work with config in SQLite Base for T-Log
///////////////////////////////////////////////////////////////////////////////
// Copyright (C) 2008 by Sergey Agarkov (ZoRg)
// E-Mail: zorgsoft@gmail.com
// WEB: http://mydiary.net.ru
// ICQ: 6371025
///////////////////////////////////////////////////////////////////////////////

class class_Config {
        var $dbName = CONST_DBNAME;
        var $dbLogin = CONST_DBLOGIN;
        var $dbPass = CONST_DBLOGIN;

    function getCongigData () {
        // Only first configuration row used

        try {
            $db = new PDO ("sqlite:". $this->dbName, $this->dbLogin, $this->dbPass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $errorExcept) {
            die ("Error with Database: ". $errorExcept);
        }
        
        $query = $db->query ("SELECT * FROM config WHERE id=1");
        while ($row = $query->fetchObject()) {
            return $row;
        }

    }
}


?>