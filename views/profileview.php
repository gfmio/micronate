<?php

class ProfileView extends SimpleView {
	function _render() {
		?>
<h3> <?php echo $this->data["user"]->firstName; ?> <?php echo $this->data["user"]->surname; ?> </h3>
<p> <b>Location</b>: <?php echo $this->data->location; ?></p>
<img src="<?php echo $this->data->image; ?>" alt="" style="width:228px;height:150px">

<h3>Contributions</h3>
<?php if (empty($this->data->campaigns)): ?>
	
<?php else: ?>

<?php endif;
	}
}

