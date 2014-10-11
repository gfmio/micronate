<?php

class MainView extends \Slim\View {
	public $showWrapper = false;

    public function render($template) {
        if ($this->showWrapper) {
        	$return = $this->header().$this->parse($template, $this->data).$this->footer();
        } else {
        	$return = $this->parse($template, $this->data);
        }

        return $return;
    }

    public function header() {
    	ob_start();


    	$content = ob_get_contents();
    	ob_end_clean();
    	return $content;
    }

    public function footer() {
		ob_start();


    	$content = ob_get_contents();
    	ob_end_clean();
    	return $content;
    }

    public function parse($template, $data) {

    }
}
