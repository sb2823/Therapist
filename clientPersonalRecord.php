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
</head>

<body>
    <div class="background">
        <h1 style="
          text-align: center;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        ">
            Holistic Hand Healer: Update Client Personal Information Record Form
        </h1>
    </div>
    <table>
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
        <div style="margin-top: 40px">
                <input type="submit" style="
              float: right;
              margin-right: 20px;
              background-color: black;
              color: white;
            " />



    </table>
</body>