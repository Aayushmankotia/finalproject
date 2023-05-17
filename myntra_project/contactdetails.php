<?php session_start();
?>

<?php

include 'configer.php';

$phone = $_SESSION['phone'];
@include 'navigationbar.php';
if (!isset($phone)) {
    header('location:logoutscreen.php');
}
$state = $_SESSION['state'];
if (isset($state)) {
    echo "<script> 
       window.location.href = 'order.php';
       </script>";
}

$sql = "SELECT * FROM addresses WHERE phone= '$phone'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<script> 
       window.location.href = 'order.php';
       </script>";

}
function test($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return ($data);
}
$myphone = $_SESSION['phone'];
$u_id = $_SESSION['u_id'];
$check = "SELECT * FROM addresses WHERE phone = '$myphone' ";
$check_result = mysqli_query($conn, $check);

if (mysqli_num_rows($check_result) == 1) {
    while ($row = mysqli_fetch_assoc($check_result)) {
        $_SESSION['a_id'] = $row["a_id"];
        $_SESSION['name'] = $row["name"];
        $_SESSION['phone'] = $row["phone"];
        $_SESSION['pincode'] = $row["pincode"];
        $_SESSION['address'] = $row["address"];
        $_SESSION['city'] = $row["city"];
        $_SESSION['state'] = $row["state"];
    }
    header("Location:order.php");
} else {
    $nameerr = $phoneerr = $pin_codeerr = $addresserr = $cityerr = $stateerr = null;
    $flag = TRUE;
    if (isset($_POST['submit'])) {
        if (empty($_POST["name"])) {
            $nameerr = "**REQUIRED FIELD NAME ";
            $flag = false;
        } elseif (!preg_match("/^[A-Z]*$/", $_POST['name'])) {
            $nameerr = "CAPITAL LETTERS ONLY ";
            $flag = false;
        } else {
            $name = test($_POST['name']);
        }

        $phone = test($_POST['phone']);
        if (!preg_match('/^[0-9]{10}+$/', $_POST['phone'])) {
            $phoneerr = "INVALID PHONE NUMBER ";
            $flag = false;
        } else {
            $check = "SELECT *FROM users WHERE phone = '$phone' ";
            $check_result = mysqli_query($conn, $check);
            if (mysqli_num_rows($check_result) < 1) {
                $phoneerr = "DOESN'T EXIST !!";
                $flag = false;
            } else {
                $check = "SELECT *FROM addresses WHERE phone = '$phone' ";
                $check_result = mysqli_query($conn, $check);
                if (mysqli_num_rows($check_result) == 1) {
                    $phoneerr = "ALREADY EXIST !!";
                    $flag = false;
                } else {
                    $phone = test($_POST['phone']);
                }
            }
        }
        if (!preg_match("/^[0-9]{6}+$/", $_POST['pincode'])) {
            $pin_codeerr = "PIN-CODE SHOULD BE OF 6 CHARACTERS  ";
            $flag = false;
        } else {
            $pincode = test($_POST['pincode']);
        }


        if (empty($_POST["address"])) {
            $addresserr = "**REQUIRED FIELD ADDRESS ";
            $flag = false;
        } elseif (!preg_match('/^[A-Z]+(\d*)$/', $_POST['address'])) {
            $addresserr = "CAPITAL LETTERS ONLY ";
            $flag = false;
        } else {
            $address = test($_POST["address"]);
        }

        if (empty($_POST["address"])) {
            $addresserr = "**REQUIRED FIELD ADDRESS ";
            $flag = false;
        } elseif (!preg_match('/^[A-Z]+(\d*)$/', $_POST['address'])) {
            $addresserr = "CAPITAL LETTERS ONLY ";
            $flag = false;
        } else {
            $address = test($_POST["address"]);
        }

        if (empty($_POST["city"])) {
            $cityerr = "**REQUIRED FIELD CITY ";
            $flag = false;
        } elseif (!preg_match("/^[A-Z]*$/", $_POST['address'])) {
            $cityerr = "CAPITAL LETTERS ONLY ";
            $flag = false;
        } else {
            $city = test($_POST["city"]);
        }

        if (empty($_POST["state"])) {
            $cityerr = "**REQUIRED FIELD STATE ";
            $flag = false;
        } elseif (!preg_match('/^[A-Z]+(?: [A-Z]+)?$/', $_POST['state'])) {
            $stateerr = "CAPITAL LETTERS ONLY ";
            $flag = false;
        } else {
            $state = test($_POST["state"]);
        }








        if ($flag) {
            $sql = "INSERT INTO addresses (u_id, name, phone, pincode, address, city, state)
            VALUES ('$u_id','$name', '$phone', '$pincode', '$address', '$city', '$state')";
            if (mysqli_query($conn, $sql)) {
                echo "<script> \n                window.location.href = 'order.php';\n                </script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
    $sql = "SELECT * FROM addresses WHERE phone= '$phone'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['a_id'] = $row["a_id"];
            $_SESSION['name'] = $row["name"];
            $_SESSION['phone'] = $row["phone"];
            $_SESSION['pincode'] = $row["pincode"];
            $_SESSION['address'] = $row["address"];
            $_SESSION['city'] = $row["city"];
            $_SESSION['state'] = $row["state"];
        }
        header("Location:order.php");
    }
}
mysqli_close($conn); ?>
<!doctypehtml>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width,initial-scale=1" name="viewport">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet">

        <link rel="Website Icon" type="png" href="images/deku.png">
        <link href="style/contact.css" rel="stylesheet">
        <title>CONTACT-DETAILS</title>
    </head>

    <body>
        <section class="center">
            <form action="#" class="order" method="POST">
                <div class="inputdivision"><label class="firstlabel" for="">CONTECT DETAILS</label></div>
                <div class="inputdivision textcenter"><input class="input" name="name"
                        value="<?php echo $_SESSION['user_name']; ?>" placeholder="PLACE ORDER WITH NEW NAME " required>
                    <span>
                        <?php echo $nameerr; ?>
                    </span>
                </div>
                <div class="inputdivision textcenter"><input class="input" name="phone"
                        value="<?php echo $_SESSION['phone']; ?>" placeholder="Mobile No*" required type="tel"> <span>
                        <?php echo $phoneerr; ?>
                    </span></div>
                <div class="inputdivision"><label class="secondlabel" for="">ADDRESS</label></div>
                <div class="inputdivision textcenter"><input class="input" name="pincode"
                        value="<?php echo $_SESSION['pincode']; ?>" placeholder="Pin Code*" required>
                        <span>
                        <?php echo $pin_codeerr; ?>
                    </span></div>
                <div class="inputdivision textcenter"><input class="input" name="address"
                        value="<?php echo $_SESSION['address']; ?>" placeholder="address*" required>
                    <span>
                        <?php echo $addresserr; ?>
                    </span>
                </div>
                <div class="inputdivision textcenter"><input class="input" name="city"
                        value="<?php echo $_SESSION['city']; ?>" placeholder="City" required>
                        <span>
                        <?php echo $cityerr; ?>
                    </span>
                    </div>
                <div class="inputdivision textcenter"><input class="input" name="state"
                        value="<?php echo $_SESSION['state']; ?>" placeholder="State" required>
                        <span>
                        <?php echo $stateerr; ?>
                    </span>
                    </div>
                <div class="inputdivision textcenter"><input class="input redbackground" name="submit"
                        value="ADD ADDRESS" type="submit"></div>
            </form>
        </section>
    </body>

    </html>