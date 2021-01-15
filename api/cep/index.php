<?php

require_once ("../repositori/SearchCep.php");

$cep = $_REQUEST['cep'];
$class = new SearchCep();
$info = $class->InfoAddress($cep);

echo $info;

?>