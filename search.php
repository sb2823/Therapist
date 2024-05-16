<?php
$servername = "sql1.njit.edu";
$username = "sb2823";
$password = "121298Apz@";
$dbname = "sb2823";
$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }
    </style>
</head>

<body>
    <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="search.php">Seacher a Therapist Accounts</a></li>
        <li><a href="updateClient.php">Update Client Personal Record</a></li>
        <li><a href="updateClientTreament.php">Update Client Treatment Record</a></li>
        <li><a href="verifyClient.php">Schedule a Client Session</a></li>
        <li><a href="clientCancelSession.php">Cancel a Client Session</a></li>
        <li><a href="addClient.php">Create a new Client Account</a></li>
    </ul>
    <div class="background">
        <h1 style="
          text-align: center;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        ">
            Holistic Hand Healer
        </h1>
        <?php





        if (isset($_GET['therapistId'])) {
            $therapistId = ($_GET['therapistId']);

            $sql = "SELECT therapists.id AS therapistId,
            therapists.firstName AS therapistFirstName,
            therapists.lastName AS therapistLastName,
            therapists.password AS therapistPassword,
            therapists.phoneNumber AS therapistPhoneNumber,
            therapists.email AS therapistEmail,
            clients.id AS clientId,
            clients.firstName AS clientFirstName,
            clients.lastName AS clientLastName,
            clientPersonalInfo.id AS personalInfoId,
            clientPersonalInfo.address AS clientAddress,
            clientPersonalInfo.phoneNumber AS clientPhoneNumber,
            clientPersonalInfo.dateOfBirth AS clientDateOfBirth,
            clientPersonalInfo.insurancePlan AS clientInsurancePlan,
            clientTreatmentPlan.id AS treatmentPlanId,
            clientTreatmentPlan.injuryType AS clientInjuryType,
            clientTreatmentPlan.scriptForSessions AS clientScriptForSessions,
            clientTreatmentPlan.devicesSuppliesNeeded AS clientDevicesSuppliesNeeded,
            clientSchedule.id AS scheduleId,
            clientSchedule.appointmentDate AS appointmentDate,
            clientSchedule.appointmentTime AS appointmentTime
            From therapists 
            join therapistClientMapping ON therapistClientMapping.therapistId=therapists.id 
            join clients ON clients.id=therapistClientMapping.clientId 
            join clientPersonalInfo ON clientPersonalInfo.id=therapistClientMapping.clientId 
            join clientTreatmentPlan ON clientTreatmentPlan.id=therapistClientMapping.clientId 
            join clientSchedule ON clientSchedule.id=therapistClientMapping.clientId WHERE therapists.id ='$therapistId'";

            $result = mysqli_query($con, $sql);

            echo '<table class="viewTable">
            <tr>
                <th>Therapist ID</th>
                <th>Therapist First Name</th>
                <th>Therapist Last Name</th>
                <th>Therapist Phone Number</th>
                <th>Therapist Email</th>
                <th>Client First Name</th>
                <th>Client Last Name</th>
                <th>Client ID</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>DOB</th>
                <th>Client Insurance</th>
                <th>Injury</th>
                <th>Script</th>
                <th>Devices Needed</th>
                <th>Session Days</th>
                <th>Session Times</th>
            </tr>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['therapistId'] . "</td>";
                echo "<td>" . $row['therapistFirstName'] . "</td>";
                echo "<td>" . $row['therapistLastName'] . "</td>";
                echo "<td>" . $row['therapistPhoneNumber'] . "</td>";
                echo "<td>" . $row['therapistEmail'] . "</td>";
                echo "<td>" . $row['clientFirstName'] . "</td>";
                echo "<td>" . $row['clientLastName'] . "</td>";
                echo "<td>" . $row['clientId'] . "</td>";
                echo "<td>" . $row['clientAddress'] . "</td>";
                echo "<td>" . $row['clientPhoneNumber'] . "</td>";
                echo "<td>" . $row['clientDateOfBirth'] . "</td>";
                echo "<td>" . $row['clientInsurancePlan'] . "</td>";
                echo "<td>" . $row['clientInjuryType'] . "</td>";
                echo "<td>" . $row['clientScriptForSessions'] . "</td>";
                echo "<td>" . $row['clientDevicesSuppliesNeeded'] . "</td>";
                echo "<td>" . $row['appointmentDate'] . "</td>";
                echo "<td>" . $row['appointmentTime'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
        ?>
    </div>
</body>


</html>