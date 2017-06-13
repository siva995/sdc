<?php
session_start();
include './header.php';
include './dbconnect.php';

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

    $ref_id = $_SESSION['id'];
	
    if ($status == 1) {

        $agency_info_query = "INSERT INTO `eoi_candidate_agencies`(`ref_candidate_id`,`candidate_name`, `dob`, `gender`, `position`, `contact`, `email`, 
					`qualification`, `district`, `address`,`image_loc`) VALUES ('$ref_id','$name','$dob','$gender','$presentposition',
					'$mobile','$email','$qualification','$district','$address','$image_name')";

        $agency_info_query_res = mysqli_query($con, $agency_info_query);

        if ($agency_info_query_res) {

            $agency_subj_query = "INSERT INTO `eoi_candidate_agecies_subj` (`ref_candidate_id`, `human_ethics`, `env_studies`, 
					`itc1`, `itc2`, `css1`, `css2`, `css3`, `analytical`, `enterp_edu`, `ledershp_edu`) VALUES 
					('$ref_id','$ethics','$envstds','$ict1','$ict2','$css1','$css2','$css3','$analytical','$enterpreneuredu','$leadershipedu')";

            $agency_subj_query_res = mysqli_query($con, $agency_subj_query);

            $agency_skill_query1 = "INSERT INTO `eoi_candidate_agency_skill`
							(`ref_candidate_id`, `from`, `to`, `company`, `lang`, `write`, `read`, `speak`) 
							VALUES ('$ref_id','$from1','$to1','$company1','$language1','$write1','$read1','$speak1')";

            $agency_skill_query1_res = mysqli_query($con, $agency_skill_query1);

            if ($from2 != null || $language2 != null) {

                $agency_skill_query2 = "INSERT INTO `eoi_candidate_agency_skill`
							(`ref_candidate_id`, `from`, `to`, `company`, `lang`, `write`, `read`, `speak`) 
							VALUES ('$ref_id','$from2','$to2','$company2','$language2','$write2','$read2','$speak2')";

                $agency_skill_query2_res = mysqli_query($con, $agency_skill_query2);

                if ($from3 != null || $language3 != null) {

                    $agency_skill_query3 = "INSERT INTO `eoi_candidate_agency_skill`
								(`ref_candidate_id`, `from`, `to`, `company`, `lang`, `write`, `read`, `speak`) 
								VALUES ('$ref_id','$from3','$to3','$company3','$language3','$write3','$read3','$speak3')";

                    $agency_skill_query3_res = mysqli_query($con, $agency_skill_query3);
                }
            }

            $agency_exp_query = "INSERT INTO `eoi_candidate_agency_exp`
							(`ref_candidate_id`, `profil_sumry`, `cntry_wrk_exp`, `work_nature`, `location`, `company`, `position`, `features`) VALUES ('$ref_id','$briefprofile','$countries','$naturework','$location','$company',
							'$positionheld','$mainfeatures')";

            $agency_exp_query_res = mysqli_query($con, $agency_exp_query);

            if ($agency_skill_query1_res && $agency_exp_query_res && $agency_subj_query_res) {
                echo "<script>alert('Data Saved Successfully, Thank you for registering with us'); </script>";
                ?>
                <script>
                    window.location.href = 'thanku.php';
                </script>
                <?php
            } else {
                echo "<script>alert('Oops... Problem Occured, Check the details correctly'); </script>";
            }
        } else {
            echo "<script>alert('Oops... Problem Occured, Check the details correctly'); </script>";
            die(mysqli_error($con));
        }
    }
}
?>
                <script src="js/manual.js" type="text/javascript"></script>
                <style>
                    .control-label
                    {
                        margin-top: 3px!important;
                    }
                    
                </style>
<div class="container">

    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
        <div class="registrationform">
            <form form action="" id="myForm" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <h3  style="text-align: center;color:white;">Empanelment EOIs for Individual consultants and Agencies</h3>
                    <h5 style="text-align: center;color:white;">Personal Info</h5>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label" style="margin-top: 3px;">
                            Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Name" required maxlength="50" name="name" onkeypress="return onlyAlphabets(event,this)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Legal Status of the Company" class="col-lg-2 control-label">
                            Gender</label>
                        <div class="col-lg-10">
                            <select class="form-control" id="select" style="color: black;"name="gender" required="">
                                <option value="0">-- Select Gender --</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">
                            Date of Birth</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" id="inputEmail" placeholder="dob" required maxlength="50" name="dob">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">
                            Photo</label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" id="photo"  required  name="image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">
                            Present Position</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Present Position" required maxlength="40" name="presentposition" onkeypress="return onlyAlphabets(event,this)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" col-md-4 col-sm-6">
                            <label for="mobile" style="font-size: 15px;">Mobile*</label>
                            <input type="text" class="form-control input-sm" id="mobile" name="mobile" placeholder="" required maxlength="10" onkeypress="return isNumber (event)" >
                        </div>

                        <div class=" col-md-4 col-sm-6">
                            <label for="email" style="font-size: 15px;">Email*</label>
                            <input type="email" class="form-control input-sm" id="email" name="email" placeholder="" required maxlength="45">
                        </div>

                        <div class=" col-md-4 col-sm-6">
                            <label for="qualification" style="font-size: 15px;">Qualification*</label>
                            <input type="text" class="form-control input-sm" id="qualification" name="qualification" placeholder="" required 
                                   maxlength="40">
                        </div>
                    </div>
                    <div class="form-group" > 
                        <div class = " col-md-12 col-sm-12" style="margin-top: 20px;">
                            <div class="col-sm-2" style="font-size: 15px;margin-left: -15px;">
                                <label for="district" style="text-align: left!important;">District*</label>	 </div>
                            <div class="col-sm-10">

                                <select class="form-control input-sm" id="district" style="font-size: 15px;color:black" name="district" required >
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
                        </div>
                    </div>
                    <div class="form-group" >

                        <div class=" col-sm-12">
                            <div class="col-sm-2" style="margin-top: 5px;">
                                <label for="address" style="font-size: 15px;margin-left: -15px;" >Address*</label></div>
                            <div class="col-sm-10" style="margin-top: 5px;">
                                <textarea class="form-control input-sm" id="address" name="address" rows="3" required maxlength="400"></textarea>
                            </div>

                        </div>
                    </div>
                    <h3 style="text-align: center;color:white;">Applied For Subject</h3><hr>
                    <div class="col-sm-12" >
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="col-sm-8">
                                    <label for="ethics">1.Human Values and Professional Ethics* </label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="checkbox" name="ethics" id="ethics" value="Y" data-toggle="toggle"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="col-sm-8">
                                    <label for="ethics">2.Environmental Studies </label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="checkbox" name="envstds" id="ethics" value="Y" data-toggle="toggle"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="col-sm-8">
                                    <label for="ethics">3.Information & Communication Technology-1 </label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="checkbox" name="ict1" id="ethics" value="Y" data-toggle="toggle"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="col-sm-8">
                                    <label for="ethics">4.Information & Communication Technology-2 </label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="checkbox" name="ict2" id="ethics" value="Y" data-toggle="toggle"></label>
                                </div></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="col-sm-8">
                                    <label for="ethics">5.	Communication and Soft Skills-1 </label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="checkbox" name="css1" id="ethics" value="Y" data-toggle="toggle"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="col-sm-8">
                                    <label for="ethics">6.	Communication and Soft Skills-2 </label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="checkbox" name="css2" id="ethics" value="Y" data-toggle="toggle"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="col-sm-8">
                                    <label for="ethics">7.	Communication and Soft Skills-3 </label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="checkbox" name="css3" id="ethics" value="Y" data-toggle="toggle"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="col-sm-8">
                                    <label for="ethics">8.	Analytical Skills</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="checkbox" name="analytical" id="ethics" value="Y" data-toggle="toggle"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="col-sm-8">
                                    <label for="ethics">9.	Entrepreneurship Education* </label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="checkbox" name="enterpreneuredu" id="ethics" value="Y" data-toggle="toggle"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="col-sm-8">
                                    <label for="ethics">10. Leadership Education </label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="checkbox" name="leadershipedu" id="ethics" value="Y" data-toggle="toggle"></label>
                                </div>
                            </div>

                        </div>
                        <h3 style="text-align: center;color:white;">Experience Info</h3><hr>
                        <div class="col-sm-12">
                            <div class="col-sm-12"><label for="name" style="margin-left: 44%;text-align: center;color:#0d5cf3;font-size: 17px;">Employment Record - 1</label></div>
                        </div>
                        <div calss="col-sm-12">
                            <div class=" col-md-3 col-sm-3">
                                <label for="from">From*</label>
                                <input type="text" class="form-control input-sm" id="from" name="from1" placeholder="From" required>
                            </div>
                            <div class=" col-md-3 col-sm-3">
                                <label for="to">To*</label>
                                <input type="text" class="form-control input-sm" id="to" name="to1" placeholder="" required>
                            </div>
                            <div class=" col-md-3 col-sm-3">
                                <label for="company">Company*</label>
                                <input type="text" class="form-control input-sm" id="company" name="company1" placeholder="" required 
                                       maxlength="45">
                            </div>
                            <div class=" col-md-3 col-sm-3">
                                <label for="positionheld">Position Held*</label>
                                <input type="text" class="form-control input-sm" id="positionheld" name="positionheld1" placeholder="" required 
                                       maxlength="45">
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-12"><label for="name" style="margin-left: 44%;text-align: center;color:#0d5cf3;font-size: 17px;">Employment Record - 2</label></div>
                        </div>
                        <div calss="col-sm-12">
                            <div class=" col-md-3 col-sm-3">
                                <label for="from">From*</label>
                                <input type="text" class="form-control input-sm" id="from" name="from2" placeholder="" >
                            </div>
                            <div class=" col-md-3 col-sm-3">
                                <label for="to">To*</label>
                                <input type="text" class="form-control input-sm" id="to" name="to2" placeholder="" >
                            </div>
                            <div class=" col-md-3 col-sm-3">
                                <label for="company">Company*</label>
                                <input type="text" class="form-control input-sm" id="company" name="company2" placeholder="" maxlength="45">
                            </div>
                            <div class=" col-md-3 col-sm-3">
                                <label for="positionheld">Position Held*</label>
                                <input type="text" class="form-control input-sm" id="positionheld" name="positionheld2" placeholder="" 
                                       maxlength="45">
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-12"><label for="name" style="margin-left: 44%;text-align: center;color:#0d5cf3;font-size: 17px;">Employment Record - 3</label></div>
                        </div>
                        <div calss="col-sm-12">
                            <div class=" col-md-3 col-sm-3">
                                <label for="from">From*</label>
                                <input type="text" class="form-control input-sm" id="from" name="from3" placeholder="" >
                            </div>
                            <div class=" col-md-3 col-sm-3">
                                <label for="to">To*</label>
                                <input type="text" class="form-control input-sm" id="to" name="to3" placeholder="" >
                            </div>
                            <div class=" col-md-3 col-sm-3">
                                <label for="company">Company*</label>
                                <input type="text" class="form-control input-sm" id="company" name="company3" placeholder="" maxlength="45">
                            </div>
                            <div class=" col-md-3 col-sm-3">
                                <label for="positionheld">Position Held*</label>
                                <input type="text" class="form-control input-sm" id="positionheld" name="positionheld3" placeholder="" 
                                       maxlength="45">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-3">
                                <label for="briefprofile" style="margin-top: 20px;margin-left: -14px;" >Brief Profile</label>
                            </div>
                            <div class="col-sm-9">
                                <textarea class="form-control input-sm" id="briefprofile" name="briefprofile"  required></textarea>
                            </div>
                        </div>
                        <div class="co-sm-12">
                            <div class="col-sm-3">
                                <label for="countries"style="margin-top: 2%" >Countries Of Work Experience</label>
                            </div>
                            <div class="col-sm-9">
                                <textarea class="form-control input-sm" id="countries" name="countries"  required maxlength="200"></textarea>
                            </div>
                        </div>
                        <h3 style="text-align: center;color:white;">Languages Known</h3><hr>
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="col-sm-12">
                                    <div class="col-sm-6">
                                        <label  for="language">Language-1*</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="language1" required onkeypress="return onlyAlphabets(event,this)">
                                    </div>
                                </div>  
                            </div>
                            <div class="col-sm-6">
                                <label  for="read">Read</label> &nbsp;<input type="checkbox" name="read1" value="Y">
                                <label for="write">Write</label>&nbsp;<input type="checkbox" name="write1" value="Y">
                                <label  for="speak">Speak</label>&nbsp;<input type="checkbox" name="speak1" value="Y">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="col-sm-12">
                                    <div class="col-sm-6">
                                        <label  for="language">Language-2*</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="language1" onkeypress="return onlyAlphabets(event,this)">
                                    </div>
                                </div>  
                            </div>
                            <div class="col-sm-6">
                                <label  for="read">Read</label> &nbsp;<input type="checkbox" name="read2" value="Y">
                                <label for="write">Write</label>&nbsp;<input type="checkbox" name="write2" value="Y">
                                <label  for="speak">Speak</label>&nbsp;<input type="checkbox" name="speak2" value="Y">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="col-sm-12">
                                    <div class="col-sm-6">
                                        <label  for="language">Language-3*</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="language3" onkeypress="return onlyAlphabets(event,this)">
                                    </div>
                                </div>  
                            </div>
                            <div class="col-sm-6">
                                <label  for="read">Read</label> &nbsp;<input type="checkbox" name="read3" value="Y">
                                <label for="write">Write</label>&nbsp;<input type="checkbox" name="write3" value="Y">
                                <label  for="speak">Speak</label>&nbsp;<input type="checkbox" name="speak3" value="Y">
                            </div>
                        </div>



                        <div class="panel panel-primary" style="margin:20px;">

                            <div class="col-md-12 col-sm-12" id="deceased">
                                <div class=" col-md-6 col-sm-3" style="margin-top: 25px;">
                                    <label for="naturework">Nature Of Work*</label>
                                    <input type="text" class="form-control input-sm" id="naturework" name="naturework" placeholder="" required maxlength="150">
                                </div>
                                <div class=" col-md-6 col-sm-3" style="margin-top: 25px;">
                                    <label for="location">Location*</label>
                                    <input type="text" class="form-control input-sm" id="location" name="location" placeholder="" required 
                                           maxlength="100">
                                </div>
                                <div class=" col-md-6 col-sm-3" style="margin-top: 25px;">
                                    <label for="company">Company*</label>
                                    <input type="text" class="form-control input-sm" id="company" name="company" placeholder="" required 
                                           maxlength="100">
                                </div>
                                <div class=" col-md-6 col-sm-3" style="margin-top: 25px;">
                                    <label for="positionheld">Position Held*</label>
                                    <input type="text" class="form-control input-sm" id="positionheld" name="positionheld" placeholder="" required 
                                           maxlength="100">
                                </div>
                                <div class=" col-md-12 col-sm-3" style="margin-top: 5%">
                                    <label for="mainfeatures">Main Features*</label>
                                    <textarea class="form-control input-sm" id="mainfeatures" name="mainfeatures" rows="3" required maxlength="500"></textarea>
                                </div>
                            </div>	
                        </div>	

                    </div>
                    
                        <div class="">
                            <div class="col-lg-10 col-lg-offset-2"style="margin-left: 37%;
    margin-top: 1%;">
                                <button type="reset" class="btn btn-warning">
                                    Reset</button>
                                <button type="submit" name="submit" class="btn btn-primary" >
                                    Submit</button>
                            </div>
                        </div>
                </fieldset></form>
        </div></div></div>





</div>

</form>
</div>
</div>
</div>   
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.backstretch.js" type="text/javascript"></script>
<script type="text/javascript">
    'use strict';

    /* ========================== */
    /* ::::::: Backstrech ::::::: */
    /* ========================== */
    // You may also attach Backstretch to a block-level element
    $.backstretch(
            [
                "img/44.jpg",
                "img/colorful.jpg",
                "img/34.jpg",
                "img/images.jpg"
            ],
            {
                duration: 4500,
                fade: 1500
            }
    );

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
