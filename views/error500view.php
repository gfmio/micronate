<?php

class Error500View extends SimpleView {
	function _render() {
		?>
<div class="frame full-width full-height bg-red text-white">
	<div class="vcenter">
		<div class="center">
			<h1 class="text-center">
				Error 500
			</h1>
			<p class="text-center">
				A severe error occurred. We will try to fix this, but it would be great, if you could let us know, when, why and how this error occurred via <a href="mailto:hello@micronate.org" class="text-white"><strong>e-mail</strong></a>.
			</p>
			<p class="text-center">
				<strong><a href="./" class="text-white">Get back to the homepage</a></strong>
			</p>
		</div>
	</div>
</div>
		<?php
	}
}
