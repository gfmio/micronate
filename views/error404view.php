<?php

class Error404View extends SimpleView {
	function _render() {
		?>
<div class="frame full-width full-height bg-orange text-white">
	<div class="vcenter">
		<div class="center">
			<h1 class="text-center">
				Error 404
			</h1>
			<p class="text-center">
				The page you reqested does not exist. Are you sure it is not a typo?
			</p>
			<p class="text-center">
				<a href="./" class="text-white">Get back to the homepage</a>
			</p>
		</div>
	</div>
</div>
		<?php
	}
}
