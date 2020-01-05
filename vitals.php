<?php
session_start();?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<html>

<head>
<title>Vitals</title>
    <link href="https://fonts.googleapis.com/css?family=Cutive+Mono&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/p5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.8.0/addons/p5.sound.min.js"></script>
    <script language="javascript" type="text/javascript" src="./sketch.js" defer></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/vitals.css" type="text/css" >
<script src="js/vitals.js"></script>
</head>
<body >
<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-static-top bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="true" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">SDUCD</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="homepage.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="vitals.php" >Vitals</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link " href="#" >Patient's History</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	   <!--input class="form-control mr-sm-2" type="text" placeholder="Patient name" title="name" -->
      <input class="form-control mr-sm-2" type="text" name="pid" placeholder="Register ID" title="regId">
      <button class="btn btn-outline-success my-2 my-sm-0" name="Search" type="submit">Search</button>
    </form>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $pid = $_POST['pid'];
          $_SESSION['pid'] = $pid;
        }
    ?>
  </div>
</nav>
<!-- End of Navigation bar -->
<div class="outercontent">
<div class="innercontent">
<div class="dummy">
<div class="wrapper">
    <div class="grid-container">
        <div class="patient-info">
            Patient name
        </div>
        <div class="date text-right">
            <span id="date-value" ></span>
        </div>
        <div id="sketch-holder" class="sketch-holder"></div>
        <div class="bpm">
            Heart rate: <span id="heart-rate-value">60</span> bpm
        </div>
        <div class="temperature text-right">
            Temperature: <span id="temperature-value">98.6</span> °F
        </div>
        <div class="pressure">
            Blood Pressure: <span id="pressure-value">132/88</span> mmHg
        </div>
        <div class="hb-levels text-right">
            Hemoglobin: <span id="hemoglobin-value">14.1</span> g/dl
        </div>
        <div class="minute-ventilation">
            Minute ventilation: <span id="minute-ventilation-value"> 6.14 </span> L/min
        </div>
        <div class="other">

        </div>
    </div>
	</div>
	</div>
<form action="insert_vitals.php" onsubmit="return enable();" onchange="#" class="regform" method="post">
  <label> Temperature: </label> <br>
  <input id="temperature" name="temperature" oninput="SIRS();"  type="text" maxlength="2" placeholder="in &deg;C" /> <br>
  <label> Heart Rate: </label> </br>
  <input id="heartrate" name="heartrate" oninput="SIRS();" type="text" maxlength="2" placeholder="in bpm" /><br>
  <label> WBC:</label> </br>
  <input id="wbc" name="wbc" oninput="SIRS();" type="text" maxlength="2" placeholder="in %" /></br>
  <label> Respiratory Rate: </label> </br>
  <input id="respiratoryrate" name="respiratoryrate" oninput="SIRS(); qSOFA();" type="text" maxlength="2" placeholder="in breaths/min" />
<br>
<label> Systolic BP: </label> </br>
  <input id="systolicbp" name="systolicbp" oninput="qSOFA();" type="text" maxlength="3" placeholder="in mm Hg" />
<br>
<label> Altered Mentation: </label> </br>
  <input id="alteredmentation" name="alteredmentation" oninput="qSOFA();" type="text" maxlength="2" placeholder="in GCS scale" /> <br/>
  <label for="sirs"> SIRS score: </label> <br>
  <input id="sirs" name="sirs"  type="text" value=0 disabled/> <br>
  <label for="qsofa"> qSOFA score: </label> </br>
  <input id="qsofa" name="qsofa" type="text" value=0 disabled/><br>
<br>
<br>
<label style="font-size:18px;"> Patient Symptoms </label>
</br>
<div class="checkbox checkbox-success">
  <input id="symptom1" name="symptoms[]" class="styled" type="checkbox" value="Confusion">
      <label for="symptom1">Confusion</label>

   </div>
   <div class="checkbox checkbox-success">
<input id="symptom2" name="symptoms[]" class="styled" type="checkbox" value="Diarrhea">
      <label for="symptom12">Diarrhea</label>

    </div>
	<div class="checkbox checkbox-success">
<input id="symptom3" name="symptoms[]" class="styled" type="checkbox" value="Dizziness">
      <label for="symptom3">Dizziness</label>

    </div>
	<div class="checkbox checkbox-success">
    <input id="symptom4" name="symptoms[]" class="styled" type="checkbox" value="Fast Heart Rate">
<label for="symptom4">Fast Heart Rate</label>

    </div>
	<div class="checkbox checkbox-success">
<input id="symptom5" name="symptoms[]" class="styled" type="checkbox" value="High Fever">
      <label for="symptom5">High Fever</label>

    </div>
	<div class="checkbox checkbox-success">
<input id="symptom6" name="symptoms[]" class="styled" type="checkbox" value="Less consciousness">
      <label for="symptom6">Less consciousness</label>

    </div>
	<div class="checkbox checkbox-success">
<input id="symptom7" name="symptoms[]" class="styled" type="checkbox" value="Muscle Pain">
<label for="symptom7">Muscle Pain</label>

    </div>
	<div class="checkbox checkbox-success">
<input id="symptom8" name="symptoms[]" class="styled" type="checkbox" value="Rapid Breathing">
      <label for="symptom8">Rapid Breathing</label>

    </div>
	<div class="checkbox checkbox-success">
<input id="symptom9" name="symptoms[]" class="styled" type="checkbox" value="Skin Discoloration">
      <label for="symptom9">Skin Discoloration</label>

    </div>
	<div class="checkbox checkbox-success">
<input id="symptom10" name="symptoms[]" class="styled" type="checkbox" value="Unusual Sweating">
      <label for="symptom10">Unusual Sweating</label>

    </div>
<button type="submit" name="Submit"> Submit </button>
</form>
</div>
</div>

<!--End of Input fields -->
<!-- Footer -->

<footer class="page-footer font-small my-0 pt-4 myfooter" >
  <div class="container-fluid text-center text-md-left">
    <div class="row">
      <div class="col-md-6 mt-md-0 mt-3">
        <h5 class="text-uppercase">Footer</h5>
        <p>Footer content</p>
      </div>
      <hr class="clearfix w-100 d-md-none pb-3">
      <div class="col-md-3 mb-md-0 mb-3">
        <h5 class="text-uppercase">Learn More</h5>
        <ul class="list-unstyled">
          <li>
            <a href="https://www.mayoclinic.org/diseases-conditions/sepsis/symptoms[]-causes/syc-20351214">Mayoclinic</a>
          </li>
          <li>
            <a href="https://www.medicalnewstoday.com/articles/305782.php">medicalnewstoday</a>
          </li>
          <li>
            <a href="https://www.nhsinform.scot/illnesses-and-conditions/blood-and-lymph/sepsis">NHSinform</a>
          </li>
          <li>
            <a href="https://www.who.int/news-room/fact-sheets/detail/sepsis">WHO_sepsis</a>
          </li>
        </ul>
      </div>
      <div class="col-md-3 mb-md-0 mb-3">
        <h5 class="text-uppercase">Contact US</h5>
        <ul class="list-unstyled">
          <li>
            <a href="#!">Mobno</a>
          </li>
          <li>
            <a href="#!">Twitter</a>
          </li>
          <li>
            <a href="#!">Fb</a>
          </li>
          <li>
            <a href="#!">Insta</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright text-center py-3">&copy; 2020 Copyright:
    <a href="">SDUCD</a>
  </div>
</footer>
<!-- End of Footer -->
</div>


</body>

</html>