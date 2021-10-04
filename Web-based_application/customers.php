<?php include 'config.php';?>
<?php include 'main_template.php';?>

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

    <div id="container">
        
        <br><br><br><br><br>

        <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">

            <tr>
                <td width="750" align="right">
                    <!--Start Search-->
                    <form action="result_customer.php" method="get" ecntype="multipart/data-form">
                        <input type="text" name="query"
                            style="border:1px solid #CCC; color: #333; width:210px; height:30px; font-family: 'Sans Serif MS', cursive;"
                            placeholder="Search customers..." /><input type="submit" id="btnsearch" value="Search"
                            name="search" />
                    </form>
                    <!--End search-->

                </td>

                <td width="127" height="37" align="right">
                    <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button"
                            style="border:1px solid #999; background: #999; height:45px; background: rgb(73, 64, 72); width:125px; color:#FFF; border-radius:3px; font-family: 'Comic Sans MS', cursive;"
                            value="+ Add Customer" /></a>
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
                        <th colspan="6" align="center" height="55px"
                            style="border-bottom:1px solid #363636; background: #363636; color:#FFF;"> Customer
                            Information Table</th>
                    </tr>

                    <tr height="30px">
                        <th style="border-bottom:1px solid #333;"> Name </th>
                        <th style="border-bottom:1px solid #333;"> Contact </th>
                        <th style="border-bottom:1px solid #333;"> Address </th>
                        <th style="border-bottom:1px solid #333;"> Note </th>
                    </tr>


                    <?php
$query="SELECT * FROM customers";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>

                    <tr align="center" style="height:25px">
                        <td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
                        <td style="border-bottom:1px solid #333;"> <?php echo $row['contact']; ?> </td>
                        <td style="border-bottom:1px solid #333;"> <?php echo $row['address']; ?> </td>
                        <td style="border-bottom:1px solid #333;"> <?php echo $row['note']; ?> </td>
                        <td style="border-bottom:1px solid #333;">
                        </td>
                    </tr>
                    <?php
}?>

                </table>

            </td>
        </tr>
        </table>
        <br><br><br>
        

    </div>
    
    <div id="popup-box1" class="popup-position">
        <div id="popup-wrapper">
            <div id="popup-container">
                <div id="popup-head-color4">
                    <p
                        style="text-align:right !important; font-family: 'Courier New', Courier, monospace;font-size:15px;">
                        <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')">
                            <font color="#FFF"> X </font>
                        </a>
                    </p>
                    <!--Add customer form-->
                    <p style="font-family:'Comic Sans MS', cursive; font-size:16px;"> Add Customer Form </p>
                </div>
                <br>
                <form action="add_customer.php" method="POST">
                    <table border="0" align="center">

                        <tr>
                            <td align="right">Name:</td>
                            <td><input type="text" id="txtbox" name="name" placeholder="Customer name" required><br>
                            </td>
                        </tr>

                        <tr>
                            <td align="right">Conatct:</td>
                            <td><input type="text" id="txtbox" name="contact" maxlength="11" placeholder="Contact"
                                    required><br></td>
                        </tr>

                        <tr>
                            <td align="right">Address:</td>
                            <td><input type="text" id="txtbox" name="address" placeholder="Address" required><br></td>
                        </tr>

                        <tr>
                            <td align="right">Note:</td>
                            <td><input type="text" id="txtbox" name="note" placeholder="Note" required><br></td>
                        </tr>

                        <br>
                        <tr align="left">
                            <td>&nbsp; </td>
                            <td><input type="SUBMIT" background: rgb(73, 64, 72); id="btnnav2" value="Submit"></a></td>
                        </tr>

                    </table>
                </form>
                <!--End form-->
            </div>
        </div>
    </div>
</body>

</html>