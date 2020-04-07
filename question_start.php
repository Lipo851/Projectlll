<?
SESSION_START();
include'config.php';
$_SESSION['back']=0;
//mysql_query("SET NAMES utf8");

$sbj=mysql_query("SELECT sbj_name,semester,q_count,sbj_id FROM Subject WHERE sbj_id=$_SESSION[sbj_id]");
$sbj_row=mysql_fetch_array($sbj);

$table=$sbj_row[0].$sbj_row[1];

	


if($_SESSION['start']<=$sbj_row['q_count'])
{

	
//{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{	
if($_SESSION['start']==$sbj_row['q_count'])
{
		$i=$_SESSION['start'];
		foreach(split("-",$_SESSION['string']) as $d)
    	{
    		$a[]=$d;
    	}

		if(isset($_POST['rd']))
		{										
 			$aa=$a[$i-1];
 			$tt=$_POST['rd'];
 			$_SESSION['st_ans']=$_SESSION['st_ans'].$tt;
 			$stug=mysql_query("SELECT* FROM $table WHERE q_id=$aa")or die("ERRorStug ".mysql_error());
			$stug_row=mysql_fetch_array($stug);
		
			if($stug_row[$tt]==$stug_row["tr_ans"])
  			{
  				$_SESSION['ra']++;
  				$_SESSION['grade']=$_SESSION['grade']+$stug_row["grade"];
  			}
  			
  			$_SESSION['st_ans']=substr($_SESSION['st_ans'], 2);
  			header('location:score.php');		
		}
		else
		{ 
			$_SESSION['notpost']++;
			$_SESSION['st_ans']=$_SESSION['st_ans']."0";
			$_SESSION['st_ans']=substr($_SESSION['st_ans'], 2); 
			header('location:score.php');
			
		}
		
}
//}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
else
{ 
	$i=$_SESSION['start'];
	foreach(split("-",$_SESSION['string']) as $d)
    	{
    		$a[]=$d;
    	}


	$tbl=mysql_query("SELECT* FROM $table WHERE q_id=$a[$i]")or die("ERRor ".mysql_error());
	$tbl_row=mysql_fetch_array($tbl);

	if(isset($_POST['rd']))
	{
		$tt=$_POST['rd'];
 		$_SESSION['st_ans']=$_SESSION['st_ans'].$tt."-";
 		$aa=$a[$i-1];
		$stug=mysql_query("SELECT* FROM $table WHERE q_id=$aa")or die("ERRor ".mysql_error());
		$stug_row=mysql_fetch_array($stug);
		if($stug_row[$tt]==$stug_row[4])
  			{
  				$_SESSION['ra']++;
  				$_SESSION['grade']=$_SESSION['grade']+$stug_row[9];
  			}
  	}
	else
	{  
	 $_SESSION['st_ans']=$_SESSION['st_ans']."0"."-";
	 	if($_SESSION['start']!=0)
	 	{
			 $_SESSION['notpost']++;
		}
	  
	}
include'mylib.php';
?>
<script>

function changePage()
{
	setTimeout('minusTime()',1000);
}

function minusTime()
{
	if(document.getElementById('timer').value!=0){
		document.getElementById('timer').value--;
		if(document.getElementById('timer').value<10)
		{
			document.getElementById('timer').style.color="#FF0000";
			
		}
		changePage();
	}else
	{
		window.location.href='question_start.php';
	}

}

</script>


<html>
	<head>
		<title>ON-LINE  E X A M</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
<? top2();?>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="changePage()">

<table align="center" width="800">
	<tr>
		<td width="800" height="45">&nbsp;&nbsp;<b>Առարկա:&nbsp;&nbsp;&nbsp;&nbsp;<font size="4"> <? echo $_SESSION['subject'];?></font></b></td>
	</tr>
</table>

<table align="center">
	<tr>
		<td align="center"><font  size="5"><b>Հարց N= <font color=red ><? echo $_SESSION['start']+1;?></font> / </font><font size="5"><? echo $sbj_row["q_count"];?></b></font><td>
	</tr>
	<tr>
		<td align="center"><font ><b>Հարցին տրվում է <font color=red size="5"><? echo $tbl_row["grade"];?></font> <font> միավոր</b></font><td>
	</tr>
	</table>

<FORM METHOD=POST ACTION=''>

<table width="800" align="center" border="0"> 
	<tr>
		<td colspan="2" align="center"><? $way="../TestSys/question_images/"."$sbj_row[3]"."_"."$tbl_row[0]".".jpg";  if(file_exists($way)) echo "<image src=$way  widt=400 height=300 >"; ?></div></td>
	</tr>
</table>

<table width="800" align="center" border="0">
	<tr>
		<td bgcolor=#f6f6f6 align="center" width="5%"><font color=red><b><? echo $_SESSION['start']+1;echo ".";?></b></font></td>
		<td bgcolor=#e5e5e5 width="95%"><b><? echo $tbl_row["question"];?></b></td>
	</tr>
<?
////////////////rand-ov patasxanneri @ntrutyun//////////
	$count=1 ;
	$mass[0]=rand(4,7);
	$fl=true;

while($count<4)
{
	$fl=true;
	$k=rand(4,7);

	for($i=0;$i<$count;$i++)
		{
			if($mass[$i] == $k)
			{
				$fl=false;
				break;
			}
		}
		if($fl==true)
		{
			$mass[$count] = $k;
			$count++;
		}
}
//////////////////////////////////////////////////////////""""""""""""""""""""""""""""""""""""

	for($i=0;$i<$count;$i++)
	{
        if($i==0)
		{?>
			<FORM METHOD=POST ACTION="question_start.php"><?
        	$ansindex=$mass[$i];
        	$_SESSION['ans']=$_SESSION['ans'].$ansindex;
        	$_SESSION['q_ans']=$_SESSION['q_ans'].$ansindex;?>
        	<tr>
        		<td bgcolor="#dfdfdf" align="center"><input name='rd' type='radio' value='<? echo $ansindex;?>'></td>
        		<td bgcolor="#f6f6f6" ><? echo $tbl_row[$ansindex];?></td>
        	</tr><?
   		}
   		else
        {
         	?><FORM METHOD=POST ACTION="question_start.php"><?
        	$ansindex=$mass[$i];
        	$_SESSION['ans']="-".$ansindex;
        	$_SESSION['q_ans']=$_SESSION['q_ans']."-".$ansindex;?>
        	<tr>
        		<td bgcolor=#dfdfdf align="center" style="font-family:Sylfaen"><input name='rd' type='radio' value='<?echo $ansindex;?>'></td>
        		<td bgcolor=#f6f6f6><?  echo $tbl_row[$ansindex];?></td>
        	</tr><?
        }

	}
if ($_SESSION['start']==$sbj_row[2]-1) {?>

	<tr>
		<td colspan=2 align="center"><INPUT TYPE="submit" value="Քննության ավարտ" style="width:300"></td>
	</tr>
</table>
<? }
else
{ ?>

	<tr>
		<td colspan=2 align="center"><INPUT TYPE="submit" value="Հաջորդ հարցը" style="width:300"></td>
	</tr>
</table>

<?}?>
<table align="center" width="900">
	<tr>
		<td bgcolor="f6f6f6"><b>Դուք ունեք <Font color="Red" size="5"><? echo $_SESSION['grade'];?></font> միավոր <Font size="4"><?echo $_SESSION['max'];?></Font>-ից</td><META HTTP-EQUIV="Refresh" CONTENT="<? echo $tbl_row["time"];?>" > 
		<td bgcolor=#f6f6f6 align=right><Font><b>Հարցի ժամանակը <input name="time" value="<? echo $tbl_row["time"];?>" type="text" style="width:50;color:black;" READONLY id="timer"></font></td>
	</tr>
	<tr>
		<td colspan=2 height="50"></td>
	</tr>
</table>
</FORM>
</body>
</html>

<?  $_SESSION['start']++;
	$_SESSION['back']=1;

	if ($_SESSION['start']!=$sbj_row["q_count"])
	{
		$_SESSION['q_ans']=$_SESSION['q_ans']."/";
	}
}}
else
{
	$_SESSION['st_ans']=substr($_SESSION['st_ans'], 2); 
	header('location:score.php');
}?>