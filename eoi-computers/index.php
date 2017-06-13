<?php
session_start();
include './header.php';
?>
<?php
if (isset($_POST['btn-save'])) {
    include_once 'dbconnect.php';
    $Name = $_POST['Name'];
    $Address = $_POST['Address'];
    $Legal_Status_of_the_Company = $_POST['Legal_Status_of_the_Company'];
    $registration_date = $_POST['registration_date'] .','. $_POST['registration_ref'];
    $Commencement = $_POST['Commencement_date'] .','. $_POST['Commencement_ref'];
    $registration_no = $_POST['registration_no'];
    $Service_registration_no = $_POST['Service_registration_no'];
    $pan = $_POST['pan'];
    $Name_Designation = $_POST['Name_Designation'];
    $Telephone_No = $_POST['Telephone_No'];
    $E_Mail=$_POST['E_Mail'];
    $Website=$_POST['Website'];
    $sql_query = "INSERT INTO eoi_candidate_info(applicant_name,address,company_legal_status,cmpny_reg_dt_ref,bussiness_dt_ref,sales_tax_reg,service_tax,pan,desgination,contact,email,website)
							VALUES('$Name','$Address','$Legal_Status_of_the_Company','$registration_date','$Commencement','$registration_no','$Service_registration_no','$pan','$Name_Designation','$Telephone_No','$E_Mail','$Website')";

    if (mysqli_query($con, $sql_query)) {
        $_SESSION['id'] = mysqli_insert_id($con);
        ?>
        <script type="text/javascript">
            alert('Data is saved successfully ');
            window.location.href = 'AnnualturnoverofApplicant.php';
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
            <form class="form-horizontal" method="POST">
                <fieldset>
                    <legend>Registration Form <i class="fa fa-pencil pull-right"></i></legend>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">
                            Name of the Applicant</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Name of the Applicant" required maxlength="50" name="Name" onkeypress="return onlyAlphabets(event,this);">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="textArea" class="col-lg-4 control-label">
                            Address of the Applicant</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" rows="3" id="textArea" placeholder="Address of the Applicant" required maxlength="250"name="Address"></textarea>
                        <!--    <span class="help-block">A longer block of help text that breaks onto a new line and
                                may extend beyond one line.</span>-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Legal Status of the Company" class="col-lg-4 control-label">
                            Legal Status of the Company</label>
                        <div class="col-lg-8">
                            <select class="form-control" id="select" style="color:black"name="Legal_Status_of_the_Company" required="">
                                <option value="">Select Legal Status of the Company</option>
                                <option value="Public Limited Company under company act">Public Limited Company under company act</option>
                                <option value="Private Limited Company; under company act">Private Limited Company; under company act</option>
                                <option value="Proprietary">Proprietary</option>
                                <option value="partnership">partnership</option>
                                <option value="Society">Society</option>
                                <option value="Trust">Trust</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">
                            Details of Incorporation/registration of the Entity </label>
                        <div class="col-lg-4">
                            <input type="date"  class="form-control" id="inputEmail" placeholder="Date:" name="registration_date" required >
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Ref."name="registration_ref" required maxlength="10" onkeypress="javascript:return isNumber (event)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Details of Commencement of Business" class="col-lg-4 control-label">
                            Details of Commencement of Business </label>
                        <div class="col-lg-4">
                             <input type="date"  class="form-control" id="inputEmail" placeholder="Date:"name="Commencement_date" required maxlength="">
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Ref."name="Commencement_ref" required maxlength="10" onkeypress="javascript:return isNumber (event)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Valid Sales tax registration no" class="col-lg-4 control-label">
                            Valid Sales tax registration no.</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="inputEmail" placeholder=" Valid Sales tax registration no." name="registration_no" required maxlength="10" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">
                            Valid Service tax registration no.</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Valid Service tax registration no." name="Service_registration_no" required="" maxlength="15" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Permanent Account Number " class="col-lg-4 control-label">
                            Permanent Account Number (PAN)</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Permanent Account Number (PAN)" name="pan" required maxlength="40">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Name &amp; Designation of the contact person" class="col-lg-4 control-label">
                            Designation of the contact person</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Name &amp; Designation of the contact person" name="Name_Designation" required maxlength="80" onkeypress="return onlyAlphabets(event,this);">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">
                            Telephone No. (with STD Code)</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Telephone No. (with STD Code )" name="Telephone_No" required maxlength="15" onkeypress="javascript:return isNumber (event)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">
                            E-Mail of the contact person:</label>
                        <div class="col-lg-8">
                            <input type="Email" class="form-control" id="inputEmail" placeholder="E-Mail of the contact person:"name="E_Mail" required maxlength="50">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">
                            Website</label>
                        <div class="col-lg-8">
                            <input name="Website"
                                   type="text" class="form-control" id="inputEmail" placeholder="Website" required maxlength="70"name="Website" onkeypress="return onlyAlphabets(event,this);">
                        </div>
                    </div>

                   
<!--                    <div class="form-group">
                        <label for="Financial Details" class="col-lg-12 control-label" style="text-align: center">
                            Financial Details (as per audited Balance Sheets) (in Crores)</label>
                        <label for="inputEmail" class="col-lg-2 control-label" >
                            Turn Over </label>

                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="Financial Details" placeholder="2013-14" name="Financial_Details_14" required maxlength=""></div>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="Financial Details" placeholder="2014-15" name="Financial_Details_15"  required maxlength=""></div>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="Financial Details" placeholder="2015-16" name="Financial_Details_16" required maxlength="">     
                        </div>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="inputEmail" placeholder="2016-17">     
                        </div>
                    </div>-->

                    
                    <center>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-warning">
                                Reset</button>
                            <button type="submit" class="btn btn-primary" name="btn-save">
                                save and proceed </button>
                        </div>
                    </div></center>
                </fieldset>
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

</body>
</html>
