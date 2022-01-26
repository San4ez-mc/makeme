<?php

class ControllerExtensionModuleBanners extends Controller
{
    public function index($setting)
    {
        $data = [];
        $this->load->language('extension/module/banners');
;
        return $this->load->view('extension/module/banners', $data);
    }
}