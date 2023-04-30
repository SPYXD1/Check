<?php
include 'tocsi-protector.php';
function ExitAlert($msg){
    exit("gg.alert('".$msg."')");
}

$JDecode = json_decode(file_get_contents('php://input'),true); 
$FileName = "tocsi-login.data";
$ScriptName = "tocsi-script/script.lua";
$ScriptName2 = "tocsi-script/script2.lua";
$username= $JDecode["Username"];
$password=  $JDecode["Password"];
$content =json_decode(file_get_contents($FileName),true);
if ($content == null){
$content =[];
}
if(isset($username) == false || isset($password)== false ||trim($password) == ""|| trim($username) == ""){
exit(file_get_contents($ScriptName2));
}


if($content[$username] <> null){
	if($content[$username]["password"] == $password){
exit(file_get_contents($ScriptName));
}
else{
exit(file_get_contents($ScriptName2));
}
	}
	else{
		ExitAlert("⚠Non Existent User⚠");
		}
?>