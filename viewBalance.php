<?php
$dname=mysqli_connect("localhost:3306","root", "","bank") or die("No Connection");
mysqli_select_db($dname,"bank") or die("No Database connected!");
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <title class="fas fa-university noHover">Account Balance</title>
    <link rel="icon" href="./Images/i.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="Style.css" type="text/css">
    <style>
        body {
            background-image: url("./Images/tranfer.JPG");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
        th {
            background-color: rgb(166, 161, 235);
        }
    </style>
</head>

<!--navbar-->

<ul>
    <i class="fas fa-university noHover"> SPARKS BANK</i>
    <li><a href="viewCustomers.php">View Customers</a></li>
    <li style="float: right;"><a href="contactUs.html">Contact Us</a></li>
    <li style="float: right;"><a href="Index.html">Home</a></li>
</ul>

<br>
<br>
<br>
<h1 style="text-align: center; font-size: 130%;background-color: rgb(166, 161, 235);">Account Details</h1>
<br>
<table style="width:98%; margin-left:1%">
    <tr>
        <th>Name</th>
        <th>Account Number</th>
        <th>Email ID</th>
        <th>Current Balance</th>
    </tr>
    <?php
        $conn = mysqli_connect("localhost","root","","bank");
        if($conn->connect_error){
            die("Connection Failed:".$conn->connect_error);
        }
        $id = mysqli_real_escape_string($conn,$_GET["accno"]);
        $sql = "SELECT * from customers where accno = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $sql1 = "SELECT * from customers where NOT accno=$id";
        $result1 = $conn->query($sql1);
    ?>
    <tr>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['accno'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['balance'];?></td>
    </tr>
</table>