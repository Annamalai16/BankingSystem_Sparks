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
    <li style="float: right;"><a href="contactUs.html">Contact Us</a></li>
    <li style="float: right;"><a href="Index.html">Home</a></li>
</ul>

<br>
<br>
<br>

<table style="width:98%; margin-left:1%">
    <tr>
        <th>Sr. No</th>
        <th>Sender's Acc No</th>
        <th>Sender's Name</th>
        <th>Receiver's Acc No</th>
        <th>Receiver's Name</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Time</th>
    </tr>
    <?php
        $conn = mysqli_connect("localhost","root","","bank");
        if($conn->connect_error) {
            die("Connection Failed:".$conn->connect_error);
        }
        $sql = "SELECT * from history";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $sno = 1;
            while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $sno;?></td>
                <td><?php echo $row['fromno'];?></td>
                <td><?php echo $row['fromname'];?></td>
                <td><?php echo $row['tono'];?></td>
                <td><?php echo $row['toname'];?></td>
                <td><?php echo $row['amount'];?></td>
                <td><?php echo $row['dte'];?></td>
                <td><?php echo $row['time'];?></td>                
            <tr>
    <?php   $sno = $sno + 1;
            }
            echo "</table>";
        }
        else {?>
            <tr>
                <td colspan="8">No Transactions Yet!!</td>
            <tr>
    <?php }
        $conn-> close();
    ?> 
</table>
<br> 