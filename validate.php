<?php
function validate($data){
$data= trim($data);
$data= stripcslashes($data);
$data= htmlspecialchars($data);
return $data;
}
?>