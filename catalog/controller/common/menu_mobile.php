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
                'href' => '#'
            ],
            [
                'name' => 'Каталог',
                'href' => '#'
            ],
            [
                'name' => 'Компоненты',
                'href' => '#'
            ],
            [
                'name' => 'О нас',
                'href' => '#'
            ],
            [
                'name' => 'MM Club',
                'href' => '#'
            ],
            [
                'name' => 'Акции',
                'href' => '#'
            ],
            [
                'name' => 'Доставка и оплата',
                'href' => '#'
            ],
            [
                'name' => 'Блог',
                'href' => '#'
            ],
            [
                'name' => 'Публичная оферта',
                'href' => '#'
            ],
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

        return $this->load->view('common/menu_mobile', $data);
    }
}
