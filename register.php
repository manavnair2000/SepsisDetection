<?php
session_start();
?>
<!DOCTYPE html>
<head>
<title>RegPage</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/Registration.css" type="text/css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>



</head>
<body>
<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-static-top bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="true" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="index.php">SDUCD</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Registration</a>
      </li>
      <!--li class="nav-item">
        <a class="nav-link " href="vitals.php" >Vitals</a>
      </li-->
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
          header("Location:vitals.php");
        }
    ?>
  </div>
</nav>
<!-- End of Navigation bar -->
<div class="outercontent">
<div class="innercontent">
<form class="regform" action="new_patient.php" method="post">
  <label for="patient_name"> Name: </label><br/>
  <input type="text" name="patient_name" id="patient_name" placeholder="Enter your Name" /><br/>
  <label for="patient_weight"> Weight: </label><br/>
  <input type="text" name="patient_weight" id="patient_weight" placeholder="Enter you Weight" /><br/>
  <label for="patient_height"> Height: </label> </br>
  <input type="text" name="patient_height" id="patient_height" placeholder="Enter your Height" /><br/>
  <button type="submit" id="Submit" name="Submit">Submit</button>
</form>
</div>
</div>
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
            <a href="https://www.mayoclinic.org/diseases-conditions/sepsis/symptoms-causes/syc-20351214">Mayoclinic</a>
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
</body>
</html>
