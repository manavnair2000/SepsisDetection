<?php
session_start();
include './db.php';
try{
	if(isset($_POST['Submit'])){
    $patient_name = $_POST['patient_name'];
    $patient_weight = $_POST['patient_weight'];
    $patient_height = $_POST['patient_height'];
    $sql="INSERT INTO clinical_database.patient_reg_info (patient_name,patient_weight,patient_height) VALUES(?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('sii', $patient_name,$patient_weight,$patient_height);
		$stmt->execute();
		echo "<script>window.location.href='vitals.php'; </script>";
  }
}
catch(Exception $e){
	echo "<script> window.alert('Unable to process request :$e->getMessage()'); window.location.href='index.php'; </script>";
}
?>
