<!DOCTYPE html>
<html>

<head>
  <title>Client</title>
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
        <th>Client First Name</th>
        <th>Client Last Name</th>
        <th>Client ID</th>
        <th>Client Address</th>
        <th>Client Phone Number</th>
        <th>Client DOB</th>
        <th>Client Insurance</th>
        <th>Injury</th>
        <th>Script</th>
        <th>Devices Needed</th>
        <th>Therapy Days</th>
        <th>Therapy Time</th>

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

      $sql = "SELECT clients.firstName, clients.lastName, clients.id AS clientId, clientPersonalInfo.address, clientPersonalInfo.phoneNumber, 
                    clientPersonalInfo.dateOfBirth, clientPersonalInfo.insurancePlan, clientTreatmentPlan.injuryType, 
                    clientTreatmentPlan.scriptForSessions, clientTreatmentPlan.devicesSuppliesNeeded, 
                    clientSchedule.appointmentDate, clientSchedule.appointmentTime
                    FROM clients
                    JOIN clientPersonalInfo ON clients.id = clientPersonalInfo.clientId
                    JOIN clientTreatmentPlan ON clients.id = clientTreatmentPlan.clientId
                    JOIN clientSchedule ON clients.id = clientSchedule.clientId";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr><td>" . $row["firstName"] . "</td><td>" . $row["lastName"] . "</td><td>" . $row["clientId"] . "</td><td>" . $row["address"] . "</td><td>" . $row["phoneNumber"] . "</td><td>" . $row["dateOfBirth"] . "</td><td>" . $row["insurancePlan"] . "</td><td>" . $row["injuryType"] . "</td><td>" . $row["scriptForSessions"] . "</td><td>" . $row["devicesSuppliesNeeded"] . "</td><td>" . $row["appointmentDate"] . "</td><td>" . $row["appointmentTime"] . "</td></tr>";
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