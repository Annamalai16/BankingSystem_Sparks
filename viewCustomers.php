<?php
$dname=mysqli_connect("localhost:3306","root", "","bank") or die("No Connection");
mysqli_select_db($dname,"bank") or die("No Database connected!");
?>

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
        />
        <title class="fas fa-university noHover">View Customers</title>
        <link rel="icon" href="./Images/i.jpeg" type="image/x-icon">
        <link rel="stylesheet" href="Style.css" type="text/css">
        <style>
            body{
                background-image: url('./Images/cust.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
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
            <th>Name</th>
            <th>Account Number</th>
            <th>Email</th>
            <th>Current Balance</th>
            <th>Make Transaction</th> 
            <th>View Transaction History</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost","root","","bank");
        if($conn->connect_error) {
            die("Connection Failed:".$conn->connect_error);
        }
        $sql = "SELECT * from customers";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $sno = 1;
            while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $sno;?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['accno'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['balance'];?></td>
                <td><a href="transfer.php?accno=<?php echo $row['accno']?>"><button class="button">Transfer Money</button></a></td>
                <td><a href="menu.php?accno=<?php echo $row['accno']?>"><button class="button" style="width: 60%">View</button></a></td>
            <tr>
    <?php   $sno = $sno + 1;
            }
            echo "</table>";
        }
        else {?>
            <tr>
                <td colspan="7">No Customer's Yet</td>
            </tr> 
        <?php
        }
        $conn-> close();
    ?> 
            
    </table>
    <br>