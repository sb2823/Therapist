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
    
    <div class="form">
    <h1 style="
          text-align: center;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        ">
            Holistic Hand Healer: Update Client Personal Information Record Form
        </h1>
        <form action="addClient.php" method="POST">
            <table style="border-spacing: 8px 30px">
            <tr>
            <td>
                <label>Client Address</label>
            </td>
            <td><input id="Address" type="text" placeholder="1211 south washington">
                <span style="color:black">Required</span>
            </td>

        </tr>
        <tr>
            <td>
                <label>Client Phone Number</label>
            </td>
            <td>
                <input id="phone" type="int" placeholder="555-444-1010">
                <span style="color:black">Required</span>
            </td>

        </tr>
        <tr>
            <td>
                <label>Date Of Birth</label>
                <input id="DOB" type="text" placeholder="October 06">
                <span style="color:black">Required</span>
            </td>

        </tr>

        </tr>
        <tr>
            <td>
                <label>Insurance</label>
                <input id="INC" type="text" placeholder="ameriHealth Ah121">
                <span style="color:black">Required</span>
            </td>

        </tr>
        <tr>
            <td>
                <label>Client ID</label>
                <input id="clientId" type="text" placeholder="Example: 2222">
                <span style="color:black">Required</span>
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
    


    <?php


    if (isset($_POST['clientId'])) {

        $clientId = $_POST['clientId'];
        $clientFirstName = $_POST['clientFirstName'];
        $clientLastName = $_POST['clientLastName'];

        

        $sql = "SELECT * FROM clients where id='$clientId'";
        $result = mysqli_query($con, $sql);

        if (!(mysqli_num_rows($result)) == 0) {
            // Confirm with user if they want to proceed with updating
           

                //identifying fields
                $updatedFields = [];
        if (!empty($clientFirstName)) {
            $updatedFields[] = "Client Address";
            $setClauses[] = "firstName = '" . $clientFirstName . "'";

        }
        if (!empty($clientLastName)) {
            $updatedFields[] = "Client Phone Number";
            $setClauses[] = "lastName = '" . $clientLastName . "'";

        }
        


        $confirmationMessage = "Are you sure you want to update the following fields?" . implode("\n", $updatedFields);

        echo '<script>';
        echo 'if (confirm("' . $confirmationMessage . '")) {';
        // Your code to update client's personal record in the database goes here
        $sql = "UPDATE clientPersonalInfo SET " . implode(", ", $setClauses) . " WHERE id = '" . $clientId . "'";

        if (mysqli_query($con, $sql)) {
            // Check if any rows were affected
            if (mysqli_affected_rows($con) > 0) {
                // Alert the user that the update was successful
                echo 'alert("Client record updated successfully.");';
            } else {
                // No rows were affected
                echo 'alert("No changes were made to the client\'s personal record.");';
            }
        } else {
            // Error executing the SQL query
            echo 'alert("Error updating client record: ' . mysqli_error($con) . '")';
        }

        echo '} else {';
        echo 'alert("Update canceled. No changes were made to the client\'s personal record.");';
        
        echo '}';

        echo '</script>';
        
        } else {
            // Redirect to Create A Client Account Form
            echo '<script>alert("student not found")</script>';
            echo "<script>window.location.href = 'search.php?therapistId=" . urlencode($inputvalue) . "';</script> ";
            // header("Location: createClientAccountForm.php");
            // exit; // Stop further execution
        }
    }

    ?>
</body>

</html>