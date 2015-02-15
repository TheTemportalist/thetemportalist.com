<?php

echo "Notify me!";
$entityBody = file_get_contents('php://input');
#echo $entityBody;
if (strlen($str) != 0){
	file_put_contents('./jenkin_logs/build_'.date("j.n.Y").'.txt', $entityBody, FILE_APPEND);
	
}

?>
