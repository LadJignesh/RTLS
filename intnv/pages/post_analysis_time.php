<?php
include("config.php");

if($_POST["dur"]=="1")
{

							$sql ="SELECT * FROM rtls";

							$result = $conn->query($sql);

							if ($result->num_rows > 0) {

								while($row = $result->fetch_assoc()) {



								}

							} else {
								//echo "0 results";


							}

							$conn->close();
						?>
}