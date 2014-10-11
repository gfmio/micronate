<?php

abstract class SimpleView {
	public $data;

	function render() {
		ob_start();
		$this->_render();
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	abstract function _render();
}