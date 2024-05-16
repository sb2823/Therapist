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
        <form action="verifyClient.php" method="POST">
            <table style="border-spacing: 8px 30px">
                <tr>
                    <td>
                        <label style="color: red">Client's First Name: </label>
                    </td>
                    <td>
                        <input id="First" name="clientFirstName" class="input-set" type="text" placeholder="Example: Sadia" /><span style="color: red"> REQUIRED </span>
                    </td>
                </tr>
                <tr style="padding-bottom: 10px">
                    <td>
                        <label style="color: red" style="color: rgb(232, 15, 178)">Client's Last Name:</label>
                    </td>
                    <td>
                        <input id="Last" name="clientLastName" class="input-set" type="text" placeholder="Example: Barlas" />
                        <span style="color: red"> REQUIRED </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="color: red">Client Id</label>
                    </td>
                    <td>
                        <input id="Therapist_Email" name="clientId" class="input-set" type="text" placeholder="Enter client id" />
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


    if (isset($_POST['clientId'])) {

        $clientId = $_POST['clientId'];
        $clientFirstName = $_POST['clientFirstName'];
        $clientLastName = $_POST['clientLastName'];


        if (empty($clientFirstName)) {
            echo '<script>alert("Enter First Name");</script>';
            exit();
        }
        if (empty($clientLastName)) {

            echo '<script>alert("Enter Last Name");</script>';
            exit();
        }



        $sql = "SELECT * FROM clients where id='$clientId' and firstName ='$clientFirstName' and lastName = '$clientLastName' ";
        $result = mysqli_query($con, $sql);

        if ((mysqli_num_rows($result)) == 0) {
            //client exist
            $_SESSION['clientIdSession'] = $clientId;

            echo "<script>window.location.href = 'clientSession.php?clientId=" . urlencode($clientId) . "';</script> ";
        } else {
            // Redirect to Create A Client Account Form
            echo '<script>alert("client not found")</script>';
            echo "<script>window.location.href = 'createClientAccountForm.php';</script> ";
        }
    } else {
        echo '<script>alert("Enter client id");</script>';
        exit();
    }

    ?>
</body>

</html>