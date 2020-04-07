<? SESSION_START();
include'config.php';
$sbj=mysql_query("SELECT sbj_name,semester,q_count FROM `Subject` WHERE `sbj_id`=$_SESSION[sbj_id]");
$sbj_row=mysql_fetch_array($sbj);

$table=$sbj_row[0].$sbj_row[1];


$mas =array();
$tbl=mysql_query("SELECT q_id,grade FROM `$table`");

	while($row=mysql_fetch_array($tbl))
	{
		$mas[]=$row;
	}

$_SESSION['max']=0;
$count=$sbj_row[2];
if($count<=count($mas))
{
	srand((float) microtime() * 10000000);
	$index=array_rand($mas,$count);

	$_SESSION['string']="";	
	
	for($i=0;$i<$count;$i++)
	{

			$tar=$mas[$index[$i]];
			
			$_SESSION['string'].="-".$tar[0];
			$_SESSION['max']=$_SESSION['max']+$tar[1];
	}
	
			
	
	
	$_SESSION['string']=substr($_SESSION['string'], 1); 
	
     mysql_query("UPDATE `Student` SET q_string='$_SESSION[string]' WHERE st_id='$_SESSION[s_id]'");

header('location:question_start.php');
}
else
{
	$q="DELETE FROM `Student`  WHERE st_code='$_SESSION[code]'";
	mysql_query($q) or die ("dddddddddd".mysql_error());
	header('location:index.php?error3');
}?>
