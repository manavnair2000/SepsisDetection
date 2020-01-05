<?php
session_start();
include './db.php';
try{
  if(isset($_POST['Search'],$_POST['p_id'])){
      $pid = $_POST['p_id'];
      $_SESSION['pid'] = $pid;
      $sql="SELECT patient_reg_info.patient_id FROM clinical_database.patient_reg_info WHERE patient_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('i', $pid);
      $stmt->execute();
      $result = $stmt->get_result();
      if(!$row = $result->fetch_assoc())
      {
        echo "<script> alert('Patient ID not found!!'); window.open('register.php','_self')</script>";
      }
      else {

          $_SESSION['pid'] = $row['patient_id'];
          header("Location: vitals.php");
          exit();
      }
  }
  elseif(!isset($_POST['p_id'])){
      echo "<script> window.alert('Enter patient ID first!!'); window.history.go(-1); </script>";
  }
}
catch(Exception $e){
	echo "<script> window.alert('Unable to process request :$e->getMessage()'); window.history.go(-1); </script>";
}
?>
