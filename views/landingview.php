<?php

class LandingView extends SimpleView {
	function _render() {
		?>
		<div class="frame full-width full-height bg-darker-grey landing parallax">
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
							<span class="text-orange">Start donating now.</span>
						</strong>
					</p>
					<p class="text-center text-xlarge container center vmargin-medium"><strong>Questions?</strong> <a href="mailto:hello@micronate.org">hello@micronate.org</a>.</p>
					<p class="text-center text-large container center vmargin-medium">
						<strong>Get notified when Micronate goes live!</strong> 
					</p>
					<div class="text-center text-large container center vmargin-medium">
						<form action="//frederique-mittelstaedt.us7.list-manage.com/subscribe/post?u=f47f10fce426c99ffa453f764&amp;id=04f49f440a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						    <input class="text-black hpadding-small vpadding-small" style="border: none;" type="email" placeholder="Your e-mail address" value="" name="EMAIL" class="required email" id="mce-EMAIL">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
							<div style="position: absolute; left: -5000px; display: inline-block;">
								<input type="text" name="b_f47f10fce426c99ffa453f764_04f49f440a" tabindex="-1" value="" style="">
							</div>
							<input type="submit" value="Notify me!" name="subscribe" id="mc-embedded-subscribe" class="button bg-orange hpadding-small vpadding-small" style="appearance: none; border: none; display: inline-block;">

						</form>
					</div>
				</div>
				<footer class="bottom frame vpadding-small">
					<p class="text-left text-white text-center container center">
						Copyright &copy; by Micronate 2014. <a target="_blank" href="https://twitter.com/MicronateOrg" class="text-orange">@MicronateOrg</a>. Crafted with love at <a target="_blank" href="http://www.hackzurich.com/14">HackZurich 2014</a>. Image © Pro Juventute. 
					</p>
				</footer>
			</div>
		</div>
		<?php
	}
}
