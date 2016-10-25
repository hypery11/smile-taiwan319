<?php
@set_time_limit(0);
header ('Content-Type: text/html; charset=utf-8');
ob_flush();
flush();


$start=3325;
$end=9800;

for($i=$start;$i<=$end;$i++)
{
	info($i);
}

/*********************
	functions
*********************/

function info($num)
{
ob_flush();
flush();

$url='http://www.319.com.tw/store/show/';

$arr=explode("\n",strip_tags(file_get_contents($url.$num)));
echo $num."  =  ".trim($arr[228])."\n";

if(trim($arr[228])!="")
	{
		$name=trim($arr[228]);
		$clas=trim($arr[254]);
		$city=trim($arr[258]);
		$address=trim($arr[262]);
		$phone=trim($arr[266]);

		record($num,$name,$clas,$city,$address,$phone);
	}


/*
foreach($arr as $key=>$val)
	echo $key.$val."<br>";

num range=3325 to 9532
*/
}

function record($num,$name,$clas,$city,$address,$phone)
{
$handle=fopen("db_319.txt","a");
//open file

fwrite($handle,$num."\t".$name."\t".$clas."\t".$city."\t".$address."\t".$phone."\t".date("Y-m-d H:i:s")."\n");
//write log to file

fclose($handle);

}


?>
