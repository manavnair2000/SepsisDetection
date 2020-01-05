<?php
session_start();
include './db.php';
try{
	if(isset($_POST['Submit'],$_SESSION['pid'])){
		$pid =  $_SESSION['pid'];
		$temperature = $_POST['temperature'];
    $heartrate = $_POST['heartrate'];
    $wbc = $_POST['wbc'];
    $respiratoryrate = $_POST['respiratoryrate'];
		$systolicbp = $_POST['systolicbp'];
		$alteredmentation = $_POST['alteredmentation'];
		$symptoms = $_POST['symptoms'];
		$sirs = $_POST['sirs'];
		$qsofa = $_POST['qsofa'];
		$sql="INSERT INTO clinical_database.patient_vital (patient_id,sirs_score,temperature,heart_rate,wbc,respiratory_rate,qSOFA,systolic_bp,altered_mentation) VALUES(?,?,?,?,?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('iiiiiiiii', $pid,$sirs,$temperature,$heartrate,$wbc,$respiratoryrate,$qsofa,$systolicbp,$alteredmentation);
		$stmt->execute();
		foreach ($symptoms as $symptom){
			$sql="INSERT INTO clinical_database.patient_symptoms (patient_id,patient_symptoms) VALUES(?,?)";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('is', $pid,$symptom);
			$stmt->execute();
		}
		header("Location:patient_details.php");
  }
	elseif (!isset($_SESSION['pid'])) {
		echo "<script> window.alert('Enter patient ID first!!'); window.location.href='index.php'; </script>";
	}
}
catch(Exception $e){
	echo "<script> window.alert('Unable to process request :$e->getMessage()'); window.location.href='index.php'; </script>";
}
?>
