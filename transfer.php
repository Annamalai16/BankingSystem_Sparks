<?php
$dname=mysqli_connect("localhost:3306","root", "","bank") or die("No Connection");
mysqli_select_db($dname,"bank") or die("No Database connected!");
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <title class="fas fa-university noHover">Transaction</title>
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

<h1 style="text-align: center; font-size: 130%;margin-top:5%">Account Details</h1>
<table style="width:98%; margin-left:1%;margin-top:1%">
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

<?php if($row['balance']!=0){?>
<div style = " margin-left: 150px;margin-top: 2%;border: 2px solid black; background-color: rgb(204, 201, 247); width:20%; padding:10px 50px;">             
<form style="font-size: 120%;" action="loading.php">
    <label for="toAccount">Credit To :</label>
    <select name="toAccount" style="padding: 3px 9px;" required>
        <option value="" disabled selected hidden>Choose an Account</option>
        <?php while($row1 = $result1->fetch_assoc()){?>
            <option value="<?php echo $row1['accno'];?>"><?php echo $row1['accno']," - ",$row1['name']; ?></option>
        <?php } ?>
    </select>
    <br>
    <br>
    <br>
    <label for="amount">Amount :</label>
    <input type = "number" name="amount" min = 1 max = <?php echo $row['balance']?> style="padding: 5px 15px;width:60%;" placeholder="Enter Amount" required>
    <br>
    <br>
    <input type="submit" value="Transfer" class="button">
</form>
</div> 
<?php } 
    else { ?>
    <h1 style="margin-top:10%;font-size: medium;margin-left:15%;border: 2px solid black;padding:10px;width:24%;background-color: rgb(204, 201, 247);">You dont have sufficient balance to transfer.</h1>
    <?php } 
?>

<?php 
    session_start();
    $_SESSION['fromAccount']=$id;
?>