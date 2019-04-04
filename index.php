<?php
include("connection.php");
 /* session_start();
  if(!isset($_SESSION['uName'])){
  header('Location: index.php');


}*/
/*
session_start();
$isLoggedin=0;
  if(isset($_SESSION['username'])&& !empty($_SESSION['username'])){
    header('Location: login.php');
    $isLoggedin=1;
  }
  else{
    header('Location: index.php');
  }*/
  session_start();
  if(isset($_SESSION['username'])){
    echo "
    <script>var isLoggedIN = 'true';
    console.log(isLoggedIN)</script>
    ";
  }
  else{
    echo "
    <script>var isLoggedIN = 'false';
    console.log(isLoggedIN)</script>";
  }

  
  $sql = "SELECT * FROM `items` ORDER BY `iId` DESC Limit 4";
  $result = getData($sql);

/*   if(!isset($_SESSION['username'])){
    header('Location: index.php?');
  }else{
    header('Location: index.php');
  }*/
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="CSS/NewHomepage.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<title> Home Page </title>

</head>
</body>
<!--NEW NAVBAR-------------------------------------------------------------------------------------------->
<section>
      <nav class="navbar navbar-fixed-top navbar-expand-lg justify-content-between" style="background-color:#563d7c;">
   	 <div class="container-fluid">
   		<a class="navbar-brand" href="#" style="color:#f8f9fa; size:.9rem;" >BoOks&Exchange</a>
   		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   				<span class="navbar-toggler-icon"></span>
   		</button>
   		<div class="collapse navbar-collapse" id="navbarSupportedContent">
   			<ul class="navbar-nav mr-auto">
   		<!--		<li class="nav-item active">
   					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
   				</li>
   				<li class="nav-item">
   					<a class="nav-link" href="#">Link</a>
   				</li>
   				<li class="nav-item dropdown">
   					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   					Dropdown
   					</a>
   					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
   						<a class="dropdown-item" href="#">Action</a>
   						<a class="dropdown-item" href="#">Another action</a>
   							<div class="dropdown-divider"></div>
   								<a class="dropdown-item" href="#">Something else here</a>
   					</div>
   				</li>

   				<li class="nav-item">
   					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
   				</li>
   		-->
   			</ul>
        <!--Before Login Button-->
         <button class="btn btn-outline-light btn-sm my-2 my-sm-0" id="loginBtn" onclick="location.href = 'login.php';" style="margin-right:0.7%; size:.9rem;"><i class="fas fa-sign-in-alt fa-sm"></i> Login</button>
         <button class="btn btn-outline-light btn-sm my-2 my-sm-0" id="signupBtn" onclick="location.href = 'signup.php';" style="size:.9rem;"><i class="fas fa-user-plus fa-sm"></i> Sign Up</button>
         <!-- After login Buttons-->
         <button class="btn btn-outline-light btn-sm my-2 my-sm-0" id="dashBtn" hidden onclick="location.href = 'Dashboard/dashboard.php';" style="margin-right:0.7%; size:.9rem;"><i class="far fa-list-alt fa-sm"></i> Dashboard </button>
          <button class="btn btn-outline-light btn-sm my-2 my-sm-0" id="logoutBtn" hidden onclick="location.href = 'logout.php';" style="size:.9rem;"><i class="fas fa-sign-out-alt"></i> Logout</button>
          <!--BUttons script--> 
          <script>
          if(isLoggedIN=="true"){
            document.getElementById('dashBtn').hidden = false;
            document.getElementById('logoutBtn').hidden = false;
            document.getElementById('loginBtn').hidden = true;
            document.getElementById('signupBtn').hidden = true;
          }
          else{
            document.getElementById('loginBtn').hidden = false;
            document.getElementById('signupBtn').hidden = false;
          }
          </script>
          <!--BUttons script End-->
         <!--
         <?php
        /* if(isset($_SESSION['uName'])){
           echo'
            <button class="btn btn-outline-light btn-sm my-2 my-sm-0" onclick="location.href = '"Dashboard/dashboard.php"';" style="margin-right:0.7%; size:.9rem;"><i class="fas fa-columns fa-sm"></i> Dashboard </button>
            <button class="btn btn-outline-light btn-sm my-2 my-sm-0" onclick="location.href = "logout.php";" style="size:.9rem;"><i class="fas fa-sign-out-alt"></i> Logout</button>
            ';
         }else{
          echo'
            <button class="btn btn-outline-light btn-sm my-2 my-sm-0" onclick="location.href = "login.php";" style="margin-right:0.7%; size:.9rem;"><i class="fas fa-sign-in-alt fa-sm" ></i> Login</button>
         <button class="btn btn-outline-light btn-sm my-2 my-sm-0" onclick="location.href = "signup.php";" style="size:.9rem;"><i class="fas fa-user-plus fa-sm"></i> Sign Up</button>
          ';
        }*/
         ?>-->
     </div>
     </div>
   </nav>
    </section>

    <!--Navbar END------------------------------------------------------------------------------------------------------------->
    <section>
      <div id="container-fluid">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width:100% ;height:640px background-color:#ffffff";>
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" ></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner ">
          <div class="carousel-item active">
            <img src="IMG/homy1.jpg" class="d-block w-100 " alt="..." style="width:100%;height:640px">
          </div>
          <div class="carousel-item">
            <img src="IMG/homy2.jpg" class="d-block w-100" alt="..." style=" width:100% ;height:640px">
          </div>
          <div class="carousel-item">
            <img src="IMG/homy3.jpg" class="d-block w-100" alt="..." style=" width:100% ;height:640px">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      </div>
    </section>
    <!-- Carousel end-->
    <section class="bkcolor" style="background-color:#563d7c">
      <div class="container"  >
      	<div class="row selctionPane" style="background-color:#563d7c">
          <a href="generalPage.php?category='buy'" style="text-decoration: none; color: black;">
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card text-center card-size" style="margin-left:3.2rem;">
            <div class="card-body card-body-size" >;
                <i class="fas fa-shopping-cart fa-5x" style="padding:2rem 0rem 4rem 0rem;color:#3C1E00"></i>
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class="card-footer card-footer-bottom">
              <small class="font-weight-bolder" style="color:#3C1E00"><h3>BUY</h3></small>
            </div>
            </div>
          </div>
        </a>
          <a href="generalPage.php?category='donate'" style="text-decoration: none; color: black;">
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card text-center card-size">
            <div class="card-body card-body-size">
              <i class="fas fa-hands-helping fa-5x" style="padding:2rem 0rem 4rem 0rem;color:#3C1E00"></i>
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class="card-footer card-footer-bottom">
              <small class="font-weight-bolder" style="color:#3C1E00"><h3>DONATE</h3></small>
            </div>
            </div>
          </div>
        </a>
              <a href="generalPage.php?category='exchange'" style="text-decoration: none; color: black;">
              <div class="col-lg-4 col-md-6 col-sm-12">
          			<div class="card text-center card-size">
            		<div class="card-body card-body-size">
                  <i class="fas fa-exchange-alt fa-5x" style="padding:2rem 0rem 4rem 0rem;color:#3C1E00"></i>
              		<h5 class="card-title">Special title treatment</h5>
              		<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer card-footer-bottom">
                  <small class="font-weight-bolder" style="color:#3C1E00"><h3>EXCHANGE</h3></small>
                </div>
          			</div>
        			</div>
            </a>
      		</div>
      </div>
    </section>
    <!--3 option end & recnt start-->
    <section class="recently-add" style="background-color:#3C1E00">
      <p class="font-weight-bolder text-center tag " >Recently Added Items
      </p>
      <div class="container">
        <div class="row itemSelection" style="background-color:#3C1E00; padding-bottom: 3.5rem;">
          
            <?php

            if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
            echo '
            
            <div class="col-lg-3 col-md-6 col-sm-12 card-margin">
              <a href="individItemPage.php?itemId='.$row['iId'].'">
                <div class="card" style="text-decoration: none; color: black;">
                  <img src="'.$row['iImage'].'" class="card-img-top" alt="..." style="height:280px; width:250px;">
                  <div class="card-body card-body-sizing">
                      <h5 class="card-text">'.$row["iName"].'</br><small class="text">Rs : '.$row["iPrice"].'/-</small></h5>    
                  </div>
                </div>
                </a>
              </div>
              <!--
            <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card card-size">
              <div class="card-body card-body-size">
                <h5 class="card-title">Image</h5>
                <p class="card-text">Item Description</p>
              </div>
              <div class="card-footer card-footer-bottom">
                <large class="font-weight-bolder"><a>Price : <i class="fas fa-rupee-sign"></i>360</a></large>
              </div>
            </div>
          </div>-->
         ' ;
          }
          }
        ?>
        <!--
          <div class="col-lg-3 col-md-6 col-sm-12" >
            <div class="card card-size">
            <div class="card-body card-body-size">
              <h5 class="card-title">Image</h5>
              <p class="card-text">Item Description </p>
            </div>
            <div class="card-footer card-footer-bottom">
              <large class="font-weight-bolder"><a>Price : <i class="fas fa-rupee-sign"></i>360</a></large>
            </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12" >
            <div class="card card-size" >
            <div class="card-body card-body-size">
              <h5 class="card-title">Image</h5>
              <p class="card-text">Item Description</p>
            </div>
            <div class="card-footer card-footer-bottom">
              <large class="font-weight-bolder"><a>Price : <i class="fas fa-rupee-sign"></i>360</a></large>
            </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card card-size">
              <div class="card-body card-body-size">
                <h5 class="card-title">Image</h5>
                <p class="card-text">Item Description</p>
              </div>
              <div class="card-footer card-footer-bottom">
                <large class="font-weight-bolder"><a>Price : <i class="fas fa-rupee-sign"></i>360</a></large>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card card-size">
              <div class="card-body card-body-size">
                <h5 class="card-title">Image</h5>
                <p class="card-text">Item Description</p>
              </div>
              <div class="card-footer card-footer-bottom">
                <large class="font-weight-bolder"><a>Price : <i class="fas fa-rupee-sign"></i>360</a></large>
              </div>
            </div>
          </div>-->

        </div>
      </div>
    </section>
<!------------------recent end-------------------------------------------------------------------->

    <footer  style="width:100% ; background-color:#000000">
      <div class="container" style="padding:1.2rem 0rem 1.5rem 0rem;">
      	<div class="row">
	       <div class="col-sm-6 col-lg-6" style="display:inline; align-content: center;color:white;   float:left;" >
	         <h5>About BoOks&Exchange</h5>
	         <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
	        labore et dolore magna aliqua.  nulla pariatur.unt in culpa qui officia deserunt mollit anim id est laborum."</p>
	        <div class="social" style="color:white; padding-left:8.5rem;">
	          <i class="fab fa-facebook fa-2x fa-icon" href="facebook.com"></i>
	          <i class="fab fa-instagram fa-2x fa-icon" href="instagram.com"></i>
	          <i class="fab fa-twitter fa-2x fa-icon" href="twitter.com"></i>
	          <i class="fa fa-envelope fa-2x fa-icon" href="gmail.com"></i>
	        </div>
	       </div>
	       <div class="col-sm-6 col-lg-6 abt-head" style="">
	        <h5>Subscribe to our Newsletter</h5>
	        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, </p>
	        <div>
	          <input type="email" class="form-ctrl"  placeholder="Enter your email">
	        <div>
	          <button class="btn btn-primary btn-md "  type="submit" style="margin-top:1.2rem;">Subscribe</button>
	        </div>
	        </div>
	       </div>
      </div>
  	</div>
  	 <!--
      <div class="container row" style="margin-top: 2rem; padding-left: 43%; ">
       <div class="social" style="color:white;">
          <i class="fab fa-facebook fa-2x fa-icon"></i>
          <i class="fab fa-instagram fa-2x fa-icon"></i>
          <i class="fab fa-twitter fa-2x fa-icon"></i>
          <i class="fa fa-envelope fa-2x fa-icon"></i>
        </div>
      </div>
  	-->
    </footer>
</body>
</html>
