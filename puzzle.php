<?php
echo "<!DOCTYPE html>";
echo "<table align=\"center\">";
echo "<form  action=\"solve.php\" method=\"POST\">";
for($i=0;$i<9;$i++)
{
	echo "<tr border=\"1\">";
	for($i2=0;$i2<9;$i2++)
	{
		echo "<td><input name=\"".($i*9+$i2)."\" type=\"number\" style=\"width:60px;height:60px;font-size:50px\" maxlength=\"1\"></td>";
	}
}
echo "<tr border=\"1\"><td><td><td><td><td><input type=\"submit\" value=\"SOLVE!\">";
echo "</form></table>";
?>
