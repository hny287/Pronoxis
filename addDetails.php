
<?php
    
  session_start(); 
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
//Checking is seesion is hod or not 

  if (!isset($_SESSION['username'])||$_SESSION['username']!='Hod') 
  {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";
$conn = new mysqli($servername, $username, $password, $dbname);
    
               

////////Image Upload PHP code Starts here ////////

function GetImageExtension($imagetype)
 	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }
	 
	 
	 
if (!empty($_FILES["uploadedimage"]["name"])) {

	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
    
///Code to use image name with new customized  image name .
    
$imagename="16d41a05j6".$ext; 

	$target_path = "images/".$imagename;
    
if(move_uploaded_file($temp_name, $target_path)) 
{
    


 	$query_upload=" UPDATE `student` SET `imgpath` = '".$target_path."' WHERE `student`.`id` = '15d41a05j6'";    
        
	mysqli_query($conn,$query_upload);
    if ($conn->query($query_upload) === TRUE){
        echo "New record created successfully";
    }
    else
    {
       echo "Error: " . $query_upload . "<br>" . $conn->error;
    }
	
}
    else{

   exit("Error While uploading image on the server");
} 

}

////////Image upload PHP code ends here ////////

?>


<!DOCTYPE html>
<html style="background-color:#3c4141;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SriInduDepartmentalWebsite-Final (1)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Adamina">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Advent+Pro">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body style="padding:0px;">
    <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search" style="color:rgb(159,158,158);background-color:#545555;">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="font-family:ABeeZee, sans-serif;font-size:16px;color:#d7d4d4;">Sri Indu College Of Engineering &amp; Technology</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <form class="form-inline mr-auto" target="_self">
                    <div class="form-group"><label for="search-field"></label></div>
                </form><a class="btn btn-outline-dark" role="button" href="/HodIndex.html" style="color:rgb(250,252,255);width:79px;margin:12px;border:none;">Home</a><a class="btn btn-outline-dark" role="button" href="/index.html" style="color:rgb(250,252,255);width:79px;margin:12px;">Login</a>
                <span
                    class="navbar-text"><a href="#" class="login" style="font-size:20px;">&nbsp;About Dev</a></span>
        </div>
        </div>
    </nav>
    <div>
        <div class="row" style="padding:34px;">
            <div class="col-md-8">
                <section data-aos="fade-up" data-aos-duration="900" class="card">
                    <h1>Student Details</h1>
                    <form  id="form1" action="studentsuccess.php" method="post" class="form-inline">
                        <div class="md-input-group">
                            <label class="md-input-label">Roll Number</label>
                            <input name="roll" class="form-control md-input" type="text" required=""></div>
                        <div class="md-input-group"><label class="md-input-label">Student Name</label>
                            <input name="sname"class="form-control md-input" type="text"></div>
                        <div class="md-input-group"><label class="md-input-label">Father Name</label>
                            <input name="fname" class="form-control md-input" type="text"></div>
                        <div class="md-input-group"><label class="md-input-label">Year&nbsp;</label>
                            <input name="year" class="form-control md-input" type="text" required="" maxlength="4" minlength="4"></div>
                        <div class="md-input-group"><label class="md-input-label">Section</label><input name="sec" class="form-control md-input" type="text"></div>
                        <div class="md-input-group">
                            <label class="md-input-label">Date Of Birth</label>
                            <input name class="form-control md-input" type="text"></div>
                    </form>
                </section>
                <section data-aos="fade-up" data-aos-duration="1000" class="card">
                    <h1>Contact Details</h1>
                    <form id="form2" id="form1" action="studentsuccess.php" method="post" class="form-inline">
                        <div class="md-input-group"><label class="md-input-label">Student Mobile Number</label>
                            <input name="smobile" class="form-control md-input" type="text"></div>
                        <div class="md-input-group"><label class="md-input-label">Father Mobile Number</label>
                            <input name="fmobile" class="form-control md-input" type="text"></div>
                        <div class="md-input-group"><label class="md-input-label">Land Line</label><input name="landline" class="form-control md-input" type="text"></div>
                        <div class="md-input-group"><label class="md-input-label">Address</label><input name="address" class="form-control md-input" type="text"></div>
                    </form>
                </section>
            </div>
            <div class="col" data-aos="fade-right" data-aos-duration="1450" style="margin:30px 0px 100px 0px;padding:39px;height:163px;"><label style="font-size:27px;">Upload a photo here:</label>
               
                <form action="addDetails.php" id=" picform" method="post" action="addDetails.php" enctype="multipart/form-data" method="post" >
                <input name="uploadedimage" type="file">
                <input name="Upload Now" type="submit" value="Upload Image">
                </form>
            
            
            
            </div>
            
            <div class="col">
                <h1 style="font-size:27px;">Click here to Update Subject Details&nbsp;<button class="btn btn-primary" type="button" style="margin:40px 100px ;">Submit</button><label style="font-size:17px;background-color:#f1cfcf;">NOTE: Enter correct Year</label></h1>
            </div>
        </div>
    </div>
    <div>
        <form id="form3" method="post" action="studentsuccess.php">
        <div class="container">
            <div class="row">
                <div class="col-md-4 align-self-center">
                    <div class="row">
                        <div class="col-md-6 align-self-center"><label class="col-form-label" style="font-size:21px;"><strong>SSC Results:</strong></label></div>
                        <div class="col-md-6 align-self-center" style="background-color:#eaeaea;">
                            <input name="ssc" type="text"></div>
                    </div>
                </div>
                <div class="col-md-4 align-self-center">
                    <div class="row">
                        <div class="col-md-6 align-self-center"><label class="col-form-label" style="font-size:19px;"><strong>Intermediate Results:</strong></label></div>
                        <div class="col-md-6 align-self-center" style="background-color:#eaeaea;">
                            <input type="text" name="inter"></div>
                    </div>
                </div>
                <div class="col-md-4 align-self-center">
                    <div class="row">
                        <div class="col-md-6"><label class="col-form-label" style="font-size:18px;"><strong>EAMCET Rank:</strong></label></div>
                        <div class="col-md-6" style="background-color:#eaeaea;height:38px;">
                            <input type="text" name="eamcet"></div>
                    </div>
                </div>
            </div>
        </div>
        </form>
       
    </div>
    <div>
        <div class="container" style="height:44px;"></div>
    </div>
    <div class="container">
        <h1 class="text-center" style="color:rgb(222,222,222);background-color:#8b8a8a;">I Year Progress</h1>
        <div class="table-responsive" data-aos="fade-up" data-aos-duration="1000">
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th></th>
                        <th>Computer Programming</th>
                        <th>English</th>
                        <th>Mathematics</th>
                        <th>Engineering Drawing</th>
                        <th>Physics</th>
                        <th>Eng Lab</th>
                        <th>Computer Programming Lab<br></th>
                        <th>Workshop Practice</th>
                        <th>Workshop Practice</th>
                        <th>Workshop Practice</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>I Year 1 Sem 1 Mid</strong><br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>I Year 1 Sem 2 Mid</strong><br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>I Year I Semester&nbsp;</strong><br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>Result</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>SGPA</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>CGPA</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive" data-aos="fade-up" data-aos-duration="1000">
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>English</th>
                        <th>Mathematics</th>
                        <th>Engineering Drawing</th>
                        <th>Physics</th>
                        <th>Eng Lab</th>
                        <th>Computer Programming Lab<br></th>
                        <th>Workshop Practice</th>
                        <th>Workshop Practice</th>
                        <th>Workshop Practice</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>I Year 2nd Sem 1st Mid</strong><br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>I Year 2nd Sem 2nd Mid</strong><br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>I Year 2nd Semester&nbsp;</strong><br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>Result</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>SGPA</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>CGPA</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-md-6">
                <h1 class="text-center" style="font-size:28px;background-color:#bfbebe;color:rgb(82,84,85);">I Sem&nbsp;Attendance</h1>
                <div class="table-responsive table-bordered">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:156px;">Subject</th>
                                <th style="width:269px;">Total classes</th>
                                <th style="width:269px;">Classes attended</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Result</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="text-center" style="font-size:28px;background-color:#bfbebe;color:rgb(82,84,85);">II Sem Attendance</h1>
                <div class="table-responsive table-bordered">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:156px;">Subject</th>
                                <th style="width:269px;">Total classes</th>
                                <th style="width:269px;">Classes attended</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Result</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <h1 class="text-center" style="color:rgb(222,222,222);background-color:#8b8a8a;">II Year Progress</h1>
        <div class="table-responsive" data-aos="fade-up" data-aos-duration="1000">
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th></th>
                        <th>Probabilty</th>
                        <th>Mathematics</th>
                        <th>Data Structures</th>
                        <th>Design Logic Desgn</th>
                        <th>Electronic Devices And Circuits</th>
                        <th>Basic Electrical&nbsp;</th>
                        <th>EEE lab</th>
                        <th>Data C++ LAb</th>
                        <th>Data C++ LAb</th>
                        <th>Data C++ LAb</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>II Year 1 Sem 1 Mid</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td style="width:190px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>II Year &nbsp;I Sem 2 Mid</strong><br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>II Year I Semester&nbsp;</strong><br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>Result</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>SGPA</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>CGPA</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive" data-aos="fade-up" data-aos-duration="1000">
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th></th>
                        <th>Probabilty</th>
                        <th>Mathematics</th>
                        <th>Data Structures</th>
                        <th>Design Logic Desgn</th>
                        <th>Electronic Devices And Circuits</th>
                        <th>Basic Electrical&nbsp;</th>
                        <th>EEE lab</th>
                        <th>Data C++ LAb</th>
                        <th>Data C++ LAb</th>
                        <th>Data C++ LAb</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>II Year 2nd Sem 1st Mid</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td style="width:190px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>II Year &nbsp;2nd Sem 2nd Mid</strong><br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>II Year 2nd Semester&nbsp;</strong><br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>Result&nbsp;</strong><br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>SGPA</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>CGPA</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-md-6">
                <h1 class="text-center" style="font-size:28px;background-color:#bfbebe;color:rgb(82,84,85);">I Sem&nbsp;Attendance</h1>
                <div class="table-responsive table-bordered">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:156px;">Subject</th>
                                <th style="width:269px;">Total classes</th>
                                <th style="width:269px;">Classes attended</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Result</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="text-center" style="font-size:28px;background-color:#bfbebe;color:rgb(82,84,85);">II Sem Attendance</h1>
                <div class="table-responsive table-bordered">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:156px;">Subject</th>
                                <th style="width:269px;">Total classes</th>
                                <th style="width:269px;">Classes attended</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Result</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <h1 class="text-center" style="color:rgb(222,222,222);background-color:#8b8a8a;">III Year Progress</h1>
        <div class="table-responsive" data-aos="fade-up" data-aos-duration="1000">
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th></th>
                        <th>Principle of Programming</th>
                        <th>Software Engineering</th>
                        <th>Compiler Design</th>
                        <th>Operating SYstem</th>
                        <th>Computer Netwroks</th>
                        <th>Os Lab</th>
                        <th>Compiler Design lab</th>
                        <th>Operation Research</th>
                        <th>Operation Research</th>
                        <th>Operation Research</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>III Year 1 Sem 1 Mid</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>III &nbsp;1 Sem 2 Mid</strong><br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>III Year I Semester&nbsp;</strong><br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>Result</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>SGPA</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>CGPA</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive" data-aos="fade-up" data-aos-duration="1000">
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th></th>
                        <th>Principle of Programming</th>
                        <th>Software Engineering</th>
                        <th>Compiler Design</th>
                        <th>Operating SYstem</th>
                        <th>Computer Netwroks</th>
                        <th>Os Lab</th>
                        <th>Compiler Design lab</th>
                        <th>Operation Research</th>
                        <th>Operation Research</th>
                        <th>Operation Research</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>III Year 2nd Sem 1st Mid</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>III Year 2nd Sem 2nd Mid</strong><br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>III Year 2nd Semester&nbsp;</strong><br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>Result</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>SGPA</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td><strong>CGPA</strong></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-md-6">
                <h1 class="text-center" style="font-size:28px;background-color:#bfbebe;color:rgb(82,84,85);">I Sem&nbsp;Attendance</h1>
                <div class="table-responsive table-bordered">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:156px;">Subject</th>
                                <th style="width:269px;">Total classes</th>
                                <th style="width:269px;">Classes attended</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Result</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="text-center" style="font-size:28px;background-color:#bfbebe;color:rgb(82,84,85);">II Sem Attendance</h1>
                <div class="table-responsive table-bordered">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:156px;">Subject</th>
                                <th style="width:269px;">Total classes</th>
                                <th style="width:269px;">Classes attended</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Result</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <h1 class="text-center" style="color:rgb(222,222,222);background-color:#8b8a8a;">IV Year Progress</h1>
        <div class="table-responsive" data-aos="fade-up" data-aos-duration="1000">
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th></th>
                        <th>Linux Programming</th>
                        <th>Design Paterns</th>
                        <th>Data Ware housing</th>
                        <th>Cloud Computing</th>
                        <th>Mobile Computing</th>
                        <th>Machine Learning</th>
                        <th>Aritificial Intelligence</th>
                        <th>Linux Lab&nbsp;</th>
                        <th>Linux Lab&nbsp;</th>
                        <th>Linux Lab&nbsp;</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>IV Year 1 Sem 1 Mid<br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td>IV Year 1 Sem 2 Mid<br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td>IV Year I Semester&nbsp;<br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td>Result&nbsp;<br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td>SGPA</td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td>CGPA</td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive" data-aos="fade-up" data-aos-duration="1000">
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th></th>
                        <th>Linux Programming</th>
                        <th>Design Paterns</th>
                        <th>Data Ware housing</th>
                        <th>Cloud Computing</th>
                        <th>Mobile Computing</th>
                        <th>Machine Learning</th>
                        <th>Aritificial Intelligence</th>
                        <th>Linux Lab&nbsp;</th>
                        <th>Linux Lab&nbsp;</th>
                        <th>Linux Lab&nbsp;</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>IV Year 1 Sem 1 Mid<br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td>IV Year 1 Sem 2 Mid<br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td>IV Year I Semester&nbsp;<br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td>Result&nbsp;<br></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td>SGPA</td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                    <tr>
                        <td>CGPA</td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td style="width:137px;"><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                        <td><input type="text" style="width:70px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-md-6">
                <h1 class="text-center" style="font-size:28px;background-color:#bfbebe;color:rgb(82,84,85);">I Sem&nbsp;Attendance</h1>
                <div class="table-responsive table-bordered">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:156px;">Subject</th>
                                <th style="width:269px;">Total classes</th>
                                <th style="width:269px;">Classes attended</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Result</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="text-center" style="font-size:28px;background-color:#bfbebe;color:rgb(82,84,85);">II Sem Attendance</h1>
                <div class="table-responsive table-bordered">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width:156px;">Subject</th>
                                <th style="width:269px;">Total classes</th>
                                <th style="width:269px;">Classes attended</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                            <tr>
                                <td>Cell 1</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Result</td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                                <td><input class="form-control-sm" type="text" autofocus="" style="width:115px;"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div style="height:20px;"></div>

    
<!--    Form sumit line -->
        <button id="formsubmit"class="btn btn-dark btn-block btn-lg"  onclick="submitForms()" value="clickme">Submit</button>
    <div style="height:20px;"></div>
    <div class="footer-clean" style="background-color:rgb(49,55,58);">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item"><img data-bs-hover-animate="pulse" style="background-image:url(&quot;assets/img/36929706_1044434599064256_6289139470734196736_n.png&quot;);background-size:cover;height:69px;width:397px;background-color:#31373a;"></div>
                    <div class="col-sm-4 col-md-3 item" style="width:50px;"></div>
                    <div class="col-sm-4 col-md-3 item" style="width:147px;"></div>
                    <div class="col-lg-3 item social" data-bs-hover-animate="pulse" style="width:313px;">
                        <h3 style="color:rgb(231,231,231);">E-mail Developers @</h3>
                        <ul>
                            <li><a href="mailto:parshuram.sudda@gmail.com" style="color:rgb(225,226,227);width:160px;">Parshuram[dot]sudda[at]gmail[dot]com</a></li>
                            <li style="width:274px;"><a href="mailto:vishnurapuru10@gmail.com" style="color:rgb(215,215,215);width:47px;">Vishnurapuru[(2+3)+5][at]gmail[dot]com</a></li>
                        </ul>
                        <p class="copyright" style="color:rgb(251,252,252);">AiPlus © 2018</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/script.min.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        
    $("#formsubmit").click(function(){
    $.post($(this).attr("action"), $(this).serialize(), function (response) {
      alert(response);
    });
});
</script>
<!--
    <script>
        submitForms = function()
        {
   document.getElementById("form1").submit();
    document.getElementById("form2").submit();
document.getElementById("form3").submit();
        }
    </script>
-->
    
</body>

</html>