<?php
class ControllerCommonPreloader extends Controller {
	public function index() {
		return $this->load->view('common/preloader');
	}
}