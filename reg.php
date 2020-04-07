<?
SESSION_START();
include 'config.php';
$pas=mysql_query("SELECT* FROM subject where sbj_id='$_POST[subject]'");
$pass=mysql_fetch_array($pas);
//echo $pass[6];echo $_POST['examp'];
if($_POST['examp']==$pass[6])
{
if($_POST['s_code']!="" && $_POST['subject']!=0 && $_POST['s_name']!="" && $_POST['s_sname']!="" && $_POST['examp']!="")
{
	$st_row=mysql_query("INSERT INTO Student VALUES(NULL,'$_POST[s_code]','$_POST[s_name]','$_POST[s_sname]','$_POST[subject]','',0,'','')") or die( header('location:index.php?error2'));
	$st_query=mysql_query("SELECT*  FROM student where st_code='$_POST[s_code]' and sbj_id='$_POST[subject]'");
	$st_row=mysql_fetch_array($st_query);
	$_SESSION['s_id']=$st_row[0];
	$_SESSION['sbj_id']=$_POST['subject'];
	$_SESSION['ns']=$_POST['s_code']." "."/"." ".$_POST['s_name']." ".$_POST['s_sname'];
	$_SESSION['name']=$_POST['s_name'];
	$_SESSION['sname']=$_POST['s_sname'];
	$_SESSION['code']=$_POST['s_code'];
    header('location:questions.php');

}
else header('location:index.php?error1');
}
else header('location:index.php?error4');
?>