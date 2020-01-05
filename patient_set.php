<?php
session_start();
include './db.php';
try{
  if(isset($_POST['Search'],$_POST['p_id'])){
      $pid = $_POST['p_id'];
      $_SESSION['pid'] = $pid;
      echo "<script>window.location.href='patient_details.php'; </script>";
  }
  elseif(!isset($_POST['p_id'])){
      echo "<script> window.alert('Enter patient ID first!!'); window.location.href='index.php'; </script>";
  }
}
catch(Exception $e){
	echo "<script> window.alert('Unable to process request :$e->getMessage()'); window.location.href='index.php'; </script>";
}
?>
