<?php

class ControllerInformationAbout extends Controller
{
    public function index()
    {
        $this->load->language('information/about');

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

        $data['constructor'] = $this->url->link('constructor/stage1');

        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $this->response->setOutput($this->load->view('information/about', $data));
    }
}
