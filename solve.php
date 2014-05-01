<?php
// Check if numbers are valid(1-9)
foreach($_POST as $num)
	if($num==NULL)
		$num=0;
foreach($_POST as $num)
	if($num>9 or $num<0)
		die("Are you kidding me? :|");
for($i=0;$i<81;$i++)
	if($_POST[$i]==NULL)
		$lis_op[]=$i;
function check_row($i)
{
	for($l=0;$l<9;$l++)
		$arr[]=((int)($i/9))*9+$l;
	foreach($arr as $box)
		if($_POST[$box]==$_POST[$i] and $box!=$i)
			return false;
	return true;
}
function check_col($i)
{
	for($l=0;$l<9;$l++)
		$arr[]=($i%9)+9*$l;
	foreach($arr as $box)
		if($_POST[$box]==$_POST[$i] and $box!=$i)
			return false;
	return true;
}
function check_box($i)
{
	for($l=0;$l<3;$l++)
		for($l2=0;$l2<3;$l2++)
			$arr[]=((int)($i/27))*27+(((int)($i/3))%3)*3+$l*9+$l2;
	foreach($arr as $box)
		if($_POST[$box]==$_POST[$i] and $box!=$i)
			return false;
	return true;
}
function check($i)
{
	return (check_col($i)==true && check_row($i)==true && check_box($i)==true) ? true : false;
}
$pos=0;
while($pos<count($lis_op))
{
	switch($_POST[$lis_op[$pos]]==9)
	{
		case true:
			$_POST[$lis_op[$pos--]]=0;
			continue 2;
		case false:
			$_POST[$lis_op[$pos]]++;
			
	}
	if(check($lis_op[$pos])==true)
		$pos++;
}


for($i=0;$i<9;$i++)
{
	echo "<table align=\"center\" border=\"1\">";
	echo "<tr border=\"1\">";
	for($i2=0;$i2<9;$i2++)
	{
		echo "<td  style=\"width:30px;height:30px;\">".$_POST[$i*9+$i2]."</td>";
	}
}
?>
