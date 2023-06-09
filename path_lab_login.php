<?php
$err = 0;
try {
    $insert = 0;
    $flag = 0;
    $name = "a";
    if (isset($_POST['user_id'])) {
        $server = "localhost";
        $username = "root";
        $pass = "";
        $db = "dhamni";

        $con = mysqli_connect($server, $username, $pass, $db);

        if (!$con) {
            die("connection to this database failed due to" . mysqli_connect_error());
        }

        $user_id = $_POST['user_id'];
        $password = $_POST['password'];
        $sql = "SELECT user_id, password, name FROM `path_lab` WHERE user_id = '$user_id';";

        if ($con->query($sql) == true) {
            $result = $con->query($sql);
            $row = mysqli_fetch_array($result);
            $insert = 1;
        } else {
            $insert = 2;
            echo "ERROR: $sql <br> $con->error";
        }
        $con->close();

        if ($result->num_rows == 0) {
            $flag = 1;
        } else if ($insert == 1) {
            if ($password == $row["password"]) {
                session_start();
                $name = $row['name'];
                $_SESSION["name"] = $name;
                $_SESSION["user_id"] = $user_id;
                $_SESSION[""] = true;
                header("Location: http://localhost/Dhamni_2.0/homepl.php");
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
    <title>Path-Lab Login</title>
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
        <form action="path_lab_login.php" class="box" method="post">
            <h1>Path Lab</h1>
            <p class="text-muted"> Please enter your login and password!</p>
            <input type="text" name="user_id" class="form-control" id="inputUserid" placeholder="User Name" required>
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password"
                required>
            <button type="submit" class="btn-submit">Login</button>
            <label class="form-label" style="color: antiquewhite">Not Registered?
                <a href="http://localhost/Dhamni_2.0/path_lab_register.php">Register as a Path Lab</a>
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