<?php
$dname=mysqli_connect("localhost:3306","root", "","bank") or die("No Connection");
mysqli_select_db($dname,"bank") or die("No Database connected!");
?>

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
        />
        <title class="fas fa-university noHover">Transaction Success</title>
        <link rel="icon" href="./Images/i.jpeg" type="image/x-icon">
        <link rel="stylesheet" href="Style.css" type="text/css">
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

    <?php
    session_start();
    $fromAccount = $_SESSION['fromAccount'];
    $conn = mysqli_connect("localhost","root","","bank");
    if($conn->connect_error) {
        die("Connection Failed:".$conn->connect_error);
    }
    $toAccount = mysqli_real_escape_string($conn,$_GET["toAccount"]);
    $amount = mysqli_real_escape_string($conn,$_GET["amount"]);
    $sql = "UPDATE customers SET balance = balance + $amount WHERE accno = $toAccount";
    mysqli_query($conn,$sql);
    $sql = "UPDATE customers SET balance = balance - $amount WHERE accno = $fromAccount";
    mysqli_query($conn,$sql);
    $sql = "SELECT * FROM customers WHERE accno = $fromAccount";
    $result = $conn->query($sql);
    $sender = $result->fetch_assoc();
    $sql = "SELECT * FROM customers WHERE accno = $toAccount";
    $result = $conn->query($sql);
    $receiver = $result->fetch_assoc();
    date_default_timezone_set("Asia/kolkata");
    $currentDate = date("Y/m/d");
    $currentTime = date("h:i:sa");
    $senderno = $sender['accno'];
    $sendername = $sender['name'];
    $receiverno = $receiver['accno'];
    $receivername = $receiver['name'];
    $insertHistory = "INSERT INTO history (fromno,fromname,tono,toname,amount,dte,time) VALUES ('$senderno','$sendername','$receiverno','$receivername','$amount','$currentDate','$currentTime')";
    $conn->query($insertHistory);
?>
<br>
<h1 style="text-align: center; font-size: 130%;background-color: rgb(166, 161, 235);">Transaction Success!!</h1>
<h1 style="font-size: 130%; margin-left:7%">Details:</h1>
<div> 
    <table style="margin-left:7%; float: left;">
        <tr>
            <th>Creditor's Acc No</th>
            <td>
                <?php echo $senderno?>
            </td>
        </tr>
        <tr>
            <th>Creditor's Name</th>
            <td>
                <?php echo $sendername?>
            </td>
        </tr>
        <tr>
            <th>Receiver's Acc No</th>
            <td>
                <?php echo $receiverno?>
            </td>
        </tr>
        <tr>
            <th>Receiver's Name</th>
            <td>
                <?php echo $receivername?>
            </td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>
                <?php echo $amount?>
            </td>
        </tr>
        <tr>
            <th>Date</th>
            <td>
                <?php echo $currentDate?>
            </td>
        </tr>
        <tr>
            <th>Time</th>
            <td>
                <?php echo $currentTime?>
            </td>
        </tr>
    </table>
    <img src="./Images/gif.gif" style="width: 60%;float: right;">
</div>
<a href="viewBalance.php?accno=<?php echo $fromAccount?>"><button class="button" style="margin-top:0.8cm; margin-left:15%">View Balance</button></a>