
        <div class="frame full-width third-height parallax">
        	<div class="vcenter">
        	<?php 

        		$page = $_GET['page'];
        		switch($page){
        			case 'discover':
        				include 'views/discover.html';
        				break;
        			default: 
        				include 'views/main.html';


        		}

        	 ?>
        	</div>
		</div>
        