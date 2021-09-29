<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Martha Resturant</title>
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
            <a href="supplier.php">Suppliers</a>
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

<table width="83%" border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
        <td width="741" align="right"><form action="result.php" method="get" ecntype="multipart/data-form">
           <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px; font-family: 'Comic Sans MS', cursive;" placeholder="Search product..." /><input type="submit" id="btnsearch" value="Search" name="search" />
        </form></td>
        
        <td width="131" height="37">
        <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button" id="btnadd" value="+ Add Products" /></a></td>
      </tr>
    
    </table></th>
  </tr>
  <!--footer-->
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
<div id="popup-wrapper1">
<div id="popup-container1">
    <div id="popup-head-color1">
    <br>
    <p style="font-family:'Comic Sans MS', cursive; font-size:16px;"> Edit Product </p>
    </div>

<?php

include 'config.php';

$id = $_GET['id'];
$view = "SELECT * from products where md5(id) = '$id'";
$result = $db_link->query($view);
$row = $result->fetch_assoc();

if(isset($_POST['update'])){

	$ID = $_GET['id'];

	$category = $_POST['category'];
	$name = $_POST['name'];
	$quantity = $_POST['quantity'];
	$purchase = $_POST['purchase'];
	$retail = $_POST['retail'];
	$supplier = $_POST['supplier'];

	$insert = "UPDATE products set category = '$category', name = '$name', quantity = '$quantity', purchase = '$purchase', retail = '$retail', supplier = '$supplier' where md5(id) = '$ID'";
	
	if($db_link->query($insert)== TRUE){

			echo "Sucessfully update data";
			header('location:products.php');			
	}else{

		echo "Ooppss cannot add data" . $conn->error;
		header('location:products.php');
	}
	
	$db_link->close();
}

?>
   
    <br>
    <form action="" method="POST">
    <table border="0" align="center">    
    <tr>
    <td align="right">Category:</td>
    <td>
    <select name="category" id="txtbox">
    <option> <?php echo $row['category']; ?> </option>
    </select>
    </td>
    </tr>
    
    <tr>
    <td align="right">Name:</td>
    <td><input type="text" id="txtbox" name="name" placeholder="Name" value="<?php echo $row['name'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Quantity:</td>
    <td><input type="text" id="txtbox" name="quantity" placeholder="Quantity" value="<?php echo $row['quantity'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Purchse Amount:</td>
    <td><input type="text" id="txtbox" name="purchase" placeholder="Purchase amnt" value="<?php echo $row['purchase'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Retail Price:</td>
    <td><input type="text" id="txtbox" name="retail" placeholder="Retail" value="<?php echo $row['retail'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Supplier:</td>
    <td>
    <select name="supplier" id="txtbox">
    
           <?php
            require('config.php');
            $query="SELECT suppliername FROM supplier";
            $result1=mysqli_query($db_link, $query);
            while ($row1=mysqli_fetch_array($result1)){?>
              <option><?php echo $row1['suppliername']; ?></option>
                  <?php
}?>
    
	</select>
	</td>
    </tr>
    
    <br>
    <tr  align="center">
    <td>&nbsp;  </td>
    <td>
    <br>
    <input type="SUBMIT" style="solid rgb(66, 161, 10); background:rgb(66, 161, 10);" name="update" id="btnnav" value="Update"></form>
    <a href="products.php"><input type="button" style="border:1px solid rgb(66, 161, 10); background:rgb(66, 161, 10); font-family: 'Comic Sans MS', cursive; height:40px; width:105px; border-radius:3px; color:#FFF;" value="Cancel"></a>
    
    </td>
    </tr>
    
    </table>

</div>
</div>
</div>
  
  <br>
  
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #033; color:#8c0052;">
    
     <tr>
     <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #033; background: #363636; color:#FFF;"> Products 	</th>
    </tr>
    
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Category </th>
        <th style="border-bottom:1px solid #333;"> Name </th>
        <th style="border-bottom:1px solid #333;"> Quantity Left </th>
        <th style="border-bottom:1px solid #333;"> Purchase </th>
        <th style="border-bottom:1px solid #333;"> Retail </th>
        <th style="border-bottom:1px solid #333;"> Supplier </th>
        <th style="border-bottom:1px solid #333;"> Action </th>
      </tr>
      
       <?php
require('config.php');
$query="SELECT * FROM products";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>
      
      <tr align="center" height="25px;">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['category']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['quantity']; ?> pcs. </td>
        <td style="border-bottom:1px solid #333;">Rs. <?php echo $row['purchase']; ?> </td>
        <td style="border-bottom:1px solid #333;">Rs. <?php echo $row['retail']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['supplier']; ?> </td>
        <td style="border-bottom:1px solid #333;">
        
        
        <a href="edit_item.php?id=<?php echo md5($row['id']);?>"><input type="button" value="Edit" style="width:50px; height:20; color:#FFF; background:#72a400; border:1px solid #069; font-family: 'Comic Sans MS', cursive; border-radius:3px;"></a>/<a href="delete.php"><input type="button" value="Delete" style="width:15; height:20; color:#FFF; background: #f44336; font-family: 'Comic Sans MS', cursive; border:1px solid #900; border-radius:3px;"></a>
        
        </td>
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
