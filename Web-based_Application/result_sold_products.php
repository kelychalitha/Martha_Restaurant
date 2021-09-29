<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Martha Restaurant</title>
</head>

<link rel="stylesheet" type="text/css" href="css/css1.css">
<script>
function toggle_visibility(id) {
    var e = document.getElementById(id);
    if (e.style.display == 'block')
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
                                <th scope="col">
                                    <h1>MAR<span style="color:red;">THA</span></h1>
                                </th>
                            </tr>
                        </table>
                    </td>
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
                        </table>
                    </td>
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
                <td width="741" align="right">
                    <!--product search bar-->
                    <form action="result_sold_products.php" method="get" ecntype="multipart/data-form">
                        <input type="text" name="query"
                            style="border:1px solid #CCC; color: #333; width:210px; font-family: 'Comic Sans MS', cursive; height:30px;"
                            placeholder="Search product..." /><input type="submit" id="btnsearch" value="Search"
                            name="search" />
                    </form>

                </td>

                <td width="131" height="37" align="right">
                    <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button"
                            id="btnadd" value="+ Add Products" /></a>
                </td>
            </tr>

        </table>
        </th>
        </tr>

        <br>

        <tr>
            <td>
                <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%"
                    style="border:1px solid #033; color:#8c0052;">

                    <tr>
                        <th colspan="7" align="center" height="55px"
                            style="border-bottom:1px solid #363636; background: #363636; color:#FFF;"> Products </th>
                    </tr>

                    <tr height="30px">
                        <th style="border-bottom:1px solid #333;"> Category </th>
                        <th style="border-bottom:1px solid #333;"> Name </th>
                        <th style="border-bottom:1px solid #333;"> Date </th>
                        <th style="border-bottom:1px solid #333;"> Quantity Left </th>
                    </tr>
          <!--searching products by category or name or dates-->
                    <?php
					include 'config.php';
					
					if(isset($_GET['search'])){
						$query = $_GET['query'];

						$sql = "select * from sales where category like '%$query%' or name like '%$query%' or dates like '%$query%'";

						$result = $db_link->query($sql);
						if($result->num_rows > 0){
							while($row1 = $result->fetch_array()){
		
						?>
                    <tr align="center" style="height:25px">
                        <td style="border-bottom:1px solid #333;"> <?php echo $row1['category']; ?> </td>
                        <td style="border-bottom:1px solid #333;"> <?php echo $row1['name']; ?> </td>
                        <td style="border-bottom:1px solid #333;"> <?php echo $row1['dates']; ?> </td>
                        <td style="border-bottom:1px solid #333;"> <?php echo $row1['quantity']; ?> pcs. </td>
                        <td style="border-bottom:1px solid #333;">



                        </td>
                    </tr>
                    <!--if no result, display no records-->
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
            <table border="0" cellpadding="15px" align="center" ;
                style="size: 12px; font-family: 'Comic Sans MS', cursive; color: #FFF; font-size: 12px;">
                <tr>
                    <td>
                        Martha Restaurant &copy; 2021 </td>
                </tr>
            </table>
        </div>

    </div>

    <!--add product popup box-->
    <div id="popup-box1" class="popup-position">
        <div id="popup-wrapper">
            <div id="popup-container">
                <div id="popup-head-color1">
                    <p
                        style="text-align:right !important; font-family: 'Courier New', Courier, monospace;font-size:15px;">
                        <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')">
                            <font color="#FFF"> X </font>
                        </a></p>
                    <p style="font-family:'Comic Sans MS', cursive; font-size:16px;"> Add Product Form </p>
                </div>
                <br>
                <form action="add_item.php" method="POST">
                    <table border="0" align="center">

                        <tr>
                            <td align="right">Category:</td>
                            <td>
                                <select name="category" id="txtbox">
                                    <option> Main Dishes </option>
                                    <option> Side Dishes </option>
                                    <option> Desserts </option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td align="right">Name:</td>
                            <td><input type="text" id="txtbox" name="name" placeholder="Name" required><br></td>
                        </tr>

                        <tr>
                            <td align="right">Quantity:</td>
                            <td><input type="text" id="txtbox" name="quantity" placeholder="Quantity" required><br></td>
                        </tr>

                        <tr>
                            <td align="right">Purchase Amount:</td>
                            <td><input type="text" id="txtbox" name="purchase" placeholder="Purchase amnt" required><br>
                            </td>
                        </tr>

                        <tr>
                            <td align="right">Retail Price:</td>
                            <td><input type="text" id="txtbox" name="retail" placeholder="Retail" required><br></td>
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
                        <tr align="left">
                            <td>&nbsp; </td>
                            <td><br><input type="SUBMIT" id="btnnav" value="Submit"></a></td>
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