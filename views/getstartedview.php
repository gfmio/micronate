<?php

class GetStartedView extends SimpleView {
	function _render() {
		?>
		<?php $headerView = new HeaderView(); echo $headerView->render(); ?>
		<div class="frame full-width full-height bg-darker-grey parallax hpadding-small">
			<div class="vcenter">
				<div class="center text-white" id="title-content">
					<h1 class="text-center text-xxhuge container center vmargin-medium">
						<span class="text-orange">m</span><span class="text-turquois">N</span>
					</h1>
					
					<div class="left text-small hpadding-large hmargin-large">
					<h3> Sign Up </h3>
					<form action="signup" method="POST" class="credentials-box text-darker-grey">
						<input type="text" name="email" placeholder="Email" class="field"><br>
						<input type="password" name="pwd" placeholder="Password" class="field"><br>
						<input type="password" name="pwd" placeholder="Re-type Password" class="field"><br>
						<input class="bg-orange button text-white center" type="submit" value="Register">
					</form>
				</div>
				<div class="right text-small hpadding-large hmargin-large">
					<h3> Login </h3>
					<form action="login" method="POST" class='credentials-box text-darker-grey'>
						<input type="text" name="username" class="field" placeholder="Username"><br>
						<input type="password" name="pwd" class="field" placeholder="Password"><br>
						<input class='bg-orange button text-white center' type="submit" value="Login">
					</form>
				</div>
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