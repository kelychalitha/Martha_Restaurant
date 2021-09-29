<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Martha Restaurant</title>
</head>

<link rel="stylesheet" type="text/css" href="css/css1.css">
<script>
	function toggle_visibility(id){
		var e = document.getElementById(id);
		if(e.style.display=='block')
			e.style.display = 'none';
		else
			e.style.display = 'block';
		}
</script>

<body>

<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
	}
?>

<div id="container">
<div id="header">
<table cellspacing="0" width="100%" border="0" cellpadding="20px">
<tr>
	<td width="56%">
    <table width="41%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	  <th scope="col"><h1>MAR<span style="color:red;">THA</span></h1></th>
	    </tr>
	  </table></td>
    <td style="font-size:14px;">
      <table width="93%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<th scope="col">Welcome: <?php echo $_SESSION['access'];?></th>
          	<th scope="col"><?php
			$Today = date('y:m:d',time());
			$new = date('l, F d, Y', strtotime($Today));
			echo $new;
			?></th>
          	<th scope="col" width="20px"><a href="logout.php">
            <input type="button" id="btnadd" value="Logout" align="middle" />
          	</a></th>
        </tr>
  </table></td>
    </tr>

</table>
</div>

<br><br><br><br><br>
<!-- NavBar -->
<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
  <a href="sales.php">Sales</a>
  <a href="products.php">Products</a>
  <a href="customers.php">Customers</a>
  <a href="suppliers.php">Suppliers</a>
  <div class="dropdown">
    <button class="dropbtn">Sales Report 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="salesreport.php">Sales Summary</a>
      <a href="result_sold_products.php">Most Sold Products</a>
    </div>
  </div> 
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  
</div>

<br>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
      	<td width="573">&nbsp;  </td>
        <td width="304" align="right"><form action="result.php" method="get" ecntype="multipart/data-form">
        <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px; font-family: 'Comic Sans MS', cursive;" placeholder="Search product..." /><input type="submit" id="btnsearch" value="Search" name="search" />
        </form></td>
      </tr>
    
    </table></th>
  </tr>
  <!--Footer-->
  <div id="footer">
<table border="0" cellpadding="15px" align="center"; style="size: 12px; font-family: 'Comic Sans MS', cursive; color: #FFF; font-size: 12px;">
<tr>
	<td>
  Martha Restaurant &copy; 2021	
    </td>
</tr>
</table>
</div>
  
  <div id="popup-box2" class="popup-position1">
<div id="popup-wrapper2">
<div id="popup-container2">
    <div id="popup-head-color5">
    <br>
    <p style="font-family:'Comic Sans MS', cursive; font-size:16px;"> Transaction Form </p>
    </div>

<?php
include 'config.php';

$id = $_GET['id'];
$view = "SELECT * from products where md5(id) = '$id'";
$result = $db_link->query($view);
$row = $result->fetch_assoc();

if(isset($_POST['update'])){

	$ID = $_GET['id'];
	
$view1 = "SELECT quantity from products where md5(id) = '$id'";
$result1 = $db_link->query($view);
$row2 = $result->fetch_assoc();
	
	$quant = $_POST['quant'];
	$dates=$_POST['dates'];
	$quantity=$_POST['quantity'];
	
	$customers=$_POST['customers'];
	$category=$_POST['category'];
	$name=$_POST['name'];
	$amount=$_POST['amount'];
	$quant=$_POST['quant'];
	$total=$_POST['total'];
	$tentered=$_POST['tendered'];
	$changed=$_POST['changed'];
	$prof = $_POST['profit'];

	$insert1 = "UPDATE products set quantity = quantity - '$quant' where md5(id) = '$ID'";
	$insert = "INSERT INTO sales(dates,customers,category,name,amnt,quantity,total,profit,tendered,changed) VALUES('$dates','$customers','$category','$name','$amount','$quant','$total','$prof','$tendered','$changed')" or die("error".mysqli_errno($db_link));
	$result=mysqli_query($db_link,$insert);
	if($db_link->query($insert1)== TRUE){

			echo "Sucessfully update data";
			header('location:sales.php');			
	}
	
	$db_link->close();
}

?>
   
    <br>
    <form action="" method="POST">
    
    <table border="0" align="center">  
    
    <?php
	
	if(isset($_POST['sub']))
	{
	
	@$total = $_POST['total'];
	@$tendered = $_POST['tendered'];
	@$quant = $_POST['quant'];
	@$profit = $_POST['profit'];
	
	@$profit = $profit;
	@$quant = $quant;
	@$payment = $tendered;
	@$change = $tendered - $total;
	}
	
	?>
    
    <tr>
    <td align="right"> Date : </td>
    <td> <input type="text" name="dates" id="txtbox" value="<?php echo "  ". date("Y/m/d")?>" readonly> </td>
    </tr>

    <tr>
    <td align="right">Customer Name:</td>
    <td>
    <select name="customers" id="txtbox" readonly>
    
    <?php
	require('config.php');
	$query="SELECT * FROM customers";
	$result=mysqli_query($db_link, $query);
	while ($row1=mysqli_fetch_array($result)){?>
    
	<option><?php echo $row1['name']; ?></option>
    					
	<?php
}?>
    
    </select>
    </td>
    </tr>
    
    <tr>
    <td align="right">Category:</td>
    <td><input type="text" id="txtbox" name="category" value="<?php echo $row['category'];?>" readonly><br></td>
    </tr>
    
    <tr>
    <td align="right">Product Name:</td>
    <td><input type="text" id="txtbox" name="name" value="<?php echo $row['name'];?>" readonly><br></td>
    </tr>
    
      
    <!-- Computation starts here -->
    
    <form method="POST">
    
    <?php
    
	if(isset($_POST['calculate']))
	{
	@$amnt = $_POST['amnt'];
	@$quant = $_POST['quant'];
	@$profit = $_POST['profit'];
	@$purchase = $_POST['purchase'];
	
	@$quant = $quant;
	@$total = $amnt * $quant;
	@$profit = $total - $quant * $purchase;
	}
	
	
	?>
    
    <form method="post">
    <tr>
    <td><input type="text" id="txtbox" name="purchase" value="<?php echo $row['purchase'];?>" hidden><br></td>
    </tr>
    
    <tr>
    <td align="right">Retail Price:</td>
    <td><input type="text" id="txtbox" name="amnt" value="<?php echo $row['retail'];?>" readonly><br></td>
    </tr>
    
    <tr>
    <td align="right">Quantity:</td>
    <td><input type="text" id="txtbox" name="quant" value="<?php echo @$quant ?>" placeholder="Quantity" required></td>
    </tr>
    
    <tr>
    <td align="right">Total Payable Amount:</td>
    <td><input type="text" id="txtbox" name="total" value="<?php echo @$total ?>" readonly></td>
    <td><input type="submit" name="calculate" value="Compute" id="btncalc"></td>
    </tr>
    
    <tr>
    <td align="right">Profit:</td>
    <td><input type="text" id="txtbox" name="profit" value="<?php echo @$profit ?>" readonly><br></td>
    </tr>

    </form>
    
    
    <tr>
    <td align="right">Cash / Card:</td>
    <td><input type="text" id="txtbox" value="<?php echo @$payment ?>" name="tendered" placeholder="Cash / Card"></td>
    <td><input type="submit" value="Calculate" name="sub" id="btncalc"></td>
    </tr>
    
    <tr>
    <td align="right">Balance:</td>
    <td><input type="text" id="txtbox" name="changed" value="<?php echo @$change ?>" readonly></td>
    </tr>
    
    </form>
    
    <!-- Computation ends here -->
    

    <br>
    <tr  align="center">
    <td>&nbsp;  </td>
    <td>
    <br>
    <input type="SUBMIT" name="update" id="btnnav1" value="Add"></form>
    <a href="sales.php"><input type="button" id="btnnav1" style="border:1px solid #900; background: #8c0052; height:40px; width:105px; border-radius:3px; color:#FFF;" value="Cancel"></a>
    
    </td>
    </tr>
    
    </table>

</div>
</div>
</div>
  
  <br>
  
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #030; color:#8c0052;">
    
     <tr>
     <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #363636; background: #363636; color:#FFF;"> Select Products </th>
    </tr>
    
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Category </th>
        <th style="border-bottom:1px solid #333;"> Name </th>
        <th style="border-bottom:1px solid #333;"> Price </th>
        <th style="border-bottom:1px solid #333;"> Quantity Left </th>
        <th style="border-bottom:1px solid #333;"> Supplier </th>
        <th style="border-bottom:1px solid #333;"> Pick Order </th>
      </tr>
      
       <?php
require('config.php');
$query="SELECT * FROM products";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>
      
      <tr align="center" style="height:35px">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['category']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;">Rs. <?php echo $row['retail']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['quantity']; ?> pcs. </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['supplier']; ?> </td>
        <td style="border-bottom:1px solid #333;">
        
        
        <a href="process_sales.php?id=<?php echo md5($row['id']);?>"><input type="button" value="pick" style="width:90px; height:30px; color:#FFF; background: #8c0052; border:1px solid #930; border-radius:3px; font-family: 'Comic Sans MS', cursive;"></a>
        
        </td>
      </tr>
   <?php
}?>
      
    </table>
    
  </td>
  </tr>
</table>

</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</body>
</html>
