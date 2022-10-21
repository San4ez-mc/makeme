<?php

class ControllerConstructorStage2 extends Controller
{
    public function index()
    {
        $this->document->setTitle($this->config->get('config_meta_title') . ' | Конструктор - 2 этап');
        $this->document->setDescription($this->config->get('config_meta_description'));
        $this->document->setKeywords($this->config->get('config_meta_keyword'));

        $this->load->language('product/component');

        $this->load->model('catalog/component_category');

        $this->load->model('blog/article');

        $this->load->model('catalog/component');

        $this->load->model('tool/image');

        $data['categories'] = array();

        $categories = $this->model_catalog_component_category->getCategories();

        $data['products'] = array();

        foreach ($categories as $category) {
            $filter_data = array(
                'filter_filter' => '',
                'sort' => '',
                'order' => 'ASC',
                'start' => 0,
                'limit' => $this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit'),
                'filter_category_id' => $category['category_id']
            );

            $results = $this->model_catalog_component->getComponents($filter_data);

            $components = [];
            foreach ($results as $result) {
//                if( ===  )
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
                } else {
                    $image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
                }

                if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                    $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                } else {
                    $price = false;
                }

                $related = $this->model_catalog_component->getComponentRelated($result['component_id']);
                $related_ = [];
                if (!empty($related)) {
                    foreach ($related as $item) {
                        $related_[] = [
                            'component_id' => $item['component_id'],
                            'thumb' => $image,
                            'name' => $item['name'],
//                    'description' => utf8_substr(trim(strip_tags(html_entity_decode($item['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_component_description_length')) . '..',
//                            'description' => html_entity_decode($item['description']),
                            'price' => $price,
                            'minimum' => $item['minimum'] > 0 ? $item['minimum'] : 1,
                        ];
                    }
                }

                $components[] = array(
                    'component_id' => $result['component_id'],
                    'thumb' => $image,
                    'name' => $result['name'],
//                    'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_component_description_length')) . '..',
                    'description' => html_entity_decode($result['description']),
                    'price_' => (int)$result['price'],
                    'price' => $price,
                    'minimum' => $result['minimum'] > 0 ? $result['minimum'] : 1,
                    'related' => $related_
                );
            }

            $data['categories'][] = array(
                'category_id' => $category['category_id'],
                'name' => $category['name'],
                'components' => $components,
                'can_be_delete' => !in_array($category['category_id'], [6]) ? 1: 0
            );
        }

        $filter_data = array(
            'filter_name' => '',
            'filter_status' => '',
            'filter_noindex' => '',
            'sort' => '',
            'order' => '', // можливо тут прописати потім порядок
            'start' => 0,
            'limit' => 5
        );

        if (!empty($_GET['cat']) && !empty($_GET['subcat'])) {
            $this->load->model('catalog/category');

            $boxing = $this->model_catalog_category->getCategoryBoxing($_GET['subcat']);

            $data['boxing_id'] = $boxing['id'];
            $data['subcat'] = $this->model_catalog_category->getCategory($_GET['subcat']);

        }

        $data['articles'] = $this->model_blog_article->getArticles($filter_data);

        $basis = $this->model_catalog_component->getComponents([
            'filter_category_id' => 6 // основы
        ]);
        $basis = $basis[array_key_first($basis)];
        $data['basis'] = [
            'name' => $basis['name'],
            'price_' => (int)$basis['price'],
            'price' => $this->currency->format($this->tax->calculate($basis['price'], $basis['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']),
            'image' => $this->model_tool_image->resize($basis['image'], 44, 44),
        ];

        $data['constructor_popup'] = $this->load->controller('constructor/constructor');

        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $this->response->setOutput($this->load->view('constructor/stage2', $data));
    }
}