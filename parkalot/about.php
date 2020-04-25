<?php session_start(); 
$id = $_GET['id']; ?>
<!DOCTYPE HTML>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>About - Parkalot by PHP 2 IT-1</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo"><strong>Parkalot</strong> by PHP 2 IT-1</a>
					<nav id="nav">
						<?php if($id > 0){ ?>
							<a href="clientPortal.php?id=<?php $id = $_SESSION['id']; echo $id?>">Home</a>
						<?php }else{ ?>
							<a href="index.html">Home</a>
						<?php } ?>
						<a href="about.php?id=<?php $id = $_SESSION['id']; echo $id?>">About</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2><b>Why is the system named Parkalot?</b> </h2>
						<p><b>Service Description</b> </p>
					</header>
					<div class="image round left">
						<img src="images/pic01.jpg" alt="Pic 01" />
					</div>
					<p>
						People face parking problems in most metropolitan area. Parkalot's aim is to make people find their parking space easily and assure no difficulties in parking. <b>"To park a lot is to secure a lot."</b> This project offers a web based reservation system
						where users can view various parking areas and select the space to view whether space is available or not. The difficulty roots from not knowing where the parking spaces are available at the given time, even if this is known; many vehicles may pursue a small number of parking spaces which in turn leads to serious traffic load. Users can even make payment online via credit card. After making payment users are notified about the booking via email along with unique parking number. 
					</p>

					<div class="image round right">
						<img src="images/pic02.jpg" alt="Pic 02" />
					</div>
					<p>Our online parking management system, <b>Parkalot</b>, is designed to make it easier for people to book parking spaces online. Our online reservation system to reserve parking spaces in the immediate parking, additional services and home purchase will increaseyour website by enabling customers to pay or go online. As they need, and to set the period of availability can add many types ofvehicle seats by the system administrator. It is designed to make it easier for people to book parking spaces online. Availability andprices can add up for a period of several vehicle types as vehicle parking space reservation system administrators as they need. Intoday parking lots there are no standard system to check for parking spaces. Searching for a vacant parking space in a metropolitan area is the daily concern for most people and it is time consuming.</p>

				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">

					<h3>Get in touch</h3>

					<form action="#" method="post">

						<div class="field half first">
							<label for="name">Name</label>
							<input name="name" id="name" type="text" placeholder="Name">
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input name="email" id="email" type="email" placeholder="Email">
						</div>
						<div class="field">
							<label for="message">Message</label>
							<textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
						</div>
						<ul class="actions">
							<li><input value="Send Message" class="button alt" type="submit"></li>
						</ul>
					</form>

					<div class="copyright">
						&copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com">Unsplash</a>.
					</div>

				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>