<?php
include_once('user/includes/dbconnection.php');
?>
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
     <style>
    .errorWrap {
    padding: 10px;
    margin: 20px 0 0px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>


</head>
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="../index.php">
         
              <h3 class="brand-text">Student Verification | Search</h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container">
        <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
          <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="index.php"><i class="ficon ft-arrow-left"></i></a></li>
            
          </ul>
        </div>
      </div>
    </div>
  </nav>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

  
        <!-- Input Mask start -->
   
        <!-- Formatter start -->

<form name="search" method="post" >        
        
                    

                <div class="row" style="margin-top: 75px;;">
                <div class="col-xl-2 col-lg-2">
                </div>
                      <div class="col-xl-8 col-lg-8">
                        <fieldset>
                          <h5>Enter Student Registration Number
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="searchdata" type="text" name="searchdata" required>
                          </div>
                        </fieldset>
                     
 

<button type="submit" name="search" class="btn btn-info btn-lg" style="width: 100%;">Search Student</button>


 </form>
 </div>
                   
  
 <div class="col-xl-2 col-lg-2">
 </div>
 </div>
<?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <p>&nbsp;</p>
<h4 align="center">Result againts "<?php echo $sdata;?>" keyword </h4>
<div class="row" style="margin-top: 25px;;">
                <div class="col-xl-2 col-lg-2">
                </div>
                      <div class="col-xl-8 col-lg-8">
<table class="table mb-0">
 <thead>
                <tr>
                  <th>S.NO</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                   <th>Reg No</th>
                   <th>Gender</th>
                   <th>Action</th>
                </tr>
              </thead>
  <?php
            
$ret=mysqli_query($con,"select * from  cert  where reg_no ='$sdata'");
$cnt=1;
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
                       <td><?php  echo $row['fname'];?></td>
                  <td><?php  echo $row['lname'];?></td>
                  <td><?php  echo $row['reg_no'];?></td>
                   <td><?php  echo $row['gender'];?></td>
         
                  <td><a href="view-details.php?userid=<?php echo $row['id'];?>">View More Details To Confirm</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr align="center">
    <td colspan="7" style="color:red; font-size: 16px;">No Student Found With This Registration Number ( <?php echo $sdata;?> ) In Our Record</td>

  </tr>
<?php } ?>

</table>
</div>
</div>
<?php }?>
</div>
                   
  
 <div class="col-xl-2 col-lg-2">
 </div>
 </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Formatter end -->
     
     

      </div>
    </div>
  </div>
  <!-- /////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>

  <script src="app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/bloodhound.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/handlebars.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/formatter/formatter.min.js"
  type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/card/jquery.card.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-typeahead.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-inputmask.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-formatter.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-maxlength.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-card.js" type="text/javascript"></script>

</body>
</html>