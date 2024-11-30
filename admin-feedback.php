<?php 
$sql = "SELECT * FROM feedbacks";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Feedback: " . $row["feedback"]. "<br>";
  }
} else {
  echo "No feedbacks found";
}
?>