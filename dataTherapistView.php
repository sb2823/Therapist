<!DOCTYPE html>
<html>

<head>
  <title>Therapist</title>
  <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
  <div class="background">
    <h1 style="
          text-align: center;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        ">
      Holistic Hand Healer
    </h1>

    <table class="viewTable">
      <tr>
        <th>Therapist First Name</th>
        <th>Therapist Last Name</th>
        <th>Therapist Password</th>
        <th>Therapist Id</th>
        <th>Therapist Phone</th>
        <th>Therapist Email</th>
      </tr>




      <!-- php -->
      <?php

$servername = "sql1.njit.edu";
$username = "sb2823";
$password = "121298Apz@";
$dbname = "sb2823";
$con = mysqli_connect($servername, $username, $password, $dbname);


      if (!$conn) {

        echo "Failed to connect to MySQL: " . mysqli_connect_error();

      }

      $sql = "SELECT * FROM therapists";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" . $row["firstName"] . "</td><td>" . $row["lastName"] . "</td><td>" . $row["password"] . "</td><td>" . $row["id"] . "</td><td>" . $row["phoneNumber"] . "</td><td>" . $row["email"] . "</td></tr>";
        }
      } else {
        echo "No Data";
      }

      mysqli_close($conn);

      ?>



      <!-- end -->
    </table>
    <a href="projectThree.php">
      <button class="btn">Home</button>
    </a>
  </div>
</body>

</html>