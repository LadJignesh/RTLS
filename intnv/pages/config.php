<?php
//echo "<br>";         
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "rtls1";
						
						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						} 