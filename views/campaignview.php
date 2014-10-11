<?php

class CampaignView extends SimpleView {
	function _render() {
		?>
<h1> {data.title}
<h3> {data.creator} </h3>
<img src={data.image} alt="cause1" style="width:228px;height:228px">
<p><b>Location</b>: {data.location}</p>
<p><b>Goal</b>: {data.goal}       <b>Reached</b>: {data.reached}     <b>Deadline</b>: {data.date} </p>

<h3> Short Description</h3>
<p> {data.description} </p>
<form action="">
	<input type="button" value="Donate">
</form>
		<?php
	}
}

