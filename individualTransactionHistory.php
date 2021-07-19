<?php
$dname=mysqli_connect("localhost:3306","root", "","bank") or die("No Connection");
mysqli_select_db($dname,"bank") or die("No Database connected!");
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <title class="fas fa-university noHover">Transaction History</title>
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

<br>
<br>
<br>

<?php
    $conn = mysqli_connect("localhost","root","","bank");
    if($conn->connect_error) {
        die("Connection Failed:".$conn->connect_error);
    }
    $accno = mysqli_real_escape_string($conn,$_GET["accno"]);
    $flag = mysqli_real_escape_string($conn,$_GET["flag"]);
    $sql = "SELECT * from customers where accno = $accno";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $name = $row['name'];
    if($flag==1){
        $s = "Debit";
        $s1 = "Receiver's";
        $sql = "SELECT * from history where fromno = $accno";
    }
    else{
        $s = "Credit";
        $s1 = "Sender's";
        $sql = "SELECT * from history where tono = $accno";
    }
    $result = $conn->query($sql);
?>

<div> 
    <p style="float:left;display:inline;margin-left:1%"> Acc No: <?php echo $accno ?></p>
    <h1 style="float:left;margin-left:39%;display:inline;font-size:120%;"><?php echo $s?> History</h1>
    <p style="float:right;display:inline;margin-right:1%">Name: <?php echo $name?></p>
</div>
<br>

<table style="width:98%; margin-left:1%">
    <tr>
        <th>Sr. No</th>
        <th><?php echo $s1 ?> Acc No</th>
        <th><?php echo $s1 ?> Name</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Time</th>
    </tr>
    <?php
        if($result->num_rows > 0){
            $sno = 1;
            while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $sno;?></td>
                <?php if($flag==2){?>
                <td><?php echo $row['fromno'];?></td>
                <td><?php echo $row['fromname'];?></td>
                <?php }
                else{?>
                <td><?php echo $row['tono'];?></td>
                <td><?php echo $row['toname'];?></td>
                <?php }?> 
                <td><?php echo $row['amount'];?></td>
                <td><?php echo $row['dte'];?></td>
                <td><?php echo $row['time'];?></td>                
            <tr>
            <?php $sno = $sno + 1;?>
    <?php   }
            echo "</table>";
        }
        else{?>
            <tr>
                <td colspan="6">No <?php echo $s ?>'s Yet!!</td>
            </tr>
<?php   }
    ?> 
</table>
<br>