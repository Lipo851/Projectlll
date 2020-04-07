<?
SESSION_START();
include'config.php';
include'mylib.php';
$rest=mysql_query("SELECT* FROM Student WHERE st_id=$_SESSION[s_id]");
$rest_row=mysql_fetch_array($rest);
?>
<html>
	<head>
		<title>ON-LINE  E X A M</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?top2();?>
<table align="center" width="800">
	<tr>
		<td width="800" height="45">&nbsp;&nbsp;<b>Առարկա:&nbsp;&nbsp;&nbsp;&nbsp;<font size="4"> <?echo $_SESSION['subject'];?></font></b></td>
	</tr>
</table>
<form action="retype_set.php" method="post">
<table align="center" width="700" border="0">
	<tr>
		<td colspan=2><div align="center"><? if(isset($_GET['error1'])) echo "<div style='color:#FF0000;font-size=12'>Լրացնտլ բոլոր դաշտերը!</div>";?></div></div></td>
	</tr>
	<tr>
		<td width="31%"><font size="3"><b>Ուսանողի իդենտիֆացիոն համար</b></td>
		<td width="69%"><input style="width:100%" type="text" name="s_code" value="<?echo $rest_row[1];?>"></td>
	</tr>
	<tr>
		<td><font size="3"></td>
		<td><b><font size="2">(Օրինակ ST2002-01042)</b></font></td>
	</tr>
	<tr>
		<td><font size="3"><b>Ուսանողի անուն</b></td>
		<td><input style="width:100%" type="text" name="s_name" value="<?echo $rest_row[2];?>"></td>
	</tr>
	<tr>
		<td><font size="3"><b>Ուսանողի ազգանուն</b></td>
		<td><input style="width:100%" type="text" name="s_sname" value="<?echo $rest_row[3];?>"></td>
	</tr>
	<tr>
		<td><font size="3"><b>Առարկա</b></td>
		<td><select size="1" name="subject" style="width:100%">
  			
  			<?
            $query=mysql_query("SELECT* FROM Subject");
            $num=mysql_num_rows($query);
            for($i=1;$i<=$num;$i++){$row=mysql_fetch_array($query);?>
  			<? if($_SESSION['sbj_id']==$row['sbj_id'])
			{?>
  			<option  selected value="<? echo $row['sbj_id'];?>"><? echo $row['sbj_name']." (".$row['semester']." semester)";?></option><? 
			}
			else ?>
			<option  value="<? echo $row['sbj_id'];?>"><? echo $row['sbj_name']." (".$row['semester']." semester)";?></option>
			<? }?></select></td>
	</tr>
	<tr>
		<td colspan=2><hr color=black></td>
	</tr>
	<tr>
		<td colspan=2><div align="center"><input style="width:100" type="submit" value="Հաստատել"></td>
	</tr>

</table>
</form>
<?



?>

