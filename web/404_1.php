<!DOCTYPE html>
<html>
<head>
	<title>Manage Closing Days - Salon Admin</title>
	<style>
		table {
			border-collapse: collapse;
			width: 50%;
			margin: 20px auto;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #4CAF50;
			color: white;
		}
		form {
			width: 50%;
			margin: 20px auto;
			border: 1px solid #ccc;
			padding: 10px;
			border-radius: 5px;
		}
		input[type=text], input[type=date] {
			padding: 5px;
			width: 100%;
			border: 1px solid #ccc;
			border-radius: 3px;
			margin-bottom: 10px;
			box-sizing: border-box;
		}
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 15px;
			border: none;
			border-radius: 3px;
			cursor: pointer;
		}
		input[type=submit]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
	<h2>Manage Closing Days</h2>

	<?php
		// Connect to the database
		$host = 'localhost';
		$username = 'your_username';
		$password = 'your_password';
		$dbname = 'your_database_name';

		$conn = mysqli_connect($host, $username, $password, $dbname);
		if (!$conn) {
		    die('Connection failed: ' . mysqli_connect_error());
		}

		// If form is submitted, insert new closing day into database
		if (isset($_POST['date']) && isset($_POST['reason'])) {
			$date = $_POST['date'];
			$reason = $_POST['reason'];
			$sql = "INSERT INTO closing_days (day, reason) VALUES ('$date', '$reason')";
			if (mysqli_query($conn, $sql)) {
				echo "<p style='color: green'>Closing day added successfully.</p>";
			} else {
				echo "<p style='color: red'>Error adding closing day: " . mysqli_error($conn) . "</p>";
			}
		}

		// If delete button is clicked, delete the corresponding closing day from database
		if (isset($_GET['delete'])) {
			$id = $_GET['delete'];
			$sql = "DELETE FROM closing_days WHERE id = $id";
			if (mysqli_query($conn, $sql)) {
				echo "<p style='color: green'>Closing day deleted successfully.</p>";
			} else {
				echo "<p style='color: red'>Error deleting closing day: " . mysqli_error($conn) . "</p>";
			}
		}

		// Fetch all closing days from database and display them in a table
		$sql = "SELECT * FROM closing_days";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<table>";
			echo "<tr><th>Date</th><th>Reason</th><th>Action</th></tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td
