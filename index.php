<?php 
$host = "localhost";
$user = "root";
$password = "";
$db = "test";
$connect = mysqli_connect($host, $user, $password, $db);

function sql_query($DBname, $request, $DBtable){
	global $connect;
	$query = "SELECT * FROM "."`$DBname`";
	$x = false;
	$i = 0;
	foreach($request as $base){
		if($base){
			if($x){
				$query = $query." AND ".$DBtable[$i]." = ".$base;
			}else{
				$query = $query." WHERE ".$DBtable[$i]." = ".$base;
				$x = true;
			}
		}
		$i += 1;		
	}
	$base = mysqli_query($connect, $query);
	$base = mysqli_fetch_all($base);
	return $base;
}


//request (GET, POST)
$request= ['test@mail.ru', 'Anna', 'Ermolova'];
//DB struct
$DBtable = ['email', 'name', 'surname'];

$z = sql_query('boxs', $request, $DBtable);
print_r($z)
?>
