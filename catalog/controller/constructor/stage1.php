<?php

class ControllerConstructorStage1 extends Controller
{
    public function index()
    {
        $this->document->setTitle($this->config->get('config_meta_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));
        $this->document->setKeywords($this->config->get('config_meta_keyword'));

        $data['stage1'] = $this->url->link('constructor/stage1');
        $data['stage2'] = $this->url->link('constructor/stage2');
        $data['stage3'] = $this->url->link('constructor/stage3');
        $data['stage'] = 1;

        if (!empty($_GET['cat'])) {
            $data['stage'] = 2;
            $data['cat'] = $_GET['cat'];
            $this->load->model('catalog/category');
            $this->load->model('tool/image');
            $data['categories'] = array();

            $categories = $this->model_catalog_category->getCategories($_GET['cat']);

            if (!empty($categories)) {
                foreach ($categories as $category) {

                    $boxing = $this->model_catalog_category->getCategoryBoxing($category['category_id']);
                    $data['categories'][] = [
                        'id' => $category['category_id'],
//                        'image' => $this->model_tool_image->resize($category['image'], 350, 350),
                        'image' => $this->model_tool_image->resize($boxing['image'], 350, 350),
                        'bg_image' => $this->model_tool_image->resize($boxing['bg_image'], 350, 350),
                        'name' => $category['name'],
                        'description' => htmlspecialchars_decode($category['description'])
                    ];
                }
            }
        }

        if (!empty($_GET['cat']) && !empty($_GET['subcat'])) {
            $data['stage'] = 3;
            $data['subcat'] = $_GET['subcat'];
            $this->load->model('catalog/filter');
            $cat_to_filter_group_id = [
                59 => 6, // волосы
                60 => 4, // лицо
                61 => 5 // тело
            ];

//            $filters = $this->model_catalog_filter->getFilters($filter_data);
            $filter_groups = $this->model_catalog_filter->getFilterGroupsWithFilters(['filter_group_id' => $cat_to_filter_group_id[$_GET['cat']]]);
//            var_dump($filter_groups);
            $data['filters'] = [];
            if (!empty($filter_groups[0]['filters'])) {
                $data['filters'] = $filter_groups[0]['filters'];
            }
            $data['subcat'] = $_GET['subcat'];
        }

        $this->document->addScript('catalog/view/theme/makeme/libs/owl.carousel/owl.carousel.min.js', 'footer');

        $data['recommended'] = $this->load->controller('blog/recommended');
//        $data['banners'] = $this->load->controller('extension/module/banners');

//		$data['column_left'] = $this->load->controller('common/column_left');
//		$data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $this->response->setOutput($this->load->view('constructor/stage1', $data));
    }
}