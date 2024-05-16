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



    
</style>

<body>

    

    <div class="form">
        <h1 style="
          text-align: center;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        ">
            Holistic Hand Healers
        </h1>
        <form id="myForm" action="index.php" method="POST">
            <table style="border-spacing: 8px 30px">
                <tr>
                    <td>
                        <label style="color: red">Therapist's First Name : </label>
                    </td>
                    <td>
                        <input id="First" name="firstName" class="input-set" type="text"
                            placeholder="Example: Sadia" /><span style="color: red"> REQUIRED </span>
                    </td>
                </tr>
                <tr style="padding-bottom: 10px">
                    <td>
                        <label style="color: red" style="color: rgb(232, 15, 178)">Therapist's Last Name :</label>
                    </td>
                    <td>
                        <input id="Last" name="lastName" class="input-set" type="text" placeholder="Example: Barlas" />
                        <span style="color: red"> REQUIRED </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="color: red">Therapist's Password :</label>
                    </td>
                    <td>
                        <div class="input-set-passsword">
                            <input id="Pwsd" name="password" class="input-set-passsword" type="password"
                                placeholder="Example: Abc@123" />
                            <i class="fa fa-eye-slash" id="eyeicon" onclick="eyeIcon()" style="position: absolute"></i>

                            <span style="color: red"> REQUIRED </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="color: red">Therapist's ID #:</label>
                    </td>
                    <td>
                        <input id="Therapist-id" name="therapistId" class="input-set" type="text"
                            placeholder="Example: 1234" />
                        <span style="color: red"> REQUIRED </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="color: red">Therapist's Phone #:</label>
                    </td>
                    <td>
                        <input id="Therapist-phone" name="therapistPhone" class="input-set" type="text"
                            placeholder="Example: 000-000-1234" />
                        <span style="color: red"> REQUIRED </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="color: red">Therapist's Email:</label>
                    </td>
                    <td>
                        <input id="Therapist_Email" name="therapistEmail" class="input-set" type="email"
                            placeholder="Example: abc@njit.com" />
                        <span style="color: red"> REQUIRED </span>
                    </td>
                </tr>
            </table>
            <div style="margin-left: 10px; height: 50px">
                <input type="checkbox" id="checkEmail" name="emailEnable" /><span style="color: red">Check the box to
                    request an Email Confirmation:
                </span>
            </div>

            <div style="margin-left: 10px">
                <label style="color: red"> Select a transaction</label>

                <select id="transaction" name="action">
                    <option value="search">Search A Therapist's Accounts</option>
                    <option value="updateClientRecord">Update a Client’s Personal Record</option>
                    <option value="updateClientTreatment">Update a Client’s Treatment Record</option>
                    <option value="scheduleClientSession">Schedule A Client’s Session(s)</option>
                    <option value="cancelClientSession">Cancel a Client’s Session(s)</option>
                    <option value="createPatient">Create A New Patient Account</option>
                </select>
            </div>
            <br />
            <div style="margin-top: 40px">
                <input type="submit" style="
              float: right;
              margin-right: 20px;
              background-color: black;
              color: white;
            " />
                <input type="reset" style="
              float: right;
              margin-right: 10px;
              background-color: black;
              color: white;
            " />
            </div>
        </form>
    </div>

    <script>
        function eyeIcon() {
            console.log("mine");
            //let eyeicon = document.getElementById("eyeicon");
            let pwsd = document.getElementById("Pwsd");
            if (pwsd.type == "password") {
                pwsd.type = "text";
            } else {
                pwsd.type = "password";
            }
        }
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("myForm").addEventListener("submit", function (event) {
                event.preventDefault();


                // function Validation() {
                //     event.preventDefault();

                let first = document.getElementById("First");
                let last = document.getElementById("Last");
                let password = document.getElementById("Pwsd");
                let therapist_id = document.getElementById("Therapist-id");
                let therapist_phone = document.getElementById("Therapist-phone");
                let therapist_email = document.getElementById("Therapist_Email");
                let check_email = document.getElementById("checkEmail").checked;

                if (first.value == "") {
                    alert("Kindly Enter First Name");
                    first.focus();
                    return;
                }
                if (last.value == "") {
                    last.focus();
                    alert("Kindly Enter Last Name");
                    return;
                }
                //0205731Sb@
                /*-------------------------------CHECKING PASSWORD--------------------------------*/
                if (password.value == "") {
                    alert("Kindly Enter Password");
                    password.focus();
                    return;
                } else if (password.value != "") {
                    //true
                    correctPassword = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*[0-9]).{1,8}$/;

                    if (!correctPassword.test(password.value)) {
                        alert("Password format is incorrect");
                        password.focus();
                        return;
                    }
                }

                /*-------------------------------Therapist Id--------------------------------------*/
                if (therapist_id.value == "") {
                    alert("Kindly Enter Therapist Id");
                    therapist_id.focus();
                    return;
                } else if (therapist_id.value != "") {
                    correct_therapist_id = /\b\d{1,5}\b/;

                    if (!correct_therapist_id.test(therapist_id.value)) {
                        alert("Therapist id format is incorrect");
                        therapist_id.focus();
                        return;
                    }
                }
                /*----------------------------Phone---------------------------------*/
                if (therapist_phone.value == "") {
                    alert("Kindly Enter Therapist Phone");
                    therapist_phone.focus();
                    return;
                } else if (therapist_phone.value.value != "") {
                    correct_therapist_phone = /^[1-9]\d{2}-\d{3}-\d{4}$/;

                    if (!correct_therapist_phone.test(therapist_phone.value)) {
                        alert("Phone format is Incorrect");
                        therapist_phone.focus();
                        return;
                    }
                }

                //BEFORE checking email we have to check the check box value if true then we will validate email

                if (check_email == true) {
                    /*---------------------------Email--------------------------------------------*/
                    if (therapist_email.value == "") {
                        alert("Kindly enter your email");
                        therapist_email.focus();
                        return;
                    } else if (therapist_email.value != "") {
                        correct_therapist_email = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{3,6}$/;

                        if (!correct_therapist_email.test(therapist_email.value)) {
                            alert("email is incorrect");
                            therapist_email.focus();
                            return;
                        }
                    }
                }

                if (therapist_email.value != "") {
                    correct_therapist_email =
                        /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;

                    if (!correct_therapist_email.test(therapist_email.value)) {
                        alert("email is incorrect");
                        therapist_email.focus();
                        return;
                    }
                }

                console.log("Validation Completed");


                this.submit();
            });
        });



    </script>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $inputvalue = $_POST['therapistId'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $password = $_POST['password'];
        $therapistPhone = $_POST['therapistPhone'];

        $sql = "SELECT * FROM therapists where id='$inputvalue' and password='$password' and firstName ='$firstName' and lastName = '$lastName' and phoneNumber='$therapistPhone'";
        $result = mysqli_query($con, $sql);

        if ((mysqli_num_rows($result)) == 0) {

            echo '<script>alert("Not found")</script>';
        } else {

            $action = $_POST['action'];
            echo $action;
            switch ($action) {
                case 'search':
                    echo "<script>window.location.href = 'search.php?therapistId=" . urlencode($inputvalue) . "';</script>";

                    exit();
                    break;
                case 'updateClientRecord':

                    echo "<script>window.location.href = 'updateClient.php?therapistId=" . urlencode($inputvalue) . "';</script>";

                    exit();
                    break;

                case 'updateClientTreatment':

                    echo "<script>window.location.href = 'updateClientTreament.php?therapistId=" . urlencode($inputvalue) . "';</script>";

                    exit();
                    break;
                case 'scheduleClientSession':

                    echo "<script>window.location.href = 'verifyClient.php?therapistId=" . urlencode($inputvalue) . "';</script>";

                    exit();
                    break;
                case 'cancelClientSession':

                    echo "<script>window.location.href = 'clientCancelSession.php?therapistId=" . urlencode($inputvalue) . "';</script>";

                    exit();
                    break;
                case 'createPatient':

                    echo "<script>window.location.href = 'addClient.php?therapistId=" . urlencode($inputvalue) . "';</script>";

                    exit();
                    break;

                //     default:
                //         echo "Invalid action selected.";
                //         break;
                // }
    
                //echo '<script>alert("studentfound")</script>';
                // echo "<script> window.location.href='search.php'</script>";
            }
        }

    }

    ?>
</body>

</html>