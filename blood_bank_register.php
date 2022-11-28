
<?php
$insert = 0;
if(isset($_POST['reg_no'])){
    $server = "localhost";
    $username = "root";
    $pass = "";
    
    $con = mysqli_connect($server, $username, $pass);
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    
    $reg_no = $_POST['reg_no'];
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $sql = "INSERT INTO `dhamni`.`blood_bank` (`reg_no`, `user_id`, `password`, `name`, `address`, `pincode`,`state`, `contact_number`, `email`) VALUES ('$reg_no', '$user_id', '$password', '$name', '$address', '$pincode','$state' , '$contact_number', '$email')";
    $sql2 = "INSERT INTO `dhamni`.`blood` (`Blood_bank_id`, `Blood_group`, `Quantity`) VALUES ('$reg_no', 'A +', '0'), ('$reg_no', 'A -', '0'), ('$reg_no', 'B +', '0'), ('$reg_no', 'B -', '0'), ('$reg_no', 'AB +', '0'), ('$reg_no', 'AB -', '0'), ('$reg_no', 'O +', '0'), ('$reg_no', 'O -', '0');";

    if($con->query($sql) == true){
        $result = $con->query($sql2);
        $insert = 1;
    }
    else{
        $insert=2;
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();

    if ($insert == 1){
        header("Location: http://localhost/Dhamni_2.0/blood_bank_login.php");
        exit();
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Bank Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="overflow-x: hidden;">
    <header>
        <nav class="navbar" style="background-color: #f00000;">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost/Dhamni_2.0/blood_bank_register.php" style="color: white; margin: auto; font-size: 1.8em;">
                    Blood-Bank Registration Form
                </a>
            </div>
        </nav>
    </header>
    <?php
        if($insert == 1){
        echo "<p class='submitMsg'>Thanks for joining our organisation</p>";
        }
        else if($insert == 2){
            echo "ERROR: $sql <br> $con->error";
        }
    ?>
    <main>
        <form class="row g-3" style="padding: 5%;" action="blood_bank_register.php" method="post">
        <div class="col-md-6">
            <label for="inputUserId" class="form-label">User ID</label>
            <input type="text" name="user_id" class="form-control" id="inputUserId" required>
        </div>
        <div class="col-md-6">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword" required>
        </div>
        <div class="col-md-6">
            <label for="inputReg" class="form-label">Registration Number</label>
            <input type="text" name="reg_no" class="form-control" id="inputReg" required>
        </div>
        <div class="col-6">
            <label for="inputName" class="form-label">Name of Path Lab</label>
            <input type="text" name="name" class="form-control" id="inputName" required>
        </div>
        <div class="col-md-6">
            <label for="inputContact" class="form-label">Contact Number</label>
            <input type="number" name="contact_number" class="form-control" id="inputContact" required>
        </div>
        <div class="col-md-6">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="inputAddress" required>
        </div>
        <div class="col-md-6">
            <label for="inputPin" class="form-label">Pin Code</label>
            <input type="number" name="pincode" class="form-control" id="inputPin" required>
        </div>
        <div class="col-md-6">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" name="state" class="form-select" required>
                <option selected>Select State</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Delhi">Delhi</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
            </select>
        </div>
        <div class="col-12" style="text-align: center;" >
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </div>
        <div style="text-align: center;">
        <label class="form-label">Alredy a Member? 
            <a href="http://localhost/Dhamni_2.0/blood_bank_login.php">Sign in as a Blood Bank</a>
            </label>
        </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
</body>

</html>