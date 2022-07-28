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
//
//		$category_id = end($parts);
//
//		$this->load->model('catalog/category');
//
//		$category_info = $this->model_catalog_category->getCategory($category_id);
//
//		if ($category_info) {
        $this->load->language('extension/module/filter');

//			$url = '';
//
//			if (isset($this->request->get['sort'])) {
//				$url .= '&sort=' . $this->request->get['sort'];
//			}
//
//			if (isset($this->request->get['order'])) {
//				$url .= '&order=' . $this->request->get['order'];
//			}
//
//			if (isset($this->request->get['limit'])) {
//				$url .= '&limit=' . $this->request->get['limit'];
//			}
//
//			$data['action'] = str_replace('&amp;', '&', $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url));
//
//			if (isset($this->request->get['filter'])) {
//				$data['filter_category'] = explode(',', $this->request->get['filter']);
//			} else {
//				$data['filter_category'] = array();
//			}
//
//			$this->load->model('catalog/product');
//
//			$data['filter_groups'] = array();
//
//			$filter_groups = $this->model_catalog_category->getCategoryFilters($category_id);
//
//			if ($filter_groups) {
//				foreach ($filter_groups as $filter_group) {
//					$childen_data = array();
//
//					foreach ($filter_group['filter'] as $filter) {
//						$filter_data = array(
//							'filter_category_id' => $category_id,
//							'filter_filter'      => $filter['filter_id']
//						);
//
//						$childen_data[] = array(
//							'filter_id' => $filter['filter_id'],
//							'name'      => $filter['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : '')
//						);
//					}
//
//					$data['filter_groups'][] = array(
//						'filter_group_id' => $filter_group['filter_group_id'],
//						'name'            => $filter_group['name'],
//						'filter'          => $childen_data
//					);
//				}

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
                        if (!empty($filter_group['filters'])) {
                            foreach ($filter_group['filters'] as &$filter) {
                                $filter['selected'] = true;
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
                    if ((!empty($data['category_id']) && $category['category_id'] == $data['category_id']) ||
                        empty($data['category_id'])) {
                        $children = $this->model_catalog_category->getCategories($category['category_id']);

                        foreach ($children as $child) {
                            $filter_data = array('filter_category_id' => $child['category_id'], 'filter_sub_category' => true);

                            $second_level_categories[] = array(
                                'category_id' => $child['category_id'],
//                                'name' => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
                                'name' => $child['name'],
                                'href' => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
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