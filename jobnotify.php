<?php

echo "Notify me!";
$entityBody = file_get_contents('php://input');
echo $entityBody;

?>
