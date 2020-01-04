<?php
session_start();
include './db.php';
try{
	if(isset($_POST['Submit'])){
    $temperature = $_POST['temperature'];
    $heartrate = $_POST['heartrate'];
    $wbc = $_POST['wbc'];
    $respiratoryrate = $_POST['respiratoryrate'];
  }
}

?>
