<?php

class CampaignView extends SimpleView {
	function _render() {
		?>
		<?php $headerView = new HeaderView(); echo $headerView->render(); ?>
		<div class="frame full-width bg-darker-grey landing parallax hpadding-small" style="height: 300px;">
			<br>
			<h1 class="text-center text-white vmargin-large">
				<?php echo $this->data["title"]; ?>
			</h1>
		</div>
		<h5 class="center">by <a href="./profile/<?php echo $this->data["creator_id"]; ?>"><?php echo $this->data["creator_name"]; ?></a><br/>
			<?php echo $this->data["description"] ?><br/>
			<?php echo $this->data["startDateTime"]->format('d M Y H:i'); ?> - <?php echo $this->data["endDateTime"]->format('d M Y H:i'); ?>
		</h5>	

<div class="full-width hpadding-small">
	<div class="discover-container center">
	<?php if (empty($this->data["donations"])): ?>
		<p class="text-center">There are no donations for this campaign yet. :( </p>
	<?php else: ?>
	    <canvas id="doughNutChartLoc" width="400" height="400"></canvas>
	    <script>
	    <?php $colors = array("lightblue", "lightgreen", "lightgrey"); ?>
	    var pieChartData = [
	        <?php $i = 0; ?>
	        <?php foreach ($this->data["donations"] as $c): ?>
	        {
	        	value: <?php echo $c["value"]; ?>,
	        	color: <?php echo $colors[i]; ?>
	        }
	        <?php $i++; ?>
	        <?php if ($i != count($this->data["donations"])): ?>
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

<p><b>Goal</b>: {data.goal}       <b>Reached</b>: {data.reached}     <b>Deadline</b>: {data.date} </p>

<h3> Short Description</h3>
<p> {data.description} </p>
<form action="">
	<input type="button" value="Donate">
</form>
<script src="js/Chart.min.js"></script>
		<?php
	}
}