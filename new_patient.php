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
    $sql="SELECT patient_reg_info.patient_id FROM clinical_database.patient_reg_info WHERE patient_name = ? and patient_weight = ? and patient_height = ? ";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('sii', $patient_name,$patient_weight,$patient_height);
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
}
catch(Exception $e){
	echo "<script> window.alert('Unable to process request :$e->getMessage()'); window.location.href='index.php'; </script>";
}
?>
