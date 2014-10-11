<?php

class GetStartedView extends SimpleView {
	function _render() {
		?>
		{view:header:{}}
		<div class="frame full-width full-height bg-darker-grey landing parallax hpadding-small">
			<div class="vcenter">
				<div class="center text-white" id="title-content">
					<h1 class="text-center text-xxhuge container center vmargin-medium">
						<span class="text-orange">m</span><span class="text-turquois">N</span>
					</h1>
					<div class="text-center left text-small hpadding-large hmargin-large">
					<h3> Sign Up </h3>
					<form action="signup" method="POST">
						Email: <input type="text" name="email"><br>
						Password: <input type="password" name="pwd"><br>
						Re-type Password: <input type="password" name="pwd"><br>
						<input type="submit" value="Register">
					</form>
				</div>
				<div class="text-center right text-small hpadding-large hmargin-large">
					<h3> Login </h3>
					<form action="login" method="POST">
						Username: <input type="text" name="username"><br>
						Password: <input type="password" name="pwd"><br>
						<input type="submit" value="Login">
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