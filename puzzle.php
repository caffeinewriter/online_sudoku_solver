<?php
echo "<!DOCTYPE html>";
echo "<table align=\"center\">";
echo "<form  action=\"solve.php\" method=\"POST\">";
for($i=0;$i<9;$i++)
{
	echo "<tr>" ;
	for($i2=0;$i2<9;$i2++)
	{
		echo "<td><input name=\"".($i*9+$i2)."\" type=\"number\" style=\"width:60px;height:60px;font-size:50px\" maxlength=\"1\"></td>";
		if(($i2+1)%3==0)
			echo "<td style=\"width:5px\">";
	}
	if(($i+1)%3==0)
		echo "<tr style=\"height:5px\">";
}
echo "<tr><td><td><td><td><td><td><input type=\"submit\" value=\"SOLVE!\">";
echo "</form></table>";
?>
