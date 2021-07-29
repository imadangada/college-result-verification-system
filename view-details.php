<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>BUGEMA | Search Application</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="user/app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="user/app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="user/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="user/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="user/app-assets/css/plugins/forms/extended/form-extended.css">
  <link rel="stylesheet" type="text/css" href="user/assets/css/style.css">
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<style>
    .cert{
        width: 100%;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 3px 3px 25px #000;
        color: #ccc;
        font-family: 'Times New Roman', Times, serif;
    }
    p.cert{
        margin-left: 10px;
    }

</style>
<?php
include_once('user/includes/dbconnection.php');
?>
<?php
 $cid=$_GET['userid'];
$ret=mysqli_query($con,"select * from cert where id='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?> 


<div class="row">
<div class="col-md-2">
</div>
<div class="col-md-8">
<div class="cert"><br>
<h2 align="center">Student Verification Details</h2>
<hr>
<table class="table mb-1 table-bordered">
    <tr>
    <td>

 <center><img src="img/logo.jpg" width="150" height="150"></center>              
</td>
<td>
<h1><center>FCAPT KANO </h1><h2><center><u>STUDENT VERIFICATION</u></center></h2>
 </td>

<td>
<center><img src="admin/userimages/<?php echo $row['UserPic'];?>" width="150" height="150"></center>
                      </td>
                      </tr>
                      </table>
<h4 style="margin-left: 10px; margin-right:3px;"><?php echo $row['fname']?> <?php echo $row['lname']?>
 with <?php echo $row['reg_no']?> Registration Number with picture attached above also a <?php echo $row['gender']?>
  student, he our student at federal college of agricultural produce technology kano(FCAPT)
 <br>
<br>
He joined the college on <?php echo $row['entry']?> and finished on <?php echo $row['end']?> he study in our collator_get_error_code
he got admitted in to <?php echo $row['program']?> program under <?php echo $row['dept']?>department, 
and he studied  <?php echo $row['course']?>
</h4>
<br>
<br>
<h3 align="center"> <?php echo $row['fname']?> is confirmed that he is our student and passed all the level successfully </h3>
<br>
<br>
<p align="center"><a href="search-app.php">Go Back</a></p>



<div style="margin-top: 45px;"></div>



</div>
</div>
<div class="col-md-2">
</div>
<?php } ?>