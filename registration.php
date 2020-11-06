<!DOCTYPE html>
<html>

<head>
    <title>Sign Up form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-image: url(img/bg.jpg);
            background-size: cover;
            background-position: no-repeat center center fixed;
        }

        .signup-form {
            width: 275px;
            box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.3);
            background: #555e60;
            opacity: 0.7;
            padding: 20px;
            margin: 8% auto 0;
            text-align: center;
        }

        .signup-form h1 {
            color: #1c8adb;
            margin-bottom: 30px;
        }

        .input-box {
            border-radius: 20px;
            padding: 6px;
            margin: 10px;
            width: 90%;
            border: 1px solid #999;
            outline: none;
        }

        span {
            color: red;
        }

        #error:first-letter {
            text-transform: uppercase
        }

        button {
            color: #fff;
            width: 100%;
            padding: 10px;
            border-radius: 20px;
            font-size: 15px;
            margin: 10px 0;
            border: none;
            outline: none;
            cursor: pointer;
        }

        .file-field {
            margin: 10px;
            padding: 7px;
        }

        .btn {
            float: left;
            border-radius: 10px;
        }

        .sign-btn {
            background-color: #1c8adb;

        }

        a {
            text-decoration: none;
        }

        hr {
            margin-top: 20px;
            width: 80%;
        }

        .or {
            background: white;
            width: 30px;
            margin: -19px auto;
        }

        img {
            width: 70px;
            margin-top: -50px;
        }
    </style>
</head>

<body>
    <?php
        require('config.php');
        require('session.php');
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['submit'])){
            $Name = $_REQUEST['Name'];
            $Email = $_REQUEST['Email'];
            $Password = $_REQUEST['Password'];
            $trn_date = date("Y-m-d H:i:s");
                $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$Name', '$Password', '$Email', '$trn_date')";

                $result = mysqli_query($con,$query);
                if($result){
                    header("Location: login.php");
                }
        }
        else{
    ?>
    <div class="signup-form">
        <img src="img/signup.png">
        <h1>Sign Up Now</h1>
        <form name="registration" action="" method="post">
            <input type="text" class="input-box" id="Name" name="Name" placeholder="Enter your name">
            <span id="name_error"></span>

            <input type="text" class="input-box" id="Email" name="Email" placeholder="Enter Email">
            <span id="email_error"></span>

            <input type="text" class="input-box" id="Password" name="Password" placeholder="Enter Password">
            <span id="pass_error"></span>

            <p><span><input type="checkbox"></span> I agree to the Terms and conditions</p>
            <button class="sign-btn" type="submit" name="submit" onclick="validateform()">Sign Up</button>
            <hr>
            <p class="or">OR</p>
            <p>Do you have an account? <a href="login.php">Log In here</a></p>
        </form>
    </div>
    <?php } ?>
</body>
<script>
    function clear(){
            document.getElementsByTagName('id').clear();
            document.getElementsByTagName('name').clear();
            document.getElementsByTagName('salary').clear();
    }

    function validateform() {
        console.log("Hey")
        var fname = document.getElementById("Name").value;
        var mail = document.getElementById("Email").value;
        var pass = document.getElementById("Password").value

        var nameRE = /^[a-zA-Z]{2,12}$/;
        var mailRE = /^[a-zA-Z][a-zA-Z0-9]{1,12}([a-zA-Z0-9]{2,10}(\.+\_+\-)){0,4}@([a-zA-Z0-9]{2,10}\.){1,5}[a-zA-Z]{2,8}$/;
        var passRE = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\+\-%\!@\$])[A-Za-z0-9\+\-%\!@\$]{8,15}$/;


        var nameRESULT = nameRE.test(fname);
        var mailRESULT = mailRE.test(mail);
        var passRESULT = passRE.test(pass);


        if (nameRESULT == false) {
            document.getElementById("fname_error").innerHTML = "Please enter a valid name. This field should only contain upper or lower case alphabets";
            return false;
        }

        if (mailRESULT == false) {
            document.getElementById("email_error").innerHTML = "Please enter a valid Email";
            return false;
        }

        if (passRESULT == false) {
            document.getElementById("pass_error").innerHTML = "Please enter a valid name. This field should contain lowercase, uppercase alphabets, symbols, digits and should be of minimum length 8and max 15";
            return false;
        }

        alert("Form Submitted Successfully!");
    }
</script>

</html>