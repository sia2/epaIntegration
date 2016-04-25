<?php

/* Script displays users table field indexes, for those who are creating custom user database in miniBB and need to know field numbers. Programmed by Paul Puzyrev (www.minibb.com) */

define ('INCLUDED776',1);

include('./setup_options.php');
include('./setup_'.$DB.'.php');

$i=0;

$uSql="show columns from $Tu";
if(($DB=='mysql' and $res=mysql_query($uSql) and mysql_num_rows($res)>0 and $row=mysql_fetch_array($res,MYSQL_ASSOC)) OR ($DB=='mysqli' and $res=mysqli_query($mysqlink, $uSql) and mysqli_num_rows($res)>0 and $row=mysqli_fetch_array($res,MYSQLI_ASSOC)) ) {
echo '<b>Table fields in table <u>'.$Tu.'</u></b><br />';

do {
echo $row['Field'].' - '.$i.'<br />';
$i++;
}
while( ($DB=='mysql' and $row=mysql_fetch_array($res, MYSQL_ASSOC)) OR ($DB=='mysqli' and $row=mysqli_fetch_array($res, MYSQLI_ASSOC)) );
}

?>