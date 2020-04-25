<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE HTML>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Parkalot </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo"><strong>Parkalot   </strong>|   A Parking Management System</a>
					<nav id="nav">
						<a href="index.html">Home</a>
						<a href="about.php?id=<?php $id = $_SESSION['id']; echo $id?>">About</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<h1>CLIENT PORTAL</h1>
					</header>

				<div class="flex">

						<div>
							<span class="icon fa-car"></span>
							<a href="../reservation-form.php?id=<?php $id = $_SESSION['id']; echo $id?>"><h3>Reservation</h3></a>
							<p>For reservation click the link above.</p>
						</div>

						<div>
							<span class="icon fa-camera"></span>
							<a href="../view-billing.php?id=<?php $id = $_SESSION['id']; echo $id?>"><h3>Monitor Bill</h3></a>
							<p>View your current bill. Click link above.</p>
						</div>

					<!-- 	<div>
							<span class="icon fa-bug"></span>
							<h3>Park Management</h3>
							<p>Manage your parking space with uniqueness</p>
						</div> -->

				</div>

					<footer>
						<a href="#" class="button">Secure a Parking Space Now</a>
					</footer>
				</div>
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center">
				<div class="inner">
					<div class="flex flex-2">
						<article>
							<div class="image round">
								<img src="images/pic01.jpg" alt="Pic 01" />
							</div>
							<header>
								<h3>Parking <br /> Different Vehicles</h3>
							</header>
							<p>Accessing your parking space by getting an issued ID by the system<br />There will be different parking spaces for different kinds of vehicles</p>
							<footer>
								<a href="#" class="button">Learn More</a>
							</footer>
						</article>
						<article>
							<div class="image round">
								<img src="images/pic02.jpg" alt="Pic 02" />
							</div>
							<header>
								<h3>Complete Monitoring<br /> Accurate Time and Date</h3>
							</header>
							<p>There will be a log for vehicles that goes in and goes out of the parking space<br /> There will be proper monitoring of each vehicle status</p>
							<footer>
								<a href="#" class="button">Learn More</a>
							</footer>
						</article>
					</div>
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