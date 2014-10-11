<?php

class CreateCampaignView extends SimpleView {
	function _render() {
		?>
<img src="{data.image}" alt="cause1" style="width:228px;height:228px">
<form name="input" method="get">
	Change Image: <input type="text" name="cause1">
	<input type="button" value="Upload">
</form>

<form>
	Location: <input type="text" name="locaiton"><br>
	Goal: <input type="text" name="goal"><br>
	Deadline: <input type="text" name="deadline"><br>
	Description:
	<textarea rows="4" cols="50"></textarea><br><br>
	<form action="">
		<input type="button" value="Start Campaign!">
	</form>
</form>
		<?php
	}
}


