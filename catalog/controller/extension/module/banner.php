<?php

class ControllerExtensionModuleBanner extends Controller
{
    public function index($setting)
    {
        static $module = 0;

        $this->load->model('design/banner');
        $this->load->model('tool/image');

        $this->document->addStyle('catalog/view/javascript/jquery/swiper/css/swiper.min.css');
        $this->document->addStyle('catalog/view/javascript/jquery/swiper/css/opencart.css');
        $this->document->addScript('catalog/view/javascript/jquery/swiper/js/swiper.jquery.js');

        $data['banners'] = array();

        $results = $this->model_design_banner->getBanner($setting['banner_id']);
        if (!empty($results)) {


            $data['module'] = $module++;
            $banner_template = $results[0]['template_id'];
            switch ($banner_template) {
                case 1: // Верхний баннер на главной
                    foreach ($results as $result) {
//                if (is_file(DIR_IMAGE . $result['image'])) {
                        $data['banners'][] = array(
                            'title' => $result['title'],
                            'text' => $result['text'],
                            'link' => $result['link'],
                            'button' => $result['button'],
                            'image' => is_file(DIR_IMAGE . $result['image']) ? $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']) : ''
                        );
//                }
                    }

                    return $this->load->view('extension/module/banners/banner_main_page_top', $data);
                    break;
                case 2: // Этапы создания
                    foreach ($results as $result) {
                        $data['banners'][] = array(
                            'title' => $result['title'],
                            'text' => $result['text'],
                            'link' => $result['link'],
                            'button' => $result['button'],
//                            'image' => is_file(DIR_IMAGE . $result['image']) ? $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']) : ''
                            'image' => is_file(DIR_IMAGE . $result['image']) ? $this->model_tool_image->resize($result['image'], $result['width'], $result['height']) : ''
                        );
                    }

                    return $this->load->view('extension/module/banners/banner_main_page_stages', $data);
                    break;
                case 3: // Создай СВОЮ, неповторимую!

                    foreach ($results as $result) {
//                if (is_file(DIR_IMAGE . $result['image'])) {
                        $data['banners'][] = array(
                            'title' => $result['title'],
                            'text' => $result['text'],
                            'link' => $result['link'],
                            'button' => $result['button'],
                            'image' => is_file(DIR_IMAGE . $result['image']) ? $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']) : ''
                        );
//                }
                    }

                    foreach ($data['banners'] as $key => $banner) {
                        $data['banners'][$key]['title'] = html_entity_decode($data['banners'][$key]['title']);
                        $data['banners'][$key]['text'] = html_entity_decode($data['banners'][$key]['text']);
                    }

                    return $this->load->view('extension/module/banners/banner_main_page_create', $data);
                    break;
                case 4: // Создай СВОE!

                    foreach ($results as $result) {
//                if (is_file(DIR_IMAGE . $result['image'])) {
                        $data['banners'][] = array(
                            'title' => $result['title'],
                            'text' => $result['text'],
                            'link' => $result['link'],
                            'button' => $result['button'],
                            'image' => is_file(DIR_IMAGE . $result['image']) ? $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']) : ''
                        );
//                }
                    }

                    foreach ($data['banners'] as $key => $banner) {
                        $data['banners'][$key]['title'] = html_entity_decode($data['banners'][$key]['title']);
                        $data['banners'][$key]['text'] = html_entity_decode($data['banners'][$key]['text']);
                    }

                    $data['constructor'] = $this->url->link('constructor/stage1');

                    return $this->load->view('extension/module/banners/create_yours', $data);
                    break;
                case 5: // ТВОЯ рассылка!

                    foreach ($results as $result) {
//                if (is_file(DIR_IMAGE . $result['image'])) {
                        $data['banners'][] = array(
                            'title' => $result['title'],
                            'text' => $result['text'],
                            'link' => $result['link'],
                            'button' => $result['button'],
                            'image' => is_file(DIR_IMAGE . $result['image']) ? $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']) : ''
                        );
//                }
                    }

                    foreach ($data['banners'] as $key => $banner) {
                        $data['banners'][$key]['title'] = html_entity_decode($data['banners'][$key]['title']);
                        $data['banners'][$key]['text'] = html_entity_decode($data['banners'][$key]['text']);
                    }
                    return $this->load->view('extension/module/banners/your_subscribe', $data);
                    break;
                case 6: // Как создать косметику для себя

                    foreach ($results as $result) {
                        $data['banners'][] = array(
                            'title' => $result['title'],
                            'text' => $result['text'],
                            'button' => $result['button']
                        );
                    }

                    foreach ($data['banners'] as $key => $banner) {
                        $data['banners'][$key]['title'] = html_entity_decode($data['banners'][$key]['title']);
                        $data['banners'][$key]['text'] = html_entity_decode($data['banners'][$key]['text']);
                    }

                    return $this->load->view('extension/module/banners/how_to_create', $data);
                    break;
                case 7: // Бегущая строка

                    foreach ($results as $result) {
                        $data['banners'][] = array(
                            'title' => $result['title']
                        );
                    }

                    foreach ($data['banners'] as $key => $banner) {
                        $data['banners'][$key]['title'] = html_entity_decode($data['banners'][$key]['title']);
                    }

                    return $this->load->view('extension/module/banners/main_page_running_terms', $data);
                    break;
                case 8: // Банер в корзине

                    foreach ($results as $key =>  $result) {
                        $data['banners'][$key]['text'] = html_entity_decode($result['text']);
                    }
                    return $this->load->view('extension/module/banners/cart_info', $data);
                    break;
                default:
                    foreach ($results as $result) {
                        if (is_file(DIR_IMAGE . $result['image'])) {
                            $data['banners'][] = array(
                                'title' => $result['title'],
                                'text' => $result['text'],
                                'link' => $result['link'],
                                'button' => $result['button'],
                                'image' => is_file(DIR_IMAGE . $result['image']) ? $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']) : ''
                            );
                        }
                    }

                    return $this->load->view('extension/module/banner', $data);
                    break;
            }
        }
    }
}