<?php
$dname=mysqli_connect("localhost:3306","root", "","bank") or die("No Connection");
mysqli_select_db($dname,"bank") or die("No Database connected!");
?>

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
        />
        <title class="fas fa-university noHover">Welcome</title>
        <link rel="icon" href="./Images/i.jpeg" type="image/x-icon">
        <link rel="stylesheet" href="Style.css" type="text/css">
        <style>
            body {
                background-image: url("./Images/handshake.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: bottom right;
                background-size: 20% 40%;
                background-color: rgba(247, 247, 247, 255);
            }
        </style>
    </head>

    <ul>
        <i class="fas fa-university noHover"> SPARKS BANK</i>
        <li style="float: right;"><a href="contactUs.html">Contact Us</a></li>
        <li style="float: right;"><a href="Index.html">Home</a></li>
    </ul>

    <br><br><br><br>

    <?php
    $conn = mysqli_connect("localhost","root","","bank");
    if($conn->connect_error) {
        die("Connection Failed:".$conn->connect_error);
    }
    $name = mysqli_real_escape_string($conn,$_GET["name"]);
    $email = mysqli_real_escape_string($conn,$_GET["email"]);
    $amount = mysqli_real_escape_string($conn,$_GET["amount"]);
    $flag = 0;
    $sql = "SELECT * from customers";
    while($flag==0){
        $result = $conn->query($sql);
        $accno = rand(1000,9999);
        $flag=1;
        while($row = $result->fetch_assoc()){
            if($row['accno']==$accno){
                $flag=0;
            }
        }
    }
    $sql = "INSERT into customers VALUES('$name','$accno','$email','$amount')";
    $conn->query($sql);
?>

<div>
<h1 style="margin-left: 30%;font-size: 130%;">Welcome to one of the most safest and trustable bank _/\_</h1>
<h1 style="margin-left: 34%;font-size: 130%;">Your Account has been successfully created.</h1>
</div>
<br>
<br>
<h1 style="margin-left: 41% ;font-size:130%">Your Account Details:</h1>
<table style="margin-left:34%; float: left;">
    <tr>
        <th>Name</th>
        <td>
            <?php echo $name?>
        </td>
    </tr>
    <tr>
        <th>Account Number</th>
        <td>
            <?php echo $accno?>
        </td>
    </tr>
    <tr>
        <th>Email ID</th>
        <td>
            <?php echo $email?>
        </td>
    </tr>
    <tr>
        <th>Balance</th>
        <td>
            <?php echo $amount?>
        </td>
    </tr>
</table>