<?php
$err = 0;
try {
    $insert = 0;
    $flag = 0;
    $name = 'a';
    if (isset($_POST['contact_number'])) {
        $server = "localhost";
        $username = "root";
        $pass = "";
        $db = "dhamni";

        $con = mysqli_connect($server, $username, $pass, $db);

        if (!$con) {
            die("connection to this database failed due to" . mysqli_connect_error());
        }

        $contact_number = $_POST['contact_number'];
        $password = $_POST['password'];
        $sql = "SELECT contact_number, password, fname, mname, lname FROM `recipient` WHERE contact_number = '$contact_number';";

        if ($con->query($sql) == true) {
            $result = $con->query($sql);
            $row = mysqli_fetch_array($result);
            $insert = 1;
        } else {
            $insert = 2;
        }
        $con->close();
        if ($result->num_rows == 0) {
            $flag = 1;
        } else if ($insert == 1) {
            if ($password == $row["password"]) {
                $name = $row['fname'] . " " . $row['mname'] . " " . $row['lname'];
                session_start();
                $_SESSION["name"] = $name;
                $_SESSION["contact_number"] = $contact_number;
                $_SESSION[""] = true;
                header("Location: http://localhost/Dhamni_2.0/homer.php");
                exit();
            } else if ($insert == 1 && $password != $row["password"]) {
                $flag = 2;
            }
        }

    }
} catch (Throwable $e) {
    $err = 1;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recipient Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/x-icon" href="logo1.ico">
</head>

<body>

    <a href="http://localhost/Dhamni_2.0/index.html">
        <img src="home.png" alt="home" style="width: 3.5%;" id="home">
    </a>
    <?php
    if ($err == 1) {
        echo "<p align='center' class='alertMsg'>Unexpected Error Occured</p>";
    }
    if ($flag == 1) {
        echo "<p align='center' class='alertMsg'>User Id Not Exist !!!</p>";
    } else if ($flag == 2) {
        echo "<p align='center' class='alertMsg'>Wrong Password !!!</p>";
    }
    ?>
    <div class="card">
        <form action="recipient_login.php" class="box" method="post">
            <h1>Recipient</h1>
            <p class="text-muted"> Please enter your contact number and password!</p>
            <input type="text" name="contact_number" class="form-control" id="inputContactNumber"
                placeholder="Contact Number" required>
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password"
                required>
            <button type="submit" class="btn-submit">Login</button>
            <label class="form-label" style="color: antiquewhite">Not Registered?
                <a href="http://localhost/Dhamni_2.0/recipient_register.php">Register as a Recipient</a>
            </label>
        </form>
    </div>
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