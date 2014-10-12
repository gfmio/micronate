<?php

class GetStartedView extends SimpleView {
	function _render() {
		?>
		<?php $headerView = new HeaderView(); echo $headerView->render(); ?>
		<div class="frame full-width bg-darker-grey landing parallax hpadding-small" style="background-size: cover;">
				<h1 class="text-center text-white vmargin-large">
					Get started
				</h1>
			<div class="text-center center clear">
				<div class="center text-center clear compact">
					<div style="display: inline-block; width: 480px; max-width: 50%;" class="left hpadding-large">
						<h3 class="text-white"> Sign Up </h3>
						<form action="signup" method="POST" class="text-darker-grey">
							<input requied type="text" name="first_name" placeholder="First name" class="field hpadding-small vpadding-small" style="margin: 0; border: 0; border-bottom: #DDDDDD solid 1px;"><br>
							<input requied type="text" name="last_name" placeholder="Last name" class="field hpadding-small vpadding-small" style="margin: 0; border: 0; border-bottom: #DDDDDD solid 1px;"><br>
							<input requied type="text" name="username" placeholder="Username" class="field hpadding-small vpadding-small" style="margin: 0; border: 0; border-bottom: #DDDDDD solid 1px;"><br>
							<input requied type="email" name="email" placeholder="Email" class="field hpadding-small vpadding-small" style="margin: 0; border: 0; border-bottom: #DDDDDD solid 1px;"><br>
							<input requied type="password" name="pwd" placeholder="Password" class="field hpadding-small vpadding-small" style="margin: 0; border: 0; border-bottom: #DDDDDD solid 1px;"><br>
							<input requied type="password" name="pwd" placeholder="Re-type Password" class="field hpadding-small vpadding-small" style="margin: 0; border: 0; border-bottom: #DDDDDD solid 1px;"><br>
							<input class="bg-orange button text-white center hpadding-small vpadding-small" type="submit" value="Register" style="margin: 0; border: 0; width: 100%;">
						</form>
					</div>

					<div style="display: inline-block; width: 480px; max-width: 50%;" class="right hpadding-large">
						<h3 class="text-white"> Sign In </h3>
						<form action="login" method="POST" class='text-darker-grey'>
							<input required type="email" name="email" class="field hpadding-small vpadding-small" placeholder="E-mail" style="margin: 0; border: 0; border-bottom: #DDDDDD solid 1px;"><br>
							<input required type="password" name="password" class="field hpadding-small vpadding-small" placeholder="Password" style="margin: 0; border: 0; border-bottom: #DDDDDD solid 1px;"><br>
							<input class='bg-orange button text-white center hpadding-small vpadding-small' type="submit" value="Login" style="margin: 0; border: 0; width: 100%;">
						</form>
					</div>
				</div>
			</div>

			<footer class="vpadding-small" style="left: 0;">
				<p class="text-left text-white text-center container center">
					Copyright &copy; by Micronate 2014. <a target="_blank" href="https://twitter.com/MicronateOrg" class="text-orange">@MicronateOrg</a>. Crafted with love at <a target="_blank" href="http://www.hackzurich.com/14">HackZurich 2014</a>. Image © Pro Juventute. 
				</p>
			</footer>
		</div>
		<?php
	}
}