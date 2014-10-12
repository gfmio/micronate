<?php

class CampaignView extends SimpleView {
	function _render() {
		?>
<h1> {data.title}
<h3> {data.creator} </h3>
<p><b>Location</b>: {data.location}</p>
<img src={data.image} alt="cause1" style="width:228px;height:228px">
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