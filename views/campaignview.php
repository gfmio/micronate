<?php

class CampaignView extends SimpleView {
	function _render() {
		?>
		<?php $headerView = new HeaderView(); echo $headerView->render(); ?>
		<div class="frame full-width bg-darker-grey landing parallax hpadding-small" style="height: 300px;">
			<br>
			<h1 class="text-center text-white vmargin-large">
				<?php echo $this->data["campaign"]->title; ?>
			</h1>
			<div class="text-center text-large container center vmargin-medium">
				<form action="donate" type="POST">
					<input type="text" placeholder="Amount in USD" name="amount">
					<input type="submit" value="Donate">
				</form>
</div>
		</div>
		<br>
		<div class="full-width hpadding-small">
			<div class="discover-container center">
				<p class="left">
					by <a href="./profile/<?php echo $this->data["creator_id"]; ?>"><?php echo $this->data["creator_name"]; ?></a><br/>
					<?php echo $this->data["campaign"]->description; ?><br/>
					<em><?php echo $this->data["campaign"]->startDateTime->format('d M Y H:i'); ?> - <?php echo $this->data["campaign"]->endDateTime->format('d M Y H:i'); ?></em>
				</p>	
				<br>

				<?php if (empty($this->data["campaign"]->donations)): ?>
				<p class="text-center"> There are no donations for this campaign yet. :( </p>
			<?php else: ?>
			<canvas id="doughNutChartLoc" width="400" height="400"> </canvas>
			<script>
			<?php $colors = array("lightblue", "lightgreen", "lightgrey"); ?>
			var pieChartData = [
			<?php $i = 0; ?>
			
			<?php foreach ($this->data["campaign"]->donations as $c): ?>
			{
	        	value: <?php echo $c->amount; ?>,
	        	color: <?php echo $colors[$i]; ?>
	        }
	        <?php $i++; ?>
	        <?php if ($i != count($this->data["campaign"]->donations)): ?>
	        ,
	        <?php else: ?>
	        ]
	        <?php endif; ?>
	        <?php endforeach; ?>
	        var myDoughnut = new Chart(document.getElementById("doughNutChartLoc").getContext("2d")).Doughnut(DoughNutChartData);
	        </script>
	    <?php endif; ?>

	    
	</div>
</div>



<script src="js/Chart.min.js"></script>
		<?php
	}
}