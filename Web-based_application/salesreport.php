<?php include 'main_template.php';?>
<?php include 'config.php';?>

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

<div id="container">

<br><br><br><br><br>

<table border="0" align="center" cellpadding="0" cellspacing="0" width="80%">
              
        <!--search bar from date-->
      <tr>
      <form action="salesreport.php" method="get" ecntype="multipart/data-form">
        <td width="48%" height="37" align="right"><input type="text" name="d1" style="border:1px solid #CCC; color: #333; font-family: 'Comic Sans MS', cursive; width:210px; height:30px;" placeholder="From Eg.2015-05-13" required /></td>
        <td width="15%" align="left"> <input type="text" name="d2" style="border:1px solid #CCC; color: #333; font-family: 'Comic Sans MS', cursive; width:210px; height:30px;" placeholder="To Eg.2015-06-13" required  /> </td>
        <td width="0%" align="left"><input type="submit" id="btnsearch" value="Search" name="search" /></td>
        </form>
      </tr>
    </table>
  <br>
  
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #033; color:#8c0052;">
    
     <tr>
     <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #030; background: #363636; color:#FFF;"> Summary of Sales </th>
    </tr>
    
      <tr height="30px">
      	<th style="border-bottom:1px solid #333;"> Date </th>
      	<th style="border-bottom:1px solid #333;"> Customers </th>
        <th style="border-bottom:1px solid #333;"> Category </th>
        <th style="border-bottom:1px solid #333;"> Product Sold </th>
        <th style="border-bottom:1px solid #333;"> Quantity Sold </th>
        <th style="border-bottom:1px solid #333;"> Amount Paid </th>
        <th style="border-bottom:1px solid #333;"> Profit </th>
      </tr>
        <!--search result between from date and To date-->   
          <?php
            if(isset($_GET['search'])){
                  $d1 = $_GET['d1'];
                  $d2 = $_GET['d2'];
                  
            $query="SELECT * FROM sales WHERE dates BETWEEN '$d1' and '$d2'";
            $result=mysqli_query($db_link, $query);
            while ($row=mysqli_fetch_array($result)){?>
                  
      <tr align="center" style="height:35px">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['dates']; ?> </td>
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['customers']; ?> </td>
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['category']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['quantity']; ?> </td>
        <td style="border-bottom:1px solid #333;">Rs. <?php echo $row['total']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['profit']; ?> </td>
      </tr>
   <?php
}}?>

    </table>
 
    <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom-color: #030; border-right-color: #030; border-bottom-style: solid; border-right-style: solid; border-bottom-width: 1px; border-right-width: 1px;">
      <tr>
        <td width="20%" style="border-left-color: #030; border-left-style: solid; border-left-width: 1px;">&nbsp;</td>
        <td width="20%">&nbsp;</td>
        <td width="39%">&nbsp;</td>
        <td width="11%" style="border-bottom-color: #030; border-bottom-style: solid; border-bottom-width: 1px; border-left-color: #030; border-right-color: #030; border-left-style: solid; border-right-style: solid; color:#8c0052; border-left-width: 1px; border-right-width: 1px; height:35px;">Sales</td>
        <td width="10%" style="border-bottom-color: #030; border-bottom-style: solid; color:#8c0052; border-bottom-width: 1px ; height:35px;">Profit</td>
      </tr>
      <tr>
        <td style="border-bottom-color: #030; border-bottom-style: none; border-bottom-width: 1px; border-right-width: 1px; border-top-width: 1px; border-left-color: #030; border-left-style: solid;color:#8c0052; border-left-width: 1px;">Total Obtained:</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td style="border-left-color: #030; height:35px; border-right-color: #030; color:#8c0052; border-left-style: solid; border-right-style: solid; border-left-width: 1px; border-right-width: 1px;">
     <!--get total and profit-->   
        <?php
			if(isset($_GET['search'])){
			$d1 = $_GET['d1'];
			$d2 = $_GET['d2'];
				$view1 = "SELECT sum(total) FROM sales WHERE dates BETWEEN '$d1' and '$d2'";
				$results=mysqli_query($db_link, $view1);
				for($i=0; $rows = mysqli_fetch_array($results); $i++){
				$total=$rows['sum(total)'];
				echo "Rs."." ".$total;
				}
			}
	  ?>
        
        </td>
        <td style= "color:#8c0052;height:35px;">
        
        <?php
		if(isset($_GET['search'])){
			$d1 = $_GET['d1'];
			$d2 = $_GET['d2'];

				$view2 = "SELECT sum(profit) FROM sales WHERE dates BETWEEN '$d1' and '$d2'";
				$results1=mysqli_query($db_link, $view2);
				for($i=0; $rowss = mysqli_fetch_array($results1); $i++){
				$profit=$rowss['sum(profit)'];
				echo "Rs."." ".$profit;
				}
		}
	  ?>        
        </td>
      </tr>
    </table>
    </table>

<br><br>
</div>

</body>
</html>