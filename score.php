<?
SESSION_START();
include'config.php';
include'mylib.php';
//unset($back);
?>
<html>
	<head>
		<title>ON-LINE  E X A M</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<?top2();?>
<?
$sbj_query=mysql_query("SELECT sbj_name,semester,q_count FROM Subject WHERE sbj_id=$_SESSION[sbj_id]");
$sbj_row=mysql_fetch_array($sbj_query);

mysql_query("UPDATE Student SET q_ans='$_SESSION[q_ans]',ex_grade='$_SESSION[grade]', st_ans='$_SESSION[st_ans]' WHERE st_id='$_SESSION[s_id]'");
?>
<table align="center" width="780">
	<tr>
		<td width="800" height="45">&nbsp;&nbsp;<b>Առարկա:&nbsp;&nbsp;&nbsp;&nbsp;<font size="4"> <?echo $_SESSION['subject'];?></font></b></td>
	</tr>
	<tr>
		<td width="800" height="20">&nbsp;&nbsp;<b>Սեմեստր:&nbsp;&nbsp;&nbsp;&nbsp;<font size="4"><?echo $sbj_row[1];?></font></b></td>
	</tr>
</table>


<table align="center" width="500" border="0">
	<tr>
		<td height="45" colspan="2"></td>
	</tr>
	<tr>
		<td height="45" colspan="2" align="center"bgcolor="#e5e5e5"><i><b><font size=4>Ա ր դ յ ո ւ ն ք ն ե ր</font></b></i></td>
	</tr>
	<tr>
		<td bgcolor=#f6f6f6 width="300" height="45"><font size=3>Ճիշտ պատասխանների քանակը:</font></td>
		<td bgcolor=#f6f6f6 align="center"><font size=4 color=red><? echo $_SESSION['ra'];?></font></td>
	</tr>
	<tr>
		<td bgcolor=#f6f6f6  height="45"><font size=3 >Սխալ պատասխանների քանակը:</font></td>
		<td bgcolor=#f6f6f6 align="center"><font size=4 color=red><? echo $sbj_row[2]-$_SESSION['ra']-$_SESSION['notpost'];?></font></td>
	</tr>
		<tr>
		<td bgcolor=#f6f6f6  height="45"><font size=3 >Չպատասխանած հարցերի քանակը:</font></td>
		<td bgcolor=#f6f6f6 align="center"><font size=4 color=red><? echo $_SESSION['notpost'];?></font></td>
	</tr>
	<tr>
		<td colspan="2" ><hr color=black size="1"></td>
	</tr>
	<tr>
		<td bgcolor=#f6f6f6  height="45"><div align="center"><font size=4>Հավաքեցիք <font size=5 color=red> <?echo $_SESSION['grade'];?></font> / <?echo $_SESSION['max'];?>-ից</font></div></td>
		<td bgcolor="#f6f6f6" align="center"><input type="button" value="Փակել Պատուհանը" onClick="window.close()"></td>
	</tr>

</table>
<table width="800" align="center">
	<tr>
		<td 'border='2' bordercolor='#954A00' colspan=2><?down1();?></td>
	</tr>
		<tr>
		<td colspan=2 height="50"></td>
	</tr>
</table>