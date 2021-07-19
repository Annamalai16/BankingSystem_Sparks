<?php
$dname=mysqli_connect("localhost:3306","root", "","bank") or die("No Connection");
mysqli_select_db($dname,"bank") or die("No Database connected!");
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <title class="fas fa-university noHover">Transferring</title>
    <link rel="icon" href="./Images/i.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="Style.css" type="text/css">

    <style>
        body {
            background-image: url("./Images/load.jpg");
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
</ul>

<!--<img src="./Images/load.jpg" style = "height:50%;width:40%; margin-top:7%;margin-left:30%">
<br>-->
<img src="./Images/loading.gif" style = "height:12%;margin-left: 42%;margin-top:27%">

<?php
    $conn = mysqli_connect("localhost","root","","bank");
    if($conn->connect_error) {
        die("Connection Failed:".$conn->connect_error);
    }
    $toAccount = mysqli_real_escape_string($conn,$_GET["toAccount"]);
    $amount = mysqli_real_escape_string($conn,$_GET["amount"]);    
    header("Refresh:4; url=loading2.php?toAccount=$toAccount&amount=$amount");
?> 