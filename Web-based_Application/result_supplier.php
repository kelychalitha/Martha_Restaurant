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

<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
        <td width="750" align="right">
        
        <form action="result_supplier.php" method="get" ecntype="multipart/data-form">
        <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; font-family: 'Comic Sans MS', cursive; height:30px;" placeholder="Search supplier..." /><input type="submit" id="btnsearch" value="Search" name="search" />
        </form>
        
        </td>
        
        <td width="127" height="37" align="right">
        <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button" style="border:1px solid #066; background:rgb(73, 64, 72); height:45px; width:125px; color:#FFF; border-radius:3px; font-family: 'Comic Sans MS', cursive;" value="+ Add Supplier" /></a></td>
      </tr>
    
    </table></th>
  </tr>
  
  <br>
  
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #066; color:#8c0052;">
    
     <tr>
     <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #033; background: #363636; color:#FFF;"> Supplier Information Table	</th>
    </tr>
          <!--NavBar-->
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Supplier Name </th>
        <th style="border-bottom:1px solid #333;"> Contact Person </th>
        <th style="border-bottom:1px solid #333;"> Address </th>
        <th style="border-bottom:1px solid #333;"> Contact No. </th>
        <th style="border-bottom:1px solid #333;"> Note </th>
        <th style="border-bottom:1px solid #333;"> Action </th>
      </tr>
          <!--search supplier by supplier name or contactperson-->
					<?php
					include 'config.php';
					
					if(isset($_GET['search'])){
						$query = $_GET['query'];

						$sql = "select * from supplier where suppliername like '%$query%' or contactperson like '%$query%'";

						$result = $db_link->query($sql);
						if($result->num_rows > 0){
							while($row1 = $result->fetch_array()){
		
						?>
						<tr align="center" style="height:25px">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row1['suppliername']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row1['contactperson']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row1['address']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row1['contactno']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row1['note']; ?> </td>
        <td style="border-bottom:1px solid #333;">
        
        
        <a href="edit_supplier.php?id=<?php echo md5($row1['id']);?>"><input type="button" value="Edit" style="width:50px; height:20; color:#FFF; background:#72a400; border:1px solid #069; font-family: 'Comic Sans MS', cursive; border-radius:3px;"></a>/<a href="delete_supplier.php?id=<?php echo md5($row1['id']);?>"><input type="button" value="Delete" style="width:15; height:20; color:#FFF; background: #f44336; border:1px solid #900; border-radius:3px; font-family: 'Comic Sans MS', cursive;"></a>
        
        </td>
      </tr>
						<?php
					
							}

						}else{
							echo "<center>No records</center>";
						}
					}
				$db_link->close();
				?>
				</table>
                </td>
  </tr>
</table>
<br><br><br>
<div id="bdcontainer"></div>
<!--Footer-->
<div id="footer">
<table border="0" cellpadding="15px" align="center"; style="size: 12px; font-family:'Comic Sans MS', cursive; color: #FFF; font-size: 12px;">
<tr>
	<td>
  Martha Restaurant &copy; 2021	
    </td>
</tr>
</table>
</div>

</div>

<!--Add item popup box-->
<div id="popup-box1" class="popup-position">
<div id="popup-wrapper">
<div id="popup-container">
    <div id="popup-head-color2">
    <p style="text-align:right !important; font-family: 'Courier New', Courier, monospace;font-size:15px;"><a href= "javascript:void(0)" onclick="toggle_visibility('popup-box1')"><font color="#FFF"> X </font></a></p>
    <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Add Item Form </p>
    </div>
    <br>
    <form action="add_supplier.php" method="POST">
    <table border="0" align="center">
    
    <tr>
    <td align="right">Supplier Name:</td>
    <td><input type="text" id="txtbox" name="suppliername" placeholder="suppliername" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Conatct Person:</td>
    <td><input type="text" id="txtbox" name="contactperson" placeholder="contactperson" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Address:</td>
    <td><input type="text" id="txtbox" name="address" placeholder="address" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Contact No:</td>
    <td><input type="text" id="txtbox" name="contactno" maxlength="11" placeholder="contactno" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Note:</td>
    <td><input type="text" id="txtbox" name="note" placeholder="note" required><br></td>
    </tr>
    
    <br>
    <tr  align="left">
    <td>&nbsp;  </td>
    <td><input type="SUBMIT" id="btnnav" value="Submit"></a></td>
    </tr>
    
    </table>
    </form>

</div>
</div>
</div>
<!--NavBar-->
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