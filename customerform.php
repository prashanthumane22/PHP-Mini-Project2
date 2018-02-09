<?php
session_start();

/*if(isset($_SESSION['usr_id'])) {
    header("Location: login.php");
}*/

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
     $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
     $phnumber = mysqli_real_escape_string($con, $_POST['phnumber']);

     $housingLocation = mysqli_real_escape_string($con, $_POST['housing']);
     $streetAddress = mysqli_real_escape_string($con, $_POST['street']);
     $state = mysqli_real_escape_string($con, $_POST['state']);
     $city = mysqli_real_escape_string($con, $_POST['city']);
     $zipCode = mysqli_real_escape_string($con, $_POST['zip']);

    
    
    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
     if (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    
    if (!$error) {

    	$_POST['fname'] = "Prashant";
    	$_POST['lname'] = "Humane";
    	$_POST['email'] = "prashant.h@iksula.com";
    	$_POST['phnumber'] = '1234567890';

        if(mysqli_query($con, "INSERT INTO address (fname,lname,email,phnumber) VALUES('" . $fname . "', '" . $lname . "', '" . $email . " ', '" .$phnumber ."')")) {
            $successmsg = "Successfully Submited!";
        } else {
            $errormsg = "Error in submiting!";
        }
        /*$sql="insert into address (fname,lname,email,phnumber) values ('','".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".md5($_POST['passwd'])."','".md5($_POST['rtpasswd'])."','".$_POST['dob']."','' ,NOW())";
   mysqli_query($conn, $sql) or die(mysqli_error($conn));*/

   /* $sql="insert into address (fname,lname,email,phnumber) values ('',' " .$_POST['fname']." ',' ".$_POST['lname']."','".$_POST['email']."','".$_POST['phnumber']."','' ,NOW())";
   mysqli_query($conn, $sql) or die(mysqli_error($conn));
*/
        if(mysqli_query($con, "INSERT INTO residentinfo (housingLocation,streetAddress,state,city,zipCode) VALUES('" . $housingLocation . "', '" . $streetAddress . "', '" . $state . " ', '" . $city ."' , '" . $zipCode ."')")) {
            $successmsg = "Successfully Submited!";
        } else {
            $errormsg = "Error in submiting!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="jquery-3.2.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	<script type="text/javascript" href="../index.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                <div class="cust-detail">
                	<div class="table-title">
                		View Basic Information
                	</div>
                	<div class="table-title1">
                		Basic Resident Information
                	</div>
                	<div>
	                	<div class="table-title2">
	                		<label>Resident ID </label>
	                	</div>
                		
                		<div class="form-group">
                			<label>First Name</label>
             				<input type="text" name="fname">
                		</div>
             			
             			<div class="form-group">
             				<label>Last Name</label>
             				<input type="text" name="lname">
             			</div>
             			
             			<div class="form-group">
             				<label>Email</label>
             				<input type="text" name="email">
             			</div>
             			
             			<div class="form-group">
             				<label>Phone Number </label>
             				<input type="number" name="phnumber">
             			</div>
             			<div class="address">
	             			<div class="form-group">
	             				<label>Address </label>
	             			</div>
	             			<div class="res-address">
	             				<div class="form-group">
	             					<label>Resident Address :</label>
		             			</div>
		             			
		             			<div class="form-group">
		             				<label>Housing Location</label>
		             				<input type="text" name="housing">
		             			</div>
		             			
		             			<div class="form-group">
		             				<label>Street Address</label>
		             				<input type="text" name="street">
		             			</div>
		             			
		             			<div class="form-group">
		             				<label>State</label>
			             			<select id="edit-submitted-cust-city" name="state" class="form-select required">
			             				<option value="" selected="selected">- Select -</option>
			             				<option value="AHMEDABAD">MAHARASHTRA</option>
			             				<option value="BENGALURU ">GOA</option>
			             				<option value="BHUBANESWAR ">Gujarat</option>
			             				<option value="CALCUTTA ">Punjab</option>
			             				<option value="CHANDIGARH ">Rajasthan</option>
			             				<option value="CHENNAI ">Sikkim</option>
			             				<option value="COIMBATORE ">Tamil Nadu</option>
			             				<option value="DEHRADUN ">Telangana</option>
			             				<option value="GUWAHATI ">Tripura</option>
			             				<option value="HYDERABAD ">Uttarakhand</option>
			             				<option value="INDORE ">Uttar Pradesh</option>
			             				<option value="JAIPUR ">West Bengal</option>	
			             			</select>
		             			</div>
		             			
		             			<div class="form-group">
		             				<label>City</label>
		             			<select id="edit-submitted-cust-city" name="city" class="form-select required">
		             				<option value="" selected="selected">- Select -</option>
		             				<option value="AHMEDABAD">AHMEDABAD</option>
		             				<option value="BENGALURU ">BENGALURU</option>
		             				<option value="BHUBANESWAR ">BHUBANESWAR</option>
		             				<option value="CALCUTTA ">CALCUTTA</option>
		             				<option value="CHANDIGARH ">CHANDIGARH</option>
		             				<option value="CHENNAI ">CHENNAI</option>
		             				<option value="COIMBATORE ">COIMBATORE</option>
		             				<option value="DEHRADUN ">DEHRADUN</option>
		             				<option value="GUWAHATI ">GUWAHATI</option>
		             				<option value="HYDERABAD ">HYDERABAD</option>
		             				<option value="INDORE ">INDORE</option>
		             				<option value="JAIPUR ">JAIPUR</option>
		             				<option value="KOCHI ">KOCHI</option>
		             				<option value="LUCKNOW ">LUCKNOW</option>
		             				<option value="MUMBAI ">MUMBAI</option>
		             				<option value="NAGPUR ">NAGPUR</option>
		             				<option value="NASIK ">NASIK</option>
		             				<option value="NEW DELHI  ">NEW DELHI</option>
		             				<option value="PATNA">PATNA</option>
		             				<option value="PUNE">PUNE</option>
		             				<option value="RAIPUR">RAIPUR</option>
		             				<option value="SURAT">SURAT</option>
		             				<option value="TRIVANDRUM  ">TRIVANDRUM</option>
		             				<option value="VADODARA  ">VADODARA</option>
		             			</select>
		             			</div>
		             			
		             			<div class="form-group">
		             				<label>ZIP Code</label>
		             				<input type="text" name="zip">
		             			</div>
	             			</div>
             			
	             			<div class="sec-address">
		             			<div class="form-group">
		             				<label>Secondary Address</label>
		             				<input class="secondary" type="checkbox" name="secondary">
		             			</div>
		             			<div class="sec-address-form" style="display: none;">
			             			<div class="form-group">
			             				<label>Name</label>
			             				<input type="text" name="name">
			             			</div>
			             			
			             			<div class="form-group">
			             				<label>Relationship</label>
			             			<input type="text" name="relationship">
			             			</div>
			     
			             			<div class="form-group">
			             				<label>Street Address</label>
			             				<input type="textarea" name="street">
			             			</div>
			             			
			             			<div class="form-group">
				             			<label>State</label>
				             			<select id="edit-submitted-cust-city" name="state" class="form-select required">
				             				<option value="" selected="selected">- Select -</option>
				             				<option value="AHMEDABAD">MAHARASHTRA</option>
				             				<option value="BENGALURU ">GOA</option>
				             				<option value="BHUBANESWAR ">Gujarat</option>
				             				<option value="CALCUTTA ">Punjab</option>
				             				<option value="CHANDIGARH ">Rajasthan</option>
				             				<option value="CHENNAI ">Sikkim</option>
				             				<option value="COIMBATORE ">Tamil Nadu</option>
				             				<option value="DEHRADUN ">Telangana</option>
				             				<option value="GUWAHATI ">Tripura</option>
				             				<option value="HYDERABAD ">Uttarakhand</option>
				             				<option value="INDORE ">Uttar Pradesh</option>
				             				<option value="JAIPUR ">West Bengal</option>	
				             			</select>
				             		</div>
			             			<div class="form-group">
			             				<label>City</label>
				             			<select id="edit-submitted-cust-city" name="city" class="form-select required">
				             				<option value="" selected="selected">- Select -</option>
				             				<option value="AHMEDABAD">AHMEDABAD</option>
				             				<option value="BENGALURU ">BENGALURU</option>
				             				<option value="BHUBANESWAR ">BHUBANESWAR</option>
				             				<option value="CALCUTTA ">CALCUTTA</option>
				             				<option value="CHANDIGARH ">CHANDIGARH</option>
				             				<option value="CHENNAI ">CHENNAI</option>
				             				<option value="COIMBATORE ">COIMBATORE</option>
				             				<option value="DEHRADUN ">DEHRADUN</option>
				             				<option value="GUWAHATI ">GUWAHATI</option>
				             				<option value="HYDERABAD ">HYDERABAD</option>
				             				<option value="INDORE ">INDORE</option>
				             				<option value="JAIPUR ">JAIPUR</option>
				             				<option value="KOCHI ">KOCHI</option>
				             				<option value="LUCKNOW ">LUCKNOW</option>
				             				<option value="MUMBAI ">MUMBAI</option>
				             				<option value="NAGPUR ">NAGPUR</option>
				             				<option value="NASIK ">NASIK</option>
				             				<option value="NEW DELHI  ">NEW DELHI</option>
				             				<option value="PATNA">PATNA</option>
				             				<option value="PUNE">PUNE</option>
				             				<option value="RAIPUR">RAIPUR</option>
				             				<option value="SURAT">SURAT</option>
				             				<option value="TRIVANDRUM  ">TRIVANDRUM</option>
				             				<option value="VADODARA  ">VADODARA</option>
				             			</select>
			             			</div>
			             			<div class="form-group">
			             				<label>ZIP Code</label>
			             				<input type="text" name="zip">
			             			</div>
			             			<div class="form-group">
			             				<label>Phone Number</label>
			             				<input type="number" name="phnumber">
			             			</div>
			             			<div class="form-group">
			             				<label>Email</label>
			             				<input type="text" name="email">
			             			</div>
		             			</div>
	             			</div>
             			</div>
             			<div class="form-group">
                        <input type="submit" name="signup" value="Submit" class="btn btn-primary" />
                    </div>
                	</div>
                </div>
            </form>
            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>


</body>

<script>
	$(document).ready(function(){
		$(".secondary").click(function(){
		$(".sec-address-form").toggle();
        //$("input[type='text']").focus();
	});

});

</script>
</html>