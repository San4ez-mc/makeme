<?php
class ControllerInformationMmclub extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('information/mmclub');

        $this->document->setTitle($this->config->get('config_meta_title') . ' | ' . $this->language->get('heading_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));
        $this->document->setKeywords($this->config->get('config_meta_keyword'));

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        ];
        $data['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('about/information')
        ];

        $data['looked_products'] = $this->load->controller('extension/module/matrosite_looked');

        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('information/mmclub', $data));
	}
}
