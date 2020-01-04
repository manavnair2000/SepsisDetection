<?php
session_start();?>
<!DOCTYPE html>
<head>
<title>HOMEPAGE</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>


<link rel="stylesheet" href="css/homepage.css" type="text/css" >


</head>
<body>
<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-static-top bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="true" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">SDUCD</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="vitals.php" >Vitals</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="#">
	   <!--input class="form-control mr-sm-2" type="text" placeholder="Patient name" title="name"-->

      <input class="form-control mr-sm-2" type="text" placeholder="Register ID" title="regId">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!-- End of Navigation bar -->

<!---   Carousal controls  -->



<div id="carouselheader" class="carousel slide" data-ride="carousel" data-interval="2000">
  <ol class="carousel-indicators">
    <li data-target="#carouselheader" data-slide-to="0" class="active"></li>
    <li data-target="#carouselheader" data-slide-to="1"></li>
    <li data-target="#carouselheader" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/dummy1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/dummy2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/dummy3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselheader" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselheader" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>





<!-- End of Carousal -->

<!-- Content Section -->

<div class=" outercontent">

<div class=" innercontent">

<div class="container">
<!-- About -->
<h4 class="display-4" style="display:inline-block;">ABOUT</h4><br>
<div class="row">
<p class="col-md-7 desc">
Sepsis is the result of a massive immune response to bacterial infection that gets into the blood.
It often leads to organ failure or injury.
Sepsis is a medical emergency that becomes fatal or
life-changing for many of the individuals who develop this "blood poisoning."
Getting urgent medical treatment is key to the chances of surviving sepsis.
In the worst cases, sepsis leads to a life-threatening drop in blood pressure.
 Doctors call this “septic shock.” It can quickly lead to the failure of
 several organs -- lungs, kidneys, and liver. This can be fatal in some cases.
 Bacterial infections are most often to blame. But sepsis can also result from
 other infections. It can begin anywhere bacteria or viruses enter the body. So,
 it could sometimes be caused by something as minor as a scraped knee or nicked cuticle.
 If you have a more serious medical problem such as appendicitis, pneumonia, meningitis,
 or a urinary tract infection, you’re also at risk.



</p>
<span class="col-md-5">
<img src="images/dummy1.jpg" style="width:400px;height:400px;">
</span>
</div>
<!-- End of About -->
<hr>
<!--Symptoms -->
<h4 class="display-4" style="display:inline-block;">SYMPTOMS</h4><br><br>
<div class="row">
<span class="col-md-5">
<img src="images/dummy1.jpg" style="width:400px;height:400px;">
</span>
<ul class="col-md-7 symptomul">
<li>Fever (high temperature, pyrexia), and there may be chills and shivering</li>
<li>Fast heart rate/pulse (tachycardia)</li>
<li>Rapid rate of breathing (tachypnea)</li>
<li>Unusual levels of sweating (diaphoresis)</li>
<li>Dizziness or feelings of faintness</li>
<li>Confusion or a drop in alertness, or any other unusual change in mental state, including a feeling of doom or a real fear of death</li>
<li>Slurred speech</li>
<li>Diarrhea, nausea, or vomiting</li>
<li>Severe muscle pain and extreme general discomfort</li>
<li>Difficulty breathing - shortness of breath</li>
<li>Skin that is cold, clammy, and pale, or discolored or mottled</li>
<li>Loss of consciousness</li>

</ul>

</div>



<!-- End of Symptoms -->
<hr>
<!-- Prevention -->
<h4 class="display-4" style="display:inline-block;">Prevention</h4><br>
<div class="row">
<p class="col-md-7 desc">

Prevention of infection in the community involves using effective hygiene practices,
such as hand washing, and safe preparation of food, improving sanitation and water quality
 and availability, providing access to vaccines, particularly for those at high risk, as well
 as appropriate nutrition, including breastfeeding for newborns.
Prevention of infection in health care facilities mainly relies on having functioning infection
prevention and control (IPC) programmes and teams, effective hygiene practices and precautions,
including hand hygiene, along with a clean, well-functioning environment and equipment.
<br>


</p>
<span class="col-md-5">
<img src="images/dummy1.jpg" style="width:300px;height:300px;">
</span>
</div>






<!-- End of Prevention -->
</div>
</div>
<!-- End of Content Section -->
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
</div>
</body>
</html>
