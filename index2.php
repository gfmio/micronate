<!doctype html>
<html>
	<head>
		<title>Micronate</title>
		
		<!--<base href="//micronate.org/">-->
		<base href="//localhost/micronate/">
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Micronate, donations, social projects, HackZurich" />
		<meta name="description" content="Micronate is a donation platform creating a direct link between donors and social projects." />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name='HandheldFriendly' content='True'>
		<meta name='MobileOptimized' content='320'>
		
		<meta name='language' content='en'>
		<meta name='robots' content='index,follow'>
		<meta http-equiv='Expires' content='0'>
		
		<link href='assets/scss/style.css' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="./assets/favicon.png" type="image/png" />
	</head>
    <body>
        <div class="frame full-width third-height bg-dark-grey landing parallax">
            
        	
			<div class="vcenter">
				
                <div class="center text-white" id="title-content">
					<h1 class="text-center text-xxhuge container center vmargin-top">
						<span class="text-orange">m</span><span class="text-turquois">N</span>
					</h1>
					<p class="text-center text-xxlarge container center vmargin-medium">
						Micronate. Making donating <span class="text-orange">simple</span> and <span class="text-turquois">transparent</span>.
					</p>
                    
				</div>
            </div>
        </div>
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
        <div class="frame full-width parallax">
			<div class="vcenter">	
            <footer class="bottom frame vpadding-small">
					<p class="text-left text-white text-center container center">
						Copyright &copy; by Micronate 2014. <a target="_blank" href="https://twitter.com/MicronateOrg" class="text-orange">@MicronateOrg</a>. Crafted with love at <a target="_blank" href="http://www.hackzurich.com/14">HackZurich 2014</a>. Image © Pro Juventute. 
					</p>
				</footer>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-55652701-1', 'auto');
		  ga('send', 'pageview');

		</script>
    
    </body>
    
</html>