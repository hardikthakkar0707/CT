<!DOCTYPE HTML>
<html>
<head>
	<title>schedule</title>
	<?php $this->load->view("head"); ?>
</head>
<body>
		<?php $this->load->view("menu"); ?>
    	<div class="container schedule">
    		<form>
	    			<label>Select Standard</label>
	    			<select class="form-input form-control" onchange="showCustomer(this.value)" name="customers">
                        <option selected="selected">Standerd</option>
                        <option value="1">1<sup>st</sup></option>
                        <option value="2">2<sup>nd</sup></option>
                        <option value="3">3<sup>rd</sup></option>
                        <option value="4">4<sup>th</sup></option>
                        <option value="5">5<sup>th</sup></option>
                        <option value="6">6<sup>th</sup></option>
                        <option value="7">7<sup>th</sup></option>
                        <option value="8">8<sup>th</sup></option>
                        <option value="9">9<sup>th</sup></option>
                        <option value="10">10<sup>th</sup></option>
                        <option value="11">11<sup>th</sup></option>
                        <option value="12">12<sup>th</sup></option>
                    </select>
    		</form>
                <div id="txtHint">Select Standard to Show Shedule Here.</div>
<!--    		<table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Monday</th>
			        <th>Tuesday</th>
			        <th>Wednesday</th>
			        <th>Thursday</th>
			        <th>Friday</th>
			        <th>Saturday</th>
			        
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>English<p>7:00</p></td>
			        <td>English<p>7:00</p></td>
			        <td>English<p>7:00</p></td>
			        <td>English<p>7:00</p></td>
			        <td>English<p>7:00</p></td>
			        <td>English<p>7:00</p></td>
			      </tr>
			      <tr>
			        <td>English<p>8:00</p></td>
			        <td>English<p>8:00</p></td>
			        <td>English<p>8:00</p></td>
			        <td>English<p>8:00</p></td>
			        <td>English<p>8:00</p></td>
			        <td>English<p>8:00</p></td>
			      </tr>
			      <tr>
			        <td>English<p>9:00</p></td>
			        <td>English<p>9:00</p></td>
			        <td>English<p>9:00</p></td>
			        <td>English<p>9:00</p></td>
			        <td>English<p>9:00</p></td>
			        <td>English<p>9:00</p></td>
			      </tr>
			      <tr>
			        <td>English<p>10:00</p></td>
			        <td>English<p>10:00</p></td>
			        <td>English<p>10:00</p></td>
			        <td>English<p>10:00</p></td>
			        <td>English<p>10:00</p></td>
			        <td>English<p>10:00</p></td>
			      </tr>
			      <tr>
			        <td>English<p>11:00</p></td>
			        <td>English<p>11:00</p></td>
			        <td>English<p>11:00</p></td>
			        <td>English<p>11:00</p></td>
			        <td>English<p>11:00</p></td>
			        <td>English<p>11:00</p></td>
			      </tr>
			      <tr>
			        <td>English<p>12:00</p></td>
			        <td>English<p>12:00</p></td>
			        <td>English<p>12:00</p></td>
			        <td>English<p>12:00</p></td>
			        <td>English<p>12:00</p></td>
			        <td>English<p>12:00</p></td>
			      </tr>
			      <tr>
			        <td>English<p>1:00</p></td>
			        <td>English<p>1:00</p></td>
			        <td>English<p>1:00</p></td>
			        <td>English<p>1:00</p></td>
			        <td>English<p>1:00</p></td>
			        <td>English<p>1:00</p></td>
			      </tr>
			      <tr>
			        <td>English<p>2:00</p></td>
			        <td>English<p>2:00</p></td>
			        <td>English<p>2:00</p></td>
			        <td>English<p>2:00</p></td>
			        <td>English<p>2:00</p></td>
			        <td>English<p>2:00</p></td>
			      </tr>
			    </tbody>
  			</table>-->
    	</div>
		<?php $this->load->view("footer"); ?>
    <script>
function showCustomer(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "<?php echo base_url("index.php/Schedule_controller/Schedule/"); ?>"+str, true);
  xhttp.send();
}
</script>

</body>
</html>
