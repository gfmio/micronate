<?php

class DiscoverView extends SimpleView {
	function _render() {
		?>
<h2> {data.causes.title} </h2>
<h5> {data.causes.creator} </h5>
<img src= alt= {data.causes.image} "cause1" style="width:228px;height:228px">
<p> <b>Location</b>: {data.causes.location}</p>
<p> <b>Goal</b>: {data.causes.goal} <b>Reached</b>: {data.causes.reached} <b>Deadline</b>: {data.causes.date} </p>
<h3> Short Description</h3>
<p> {data.causes.description} </p>
<form action="">
	<input type="button" value="Donate">
</form>
		<?php
	}
}

