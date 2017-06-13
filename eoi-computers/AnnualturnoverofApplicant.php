<?php
session_start();
include './header.php';
?>
<?php
if (isset($_POST['btn-save'])) {
    include_once 'dbconnect.php';
    $turn_over_13_14 = $_POST['turn_over_13_14'];
    $turn_over_14_15 = $_POST['turn_over_14_15'];
    $turn_over_15_16 = $_POST['turn_over_15_16'];
    $turn_over_16_17 = $_POST['turn_over_16_17'];
    $turn_over_remarks = $_POST['turn_over_remarks'];
    $cmp_edu_resrch = $_POST['cmp_edu_resrch'];
    $cmp_skill_dev = $_POST['cmp_skill_dev'];
    $cmp_others = $_POST['cmp_others'];
    $reg = $_SESSION['id'];
    $sql_query = "INSERT INTO eoi_candidate_firm_turn(ref_candidate_id,turn_over_13_14,turn_over_14_15,turn_over_15_16,turn_over_16_17,turn_over_remarks,cmp_edu_resrch,cmp_skill_dev,cmp_others)
            VALUES('$reg','$turn_over_13_14','$turn_over_14_15','$turn_over_15_16','$turn_over_16_17','$turn_over_remarks','$cmp_edu_resrch','$cmp_skill_dev','$cmp_others')";

    if (mysqli_query($con, $sql_query)) {
        ?>
        <script type="text/javascript">
            alert('Data is saved successfully ');
            window.location.href = 'FormatforPastExperience.php';
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
                    <div >
                        <h2 style="color: white;text-align: center;font-size: 35px; ">Annual turnover of Applicant</h2>
                    </div>
                    <div>
                        <div class="form-group" style="align-content: center;margin-left: 150px;">
                            
                            <div class="col-lg-2">
                                <label>Financial Year 13-14</label>
                                <input type="text" class="form-control" id="inputEmail" placeholder="Turn Over 13-14" required="" maxlength="10"name="turn_over_13_14" onkeypress="javascript:return isNumber (event)"></div>
                            <div class="col-lg-2" >
                                  <label>Financial Year 14-15</label>
                                <input type="text" class="form-control" id="inputEmail" placeholder="Turn Over 14-15"required="" maxlength="10" name="turn_over_14_15" onkeypress="javascript:return isNumber (event)"></div>
                            <div class="col-lg-2" >
                                <label>Financial Year 15-16</label>
                                <input type="text" class="form-control" id="inputEmail" placeholder="Turn Over 15-16" required="" maxlength="10"name="turn_over_15_16" onkeypress="javascript:return isNumber (event)">     
                            </div>
                            <div class="col-lg-2" >
                                <label>Financial Year 16-17</label>
                                <input type="text" class="form-control" id="inputEmail" placeholder="Turn Over 16-17" required="" maxlength="10"name="turn_over_16_17" onkeypress="javascript:return isNumber (event)">     
                            </div>
                            <div class="col-lg-2" >
                                <label>Conversion rate</label>
                                <input type="text" class="form-control" id="inputEmail" placeholder="Conversion rate"  maxlength="100"name="turn_over_remarks"></div>

                        </div>
                    </div><br><br><br>
                    <div >
                        <h2 style="color: white;text-align: center;font-size: 35px;">Nature of Applicant’s company/firm:</h2>
                        <h5 style="color: white;text-align: center">Applicant be in the educational research / skill
                            development / educational field/ any relevant field and similar field.</h5>

                    </div>
                        
                            <div class="col-sm-12" >
                                <div class="col-sm-3" >
                                    <input type="text" class="form-control"  placeholder="Educational research" required="" maxlength="10"name="cmp_edu_resrch" onkeypress="return onlyAlphabets(event,this);">
                                </div>
                                <div class="col-sm-3" >
                                    <input type="text" class="form-control"  placeholder="Skill development" required="" maxlength="10"name="cmp_skill_dev" onkeypress="return onlyAlphabets(event,this);">
                                </div>
                                <div class="col-sm-3" >
                                    <input type="text" class="form-control"  placeholder="Education Field" required="" maxlength="10"name="cmp_others" onkeypress="return onlyAlphabets(event,this);">     
                                </div>
                                <div class="col-sm-3" >
                                    <input type="text" class="form-control"  placeholder="Others" onkeypress="return onlyAlphabets(event,this);">     
                                </div>

                            </div>
                        </div>
                    </div><br><br>
                </fieldset>
               
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2" style="margin-left: 37%;
    margin-top: 1%;">
                            <button type="reset" class="btn btn-warning">
                                Reset</button>
                            <button type="submit" class="btn btn-primary" name="btn-save">
                                Save and proceed </button>
                        </div>
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
</script>