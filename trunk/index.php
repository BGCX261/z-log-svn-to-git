<?php
//////////////////////////////////////////////////////////////////////////////
// --- Main index page for for T-Log
///////////////////////////////////////////////////////////////////////////////
// Copyright (C) 2008 by Sergey Agarkov (ZoRg)
// E-Mail: zorgsoft@gmail.com
// WEB: http://mydiary.net.ru
// ICQ: 6371025
///////////////////////////////////////////////////////////////////////////////

require_once ("./configs/config.php");
require_once ("./classes/config_class.php");
require_once ("./classes/user_class.php");
require_once ("./classes/message_class.php");
// For "Smarty" include
require (SMARTY_DIR."Smarty.class.php");
	
// Create new Smarty
$smarty = new Smarty;
// Check for template Errors in Smarty
$smarty->compile_check = true;

// Load Config from DB
$get_config = new class_Config;
$configData = $get_config->getCongigData ();

// Assign T-Log Version
$smarty->assign("Ver", "0.01a");
// Set title and subtitle for T-Log
$smarty->assign("Title", $configData->title);
$smarty->assign("Subtitle", $configData->subTitle);


// Get messages from Base
$get_messages = new class_Messages;
$messagesCount = $get_messages->getMessagesCount();
if (isset($_GET['page'])) $page=($_GET['page']-1); else $page=0;
$start=abs($page*$configData->maxShowPosts);
$messages = $get_messages->getMessages ($start, 0, $configData->maxShowPosts);

// Assign messages to Smarty template
$smarty->assign ('messages', $messages);

// Pages
$t_pages = ceil($messagesCount/$configData->maxShowPosts);
$pagesText = '';
for ($tstep=1; $tstep<=$t_pages; $tstep++) {
  if ($tstep-1 == $page) {
    $pagesText.= "<strong>[".$tstep."]</strong> ";
  } else {
    $pagesText.= '<a href="'.$_SERVER['PHP_SELF'].'?page='.$tstep.'">'.$tstep."</a> ";
  }
}
$smarty->assign("Pages", $pagesText);

// Show page
$userEcho = new class_User();
$userEcho2 = $userEcho->authUser("admin", "amaga911");
echo (int)$userEcho2;

$smarty->display('index.tpl');
?>

</body>
</html>
