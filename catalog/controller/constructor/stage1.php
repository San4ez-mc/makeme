<?php
class ControllerConstructorStage1 extends Controller {
	public function index() {
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

        $data['stage2'] = $this->url->link('constructor/stage2');
        $data['stage3'] = $this->url->link('constructor/stage3');

        $this->document->addScript('catalog/view/theme/makeme/libs/owl.carousel/owl.carousel.min.js', 'footer' );

//		$data['column_left'] = $this->load->controller('common/column_left');
//		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('constructor/stage1', $data));
	}
}