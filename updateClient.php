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
            Holistic Hand Healers: Update Client Personal Information Record Form
        </h1>
        <form action="updateClient.php" method="POST">
            <table style="border-spacing: 8px 30px">
                <tr>
                    <td>
                        <label style="color: red">Client Address: </label>
                    </td>
                    <td>
                        <input id="First" name="clientAddress" class="input-set" type="text" placeholder="EnterAddress" /><span style="color: red"> REQUIRED </span>
                    </td>
                </tr>
                <tr style="padding-bottom: 10px">
                    <td>
                        <label style="color: red" style="color: rgb(232, 15, 178)">Client Phone Number :</label>
                    </td>
                    <td>
                        <input id="Last" name="clientPhoneNumber" class="input-set" type="text" placeholder="Example: 000-000-1234" />
                        <span style="color: red"> REQUIRED </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="color: red">Date of Birth:</label>
                    </td>
                    <td>
                        <input id="Therapist-id" name="dateOfBirth" class="input-set" type="text" placeholder="Example: 1999-12-22" />
                        <span style="color: red"> REQUIRED </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="color: red">Insurance:</label>
                    </td>
                    <td>
                        <input id="Therapist-phone" name="Insurance" class="input-set" type="text" placeholder="Enter Insurance" />
                        <span style="color: red"> REQUIRED </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="color: red">Client Id</label>
                    </td>
                    <td>
                        <input id="Therapist_Email" name="clientId" class="input-set" type="text" placeholder="Enter Id" />
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
        $clientAddress = $_POST['clientAddress'];
        $clientPhoneNumber = $_POST['clientPhoneNumber'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $insurance = $_POST['Insurance'];



        $sql = "SELECT * FROM clients where id='$clientId'";
        $result = mysqli_query($con, $sql);

        if (!(mysqli_num_rows($result)) == 0) {


            $updatedFields = [];
            if (!empty($clientAddress)) {
                $updatedFields[] = "Client Address";
                //verify
                $setClauses[] = "address = '" . $clientAddress . "'";
            }
            if (!empty($clientPhoneNumber)) {
                //verify
                $correct_phone_pattern = '/^[1-9]\d{2}-\d{3}-\d{4}$/';
                if (!preg_match($correct_phone_pattern, $clientPhoneNumber)) {
                    echo '<script>alert("Phone format is Incorrect");</script>';
                    return;
                }


                $updatedFields[] = "Client Phone Number";
                $setClauses[] = "phoneNumber = '" . $clientPhoneNumber . "'";
            }
            if (!empty($dateOfBirth)) {
                //verify
                $correct_date_pattern = '/^\d{4}-\d{2}-\d{2}$/';
                if (!preg_match($correct_date_pattern, $dateOfBirth)) {
                    echo '<script>alert("Date format is Incorrect");</script>';
                    return;
                }
                $updatedFields[] = "Date of Birth";
                $setClauses[] = "dateOfBirth = '" . $dateOfBirth . "'";
            }
            if (!empty($insurance)) {
                //vewrify
                $updatedFields[] = "Insurance";
                $setClauses[] = "insurancePlan = '" . $insurance . "'";
            }


            $confirmationMessage = "Are you sure you want to update the following fields," . implode("\n", $updatedFields);

            echo '<script>';
            echo 'if (confirm("' . $confirmationMessage . '")) {';

            $sql = "UPDATE clientPersonalInfo SET " . implode(", ", $setClauses) . " WHERE id = '" . $clientId . "'";

            if (mysqli_query($con, $sql)) {

                if (mysqli_affected_rows($con) > 0) {

                    echo 'alert("Client record updated successfully.");';
                } else {

                    echo 'alert("No changes were made to the client personal record.");';
                }
            } else {

                echo 'alert("Error updating client record: ' . mysqli_error($con) . '")';
            }

            echo '} else {';
            echo 'alert("Update canceled. No changes were made to the client personal record.");';

            echo '}';

            echo '</script>';
        } else {

            echo '<script>alert("Client Does Not Exist")</script>';
            echo "<script>window.location.href = 'addClient.php?therapistId=" . urlencode($inputvalue) . "';</script> ";
        }
    }

    ?>
</body>

</html>