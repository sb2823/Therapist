<?php

session_start(); // Start the session

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Holistic Hand Healers</title>
</head>

<style>
    .form {
        width: 600px;
        height: 624px;
        margin: 50px auto;
        border: 10px solid #c7bda0;
        background-image: url("https://media.istockphoto.com/id/487809119/vector/hands-with-hearts.jpg?s=612x612&w=0&k=20&c=kXCvFLctK3ZIboG5-5nD8O03cXvAxo2HY6-WMfZMEeI=");
    }

    .input-set {
        width: 320px;

    }

    .input-set-passsword {
        width: 410px;
        display: flex;
        align-items: center;
    }

    .input-set-passsword img {
        width: 25px;
        cursor: pointer;
    }

    .fa-eye-slash {
        position: absolute;

        right: 37%;
        cursor: pointer;
        color: rgb(154, 21, 21);
    }

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
    <div class="form">
        <h1 style="
          text-align: center;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        ">
            Holistic Hand Healers Verify Client Form
        </h1>
        <form action="clientSession.php" method="POST">
            <table style="border-spacing: 8px 30px">
                <tr>
                    <td>
                        <label style="color: red">Session Days: </label>
                    </td>
                    <td>
                        <input id="First" name="sessionDays" class="input-set" type="text" placeholder="Enter Days" /><span style="color: red"> REQUIRED </span>
                    </td>
                </tr>
                <tr style="padding-bottom: 10px">
                    <td>
                        <label style="color: red" style="color: rgb(232, 15, 178)">Session Time:</label>
                    </td>
                    <td>
                        <input id="Last" name="sessionTime" class="input-set" type="text" placeholder="Enter Session" />
                        <span style="color: red"> REQUIRED </span>
                    </td>
                </tr>
            </table>


            <br />
            <div style="margin-top: 40px">
                <input type="submit" style="
              float: right;
              margin-right: 20px;
              background-color: black;
              color: white;
            " />
            </div>
        </form>
    </div>

    <script>

    </script>

    <?php


    if (isset($_POST['sessionDays'])) {


        $clientId = $_SESSION['clientIdSession'];
        $sessionDays = $_POST['sessionDays'];
        $sessionTime = $_POST['sessionTime'];


        if (empty($sessionTime)) {
            echo '<script>alert("Enter Time");</script>';
            exit();
        }

        $confirmationMessage = "You are about REQUEST session. Are you you want to do so?";

        echo '<script>';
        echo 'if (confirm("' . $confirmationMessage . '")) {';


        $sql = "INSERT INTO clientSchedule(`clientId`, `appointmentDate`, `appointmentTime`) VALUES ($clientId, '$sessionDays', '$sessionTime')";

        if (mysqli_query($con, $sql)) {
            if (mysqli_affected_rows($con) > 0) {

                $lastId = mysqli_insert_id($con); // ID of the last inserted record

                echo 'alert("Session(s) madee. Your SESSION ID is: ' . $lastId . '");';
                //  echo "window.location.href = 'index.php?therapistId=" . urlencode($inputvalue) . "';";
            } else {
                // No rows were affected
                echo 'alert("No Data Added");';
            }
        } else {
            // Error executing the SQL query
            echo 'alert("Error adding session: ' . mysqli_error($con) . '")';
        }

        echo '} else {';
        echo 'alert("Operation canceled.");';

        echo '}';

        echo '</script>';
    } else {
        echo '<script>alert("Enter Days");</script>';
        exit();
    }

    ?>
</body>

</html>