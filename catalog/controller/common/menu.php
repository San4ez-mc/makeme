<?php

class ControllerCommonMenu extends Controller
{
    public function index()
    {
        $this->load->language('common/menu');

        // Menu
//		$this->load->model('catalog/category');
//
//		$this->load->model('catalog/product');

//		$data['menu_items'] = array();
        $data['menu_items'] = [
            [
                'name' => 'Конструктор',
                'href' => $this->url->link('constructor/stage1')
            ],
            [
                'name' => 'Каталог',
                'href' => $this->url->link('product/catalog')
            ],
            [
                'name' => 'Компоненты',
                'href' => $this->url->link('product/component')
            ],
            [
                'name' => 'О нас',
                'href' => $this->url->link('information/about')
            ],
            [
                'name' => 'MM Club',
                'href' => $this->url->link('information/mmclub')
            ],
            [
                'name' => 'Акции',
                'href' => $this->url->link('product/promo')
            ]
        ];

//		$menu_items = $this->model_catalog_category->getmenu_items(0);
//
//		foreach ($menu_items as $category) {
//			if ($category['top']) {
//				// Level 2
////				$children_data = array();
////
////				$children = $this->model_catalog_category->getmenu_items($category['category_id']);
////
////				foreach ($children as $child) {
////					$filter_data = array(
////						'filter_category_id'  => $child['category_id'],
////						'filter_sub_category' => true
////					);
////
////					$children_data[] = array(
////						'name'  => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
////						'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
////					);
////				}
//
//				// Level 1
//				$data['menu_items'][] = array(
//					'name'     => $category['name'],
////					'children' => $children_data,
////					'column'   => $category['column'] ? $category['column'] : 1,
//					'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
//				);
//			}
//		}

        return $this->load->view('common/menu', $data);
    }
}
