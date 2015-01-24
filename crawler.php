<?php
@set_time_limit(0);
header ('Content-Type: text/html; charset=utf-8');
ob_flush();
flush();


$start=3325;
$end=9532;

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
echo $num."  =  ".trim($arr[219])."<br>";

if(trim($arr[219])!="")
	{
		$name=trim($arr[219]);
		$clas=trim($arr[245]);
		$city=trim($arr[249]);
		$address=trim($arr[253]);
		$phone=trim($arr[257]);

		record($num,$name,$clas,$city,$address,$phone);
	}


/*
foreach($arr as $key=>$val)
	echo $key.$val."<br>";
219=>名稱  245=>類別  249=>縣市鄉鎮  253=>地址
257=>電話  261=>營業時間  263=>價格  283=>網趾

num range=3325 to 9532
*/
//echo trim($arr[29])."<br><br>".trim($arr[35]);
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
