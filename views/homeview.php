<?php

class HomeView extends SimpleView {
	function _render() {
		?>
		<?php $headerView = new HeaderView(); echo $headerView->render(); ?>
		<div class="frame full-width full-height bg-darker-grey landing parallax hpadding-small">
			<div class="vcenter">
				<div class="center text-white" id="title-content">
					<h1 class="text-center text-xxhuge container center vmargin-medium">
						<span class="text-orange">m</span><span class="text-turquois">N</span>
					</h1>
					<p class="text-center text-xxlarge container center vmargin-medium">
						Micronate. Making donating <span class="text-orange">simple</span> and <span class="text-turquois">transparent</span>.
					</p>
					<p class="text-center text-large container center vmargin-medium">
						We create a direct link between donors and social projects.
					</p>
					<p class="text-center text-xlarge container center vmargin-medium">
						<strong>
							<span class="text-turquois">Make a difference.</span> 
							<a href="get-started" class="bg-orange text-white hpadding-small vpadding-small">Start donating now</a>
						</strong>
					</p>
				</div>
			</div>

			<footer class="bottom frame vpadding-small" style="left: 0;">
				<p class="text-left text-white text-center container center">
					Copyright &copy; by Micronate 2014. <a target="_blank" href="https://twitter.com/MicronateOrg" class="text-orange">@MicronateOrg</a>. Crafted with love at <a target="_blank" href="http://www.hackzurich.com/14">HackZurich 2014</a>. Image © Pro Juventute. 
				</p>
			</footer>
		</div>
		<?php
	}
}