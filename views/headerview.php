<?php

class HeaderView extends SimpleView {
	function _render() {
		?>
<nav id="header" class="clear" style="vertical-align: middle; position: absolute; width: 100%; top: 0;">
	<div class="left">
		<h1 style="margin: 0; vertical-align: middle;" class="left text-huge hpadding-small">
			<a href="./" style="text-decoration: none;">
				<span class="text-orange">m</span><span class="text-turquois">N</span>
			</a>
		</h1>

		<ul class="text-large left" style="margin: 0; padding: 0; list-style: none;">
			<li class="hpadding-small vpadding-small" style="display: inline-block; padding-bottom: 0;">
				<a href="./discover" style="text-decoration: none;">Discover</a>
			</li>
			<li class="hpadding-small vmargin-small" style="display: inline-block; margin-bottom: 0;">
				<a href="./start-a-project" class="" style="text-decoration: none;" >Start a project</a>
			</li>
		</ul>
	</div>
	<div class="right" style="vertical-align: middle; padding-top: 0.8em;">
		<ul style="margin: 0; padding: 0; list-style: none; display: inline-block;" class="text-large">
			<li class="hpadding-small">
				<a href="./get-started" class="bg-turquois hpadding-small vpadding-small text-white" ><span class="">Get Started</span></a>
			</li>
		</ul>
	</div>
</nav>
		<?php
	}
}
