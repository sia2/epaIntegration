<?php
/*
This file is part of miniBB. miniBB is free discussion forums/message board software, without any warranty.
Check COPYING file for more details.
Copyright (C) 2014 Paul Puzyrev. www.minibb.com
Latest File Update: 2014-Sep-28
*/

$DB='mysqli';

$DBhost='localhost';
$DBname='bddepa';
$DBusr='root';
$DBpwd='';

$Tf='minibbtable_forums';
$Tp='minibbtable_posts';
$Tt='minibbtable_topics';
$Tu='connexion';
$Ts='minibbtable_send_mails';
$Tb='minibbtable_banned';

$admin_usr='admin';
$admin_pwd='dauphine';
$admin_email='admin@epa-forum.shost.ca';

$bb_admin='epa_admin.php?';

$indexphp='index.php?';

$cookiedomain='';
$cookiename='miniBBforums';
$cookiepath='';
$cookiesecure=FALSE;
$cookie_expires=108000;
$cookie_renew=1800;
$cookielang_exp=2592000;

$main_url='//localhost/projetEPA/groupe1/minibb';

$lang='fre';
$skin='old';
//$sitename=(isset($_SERVER['SERVER_NAME'])?$_SERVER['SERVER_NAME']:'').' Forum';
$sitename='Forum EPA';
$emailadmin=0;
$emailusers=0;
$userRegName='_A-Za-z0-9 ';
//$l_sepr='<span class="sepr">|</span>';
$l_sepr='';

$post_text_maxlength=10240;
$post_word_maxlength=85;
$topic_max_length=100;
$viewmaxtopic=30;
$viewlastdiscussions=20;
$viewmaxreplys=15;
$viewmaxsearch=20;
$viewpagelim=5000;
$viewTopicsIfOnlyOneForum=0;

$protectWholeForum=0;
$protectWholeForumPwd='pwd';

$postRange=5;

$dateOnlyFormat='j F Y';
$timeOnlyFormat='H:i';
$dateFormat=$dateOnlyFormat.' '.$timeOnlyFormat;



/* New options for miniBB 1.1 */

$disallowNames=array('Anonymous', 'Fuck', 'Shit', 'Guest');
$disallowNamesIndex=array('admin', 'guest'); // 2.0 RC1f

/* New options for miniBB 1.2 */
$sortingTopics=0;
$topStats=4;
$genEmailDisable=0;

/* New options for miniBB 1.3 */
$defDays=60;
$userUnlock=0;

/* New options for miniBB 1.5 */
$emailadmposts=0;
$useredit=31536000;

/* New options for miniBB 1.6 */
//$metaLocation='go';
//$closeRegister=1;
//$timeDiff=21600;

/* New options for miniBB 1.7 */
$stats_barWidthLim='31';

/* New options for miniBB 2.0 */

$dbUserSheme=array(
'username'=>array(1,'login','login'),
'user_password'=>array(2,'password',''),
'user_email'=>array(3,'email','email'),
'user_viewemail'=>array(6,'user_viewemail','user_viewemail'),
'user_sorttopics'=>array(7,'user_sorttopics','user_sorttopics'),
'language'=>array(8,'language','language'),
'num_topics'=>array(9,'num_topics',''),
'num_posts'=>array(10,'num_posts','')
);
$dbUserId='id_connexion';
$dbUserDate='user_regdate'; $dbUserDateKey=4;
$dbUserAct='activity';
$enableNewRegistrations=FALSE;
$enableProfileUpdate=TRUE;

$usersEditTopicTitle=FALSE;
$pathToFiles='./';
//$includeHeader='header.php';
//$includeFooter='footer.php';
$emptySubscribe=TRUE;
$allForumsReg=TRUE;
//$registerInactiveUsers=TRUE;
//$mod_rewrite=TRUE;
$enableViews=TRUE;
$userInfoInPosts=array('user_custom1');
$userDeleteMsgs=2;

$description='miniBB is a free complete PHP forum software, bulletin board, having very strong bulletin board idea beside. Modern free forums script is mostly too large, too cool, sometimes funny and cumbersome, written by freelancers. mini bb is free from these lacks due its clear concepts of the whole search engine friendly forums solution, also freelance avalaible. mysql is the default database for minibb. Open source bulletin board mostly\'s oriented to users; having a website design concept behind, small bulletin board becomes further leader in building, integrating and embedding forums into website. miniBB supports multilingual content, language packs, rss, postgresql, mssql, bad words, smilies, instant online modules, mod rewrite, SEO. By bulletin bird, we mean the easiest forums solution for a website, speed, simplicity. Whatever your community, discussion is related to, you can download our bulletin forum software and use it on your site! www.miniBB.net has all useful software downloads for anyone using our bulletin board PHP solution.';

$startIndex='index.php'; // or 'index.html' for mod_rewrite
$manualIndex='index.php?action=manual'; // or 'manual.html' for mod_rewrite

$enableGroupMsgDelete=TRUE;
$post_text_minlength=2;
$loginsCase=TRUE;

$allowHyperlinks=0;

$reply_to_email=$admin_email;

//$addMainTitle=1;

$startPageModern=FALSE;

?>