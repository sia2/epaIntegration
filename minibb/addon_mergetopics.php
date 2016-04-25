<?php
/*
addon_mergetopics.php : administration file for miniBB 2.
This file is part of miniBB. miniBB is free discussion forums/message board software, provided with no warranties.
Check COPYING file for more details.
Copyright (C) 2006-2010, 2015 Paul Puzyrev. www.minibb.com
Latest File Update: 2015-Dec-08
*/
if (!defined('INCLUDED776')) die ('Fatal error.');

if($user_id==1 or $isMod==1){

$fName=$pathToFiles.'lang/mergetopics_'.$lang.'.php';
if(file_exists($fName)) include($fName); else include($pathToFiles.'lang/mergetopics_eng.php');

if($action=='vthread'){
$mergeTopic="{$l_sepr} <a href=\"{$main_url}/{$indexphp}action=merge&amp;forum={$forum}&amp;topic={$topic}\" target=\"_blank\">{$l_mergeTopic}</a>";
}

else{

$tmpl='';
$warn=FALSE;

$title.=$l_mergeTopic;

if(isset($_POST['step'])){

$topicmerge=(isset($_POST['topicmerge'])?(integer)$_POST['topicmerge']+0:0);

if($topic!=$topicmerge and $row1=db_simpleSelect(0,$Tt,'forum_id, topic_title, topic_poster','topic_id','=',$topic) and $row2=db_simpleSelect(0,$Tt,'forum_id, topic_last_post_id','topic_id','=',$topicmerge)) {
$forold=$row1[0];
$fornew=$row2[0];
$ttitle=$row1[1];
$topicUser=$row1[2];

$topicALastPost=$row2[1];

/* Both topics exist */
/* A = $topicmerge B = $topic */

/* B to A: Check if the first message in B is posted later than the latest message in A */
if($row=db_simpleSelect(0,$Tp,'post_id, post_text','topic_id','=',$topic, 'post_id ASC', 1)) { $topicBFirstPost=$row[0]; $topicBFirstPostTxt=$row[1]; } else $topicBFirstPost=0;

if($topicBFirstPost<$topicALastPost){
$warn=TRUE;
$errorMSG=$l_mergeError;
$correctErr=$backErrorLink;
$tmpl.=ParseTpl(makeUp('main_warning'));
}
else {

//determine page number where topic will be attached
if($row=db_simpleSelect(0,$Tt,'posts_count','topic_id','=',$topicmerge)) $totalPosts=$row[0]+1; else $totalPosts=0;

if(isset($themeDesc) and in_array($topicmerge,$themeDesc)) $page=PAGE1_OFFSET+1;
elseif($totalPosts<=$viewmaxreplys) $page=PAGE1_OFFSET+1;
elseif((integer)($totalPosts/$viewmaxreplys)==($totalPosts/$viewmaxreplys)) $page=$totalPosts/$viewmaxreplys+PAGE1_OFFSET;
else $page=(integer)($totalPosts/$viewmaxreplys)+PAGE1_OFFSET+1;

//update first message of the merged topic so it contains a topic title
unset($l_today);
$post_text=str_replace('&nbsp;', ' ', convert_date(date('Y-m-d H:i:s'))).' - '.$l_mergeTitle.'<br /><strong>'.$ttitle.'</strong><br /><br />'.$topicBFirstPostTxt;
updateArray(array('post_text'), $Tp, 'post_id', $topicBFirstPost);

/* files - moving from one folder to another if it does exist */

$moveFiles=FALSE;

if(file_exists($pathToFiles.'addon_fileupload_options.php')) include($pathToFiles.'addon_fileupload_options.php');

if(isset($dirsTopic) and $dirsTopic) {

$moveFiles=TRUE;

$moveDir1=$uploadDir.'/'.$topic;
$moveDir2=$uploadDir.'/'.$topicmerge;

}

if($moveFiles and is_dir($moveDir1)){

if(!is_dir($moveDir2)) mkdir($moveDir2,0777);

if ($handle = opendir($moveDir1)) {
while (false !== ($file = readdir($handle))) {
if ($file != '.' and $file != '..') {
copy($moveDir1.'/'.$file, $moveDir2.'/'.$file);
unlink($moveDir1.'/'.$file);
}
}
closedir($handle);
}

rmdir($moveDir1);
/* --files */

}

//update all posts in the topic B so they have proper topic and forum ID
$tot=0;
$forum_id=$fornew;
$topic_id=$topicmerge;
$tot=updateArray(array('topic_id', 'forum_id'), $Tp, 'topic_id', $topic);

//update merging topic with the latest data

if($row=db_simpleSelect(0, $Tp, 'post_id, poster_name, post_time', 'topic_id', '=', $topicmerge, 'post_id desc', 1)){
$topic_last_post_id=$row[0];
$topic_last_poster=$row[1];
$topic_last_post_time=$row[2];
updateArray(array('topic_last_post_id', 'topic_last_post_time', 'topic_last_poster'), $Tt, 'topic_id', $topicmerge);
}

if(isset($mod_rewrite) and $mod_rewrite){
$urlp1=addTopicURLPage(genTopicURL($main_url, $forold, '#GET#', $topic, '#GET#'), PAGE1_OFFSET+1);
$urlp2=addTopicURLPage(genTopicURL($main_url, $fornew, '#GET#', $topicmerge, '#GET#'), $page)."#msg{$topicBFirstPost}";
}
else{
$urlp1=addGenURLPage("{$main_url}/{$indexphp}action=vthread&amp;forum={$forold}&amp;topic={$topic}", PAGE1_OFFSET+1);
$urlp2=addGenURLPage("{$main_url}/{$indexphp}action=vthread&amp;forum={$fornew}&amp;topic={$topicmerge}", $page)."#msg{$topicBFirstPost}";
}

db_delete($Tt, 'topic_id', '=', $topic);
//db_delete($Ts, 'topic_id', '=', $topic);

//keeping subscriptions after merging
$topic_id=$topicmerge;
updateArray(array('topic_id'), $Ts, 'topic_id', $topic);
//cleaning up possible duplicate subscriptions
$currentUser=0;
if($row=db_simpleSelect(0, $Ts, 'id, user_id', 'topic_id', '=', $topic_id, 'user_id asc, active asc')){
do{
if($row[1]==$currentUser){
db_delete($Ts, 'id', '=', $row[0]);
}
$currentUser=$row[1];
}
while($row=db_simpleSelect(1));
}

db_calcAmount($Tp,'forum_id',$fornew,$Tf,'posts_count');
db_calcAmount($Tp,'forum_id',$forold,$Tf,'posts_count');

db_calcAmount($Tt,'forum_id',$fornew,$Tf,'topics_count');
db_calcAmount($Tt,'forum_id',$forold,$Tf,'topics_count');

db_calcAmount($Tp,'topic_id',$topicmerge,$Tt,'posts_count');

db_calcAmount($Tt,'topic_poster',$topicUser,$Tu,'num_topics',$dbUserId);
db_calcAmount($Tp,'poster_id',$topicUser,$Tu,'num_posts',$dbUserId);

if(!defined('ARCHIVE')) $arcId=''; else $arcId=str_replace('-', '_', ARCHIVE);
db_calcTotalUserAmount($topicUser, $Tu, $Tt, $Tp, $Taus, $arcId);

$tmpl.="<span class=\"txtNr\">{$l_mergedOk} {$tot}<br /><a href=\"{$urlp2}\">{$l_viewMergedTopic}</a> / <a href=\"{$urlp1}\" target=\"_blank\">{$l_checkOldTopic}</a></span>";

}//first post in B is posted later than the latest post in A

}//topics exist is set

else{
$warn=TRUE;
$errorMSG='<span class="txtNr">'.$l_mergeWarn.'</span>';
$correctErr=$backErrorLink;
$tmpl.=ParseTpl(makeUp('main_warning'));
}

}

else{

if($topic==0 or !$row=db_simpleSelect(0,$Tt,'topic_title','topic_id','=',$topic)) {
$tmpl.='<span class="txtNr">'.$l_mergeNa.'</span>';
}
else {
$ttitle=$row[0];

$tmpl.=<<<out
<h1 class="headingTitle">{$ttitle}</h1>

<form action="{$main_url}/{$indexphp}" method="post" class="formStyle">
<span class="txtNr"><input type="text" name="topic" size="6" maxlength="10" class="textForm" value="{$topic}" readonly="readonly" /><br />{$l_mergeTopicId}<br /></span>
<br />
<span class="txtNr"><input type="text" name="topicmerge" size="6" maxlength="10" class="textForm" /><br />{$l_mergedTopic}<br /><br /></span>

<input type="hidden" name="forum" value="{$forum}" />
<input type="hidden" name="action" value="merge" />
<input type="hidden" name="step" value="2" />
<input type="submit" value="{$l_mergeTopic}" class="inputButton" />
</form>
out;
}

}

echo load_header();
if(!$warn) echo '<table class="forumsmb"><tr><td>';
echo $tmpl;
if(!$warn) echo '</td></tr></table>';

}

}

?>