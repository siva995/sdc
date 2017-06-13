<?php

	require_once("./dbconnect.php");

	if(isset($_POST['submit'])){
		
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$photo = $_POST['photo'];
		$presentposition = $_POST['presentposition'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$qualification = $_POST['qualification'];
		$district = $_POST['district'];
		$address = $_POST['address'];
		
		if(isset($_POST['ethics'])){
			$ethics = $_POST['ethics'];
		}else{
			$ethics = "N";
		}
		
		if(isset($_POST['envstds'])){
			$envstds = $_POST['envstds'];
		}else{
			$envstds = "N";
		}
		
		if(isset($_POST['ict1'])){
			$ict1 = $_POST['ict1'];
		}else{
			$ict1 = "N";
		}
		
		if(isset($_POST['ict2'])){
			$ict2 = $_POST['ict2'];
		}else{
			$ict2 = "N";
		}
		
		if(isset($_POST['css1'])){
			$css1 = $_POST['css1'];
		}else{
			$css1 = "N";
		}
		
		if(isset($_POST['css2'])){
			$css2 = $_POST['css2'];
		}else{
			$css2 = "N";
		}
		
		if(isset($_POST['css3'])){
			$css3 = $_POST['css3'];
		}else{
			$css3 = "N";
		}
		
		if(isset($_POST['analytical'])){
			$analytical = $_POST['analytical'];
		}else{
			$analytical = "N";
		}
		
		if(isset($_POST['enterpreneuredu'])){
			$enterpreneuredu = $_POST['enterpreneuredu'];
		}else{
			$enterpreneuredu = "N";
		}
		
		if(isset($_POST['leadershipedu'])){
			$leadershipedu = $_POST['leadershipedu'];
		}else{
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
		
		if(isset($_POST['language1'])){
			$language1 = $_POST['language1'];
		}else{
			$language1 = "N";
		}
		
		if(isset($_POST['read1'])){
			$read1 = $_POST['read1'];
		}else{
			$read1 = "N";
		}
		
		if(isset($_POST['write1'])){
			$write1 = $_POST['write1'];
		}else{
			$write1 = "N";
		}
		
		if(isset($_POST['speak1'])){
			$speak1 = $_POST['speak1'];
		}else{
			$speak1 = "N";
		}
	
		if(isset($_POST['language2'])){
			$language2 = $_POST['language2'];
		}else{
			$language2 = "N";
		}
		
		if(isset($_POST['read2'])){
			$read2 = $_POST['read2'];
		}else{
			$read2 = "N";
		}
		
		if(isset($_POST['write2'])){
			$write2 = $_POST['write2'];
		}else{
			$write2 = "N";
		}
		
		if(isset($_POST['speak2'])){
			$speak2 = $_POST['speak2'];
		}else{
			$speak2 = "N";
		}
		
		if(isset($_POST['language3'])){
			$language3 = $_POST['language3'];
		}else{
			$language3 = "N";
		}
		
		if(isset($_POST['read3'])){
			$read3 = $_POST['read3'];
		}else{
			$read3 = "N";
		}
		
		if(isset($_POST['write3'])){
			$write3 = $_POST['write3'];
		}else{
			$write3 = "N";
		}
		
		if(isset($_POST['speak3'])){
			$speak3 = $_POST['speak3'];
		}else{
			$speak3 = "N";
		}
		
		$naturework = $_POST['naturework'];
		$location = $_POST['location'];
		$company = $_POST['company'];
		$positionheld = $_POST['positionheld'];
		$mainfeatures = $_POST['mainfeatures'];
	
		$agency_info_query = "INSERT INTO `eoi_agencies`
				(`candidate_name`, `dob`, `gender`, `position`, `contact`, `email`, `qualification`, `district`, `address`)
				VALUES ('$name','$dob','$gender','$presentposition','$mobile','$email','$qualification','$district',
				'$address')";
				
		$agency_info_query_res = mysqli_query($con, $agency_info_query);
		
		$ref_id = mysqli_insert_id($con);
		
		echo $ref_id;
		
		if($agency_info_query_res){
			
				echo $ref_id;
				
				$agency_subj_query = "INSERT INTO `eoi_agecies_subj`
						(`ref_agency_id`, `human_ethics`, `env_studies`, `itc1`, `itc2`, `css1`, `css2`, `css3`, `analytical`, `enterp_edu`, `ledershp_edu`) VALUES ('$ref_id','$ethics','$envstds','$ict1','$ict2','$css1','$css2','$css3','$analytical','$enterpreneuredu','$leadershipedu')";
						
				$agency_subj_query_res = mysqli_query($con, $agency_subj_query);
							
				$agency_skill_query1 = "INSERT INTO `eoi_agency_skill`
						(`ref_agency_id`, `from`, `to`, `company`, `lang`, `write`, `read`, `speak`) 
						VALUES ('$ref_id','$from1','$to1','$company1','$language1','$write1','$read1','$speak1')";
						
				$agency_skill_query1_res = mysqli_query($con, $agency_skill_query1);
						
				if($from2 != null || $language2 != null){
					
					$agency_skill_query2 = "INSERT INTO `eoi_agency_skill`
						(`ref_agency_id`, `from`, `to`, `company`, `lang`, `write`, `read`, `speak`) 
						VALUES ('$ref_id','$from2','$to2','$company2','$language2','$write2','$read2','$speak2')";
						
					$agency_skill_query2_res = mysqli_query($con, $agency_skill_query2);
				
					if($from3 != null || $language3 != null){
					
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
				
				if($agency_skill_query1_res && $agency_exp_query_res && $agency_subj_query_res){
					echo "Details saved sucessfully";
				} else{
						echo "Error Occured in if";
				}
				
		} else{
			echo "Error Occured";
			die('oops problem ! --> '.mysqli_error($con));
		}
		
	}
?>