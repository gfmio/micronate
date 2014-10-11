<?php

class EditProfileView extends SimpleView {
	function _render() {
		?>

<h3> {data.firstname} {data.surname} </h3>
<p> <b>Location</b>: {data.location} &nbsp; &nbsp; <img src="../assets/images/edit.jpg" alt="edit"></p>
<p> <b>Email</b>: {data.email} &nbsp; &nbsp; <img src="../assets/images/edit.jpg" alt="edit"></p>
<p> <b>Balance</b>: {data.balance} <form action=""> <input type="button" value="Donate Now!"></form></p>

<img src={data.image} alt="person1" style="width:228px;height:150px">
<form name="input" method="get">
	Change Image: <input type="text" name="user">
	<input type="button" value="Upload">
</form>

<h3> Payment Information </h3> 
<form>	
	<b>Address</b>
	Address*: <input type="text" name="street"><br>
	Address: <input type="text" name="street2"><br>
	Town/City*:  <input type="text" name="city"><br>
	Country*:  <input type="text" name="country"><br>
	Postcode/zip*:  <input type="text" name="postcode"><br><br>
	
	<b>Telephone number</b>
	Mobile*: <input type="number" name="telephone"><br>
	Alternative:  <input type="text" name="alternative"><br><br>
		
	<b>Payment Card </b>
	Full Name (as given in bank account): <input type="text" name="fullname"><br>
	Card Number: <input type="text" name="lastname"><br>
	CCV: <input type="text" name="ccv"><br>
</form>

<p>or</p><br>
<p><b>Address</b> &nbsp; &nbsp; <img src="../assets/images/edit.jpg" alt="edit"></p>
<p><b>Address</b>: {data.address}</p>
<p><b>Town/City</b>: {data.city}</p>
<p><b>Country</b>: {data.country}</p>
<p><b>Postcode/zip</b>: {data.postcode}</p>
<br>
<p><b>Telephone Number</b>&nbsp; &nbsp; <img src="../assets/images/edit.jpg" alt="edit"></p>
<p><b>Mobile Number</b>: {data.mobile}</p>
<p><b>Alternative</b>: {data.alternative} </p>
<br>
<p><b>Payment Card</b> &nbsp; &nbsp; <img src="../assets/images/edit.jpg" alt="edit"></p>
<p><b>Full Name</b> (as given in bank account): {data.fullname}</p>
<p><b>Card Number</b>: {data.cardnumber}</p>
<p><b>CCV</b>: {data.ccv}</p>
<br>
<h3> Causes I contribute </h3>
<h4> {data.causes.title} </h4> 
<img src={data.causes.image} alt="cause1" style="width:100px;height:100px">

		<?php
	}
}
