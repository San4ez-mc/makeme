<?php

class ControllerConstructorStage1 extends Controller
{
    public function index()
    {
        $this->document->setTitle($this->config->get('config_meta_title') . ' | Конструктор - 1 этап');
        $this->document->setDescription($this->config->get('config_meta_description'));
        $this->document->setKeywords($this->config->get('config_meta_keyword'));

        $data['stage1'] = $this->url->link('constructor/stage1');
        $data['stage2'] = $this->url->link('constructor/stage2');
        $data['stage3'] = $this->url->link('constructor/stage3');
        $data['stage'] = 1;

        $this->load->model('catalog/category');
        $this->load->model('tool/image');

        $data['category_1'] = $this->model_catalog_category->getCategory(60); // Обличчя
        if(!empty($data['category_1'])) {
            $data['category_1']['description'] = htmlspecialchars_decode($data['category_1']['description']);
            $data['category_1']['thumb'] = $this->model_tool_image->resize($data['category_1']['image'], 366, 320);

        }
        $data['category_2'] = $this->model_catalog_category->getCategory(61); // Тіло
        if(!empty($data['category_2'])) {
            $data['category_2']['description'] = htmlspecialchars_decode($data['category_2']['description']);
            $data['category_2']['thumb'] = $this->model_tool_image->resize($data['category_2']['image'], 366, 320);
        }
        $data['category_3'] = $this->model_catalog_category->getCategory(59); // Волосся
        if(!empty($data['category_3'])) {
            $data['category_3']['description'] = htmlspecialchars_decode($data['category_3']['description']);
            $data['category_3']['thumb'] = $this->model_tool_image->resize($data['category_3']['image'], 366, 320);
        }

        if (!empty($_GET['cat'])) {
            $data['stage'] = 2;
            $data['cat'] = $_GET['cat'];
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

            $filter_groups = $this->model_catalog_filter->getFilterGroupsWithFilters(['filter_group_id' => $cat_to_filter_group_id[$_GET['cat']]]);
            $data['filters'] = [];
            if (!empty($filter_groups[0]['filters'])) {
                $data['filters'] = $filter_groups[0]['filters'];
            }
            $data['subcat'] = $_GET['subcat'];
        }

        $this->document->addScript('catalog/view/theme/makeme/libs/owl.carousel/owl.carousel.min.js', 'footer');

        $data['recommended'] = $this->load->controller('blog/recommended');

        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom'); 
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $this->response->setOutput($this->load->view('constructor/stage1', $data));
    }
}