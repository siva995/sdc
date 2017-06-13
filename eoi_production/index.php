<?php
require_once("DBConfig.php");

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $presentposition = $_POST['presentposition'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $qualification = $_POST['qualification'];
    $district = $_POST['district'];
    $address = $_POST['address'];

    if (isset($_POST['ethics'])) {
        $ethics = $_POST['ethics'];
    } else {
        $ethics = "N";
    }

    if (isset($_POST['envstds'])) {
        $envstds = $_POST['envstds'];
    } else {
        $envstds = "N";
    }

    if (isset($_POST['ict1'])) {
        $ict1 = $_POST['ict1'];
    } else {
        $ict1 = "N";
    }

    if (isset($_POST['ict2'])) {
        $ict2 = $_POST['ict2'];
    } else {
        $ict2 = "N";
    }

    if (isset($_POST['css1'])) {
        $css1 = $_POST['css1'];
    } else {
        $css1 = "N";
    }

    if (isset($_POST['css2'])) {
        $css2 = $_POST['css2'];
    } else {
        $css2 = "N";
    }

    if (isset($_POST['css3'])) {
        $css3 = $_POST['css3'];
    } else {
        $css3 = "N";
    }

    if (isset($_POST['analytical'])) {
        $analytical = $_POST['analytical'];
    } else {
        $analytical = "N";
    }

    if (isset($_POST['enterpreneuredu'])) {
        $enterpreneuredu = $_POST['enterpreneuredu'];
    } else {
        $enterpreneuredu = "N";
    }

    if (isset($_POST['leadershipedu'])) {
        $leadershipedu = $_POST['leadershipedu'];
    } else {
        $leadershipedu = "N";
    }

    $from1 = $_POST['from1'];
    $to1 = $_POST['to1'];
    $company1 = $_POST['company1'];
    $positionheld1 = $_POST['positionheld1'];
    $from2 = $_POST['from2'];
    $to2 = $_POST['to2'];
    $company2 = $_POST['company2'];
    $positionheld2 = $_POST['positionheld2'];
    $from3 = $_POST['from3'];
    $to3 = $_POST['to3'];
    $company3 = $_POST['company3'];
    $positionheld3 = $_POST['positionheld3'];
    $briefprofile = $_POST['briefprofile'];
    $countries = $_POST['countries'];

    if (isset($_POST['language1'])) {
        $language1 = $_POST['language1'];
    } else {
        $language1 = "N";
    }

    if (isset($_POST['read1'])) {
        $read1 = $_POST['read1'];
    } else {
        $read1 = "N";
    }

    if (isset($_POST['write1'])) {
        $write1 = $_POST['write1'];
    } else {
        $write1 = "N";
    }

    if (isset($_POST['speak1'])) {
        $speak1 = $_POST['speak1'];
    } else {
        $speak1 = "N";
    }

    if (isset($_POST['language2'])) {
        $language2 = $_POST['language2'];
    } else {
        $language2 = "N";
    }

    if (isset($_POST['read2'])) {
        $read2 = $_POST['read2'];
    } else {
        $read2 = "N";
    }

    if (isset($_POST['write2'])) {
        $write2 = $_POST['write2'];
    } else {
        $write2 = "N";
    }

    if (isset($_POST['speak2'])) {
        $speak2 = $_POST['speak2'];
    } else {
        $speak2 = "N";
    }

    if (isset($_POST['language3'])) {
        $language3 = $_POST['language3'];
    } else {
        $language3 = "N";
    }

    if (isset($_POST['read3'])) {
        $read3 = $_POST['read3'];
    } else {
        $read3 = "N";
    }

    if (isset($_POST['write3'])) {
        $write3 = $_POST['write3'];
    } else {
        $write3 = "N";
    }

    if (isset($_POST['speak3'])) {
        $speak3 = $_POST['speak3'];
    } else {
        $speak3 = "N";
    }

    $naturework = $_POST['naturework'];
    $location = $_POST['location'];
    $company = $_POST['company'];
    $positionheld = $_POST['positionheld'];
    $mainfeatures = $_POST['mainfeatures'];

    $status = 1;

    $image_name = "";

    if (isset($_FILES['image'])) {

        $target = "images/";
        $img_path = basename($_FILES['image']['name']);

        $uploaded_size = $_FILES["image"]["size"];

        if ($uploaded_size > 2097152) {
            echo "<script> alert('Your file is too large. We have a 2MB limit');</script>";
            $status = 0;
        }

        $types = array('image/jpeg', 'image/png');

        if (in_array($_FILES['image']['type'], $types)) {
            
        } else {
            $status = 0;
            echo "<script> alert('Sorry your file was not uploaded. It may be the wrong filetype. We only allow JPG, and PNG filetypes');</script>";
        }

        $tmp_name = $_FILES['image']['tmp_name'];
        $ext = pathinfo($img_path, PATHINFO_EXTENSION);
        $new_name = time() . rand(1000, 9999) . ".$ext";

        if (move_uploaded_file($tmp_name, $target . $new_name)) {
            $status = 1;
            $image_name = $new_name;
        } else {
            $status = 0;
            echo "<script>alert('Sorry, there was a problem uploading your file');</script>";
        }
    }

    if ($status == 1) {

        $agency_info_query = "INSERT INTO `eoi_agencies`(`candidate_name`, `dob`, `gender`, `position`, `contact`, `email`, 
					`qualification`, `district`, `address`,`image_loc`) VALUES ('$name','$dob','$gender','$presentposition',
					'$mobile','$email','$qualification','$district','$address','$image_name')";

        $agency_info_query_res = mysqli_query($con, $agency_info_query);

        $ref_id = mysqli_insert_id($con);

        if ($agency_info_query_res) {

            $agency_subj_query = "INSERT INTO `eoi_agecies_subj` (`ref_agency_id`, `human_ethics`, `env_studies`, 
					`itc1`, `itc2`, `css1`, `css2`, `css3`, `analytical`, `enterp_edu`, `ledershp_edu`) VALUES 
					('$ref_id','$ethics','$envstds','$ict1','$ict2','$css1','$css2','$css3','$analytical','$enterpreneuredu','$leadershipedu')";

            $agency_subj_query_res = mysqli_query($con, $agency_subj_query);

            $agency_skill_query1 = "INSERT INTO `eoi_agency_skill`
							(`ref_agency_id`, `from`, `to`, `company`, `lang`, `write`, `read`, `speak`) 
							VALUES ('$ref_id','$from1','$to1','$company1','$language1','$write1','$read1','$speak1')";

            $agency_skill_query1_res = mysqli_query($con, $agency_skill_query1);

            if ($from2 != null || $language2 != null) {

                $agency_skill_query2 = "INSERT INTO `eoi_agency_skill`
							(`ref_agency_id`, `from`, `to`, `company`, `lang`, `write`, `read`, `speak`) 
							VALUES ('$ref_id','$from2','$to2','$company2','$language2','$write2','$read2','$speak2')";

                $agency_skill_query2_res = mysqli_query($con, $agency_skill_query2);

                if ($from3 != null || $language3 != null) {

                    $agency_skill_query3 = "INSERT INTO `eoi_agency_skill`
								(`ref_agency_id`, `from`, `to`, `company`, `lang`, `write`, `read`, `speak`) 
								VALUES ('$ref_id','$from3','$to3','$company3','$language3','$write3','$read3','$speak3')";

                    $agency_skill_query3_res = mysqli_query($con, $agency_skill_query3);
                }
            }

            $agency_exp_query = "INSERT INTO `eoi_agency_exp`
							(`ref_agency_id`, `profil_sumry`, `cntry_wrk_exp`, `work_nature`, `location`, `company`, `position`, `features`) VALUES ('$ref_id','$briefprofile','$countries','$naturework','$location','$company',
							'$positionheld','$mainfeatures')";

            $agency_exp_query_res = mysqli_query($con, $agency_exp_query);

            if ($agency_skill_query1_res && $agency_exp_query_res && $agency_subj_query_res) {
                echo "<script>alert('Data Saved Successfully, Thank you for registering with us'); </script>";
            } else {
                echo "<script>alert('Oops... Problem Occured, Check the details correctly'); </script>";
            }
        } else {
            echo "<script>alert('Oops... Problem Occured, Check the details correctly'); </script>";
        }
    }
}
?>
<script src="js/manual.js"type="text/javascript"></script>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Registration Form</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dcalendar.picker.css" rel="stylesheet">
        <style type="text/css">
            #deceased{
                background-color:#FFF3F5;
                padding-top:10px;
                margin-bottom:10px;
            }
            .remove_field{
                float:right;	
                cursor:pointer;
                position : absolute;
            }
            .remove_field:hover{
                text-decoration:none;
            }
            .ui-datepicker-calendar {
                display: none;
            }
        </style>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.12.4.js"></script>
        <script src="js/dcalendar.picker.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script type='text/javascript'>
            $(function () {
                //calendar call function
                $('.datepicker').dcalendar();
                $('.datepicker').dcalendarpicker();

                var max_fields = 10; //maximum input boxes allowed
                var x = 1; //initlal text box count

                $(document).on('click', '.remove_field', function (e) {
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                });

                $('.date-picker').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    showButtonPanel: true,
                    dateFormat: 'MM yy',
                    onClose: function (dateText, inst) {
                        $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                    }
                });

            });
        </script>
    </head>
    <body>
        <div class="panel panel-primary" style="margin:20px;">
            <div class="panel-heading">
                <h3 class="panel-title" align="center">Empanelment EOIs for Individual consultants and Agencies For Developing Text Content, Instructional Material, Trainer’s/ Manual, Pedagogy, and questionnaires for Assessment</h3>
            </div>
            <div class="panel-body">
                <form action="" id="myForm" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12 col-sm-12">
                        <div class="panel panel-primary" style="margin:20px;">
                            <div class="panel-heading">
                                <h3 class="panel-title">Personal Info</h3>
                            </div>
                            <div class="col-md-12 col-sm-12" id="deceased">
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="name" style="color:#0000FF">Name*</label>
                                    <input type="text" class="form-control input-sm" id="name" name="name" placeholder="" required maxlength="55" onkeypress="return onlyAlphabets(event, this)">
                                </div>

                                <div class = "form-group col-md-3 col-sm-3">
                                    <label for="gender" style="color:#0000FF">Gender*</label>

                                    <select class="form-control input-sm" id="gender" name="gender" required>
                                        <option value="0">-- Select Gender --</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="DOB" style="color:#0000FF">Date of Birth*</label>
                                    <input type="date" class="form-control input-sm datepicker" data-date-format="YYYY-MM-DD" data-provide="date-picker" id="dob" name="dob" placeholder="" required>
                                </div>
                                <div class="form-group col-md-3 col-sm-3" required>
                                    <label for="photo" style="color:#0000FF">Photo*</label>
                                    <input type="file" id="photo" name="image" required='required'>
                                    <p class="help-block">Please upload photo</p>
                                </div>
                                <div class="form-group col-md-3 col-sm-6">
                                    <label for="presentposition" style="color:#0000FF">Present Position*</label>
                                    <input type="text" class="form-control input-sm" id="presentposition" name="presentposition" 
                                           placeholder="" required maxlength="40" onkeypress="return onlyAlphabets(event, this)">
                                </div>

                                <div class="form-group col-md-3 col-sm-6">
                                    <label for="mobile" style="color:#0000FF">Mobile*</label>
                                    <input type="text" class="form-control input-sm" id="mobile" name="mobile" placeholder="" required maxlength="10" onkeypress="return isNumber(event)">
                                </div>

                                <div class="form-group col-md-3 col-sm-6">
                                    <label for="email" style="color:#0000FF">Email*</label>
                                    <input type="email" class="form-control input-sm" id="email" name="email" placeholder="" required maxlength="45">
                                </div>

                                <div class="form-group col-md-3 col-sm-6">
                                    <label for="qualification" style="color:#0000FF">Qualification*</label>
                                    <input type="text" class="form-control input-sm" id="qualification" name="qualification" placeholder="" required 
                                           maxlength="40">
                                </div>


                                <div class = "form-group col-md-3 col-sm-6">
                                    <label for="district" style="color:#0000FF">District*</label>	 

                                    <select class="form-control input-sm" id="district" name="district" required>
                                        <option value="0">-- Select District --</option>
                                        <option value="Ananthapur">Ananthapur</option>
                                        <option value="Chittoor">Chittoor</option>
                                        <option value="East Godavari">East Godavari</option>
                                        <option value="Guntur">Guntur</option>
                                        <option value="Kadapa">Kadapa</option>
                                        <option value="Krishna">Krishna</option>
                                        <option value="Kurnool">Kurnool</option>
                                        <option value="Nellore">Nellore</option>
                                        <option value="Prakasam">Prakasam</option>
                                        <option value="Srikakulam">Srikakulam</option>
                                        <option value="Visakhapatnam">Visakhapatnam</option>
                                        <option value="Vizianagaram">Vizianagaram</option>
                                        <option value="West Godavari">West Godavari</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6 col-sm-6">
                                    <label for="address" style="color:#0000FF">Address*</label>
                                    <textarea class="form-control input-sm" id="address" name="address" rows="3" required maxlength="400"></textarea>
                                </div>

                            </div>
                        </div>

                        <div class="panel panel-primary" style="margin:20px;">
                            <div class="panel-heading">
                                <h3 class="panel-title">Applied For Subject</h3>
                            </div>
                            <div class="col-md-12 col-sm-12" id="deceased">
                                <div class="form-group col-md-6 col-sm-6" >
                                    <label for="ethics">1.	Human Values and Professional Ethics 
                                        <input type="checkbox" name="ethics" id="ethics" value="Y" data-toggle="toggle"></label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6" >
                                    <label for="envstds">2.	Environmental Studies
                                        <input type="checkbox" name="envstds" id="envstds" value="Y" data-toggle="toggle"></label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6" >
                                    <label for="ict1">3.	Information & Communication Technology-1
                                        <input type="checkbox" name="ict1" id="ict1" value="Y" data-toggle="toggle"></label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6" >
                                    <label for="ict2">4.	Information & Communication Technology-2
                                        <input type="checkbox" name="ict2" id="ict2" value="Y" data-toggle="toggle"></label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6" >
                                    <label for="css1">5.	Communication and Soft Skills-1
                                        <input type="checkbox" name="css1" id="css1" value="Y" data-toggle="toggle"></label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6" >
                                    <label for="css2">6.	Communication and Soft Skills-2
                                        <input type="checkbox" name="css2" id="css2" value="Y" data-toggle="toggle"></label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6" >
                                    <label for="css3">7.	Communication and Soft Skills-3 
                                        <input type="checkbox" name="css3" id="css3" value="Y" data-toggle="toggle"></label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6" >
                                    <label for="analytical">8.	Analytical Skills
                                        <input type="checkbox" name="analytical" id="analytical" value="Y" data-toggle="toggle"></label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6" >
                                    <label for="enterpreneuredu">9.	Entrepreneurship Education
                                        <input type="checkbox" name="enterpreneuredu" id="enterpreneuredu" value="Y" data-toggle="toggle"></label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6" >
                                    <label for="leadershipedu">10. Leadership Education
                                        <input type="checkbox" name="leadershipedu" id="leadershipedu" value="Y" data-toggle="toggle"></label>
                                </div>

                            </div>
                        </div>


                        <div class="panel panel-primary" style="margin:20px;">
                            <div class="panel-heading">
                                <h3 class="panel-title">Experience Info</h3>
                            </div>
                            <div class="col-md-12 col-sm-12" id="deceased">
                                <div class="form-group col-md-12 col-sm-3" >
                                    <label for="name" style="color:red">Employment Record - 1</label>
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="from" style="color:#0000FF">From*</label>
                                    <input type="text" class="form-control input-sm" id="from" name="from1" placeholder="" required>
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="to" style="color:#0000FF">To*</label>
                                    <input type="text" class="form-control input-sm" id="to" name="to1" placeholder="" required>
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="company" style="color:#0000FF">Company*</label>
                                    <input type="text" class="form-control input-sm" id="company" name="company1" placeholder="" required 
                                           maxlength="45">
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="positionheld" style="color:#0000FF">Position Held*</label>
                                    <input type="text" class="form-control input-sm" id="positionheld" name="positionheld1" placeholder="" required 
                                           maxlength="45">
                                </div>

                                <div class="form-group col-md-12 col-sm-3" >
                                    <label for="name" style="color:red">Employment Record - 2 </label>
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="from" style="color:#0000FF">From*</label>
                                    <input type="text" class="form-control input-sm" id="from" name="from2" placeholder="" >
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="to" style="color:#0000FF">To*</label>
                                    <input type="text" class="form-control input-sm" id="to" name="to2" placeholder="" >
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="company" style="color:#0000FF">Company*</label>
                                    <input type="text" class="form-control input-sm" id="company" name="company2" placeholder="" maxlength="45">
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="positionheld" style="color:#0000FF">Position Held*</label>
                                    <input type="text" class="form-control input-sm" id="positionheld" name="positionheld2" placeholder="" 
                                           maxlength="45">
                                </div>

                                <div class="form-group col-md-12 col-sm-3" >
                                    <label for="name" style="color:red">Employment Record - 3</label>
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="from" style="color:#0000FF">From*</label>
                                    <input type="text" class="form-control input-sm" id="from" name="from3" placeholder="" >
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="to" style="color:#0000FF">To*</label>
                                    <input type="text" class="form-control input-sm" id="to" name="to3" placeholder="" >
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="company" style="color:#0000FF">Company*</label>
                                    <input type="text" class="form-control input-sm" id="company" name="company3" placeholder="" maxlength="45">
                                </div>
                                <div class="form-group col-md-3 col-sm-3">
                                    <label for="positionheld" style="color:#0000FF">Position Held*</label>
                                    <input type="text" class="form-control input-sm" id="positionheld" name="positionheld3" placeholder="" 
                                           maxlength="45">
                                </div>
                                <div class="form-group col-md-12 col-sm-3" >
                                    <label for="briefprofile" style="color:red">Brief Profile</label>
                                    <textarea class="form-control input-sm" id="briefprofile" name="briefprofile" rows="10" required onkeypress="return onlyAlphabets(event, this)"></textarea>
                                </div>
                                <div class="form-group col-md-12 col-sm-3" >
                                    <label for="countries" style="color:red">Countries Of Work Experience</label>
                                    <textarea class="form-control input-sm" id="countries" name="countries" rows="3" required maxlength="200" onkeypress="return onlyAlphabets(event, this)"></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-primary" style="margin:20px;">
                            <div class="panel-heading">
                                <h3 class="panel-title">Languages Known</h3>
                            </div>
                            <div class="col-md-12 col-sm-12" id="deceased">
                                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label class="form-group col-md-2 col-sm-1" for="language" style="color:#0000FF">Language-1*</label> 
                                        <input class="form-group col-md-2 col-sm-2" type="text" class="form-control input-sm" id="language" 
                                               name="language1" placeholder="" required onkeypress="return onlyAlphabets(event, this)">
                                        <label class="form-group col-md-1 col-sm-1" for="read">Read&nbsp;&nbsp;<input type="checkbox" name="read1"
                                                                                                                      id="read1" value="Y" data-toggle="toggle"></label>
                                        <label class="form-group col-md-1 col-sm-1" for="write">Write&nbsp;&nbsp;<input type="checkbox" name="write1"
                                                                                                                        id="write1" value="Y" data-toggle="toggle"></label>
                                        <label class="form-group col-md-1 col-sm-1" for="speak">Speak&nbsp;&nbsp;<input type="checkbox" name="speak1"
                                                                                                                        id="speak1" value="Y" data-toggle="toggle"></label>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label class="form-group col-md-2 col-sm-1" for="language" style="color:#0000FF">Language-2*</label> 
                                        <input class="form-group col-md-2 col-sm-2" type="text"onkeypress="return onlyAlphabets(event, this)" class="form-control input-sm" id="language" 
                                               name="language2" placeholder="">
                                        <label class="form-group col-md-1 col-sm-1" for="read">Read&nbsp;&nbsp;<input type="checkbox" name="read2"
                                                                                                                      id="read2" value="Y" data-toggle="toggle"></label>
                                        <label class="form-group col-md-1 col-sm-1" for="write">Write&nbsp;&nbsp;<input type="checkbox" name="write2"
                                                                                                                        id="write2" value="Y" data-toggle="toggle"></label>
                                        <label class="form-group col-md-1 col-sm-1" for="speak">Speak&nbsp;&nbsp;<input type="checkbox" name="speak2"
                                                                                                                        id="speak2" value="Y" data-toggle="toggle"></label>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label class="form-group col-md-2 col-sm-1" for="language" style="color:#0000FF">Language-3*</label> 
                                        <input class="form-group col-md-2 col-sm-2" type="text" onkeypress="return onlyAlphabets(event, this)" class="form-control input-sm" id="language" 
                                               name="language3" placeholder="">
                                        <label class="form-group col-md-1 col-sm-1" for="read">Read&nbsp;&nbsp;<input type="checkbox" name="read3"
                                                                                                                      id="read3" value="Y" data-toggle="toggle"></label>
                                        <label class="form-group col-md-1 col-sm-1" for="write">Write&nbsp;&nbsp;<input type="checkbox" name="write3"
                                                                                                                        id="write3" value="Y" data-toggle="toggle"></label>
                                        <label class="form-group col-md-1 col-sm-1" for="speak">Speak&nbsp;&nbsp;<input type="checkbox" name="speak3"
                                                                                                                        id="speak3" value="Y" data-toggle="toggle"></label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-primary" style="margin:20px;">
                            <div class="panel-heading">
                                <h3 class="panel-title">Work Undertaken that Best Illustrates Capability to Handle the Task Assigned</h3>
                            </div>	
                            <div class="col-md-12 col-sm-12" id="deceased">
                                <div class="form-group col-md-6 col-sm-3">
                                    <label for="naturework" style="color:#0000FF">Nature Of Work*</label>
                                    <input type="text" onkeypress="return onlyAlphabets(event, this)" class="form-control input-sm" id="naturework" name="naturework" placeholder="" required maxlength="150">
                                </div>
                                <div class="form-group col-md-6 col-sm-3">
                                    <label for="location" style="color:#0000FF">Location*</label>
                                    <input type="text" onkeypress="return onlyAlphabets(event, this)" class="form-control input-sm" id="location" name="location" placeholder="" required 
                                           maxlength="100">
                                </div>
                                <div class="form-group col-md-6 col-sm-3">
                                    <label for="company" style="color:#0000FF">Company*</label>
                                    <input type="text" onkeypress="return onlyAlphabets(event, this)" class="form-control input-sm" id="company" name="company" placeholder="" required 
                                           maxlength="100">
                                </div>
                                <div class="form-group col-md-6 col-sm-3">
                                    <label for="positionheld" style="color:#0000FF">Position Held*</label>
                                    <input type="text" onkeypress="return onlyAlphabets(event, this)" class="form-control input-sm" id="positionheld" name="positionheld" placeholder="" required 
                                           maxlength="100">
                                </div>
                                <div class="form-group col-md-12 col-sm-3">
                                    <label for="mainfeatures" style="color:#0000FF">Main Features*</label>
                                    <textarea class="form-control input-sm"  onkeypress="return onlyAlphabets(event, this)" id="mainfeatures" name="mainfeatures" rows="3" required maxlength="500"></textarea>
                                </div>
                            </div>	
                        </div>	

                    </div>

                    <div class="col-md-12 col-sm-12">
                        <div class="form-group col-md-3 col-sm-3" style="margin-left: 43%" >
                            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit"/>
                        </div>
                    </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
