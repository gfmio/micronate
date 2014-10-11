<?php

class MainView extends \Slim\View {
    public function render($template, $data = NULL) {
    	// $return = $this->header().$this->parse($template, $this->data).$this->footer();
        $return = $this->header();
        $viewObj = new $template();
        $viewObj->data = $this->data;
        $return .= $viewObj->render();
        $return .= $this->footer();
        return $return;
    }

    public function header() {
    	ob_start();
?>
<!doctype html>
<html>
    <head>
        <title><?php echo $this->data["title"]; ?></title>
        
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
        <link rel="shortcut icon" href="assets/favicon.png" type="image/png" />
    </head>
    <body>
<?php
    	$content = ob_get_contents();
    	ob_end_clean();
    	return $content;
    }

    public function footer() {
		ob_start();
?>

        <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
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
<?php
    	$content = ob_get_contents();
    	ob_end_clean();
    	return $content;
    }
}
