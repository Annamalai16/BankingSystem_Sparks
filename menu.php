<?php
$dname=mysqli_connect("localhost:3306","root", "","bank") or die("No Connection");
mysqli_select_db($dname,"bank") or die("No Database connected!");
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <title class="fas fa-university noHover">Menu</title>
    <link rel="icon" href="./Images/i.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="Style.css" type="text/css">
    <style>
        body {
            background-color: rgb(226, 225, 241);
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

<h1 style="text-align: center; font-size: 170%; margin-top: 12%;">Menu</h1>

<?php
    $conn = mysqli_connect("localhost","root","","bank");
    if($conn->connect_error) {
        die("Connection Failed:".$conn->connect_error);
    }
    $accno = mysqli_real_escape_string($conn,$_GET["accno"]);
    $one = 1;
    $two = 2;
?>
<div style="margin-top: 3%;margin-left: 33%;">
    <a href="individualTransactionHistory.php?accno=<?php echo $accno ?>&flag=1"><img src="./Images/debit.png" style="height: 30%; width: 20%; border: 2px solid black;"></a>
    <a href="individualTransactionHistory.php?accno=<?php echo $accno ?>&flag=2"><img src="./Images/credit.png" style="height: 30%; width: 20%; border: 2px solid black;margin-left: 10%"></a>
</div>
<div>
</div>