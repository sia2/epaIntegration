<?php
if (!defined('INCLUDED776')) die ('Fatal error.');

if($user_id!=1) {
//disable menu item from the top menu
$l_menuStats='';
}
else $l_menuStats="<a href=\"{$main_url}/{$indexphp}action=stats\">{$l_menu[3]}</a> {$l_sepr} ";
if($user_id!=1 and $action=='stats') {
//redirect to the main website, if someone except admin tries to view that page
header("Location: {$main_url}/{$startIndex}");
exit;
}

/* Avatars addon */

if($action=='vthread') {
include($pathToFiles.'addon_avatar_options.php');
$fName=$pathToFiles.'lang/avatars_'.$lang.'.php';
if(file_exists($fName)) include($fName); else include($pathToFiles.'lang/avatars_eng.php');
if($staticAvatarSize) $avatarDim=' style="width:'.$maxAvatarWidth.'px;height:'.$maxAvatarHeight.'px"';
}

if($action=='userinfo' or ($GLOBALS['enableProfileUpdate'] and ($action=='prefs' or $action=='editprefs' or $action=='avatarupload1' or $action=='avatarupload2' or $action=='avatardelete' or $action=='avatarchoose1' or $action=='avatarchoose2')) OR ($action=='removeuser' and isset($_POST['step']) and $_POST['step']=='remove') OR (defined('ADMIN_PANEL') and $action=='searchusers2' and isset($_POST['delus'])) OR $action=='delAvatarAdmin') include($pathToFiles.'addon_avatar.php');

if($action=='vthread' and ($user_id==1 or $isMod==1)) {
$delAvatarJs=<<<out
function confirmDeleteAvatar(user, addstr){
var csrfcookie=getCSRFCookie();
if(csrfcookie!='') csrfcookie='&csrfchk='+csrfcookie;
if(confirm('{$l_deleteAvatar}?')) document.location='{$main_url}/{$indexphp}action=delAvatarAdmin&user='+ user + addstr + csrfcookie;
else return;
}
out;
}

function parseUserInfo_user_custom1($av){
if(!isset($GLOBALS['cols'][0])) {
$GLOBALS['cols'][0]=$GLOBALS['user'];
$addStr='';
}
else{
$addStr="&amp;forum={$GLOBALS['forum']}&amp;topic={$GLOBALS['topic']}&amp;page={$GLOBALS['page']}";
}
if(isset($GLOBALS['avatarDim'])) $avatarDim=$GLOBALS['avatarDim']; else $avatarDim='';

if( ($GLOBALS['user_id']==1 or $GLOBALS['isMod']==1) and $av!='' and $GLOBALS['action']=='vthread') {
$a1="<a href=\"JavaScript:confirmDeleteAvatar({$GLOBALS['cols'][0]},'{$addStr}');\" onmouseover=\"window.status=''; return true;\" onmouseout=\"window.status=''; return true;\">";
$a2='</a>';
$alt=$GLOBALS['l_deleteAvatar'];
}
else { $a1=''; $a2=''; $alt=''; }

if($av!='' and substr_count($av, '.')>0) $im="{$a1}<img src=\"{$GLOBALS['main_url']}/img/forum_avatars/{$av}\" alt=\"{$alt}\" title=\"{$alt}\"{$avatarDim} />{$a2}";
elseif($av!='' and strlen($av)==3) $im="{$a1}<img src=\"{$GLOBALS['avatarUrl']}/{$GLOBALS['cols'][0]}.{$av}\" alt=\"{$alt}\" title=\"{$alt}\"{$avatarDim} />{$a2}";
else $im='';

if($GLOBALS['action']=='vthread' and $im!='') $im='<br />'.$im;

return $im;
}


/* Hiding logging form from anonymous users */
if($forum!=0 and $user_id==0 and ($action=='vtopic' OR $action=='vthread')) $roForums[]=$forum;
/* --Hiding logging form from anonymous users */



/*--Avatars addon */
/* Registration Disclaimer */
if(($action=='registernew' or $action=='register') and !isset($_COOKIE[$cookiename.'_disclaimer']) and !isset($_POST['disclaimer'])){
$title.='Disclaimer';
echo load_header(); echo ParseTpl(makeUp('disclaimer'));
$action='undefined2012';
return;
}
elseif(($action=='registernew' or $action=='register') and isset($_POST['disclaimer'])){
setcookie($cookiename.'_disclaimer', '1', 0, $cookiepath, $cookiedomain, $cookiesecure, TRUE);
header("{$rheader}{$main_url}/{$indexphp}action={$action}"); exit;
}
/* --Registration Disclaimer */

/* Merge topics */
if($action=='vthread' or $action=='merge') include($pathToFiles.'addon_mergetopics.php');
/* --Merge topics */

/* Custom user profile functions */
if($action=='userinfo'){

function parseUserInfo_user_regdate($val){
return '';
}

function parseUserInfo_email($val){
if ($GLOBALS['row'][3]!=1) return $GLOBALS['usEmail']; elseif($GLOBALS['user_id']>0) return '<a href="mailto:'.$val.'">'.$val.'</a>'; else return '';
}

}
/* --Custom user profile functions */

/* Restricting from editing a profile on forums */
if(($action=='prefs' or $action=='editprefs') and (isset($_GET['adminUser']) or isset($_POST['adminUser']))){
die('This operation is not available in your synchronized forums version. Please use default tools for modifying users profile from the main website.');
}
/* --Restricting from editing a profile on forums */
?>