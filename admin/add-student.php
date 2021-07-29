<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $reg_no=$_POST['reg_no'];
    $program=$_POST['program'];
    $dept=$_POST['dept'];
    $course=$_POST['course'];
    $gender=$_POST['gender'];
    $entry=$_POST['entry'];
    $end=$_POST['end'];
    
   /* $filename = $_FILES[‘UserPic’][‘name’];
$filetmpname = $_FILES[‘UserPic’][‘tmp_name’];
//folder where images will be uploaded
$folder = ‘userimages/’;
//function for saving the uploaded images in a specific folder
move_uploaded_file($filetmpname, $folder.$filename);*/

    $UserPic = $_FILES["UserPic"]["name"];
        $type = $_FILES["UserPic"]["type"];
        $size = $_FILES["UserPic"]["size"];
        $temp = $_FILES["UserPic"]["tmp_name"];
        $error = $_FILES["UserPic"]["error"];
      
        if ($error > 0){
          die("Error uploading file! Code $error.");
          }
        else{
          if($size > 100000000000) //conditions for the file
            {
            die("Format is not allowed or file size is too big!");
            }
        else
              {
          move_uploaded_file($temp, "userimages/".$UserPic);
              }
          }
    /*$upic=$_FILES["UserPic"]["name"];
     
$extension = substr($upic,strlen($upic)-4,strlen($upic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
     move_uploaded_file($_FILES["userpic"]["tmp_name"],"userimages/".$userpic);*/

    $query=mysqli_query($con,"insert into cert(fname,lname,reg_no,program,dept,course,gender,entry,end,UserPic) value('$fname','$lname','$reg_no','$program','$dept','$course','$gender','$entry','$end','$UserPic')");
    if ($query) {
    $msg="Data has been added successfully.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}
  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>FCAPT - Admission Form</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/extended/form-extended.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<?php include('includes/header.php');?>
<?php include('includes/leftbar.php');?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">
           Admission Application Form
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Application
                </li>
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <div class="content-body">

<form name="submit" method="post" action="add-student.php" enctype="multipart/form-data">        
        <section class="formatter" id="formatter">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Student Certificate Verification Form</h4>

                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                  
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
 <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>


 <div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Student First Name                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="fname" name="fname"  type="text" required>
    </div>
</fieldset>               
</div>
 </div>
<div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Student Last Name                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="lname" name="lname"  type="text" required>
    </div>
</fieldset>               
</div>
</div>
<div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Student Registration Number                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="reg_no" name="reg_no"  type="text" required>
    </div>
</fieldset>               
</div>
</div>
<div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Student Programme Enrolled                   </h5>
   <div class="form-group">
   <select name='program' id="program" class="form-control white_bg">
     <option value="">Select Programme</option>
     <option value="Higher National Diploma">Higher National Diploma</option>
     <option value="National Diploma">National Diploma</option>
     <option value="Professional Diploma">Professional Diploma</option>
     <option value="Certificate">Certificate</option>
        
   </select>
    </div>
</fieldset>
                   
</div>
</div>
<div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Student Department                   </h5>
   <div class="form-group">
   <select name='dept' id="dept" class="form-control white_bg">
     <option value="">Course Applied</option>
      <?php $query=mysqli_query($con,"select * from department");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['fullname'];?>"><?php echo $row['fullname'];?></option>
                  <?php } ?>  
   </select>
    </div>
</fieldset>
                   
</div>
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Student Course Studied                   </h5>
   <div class="form-group">
   <select name='course' id="course" class="form-control white_bg">
     <option value="">Course Applied</option>
      <?php $query=mysqli_query($con,"select * from tblcourse");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['CourseName'];?>"><?php echo $row['CourseName'];?></option>
                  <?php } ?>  
   </select>
    </div>
</fieldset>
                   
</div>
</div>
<div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Student Gender                   </h5>
   <div class="form-group">
   <select name='gender' id="gender" class="form-control white_bg">
     <option value="">Select Gender</option>
     <option value="Female">Female</option>
     <option value="Male">Male</option>
     <option value="Others">Others</option>
        
   </select>
    </div>
</fieldset>
                   
</div>
</div>        
 <div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Student Entry Year                 </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="entry" name="entry"  type="date" required>
    </div>
</fieldset>               
</div>
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Student Finished Year                 </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="end" name="end"  type="date" required>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                    <div class="row">
<div class="col-xl-12 col-lg-12">
 <fieldset>
  <h5>Student Pic                   </h5>
   <div class="form-group">
    <input class="form-control white_bg" id="UserPic " name="UserPic"  type="file" required>
    </div>
</fieldset>                  
</div>
 </div> 
<div class="row" style="margin-top: 2%">
<div class="col-xl-6 col-lg-12">
<button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Submit</button>
</div>
</div>
 </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php } ?>
        <!-- Formatter end -->
      </form>  
      </div>
    </div>
  </div>
<?php include('includes/footer.php');?>
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
