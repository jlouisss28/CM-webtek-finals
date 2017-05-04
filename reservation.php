<?php

include("header.html");

?>



<style>
 div.InnerRight {

        width: 49%;
      

        float: right;

        }

</style>


<div class="datagrid"><table>
<thead><tr><th>SERVICE</th><th>SIZE</th><th>PRICE</th></thead>

<tbody><tr><td>GROOMING w/ MEDICAL BATH OR TICK AND FLEA</td><td>SMALL</td><td>250PHP</td></tr>
<tr class="alt"><td>GROOMING w/ MEDICAL BATH OR TICK AND FLEA</td><td>MEDIUM</td><td>350PHP</td></tr>
<tr><td>GROOMING w/ MEDICAL BATH OR TICK AND FLEA</td><td>LARGE</td><td>500PHP</td></tr>

</tbody>
</table></div>


<DIV ID="site_content">
<div class="left">
<H3>RESERVATION FORM</h3>



<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" style="margin:20px">

<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="474WGBVXG63TJ">

Pet Name: <input id="pet_name"  type="Text" name="pet_name" ><br><br>
  
  
  
  
Pet Breed: <input id="pet_breed" type="Text"  name="pet_breed"><br><br>
Pet Gender:<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input id="pet_gender"  type="radio" name="pet_gender" value="male">Male<br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="radio" id="pet_gender" name="pet_gender" value="female">Female<br><br>
Pet Size: <input type="hidden" name="on0" value="Services"><select id="service_ID" name="os0">
<?php
include("php/usrconnect.php");

@$result = mysqli_query($con,'SELECT * FROM service');

	while($row = mysqli_fetch_array($result)) {
		echo "<option servID='".$row['serv_ID']."' value='".$row['serv_type']."'>".$row['serv_type']."</option>";
	}
	
?>
</select><br><br>
Request Start: <input type="datetime-local" id="serv_date" name="serv_date"><br><br>
Select Branch: <select id="branch_ID" name="branch_ID">
<?php
include("php/usrconnect.php");

@$result = mysqli_query($con,'SELECT * FROM branch');

	while($row = mysqli_fetch_array($result)) {
		echo "<option value='".$row['branch_ID']."'>".$row['branch_loc']."</option>";
	}
	
?>
</select><br><br>

<br>

<br>

<input type="hidden" name="currency_code" value="PHP">
<input id="btn_submit" type="image" src="img/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">


</form>
</div>







<h1>Go back to <a href="index.php">Petmart and Grooming Salon </a>.</h1>
</div>







<div id="content_footer"></div>
<div id="footer">
      
      <p>Copyright &copy; Petmart and Grooming Salon </p>
    </div>
    </div>
	
	<script src="js/jquery.js"></script>
	
	<script>
	
	function clientlogin(){
		$('#spanmessage').hide();
			var service_ID = $('option:selected', '#service_ID').attr('servID');
			var branch_ID = $('#branch_ID').val();
			var pet_name = $('#pet_name').val();
			var pet_breed = $('#pet_breed').val();
			var pet_gender = $("input[name=pet_gender]:checked").val();
			var serv_date = $('#serv_date').val();
			
				$.post('reserve.php', { service_ID: service_ID, branch_ID: branch_ID, pet_name: pet_name, pet_breed: pet_breed, pet_gender: pet_gender, serv_date: serv_date } , function(data) {
					$('body').html(data).show();
				});
	}
	
	$('#btn_submit').click(clientlogin);
	
	</script>