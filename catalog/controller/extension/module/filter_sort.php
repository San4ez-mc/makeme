<?php

class ControllerExtensionModuleFilterSort extends Controller
{
    public function index($settings)
    {
        if (isset($this->request->get['path'])) {
            $parts = explode('_', (string)$this->request->get['path']);
        } else {
            $parts = array();
        }

        $this->load->language('extension/module/filter');

        $data = [];
        switch ($settings["template_id"]) {
            case 1: // Поиск
                $data['search'] = !empty($_GET['s']) ? $_GET['s'] : '';
                return $this->load->view('extension/module/filter_sort/search', $data);
                break;
            case 2: // Фильтр по цене
                $this->load->model('catalog/product');

                $price_ends = $this->model_catalog_product->getProductsEndPrices();

                $data['min_price_end'] = (int)$price_ends['min_price'];
                $data['max_price_end'] = (int)$price_ends['max_price'];

                $data['min_price'] = !empty($_GET['min_price']) ? $_GET['min_price'] : '';
                $data['max_price'] = !empty($_GET['max_price']) ? $_GET['max_price'] : '';
                return $this->load->view('extension/module/filter_sort/price', $data);
                break;
            case 3: // Основные фильтры

                $this->load->model('catalog/filter');
                $filter_groups = $this->model_catalog_filter->getFilterGroupsWithFilters();
                if (!empty($filter_groups)) {
                    foreach ($filter_groups as &$filter_group) {
                        $checked_counter = 0;
                        if (!empty($filter_group['filters'])) {
                            foreach ($filter_group['filters'] as &$filter) {
                                $filter['selected'] = false;
                                if (!empty($this->request->get['filters']) && in_array($filter['filter_id'], explode(',', $this->request->get['filters']))) {
                                    $filter['selected'] = true;
                                    $checked_counter++;
                                }
                            }
                        }
                        if (empty($checked_counter)) {
                            foreach ($filter_group['filters'] as &$filter) {
                                if (empty($this->request->get['filters_off']) ||
                                    (!empty($this->request->get['filters_off']) && !in_array($filter['filter_id'], explode(',', $this->request->get['filters_off'])))) {
                                    $filter['selected'] = true;
                                }
                            }
                        }
                    }
                }

                $data['filters_groups'] = $filter_groups;
                return $this->load->view('extension/module/filter_sort/main', $data);
                break;
            case 4:
                if (isset($parts[0])) {
                    $data['category_id'] = $parts[0];
                } else {
                    $data['category_id'] = 0;
                }

                if (isset($parts[1])) {
                    $data['child_id'] = $parts[1];
                } else {
                    $data['child_id'] = 0;
                }

                $this->load->model('catalog/category');

                $this->load->model('catalog/product');

                $categories = $this->model_catalog_category->getCategories(0);
                $data['categories'] = $categories;
                $second_level_categories = [];

                foreach ($categories as $category) {
                    if ((!empty($data['category_id']) &&
                            $category['category_id'] == $data['category_id']) ||
                        empty($data['category_id'])) {
                        $children = $this->model_catalog_category->getCategories($category['category_id']);

                        foreach ($children as $child) {
//                            $filter_data = array('filter_category_id' => $child['category_id'], 'filter_sub_category' => true);

                            $second_level_categories[] = array(
                                'category_id' => $child['category_id'],
//                                'name' => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
                                'name' => $child['name'],
                                'href' => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id']),
                                'checked' => !empty($this->request->get['categories']) ? in_array($child['category_id'], explode(',', $this->request->get['categories'])) : false
                            );
                        }
                    }
                }
                $data['categories'] = $second_level_categories;
                return $this->load->view('extension/module/filter_sort/categories', $data);
                break;
        }
//			}
//		}
    }
}