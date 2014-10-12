<?php

class DiscoverView extends SimpleView {
	function _render() {
		?>
		<?php $headerView = new HeaderView(); echo $headerView->render(); ?>
<div class="frame full-width bg-darker-grey landing parallax hpadding-small" style="height: 300px;">
	<h1 class="text-center text-white vmargin-large">
		Discover amazing projects
	</h1>
</div>
<div class="full-width hpadding-small">
	<div class="discover-container center">
		<?php if (empty($this->data["campaigns"])): ?>
		<p class="text-center">There are no campaigns registered with us. :(</p>
		<?php else: ?>
		<ul>
			<?php foreach ($this->data["campaigns"] as $c): print_r($c);?>

			<li class="clear">
				<div class="left">
					<figure class="bg-dark-grey" style="border-radius: 50%; width: 5em; height: 5em;">
						<a href="./profile/<?php echo $c->creator_id; ?>">
							<img style="border-radius: 50%; width: 100%; height: 100%;" src="http://www.gravatar.com/avatar/<?php echo $c->creator_image; ?>" alt="" />
						</a>
					</figure>
				</div>
				<p class="left">
					<strong class="left"><a href="./campaigns/<?php echo $c->id;?>" class="text-black"><?php echo $c->title; ?></a></strong>&nbsp;<em>by <a href="./profile/<?php echo $c->creator_id; ?>"><?php echo $c->creator_name; ?></a></em><br/>
					<?php echo $c->description; ?><br/>
					<em><?php echo $c->startDateTime->format('d M Y H:i'); ?> - <?php echo $c->endDateTime->format('d M Y H:i'); ?></em> <?php echo $c->location; ?>
				</p>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>
	</div>
</div>
		<?php
	}
}
