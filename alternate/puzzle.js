function draw_puz()
{
	var STR="";
	STR+="<table align=\"center\"";
	for(var i=0;i<9;i++)
	{
		STR+="<tr>";
		for(var i2=0;i2<9;i2++)
		{
			var str="<td><input type=\"text\" id=\""+(i*9+i2)+"\"style=\"width:60px;height:60px;font-size:50px;color:#000000\" maxlength=\"1\"></td>";
			if(!((i2+1)%3))
				str+="<td style=\"width:5px\">";
			STR+=str;
		}
		if(!((i+1)%3))
			STR+="<tr style=\"height:5px\">";
	}
	STR+="<tr><td><td><td><td><td><td><input type=\"button\" align=\"center\" value=\"Solve!\" onclick=\"solve()\"></table>";
	return STR;
}
function check_row(i,list)
{
	list_tmp=[];
	for(var ctr=0;ctr<9;ctr++)
		list_tmp[ctr]=Math.floor(i/9)*9+ctr;
	for(var ctr2=0;ctr2<9;ctr2++)
	{
		if(list[list_tmp[ctr2]]==list[i] && list_tmp[ctr2]!=i)
		{
			return false;
		}
	}
	return true;
}
function check_col(i,list)
{
	list_tmp=[];
	for(var ctr=0;ctr<9;ctr++)
		list_tmp[ctr]=i%9+9*ctr;
	for(var ctr2=0;ctr2<9;ctr2++)
	{
		if(list[list_tmp[ctr2]]==list[i] && list_tmp[ctr2]!=i)
		{
			return false;
		}
	}
	return true;
}
function check_box(i,list)
{
	list_tmp=[];
	for(var ctr=0;ctr<3;ctr++)
		for(var ctr2=0;ctr2<3;ctr2++)
			list_tmp.push(Math.floor(i/27)*27+(Math.floor(i/3)%3)*3+ctr*9+ctr2);
	for(var ctr2=0;ctr2<9;ctr2++)
	{
		if(list[list_tmp[ctr2]]==list[i] && list_tmp[ctr2]!=i)
		{
			return false;
		}
	}
	return true;
}
function check(i,list)
{
	return (check_row(i,list) && check_col(i,list) && check_box(i,list))==true ? true : false;
}
function solve()
{
	var list=[];
	var to_op=[];
	var pos=0;
	for(var i=0;i<81;i++)
		list[i]=document.getElementById(i).value.toString();
	for(var i=0;i<81;i++)
		if(!(document.getElementById(i.toString()).value))
			to_op.push(i.toString());
	while(pos<to_op.length)
	{
		if(list[to_op[pos]]==9)
		{
			list[to_op[pos--]]=0;
			continue
		}
		else
			list[to_op[pos]]++;
		if(check(to_op[pos],list)==true)
			pos++;
	}
	for(var i=0;i<to_op.length;i++)
	{
		document.getElementById(to_op[i]).setAttribute("style","width:60px;height:60px;font-size:50px;color:#FF0000");
		document.getElementById(to_op[i]).value=list[to_op[i]];
	}
}
