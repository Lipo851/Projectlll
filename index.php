<?
include'config.php';
include'mylib.php';
?>
<html>
	<head>
		<title>ON-LINE  E X A M</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<? top1();?>



<form name=rg action="reg.php" method="POST">
<table   width="780" border="0" align="center">
	<tr>
		<td colspan=2><div align="center"><? if(isset($_GET['error1'])) echo "<div style='color:#FF0000;font-size=15'>Լրացնել բոլոր դաշտերը</div>";?></div></div></td>
	</tr>
	<tr>
		<td colspan=2><div align="center"><? if(isset($_GET['error2'])) echo "<div style='color:#FF0000;font-size=15'>Այս քննությունը դուք արդեն հանձնել եք</div>";?></div></div></td>
	</tr>
	<tr>
		<td colspan=2><div align="center"><? if(isset($_GET['error3'])) echo "<div style='color:#FF0000;font-size=15'>Առարկայի ներմուծած հարցերը ավելի քիչ են քան տոմսում տեղադրվելիք հարցերի քանակը</div>";?></div></div></td>
	</tr>
	<tr>
		<td height="45" align="center" colspan="2">
		<table border="0" width="800">
			<tr>
				<td  background="../TestSys/images/b.gif" height="45" width="430"><b>&nbsp;Քննության ծածկագիր&nbsp;(<font color="#CC0000">10 նիշ</font>)</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" maxlength="10" name="examp" ></td>
				<td colspan="2" align="center"><? if(isset($_GET['error4'])) echo "<div style='color:#FF0000;font-size=12'>Քննության ծածկագիրը սխալ է</div>";?></td>
			</tr>
		</table>
		
		
		</td>
	</tr>
	<tr>
		<td width="330"><b>Ուսանողի իդենտիֆացիոն համար</b></td>
		<td><input type="text" name="s_code" value="ST" style="width:50%">&nbsp;<font size="3" color="#3333FF">(Օրինակ ST2002-01042)</font></td>
	</tr>
	<tr>
		<td><b>Ուսանողի անուն</b></td>
		<td><input type="text" name="s_name" style="width:85%"></td>
	</tr>
	<tr>
		<td><b>Ուսանողի ազգանուն</b></td>
		<td><input type="text" name="s_sname" style="width:85%"></td>
	</tr>
	<tr>
		<td><b>Առարկա</b></td>
		<td><select size="1" name="subject" style="width:470">
  			<option value="0"><b>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </b></option>
  			<?
            $query=mysql_query("SELECT* FROM Subject");
            $num=mysql_num_rows($query);
            for($i=1;$i<=$num;$i++){$row=mysql_fetch_array($query);?>
  			<option value="<?echo $row['sbj_id'];?>"><? echo $row['sbj_name']." (".$row['semester']." semester)";?></option><? }?>
			</select></td>
	</tr>
	<tr>
		<td colspan=2><hr color=black></td>
	</tr>
	<tr>
		<td colspan="2"><div align="center"><input type="submit" value="Գրանցվել"></div></td>
		
	</tr>
</table>
</form>
<table width="800" align="center">
	<tr>
		<td colspan=2><? down1();?></td>
	</tr>
</table>	

</body>
</html>