<?php
$err = 0;
try {
    $insert = 0;
    if (isset($_POST['path_lab_id'])) {
        $server = "localhost";
        $username = "root";
        $pass = "";
        $db = "dhamni";

        $con = mysqli_connect($server, $username, $pass, $db);

        if (!$con) {
            die("connection to this database failed due to" . mysqli_connect_error());
        }

        $path_lab_id = $_POST['path_lab_id'];
        $donor_id = $_POST['donor_id'];
        $doe = $_POST['doe'];
        $sql = "INSERT INTO `examines` (`Path_lab_id`, `Donor_id`, `Date_of_examination`) VALUES ('$path_lab_id', '$donor_id', '$doe');";
        $insert = 0;

        if ($con->query($sql) == true) {
            $insert = 1;
            if (mysqli_affected_rows($con) == 0) {
                $insert = 2;
            }
        }
        $con->close();
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
    <title>Update Blood Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/x-icon" href="logo1.ico">
</head>

<body style="overflow-x: hidden;">

    <a href="http://localhost/Dhamni_2.0/homepl.php">
        <img src="home.png" alt="home" style="width: 3.5%;" id="home">
    </a>
    <?php
    if ($err == 1) {
        echo "<p align='center' class='alertMsg'>Unexpected Error Occured</p>";
    }
    if ($insert == 1) {
        echo "<p align='center' class='cnfMsg'>Data Updated</p>";
    } else if ($insert == 2) {
        echo "<p align='center' class='alertMsg'>None of the rows are affected.</p>";
    }
    ?>
    <div class="card">
        <form action="examines.php" class="box" method="post">
            <h1>Examination Details</h1>
            <p class="text-muted"> Please Enter Examination Details</p>
            <input type="text" name="path_lab_id" class="form-control" id="inputReg" placeholder="Path Lab ID" required>
            <input type="text" name="donor_id" class="form-control" id="inputReg" placeholder="Donor ID" required>
            <input
                style="border: 0;background: none;display: block;margin: 20px auto;text-align: center;border: 2px solid #3498db;padding: 10px 10px;width: 250px;outline: none;color: rgb(148, 163, 165);border-radius: 24px;transition: 0.25s"
                type="text" name="doe" class="form-control" id="inputReg" placeholder="Date of Examination" onfocus="(this.type = 'date')" onblur="(this.type = 'text')" required>
            <button type="submit" class="btn-submit">Update</button>
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