<?php

echo "Notify me!";
$entityBody = file_get_contents('php://input');
#echo $entityBody;
file_put_contents('./jenkins_build_log_'.date("j.n.Y").'.txt', $entityBody, FILE_APPEND);

?>
