<?php
session_start();
include './header.php';
?>
<?php
if (isset($_POST['btn-save'])) {
    include_once 'dbconnect.php';
    $country = $_POST['country'];
    $client_name = $_POST['client_name'];
    $address = $_POST['address'];
    $client_type = $_POST['client_type'];
    $project_value = $_POST['project_value'];
    $duration = $_POST['duration'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $success_date = $_POST['success_date'];
    $reg = $_SESSION['id'];
    $sql_query = "INSERT INTO `eoi_candidate_exp`
(
`ref_candidate_id`,
`country`,
`client_name`,
`address`,
`client_type`,
`project_value`,
`duration`,
`start_date`,
`end_date`,
`success_date`)
VALUES('$reg','$country','$client_name','$address','$client_type','$project_value','$duration','$start_date','$end_date','$success_date')";

    if (mysqli_query($con, $sql_query)) {
	
        ?>
        <script type="text/javascript">
            alert('Data is saved successfully ');
            window.location.href = 'Profiles.php';
        </script>
        <?php
    } else {
        echo mysqli_insert_id($con);
        ?>
        <script type="text/javascript">
            alert('error occured while saving your data');
        </script>
        <?php
        mysqli_error($con);
    }
}
?>
        <script src="js/manual.js" type="text/javascript"></script>
<div class="container">

    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
        <div class="registrationform">
            <form class="form-horizontal" method="post">
                <fieldset>
                    <h6 style="color: white;text-align: center;">Applicant should have undertaken minimum Two
                        similar kind of Assignments in the area of application during past three years;</h6>
                    <div class="col-sm-12">
                        
                            <div class="col-sm-4">Country</div>
                            <div class="col-sm-6">
                                <input name="country" required="" maxlength="20" type="text" class="form-control" id="inputEmail" placeholder="Country" onkeypress="return onlyAlphabets(event,this);">
                            </div>
                    </div>
                    <div class="col-sm-12">
                            <div class="col-sm-4">Name of Client</div>
                            <div class="col-sm-6">
                                <input name="client_name"required="" maxlength="50" type="text" class="form-control" id="inputEmail" placeholder="Name of Client" onkeypress="return onlyAlphabets(event,this);"></div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-4">Address</div>
                            <div class="col-sm-6"style="width: 396px;"> 
                                <textarea name="address" required="" maxlength="170" class="form-control" rows="3" id="textArea" placeholder="Address of the Applicant"></textarea>
                            </div>
                        </div>
                   
                    <div class="col-sm-12">
                        
                            <div class="col-sm-4">Type of Client</div>
                            <div class="col-sm-8">
                                <select class="form-control" id="select" style="color: black;"name="client_type" required="">
                                    <option >Type of Client</option>
                                    <option value="Govt">Govt</option>
                                    <option value="PSU">PSU</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-4" >Order Value of the Project</div>
                            <div class="col-sm-8" > 
                                <input name="project_value" required="" maxlength="10" type="text" class="form-control" id="inputEmail" placeholder="Order Value of the Project"></div>
                        </div>
                    
                    <div class="col-sm-12">
                        
                            <div class="col-sm-4" >Duration of the Assignment</div>
                            <div class="col-sm-8" >
                                <input name="duration" required="" maxlength="10" type="text" class="form-control" id="inputEmail" placeholder="Duration of the Assignment"></div>

                     
                    </div>
                    <div class="col-sm-12">
                        
                           
                                <div class="col-sm-4">Start Date</div>
                                <div class="col-sm-8"> 
                                    <input name="start_date" required="" type="date" class="form-control" id="inputEmail" placeholder="month/year"></div>
                         
                                <div class="col-sm-4">Date of successful implementation</div>
                                <div class="col-sm-8"> 
                                    <input name="success_date" type="date" class="form-control" id="inputEmail" placeholder="month/year"></div>
                            
                         
                                <div class="col-sm-4">End Date</div>
                                <div class="col-sm-8"> 
                                    <input name="end_date" required="" type="date" class="form-control" id="inputEmail" placeholder="month/year"></div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2" style="margin-left: 37%;
    margin-top: 1%;">
                            <button type="reset" class="btn btn-warning">
                                Cancel</button>
                            <button type="submit" class="btn btn-primary" name="btn-save">
                                Submit</button>
                        </div>
                        
                    </div>
            </form>
        </div>
</div>
        </form
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
</script>