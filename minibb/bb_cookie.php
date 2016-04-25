<?php
/*
This file is part of miniBB. miniBB is free discussion forums/message board software, without any warranty. 
Check COPYING file for more details.
Copyright (C) 2005-2008 Paul Puzyrev, Sergei Larionov. www.minibb.net
Copyright (C) 2015 Paul Puzyrev. www.minibb.com
Latest File Update: 2015-Sep-29
*/
session_start();

if (!defined('INCLUDED776')) die ('Fatal error.');

$cookieexptime=time()+$cookie_expires;

function user_logged_in() {

$c=array('', '');

if(isset($GLOBALS['cook']) and trim($GLOBALS['cook'])!='') {
$c=explode('|',$GLOBALS['cook']);
if($row=db_simpleSelect(0, $GLOBALS['Tu'], $GLOBALS['dbUserId'], $GLOBALS['dbUserSheme']['username'][1], '=', $c[0], 1)){
$c=array($c[0], $row[0]);
}
}
else $c=getMyCookie();

$username=$c[0];

if($username=='') { $returned=FALSE; return; }

$GLOBALS['user_usr']=$username;

if(isset($GLOBALS['loginsCase']) and $GLOBALS['loginsCase']) { $caseComp1=$GLOBALS['caseComp'].'('; $caseComp2=')'; $usernameSql=strtolower($username); } else { $caseComp1=''; $caseComp2=''; $usernameSql=$username; }

if($row=db_simpleSelect(0,$GLOBALS['Tu'],$GLOBALS['dbUserId'].','. $GLOBALS['dbUserSheme']['user_sorttopics'][1].','. $GLOBALS['dbUserSheme']['language'][1].','. $GLOBALS['dbUserAct'] .','. $GLOBALS['dbUserSheme']['user_password'][1] .', '.$GLOBALS['dbUserSheme']['username'][1].', '.$GLOBALS['dbUserSheme']['num_posts'][1],$caseComp1.$GLOBALS['dbUserSheme']['username'][1].$caseComp2,'=',$usernameSql,'',1)){

if($row[0]==$c[1]){
$returned=TRUE;
$GLOBALS['user_id']=$row[0];
$GLOBALS['user_sort']=$row[1];
if($row[0]==1) {
$GLOBALS['logged_admin']=1;
$GLOBALS['logged_user']=0;
}
else {
$GLOBALS['logged_admin']=0;
$GLOBALS['logged_user']=1;
}
$GLOBALS['langu']=$row[2];
$GLOBALS['user_activity']=$row[3];
$username=$row[5];
$GLOBALS['user_num_posts']=$row[6];

}
else{
/* Preventing hijack */
$username='';
$GLOBALS['user_usr']=$username;
$returned=FALSE;
}

}

else{
$returned=FALSE;
}

return $returned;
}

function setMyCookie($userName,$userPass,$userExpTime,$encodePass=TRUE){

if($row=db_simpleSelect(0, $GLOBALS['Tu'], $GLOBALS['dbUserId'], $GLOBALS['dbUserSheme']['username'][1], '=', $userName, 1)){
$_SESSION['user']=$userName;
$_SESSION['ID']=$row[0];
$_SESSION['status'] = '';
$_SESSION['membership'] = '';
$_SESSION['membershipDemand'] = '';
$_SESSION['password'] = $userPass;
}

}

function getMyCookie(){
if(isset($_SESSION['user']) and isset($_SESSION['ID'])) {
$cookievalue=array($_SESSION['user'], $_SESSION['ID']);
}
else $cookievalue=array('','');
return $cookievalue;
}

function deleteMyCookie(){
session_unset ();
}

function writeUserPwd($pwd){
return $pwd;
}

?>