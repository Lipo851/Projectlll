<?
SESSION_START();
include'mylib.php';
include'config.php';

if(isset($_SESSION['back']))
{
	header('location:score.php');
}
else{?>

<html>
	<head>
		<title>ON-LINE  E X A M</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<?top2();

$_SESSION['start']=0;
$_SESSION['grade']=0;
$_SESSION['ra']=0;
$_SESSION['notpost']=0;
$_SESSION['st_ans']="";
$_SESSION['q_ans']="";
$_SESSION['ans']="";


$rest1=mysql_query("SELECT* FROM Student WHERE st_id=$_SESSION[s_id]");
$rest1_row=mysql_fetch_array($rest1);

$sbj_query=mysql_query("SELECT* FROM Subject WHERE sbj_id=$rest1_row[4]");
$sbj_row=mysql_fetch_array($sbj_query);
$_SESSION['subject']=$sbj_row[1];
?>
<table align="center" width="800">
	<tr>
		<td width="800" height="45">&nbsp;&nbsp;<b>Առարկա:&nbsp;&nbsp;&nbsp;&nbsp;<font size="4"> <? echo $_SESSION['subject'];?></font></b></td>
	</tr>
</table>
<table width="600" align="center" background="../TestSys/images/b.gif">
	<tr>
		<TD width="280" ><b>Ուսանողի իդենտիֆացիոն համար</b></TD>
		<TD><?echo $rest1_row[1];?></TD>
	</tr>
	<tr>
		<TD><b>Ուսանողի անուն</b></TD>
		<TD><?echo $rest1_row[2];?></TD>
	</tr>
	<tr>
		<TD><b>Ուսանողի ազգանուն</b></TD>
		<TD><?echo $rest1_row[3];?></TD>
	</tr>
	<tr>
		<TD><b>Քննություն</b></TD>
		<TD><?echo $sbj_row[1]." (".$sbj_row[3]." semester)";?></TD>
	</tr>
	<tr>
		<TD colspan="2"><hr color=black width="100%" align="left" size="1"></TD>
	</tr>
	<tr>
		<TD colspan="2"><FORM METHOD=POST ACTION="retype.php">
						<INPUT TYPE="submit" value="Փոփոխել">
						</FORM>
		</TD>
	</tr>
</table>
<table align="center">
	<tr>
		<TD colspan="2" height="20"></TD>
	</tr>
	<tr>
		<TD align="center" width="800" ><FORM METHOD=POST ACTION="rand.php">
	<INPUT TYPE="submit" value="Ս կ ս ե լ  ք ն ն ո ւ թ յ ո ւ ն ը" style='color:red;width:250;height:30'></FORM>
		</TD>
	</tr>
	<tr>
		<TD height="20"></TD>
	</tr>
</table>
<?down1();}?>


