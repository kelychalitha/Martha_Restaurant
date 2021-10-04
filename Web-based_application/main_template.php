<!--Main template for include every file-->
<!--Kely Weerassooriya-->
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Martha Resturant</title>
</head>

<link rel="stylesheet" type="text/css" href="css/css1.css">

<body>

    <?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
	}
?>

    <?php

if($_SESSION['username']=='Salesperson'){
	header('location:sales1.php');
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
                                <th scope="col">Welcome: <?php echo $_SESSION['username'];?></th>
                                <th scope="col"><?php
			$Today = date('y:m:d',time());
			$new = date('l, F d, Y', strtotime($Today));
			echo $new;
			?></th>
                                <th scope="col" width="20px"><a href="logout.php">
                                        <input type="button" id="btnadd" value="Logout" align="middle" src="" />
                                    </a></th>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
        </div>

        <br><br><br><br><br>
        <!-- NavBar Started -->
        <div class="topnav" id="myTopnav">
            <a href="index.php" class="active">Home</a>
            <a href="sales.php">Sales</a>
            <a href="products.php">Products</a>
            <a href="customers.php">Customers</a>
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
        <!--NavBar End-->

        <br><br><br><br>
        <!--Footer-->
        <div id="footer">
            <table border="0" cellpadding="15px" align="center" ;
                style="size: 12px; font-family: 'Comic Sans MS', cursive; color: #FFF; font-size: 12px;">
                <tr>
                    <td>
                        Martha Restaurant &copy; 2021
                    </td>
                </tr>
            </table>
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