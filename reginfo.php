<?php

$host = "localhost";
$user = "root";
$password ="";
$database = "a3075631_slsoc";

$course = "";
$fname = "";
$lname = "";
$nic = "";
$slsocid = "";
$adone = "";
$adtwo = "";
$city = "";
$country = "";
$num = "";
$email = "";
$username = "";
$pw = "";
$gender = "";
$year = "";
$month = "";
$date = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['course'];
    $posts[1] = $_POST['fname'];
    $posts[2] = $_POST['lname'];
	$posts[5] = $_POST['adone'];
	$posts[6] = $_POST['adtwo'];
	$posts[7] = $_POST['city'];
	$posts[8] = $_POST['country'];
	$posts[9] = $_POST['num'];
    $posts[10] = $_POST['email'];
	$posts[13] = $_POST['gender'];
	$posts[14] = $_POST['year'];
	$posts[15] = $_POST['month'];
	$posts[16] = $_POST['date'];
    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();

    $search_Query = "SELECT * FROM apply WHERE course = $data[0]";

    $search_Result = mysqli_query($connect, $search_Query);

    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $id = $row['course'];
                $fname = $row['fname'];
                $lname = $row['lname'];
				$adone = $row['adone'];
				$adtwo = $row['adtwo'];
				$city = $row['city'];
				$country = $row['country'];
				$num = $row['num'];
                $email = $row['email'];
				$gender = $row['gender'];
				$year = $row['year'];
				$month = $row['month'];
				$date = $row['date'];
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `apply`(`course`,`fname`, `lname`, `adone`,`adtwo`,`city`,`country`,`num`,`email`,`gender`,`year`,`month`,`date`) VALUES ('$data[1]','$data[2]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[13]','$data[14]','$data[15]','$data[16]')";
    try{
        $insert_Result = mysqli_query($connect, $insert_Query);

        if($insert_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Inserted !!';
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
}

// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `apply` WHERE `course` = $data[0]";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);

        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}

// Edit
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `apply` SET `fname`='$data[1]',`lname`='$data[2]',`adone`='$data[5]',`adtwo`='$data[6]',`city`='$data[7]',`country`='$data[8]',`num`='$data[9]',`email`='$data[10]',`gender`='$data[13]',`year`='$data[14]',`month`='$data[15]',`date`=$data[15] WHERE `course` = $data[0]";
    try{
        $update_Result = mysqli_query($connect, $update_Query);

        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Updated !!';
            }else{
                echo 'Data Not Updated';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessage();
    }
}

?>


<!doctype html>
<html class="no-js" lang="">


<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Registration Page || TuTe.lk</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- favicon
		============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
		<!-- Google Fonts
		============================================ -->
		<link href='../../../../fonts.googleapis.com/csse3e5?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href="../../../../allfont.net/allfont348c.css?fonts=montserrat-light" rel="stylesheet" type="text/css" />

		<!-- style CSS
		============================================ -->
        <link rel="stylesheet" href="style.css">

		<!-- modernizr JS
		============================================ -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
		
		<style>

.about{
	margin-left:50px;
	margin-right:50px;
	font-family: Times New Roman;
	line-height: 180%;
	font-size:135%;
	text-align: left;
	color:#353c47;
}

p span {
   color: white;
   line-height: 300%;
   background: rgb(0, 0, 0); /* fallback color */
   background: rgba(0, 0, 0, 0.5);
   padding: 8px;
}

input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=username], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=id], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 250px;
    background-color: #002147;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	font-size: 15px;
	font-weight: bold;
}

input[type=submit]:hover {
    background-color: #8B008B;
}

.form{
	text-align:left;
	margin-left:50px;
	margin-right:50px;
}

.req{
	color:red;
}

</style>
		
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<!--start header  area -->
	<div class="header_area">
		<div class="container">
			<div class="row">
				<!-- header  logo -->
				<div class="col-md-4 col-sm-3 col-xs-12">
					<div class="logo"><a href="index.html"><img src="img/logo.png" alt="" /></a></div>
				</div>
				<!-- end header  logo -->
				<div class="col-md-8 col-sm-9 col-xs-12">
					<div>
						<div class="form pull-right">
							<div class="language">
								  <select class="form-lan">
								    <option value="english" selected>English</option>
								    <option value="english">Arabic</option>
								  </select>
							</div>
						</div>
						<div class="social_icon pull-right">
							<p>
							   <a target="_blank" href="#" class="icon-set"><i class="fa fa-facebook"></i></a>
							   <a target="_blank" href="#" class="icon-set"><i class="fa fa-twitter"></i></a>
							   <a target="_blank" href="#" class="icon-set"><i class="fa fa-linkedin"></i></a>
							</p>
						</div>
					</div>
					<div class="phone_address pull-right clear">
						<p class="no-margin">
						  <small>
							  <span class="text-msg">Have any questions?</span>
							  <span class="icon-set"><i class="fa fa-phone"></i> +880 1973 833 508</span>
							  <span class="icon-set"><i class="fa fa-envelope"></i> admin@bootexperts.com</span>
						  </small>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!--end header  area -->
    <!--Start nav  area -->
	<div class="nav_area">
		<div class="container">
			<div class="row">
				<!--nav item-->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<!--  nav menu-->
          <nav class="menu">
						<ul class="navid pull-left">
							<li><a href="index.html">Home</i></a>
							</li>
							<li><a href="#">Courses <i class="fa fa-angle-down"></i></a>
								<ul>
									<li><a href="courses-item.html">School Of Computing</a></li>
                  <li><a href="courses-item.html"> School of Business</a></li>
                  <li><a href="courses-item.html">School of engineering</a></li>
								</ul>
							</li>
              <li><a href="#">University<i class="fa fa-angle-down"></i></a>
								<ul>
									<li><a href="courses-item.html">NSBM</a></li>
                  <li><a href="courses-item.html"> APIIT</a></li>
                  <li><a href="courses-item.html">SLIIT</a></li>
								</ul>
							</li>
							<li><a href="about-page.html">About Us</a></li>
							<li><a href="reg.php">Register</a></li>
							<li><a href="contract.html">Contact</a></li>
						</ul>
					</nav>
					<!--end  nav menu-->
					<div class="search pull-right">
						<div class="search-box">
							<input type="text" class="form_control" placeholder="search" />
							<span class="search-open"><i class="fa fa-search search"></i><i class="fa fa-close hidden close"></i></span>
						</div>
					</div>
				</div>
				<!--end nav item -->
			</div>
		</div>

	</div>
	<!--end nav  area -->
	<!--Start mobile menu  area -->
	<div class="mobile_memu_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="mobile_memu">
					<!--  nav menu-->
					<nav>
						<ul class="navid">
							<li><a href="index.html">Home</a>
								<ul>
									<li><a href="index-2.html">Home 2</a></li>
									<li><a href="index-3.html">Home 3</a></li>
									<li><a href="index-4.html">Home Box Layout</a></li>
								</ul>
							</li>
							<li><a href="#">Courses</a>
								<ul>
									<li><a href="courses-item-1.html">Courses List layout 1</a></li>
									<li><a href="courses-item-2.html">Courses List layout 2 </a></li>
									<li><a href="single-courses.html">Course Item </a></li>
								</ul>
							</li>
							<li><a href="#">Pages</a>
								<ul>
									<li><a href="faq.html">FAQ </a></li>
									<li><a href="login.html">Login Page  </a></li>
									<li><a href="gellary.html">Image Gallery </a></li>
									<li><a href="about-page.html">About Page </a></li>
									<li><a href="news-bulletin.html">News Bulletin  </a></li>
									<li><a href="registration.html">Registration Form</a></li>
									<li><a href="contract.html">Contacts </a></li>
									<li><a href="404.html">404 </a></li>
								</ul>
							</li>
							<li><a href="store.html">Store</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="about-page.html">About Us</a></li>
							<li><a href="contract.html">Contact</a></li>
						</ul>
					</nav>
					<!--end  nav menu-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end mobile menu  area -->
	<div class="contact_area">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<div class="contact_us">

<!-- Start Of The Form -->



            <div class="col-md-12 col-sm-6 hero-feature">
                
<div class="form">


        <form action="reginfo.php" method="post">
		<strong>

            Course ID : <input type="number" name="course" placeholder="" value="<?php echo $course;?>">  &nbsp;&nbsp;&nbsp; <input type="submit" name="search" value="Search"> <br><br>

            First Name : <input type="text" name="fname" placeholder="" value="<?php echo $fname;?>"><br><br>

            Last Name : <input type="text" name="lname" placeholder="" value="<?php echo $lname;?>"><br><br>

			Address Line 1 : <input type="text" name="adone" placeholder="" value="<?php echo $adone;?>"><br><br>

			Address Line 2 : <input type="text" name="adtwo" placeholder="" value="<?php echo $adtwo;?>"><br><br>

			City : <input type="text" name="city" placeholder="" value="<?php echo $city;?>"><br><br>

			Country : <input type="text" name="country" placeholder="" value="<?php echo $country;?>"><br><br>

			Mobile Number : <input type="text" name="num" placeholder="" value="<?php echo $num;?>"><br><br>

            Email : <input type="text" name="email" placeholder="" value="<?php echo $email;?>"><br><br>

			Gender : <input type="text" name="gender" placeholder="" value="<?php echo $gender;?>"><br><br>

			Year : <input type="text" name="year" placeholder="" value="<?php echo $year;?>"><br><br>

			Month : <input type="text" name="month" placeholder="" value="<?php echo $month;?>"><br><br>

			Date : <input type="text" name="date" placeholder="" value="<?php echo $date;?>"><br><br>

            <div>
                <!-- Input For Add Values To Database-->
                <input type="submit" name="insert" value="Insert">&nbsp;&nbsp;&nbsp;

                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update">&nbsp;&nbsp;&nbsp;

                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete">&nbsp;&nbsp;&nbsp;

                <!-- Input For Find Values With The given ID -->
                <input type="submit" name="search" value="Search">
				
				<!-- Next -->
                <input type="submit" name="next" value="Next">
				
            </div>
			</strong>
        </form></div>
				
            </div>




<!-- End Of The Form -->         

 

						
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</div>
	<!--end courses  area --> 
	
	
	
	<!--start share  area -->
	<div class="share_area">
		<div class="container">
			<div class="row">
				<div class="share-container">
					<!-- single item brand -->
					<div class="col-md-3 col-sm-6 col-lg-3">
						<div class="share-item">
							<div class="brand_content content_left_fb">
								<a href="#">
									<i class="fa fa-facebook"></i>
									<div class="icone_text">
									<p>893K Followers</p>
									<h5>Follow Us</h5>
									</div>
								</a>
							</div>
						</div>
					</div>
					<!-- end single item brand -->
					<!-- single item brand -->
					<div class="col-md-3 col-sm-6 col-lg-3">
						<div class="share-item">
							<div class="brand_content content_left_tw">
								<a href="#">
									<i class="fa fa-twitter"></i>
									<div class="icone_text">
									<p>893K Followers</p>
									<h5>Follow Us</h5>
									</div>
								</a>
							</div>
						</div>
					</div>
					<!-- end single item brand -->
					<!-- single item brand -->
					<div class="col-md-3 col-sm-6 col-lg-3">
						<div class="share-item">
							<div class="brand_content content_left_pn">
								<a href="#">
									<i class="fa fa-google-plus"></i>
									<div class="icone_text">
									<p>893K Followers</p>
									<h5>Follow Us</h5>
									</div>
								</a>
							</div>
						</div>
					</div>
					<!-- end single item brand -->
					<!-- single item brand -->
					<div class="col-md-3 col-sm-6 col-lg-3">
						<div class="share-item">
							<div class="brand_content content_left_in">
								<a href="#">
									<i class="fa fa-linkedin"></i>
									<div class="icone_text">
									<p>893K Followers</p>
									<h5>Follow Us</h5>
									</div>
								</a>
							</div>
						</div>
					</div>
					<!-- end single item brand -->
				</div>
			</div>
		</div>
	</div>
	<!--end share  area -->
	
	<!-- breadcrumb-area start -->
	<div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="breadcrumb">
						<ul>
							<li>You Are Here <i class="fa fa-angle-right"></i></li>
							<li><a href="index.html">Home</a> <i class="fa fa-angle-right"></i></li>
							<li>Pages <i class="fa fa-angle-right"></i></li>
							<li>Login Page</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- breadcrumb-area end -->
	<!-- footer  area -->
  <div class="footer_area">
		<div class="container">
			<div class="row">
				<div class="borderbottom">
					<div class="col-md-6 col-sm-12">



					<div class="col-md-6 col-sm-12">

					</div>
				</div>
			</div>
			<!-- widget area -->
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<!--single widget item -->
					<div class="single_widget">
						<div class="widget_thumb">
							<img src="img/home1/camp-1.png" alt="" />
						</div>
						<div class="widget_content">
							<h2>Come & enjoy our free webinner</h2>
							<p>Pellentesque habitant morbi tristique senectus et netus et malesuada </p>
							 <a href="#" class="read_more">JOIN NOW</a>
						</div>
					</div>
					<!--single widget item -->
					<div class="single_widget">
						<div class="widget_thumb">
							<img src="img/home1/camp-2.jpg" alt="" />
						</div>
						<div class="widget_content">
							<h2>Come & enjoy our free webinner</h2>
							<p>Pellentesque habitant morbi tristique senectus et netus et malesuada </p>
							 <a href="#" class="read_more">JOIN NOW</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<!--single widget item -->
					<div class="single_widget">
						<div class="widget_content">
							<h2>Meet NSBM</h2>
							<ul>
								<li><a href="#">Get Started</a></li>
								<li><a href="#">Download</a></li>
								<li><a href="#">Scaffolding</a></li>
								<li><a href="#">Base CSS</a></li>
							</ul>
						</div>
					</div>
					<!--single widget item -->
					<div class="single_widget">
						<div class="widget_content">
							<h2>Help and Support</h2>
							<ul>
								<li><a href="#">Get Started</a></li>
								<li><a href="#">Download</a></li>
								<li><a href="#">Scaffolding</a></li>

							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<!--single widget item -->
					<div class="single_widget">
						<div class="widget_content">
							<h2>Join Our Community</h2>
							<ul>
								<li><a href="#">Official Website</a></li>
								<li><a href="#"> Wiki</a></li>

							</ul>
						</div>
					</div>
					<!--single widget item -->
					<div class="single_widget">
						<div class="widget_content">
							<h2>Subscribe Newsletter</h2>
							<p>Get latest updates, news, survays & offers</p>
							<div class="inputbox">
								<input type="text" placeholder="your email here" name="name"/>
								<button type="submit" class="read_more buttons">Subscribe  <i class="fa fa-graduation-cap"></i></button>
							</div>
						</div>
					</div>
					<!--end single widget item -->
				</div>
			</div>
			<!-- end widget area -->
		</div>
	</div>
	<!-- end footer  area -->
	<!-- footer bottom area -->
	<div class="footer_bottom_area">
		<div class="container">
			<div class="row">
				<div class=" col-sm-6 col-md-6 col-lg-6">
					<div class="footer_text">
						<p>
							Copyright © 2017 fsgang. All Rights Reserved.
						</p>
					</div>
				</div>
				<div class=" col-sm-6 col-md-6 col-lg-6">
					<p class="text-right">Design By <a href="#">Fit Swift Gang</a></p>
				</div>
			</div>
		</div>
	</div>
		<!-- jquery
		============================================ -->
        <script src="js/vendor/jquery-1.11.3.min.js"></script>
		<!-- bootstrap JS
		============================================ -->
        <script src="js/bootstrap.min.js"></script>
		<!-- wow JS
		============================================ -->
        <script src="js/wow.min.js"></script>
		 <!-- Nivo Slider JS -->
		<script src="js/jquery.nivo.slider.pack.js"></script>
		<!-- meanmenu JS
		============================================ -->
        <script src="js/jquery.meanmenu.min.js"></script>
		<!-- owl.carousel JS
		============================================ -->
        <script src="js/owl.carousel.min.js"></script>
		<!-- scrollUp JS
		============================================ -->
        <script src="js/jquery.scrollUp.min.js"></script>
		<!-- Apple TV Effect -->
        <script src="js/atvImg-min.js"></script>
		<!-- Add venobox js -->
		<script type="text/javascript" src="venobox/venobox.min.js"></script>
		<!-- plugins JS
		============================================ -->
        <script src="js/plugins.js"></script>
		<!-- main JS
		============================================ -->
        <script src="js/main.js"></script>
    </body>

<!-- Mirrored from hastech.company/tf/academia-preview/academia/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Jan 2017 04:09:32 GMT -->
</html>
