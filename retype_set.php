<?SESSION_START();
include'config.php';
if($_POST['s_name']!="" && $_POST['s_sname']!="" && $_POST['s_code']!="" && $_POST['subject']!=0)
{
$_SESSION['name']=$_POST['s_name'];
$_SESSION['sname']=$_POST['s_name'];
$_SESSION['code']=$_POST['s_code'];
mysql_query("UPDATE Student SET st_name='$_POST[s_name]',st_sname='$_POST[s_sname]',st_code='$_POST[s_code]',sbj_id='$_POST[subject]'  WHERE st_id='$_SESSION[s_id]'");
$_SESSION['ns']=$_POST['s_code']." ".$_POST['s_name']." ".$_POST['s_sname'];
$_SESSION['sbj_id']=$_POST['subject'];
header('location:questions.php');
}else
	header('location:retype.php?error1');

?>