<?php
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ControllerProductComponent extends Controller
{
    public function index()
    {
        $this->document->setTitle($this->config->get('config_meta_title') . ' | Компоненты');
        $this->document->setDescription($this->config->get('config_meta_description'));
        $this->document->setKeywords($this->config->get('config_meta_keyword'));

        $this->load->language('product/component');

        $this->load->model('catalog/component_category');

        $this->load->model('catalog/component');

        $this->load->model('tool/image');


        $data['text_empty'] = $this->language->get('text_empty');

        if ($this->config->get('config_noindex_disallow_params')) {
            $params = explode("\r\n", $this->config->get('config_noindex_disallow_params'));
            if (!empty($params)) {
                $disallow_params = $params;
            }
        }

        if (isset($this->request->get['filter'])) {
            $filter = $this->request->get['filter'];
            if (!in_array('filter', $disallow_params, true) && $this->config->get('config_noindex_status')) {
                $this->document->setRobots('noindex,follow');
            }
        } else {
            $filter = '';
        }

        if (isset($this->request->get['sort'])) {
            $sort = $this->request->get['sort'];
            if (!in_array('sort', $disallow_params, true) && $this->config->get('config_noindex_status')) {
                $this->document->setRobots('noindex,follow');
            }
        } else {
            $sort = 'p.sort_order';
        }

        if (isset($this->request->get['order'])) {
            $order = $this->request->get['order'];
            if (!in_array('order', $disallow_params, true) && $this->config->get('config_noindex_status')) {
                $this->document->setRobots('noindex,follow');
            }
        } else {
            $order = 'ASC';
        }

        if (isset($this->request->get['page'])) {
            $page = (int)$this->request->get['page'];
            if (!in_array('page', $disallow_params, true) && $this->config->get('config_noindex_status')) {
                $this->document->setRobots('noindex,follow');
            }
        } else {
            $page = 1;
        }

        if (isset($this->request->get['limit'])) {
            $limit = (int)$this->request->get['limit'];
            if (!in_array('limit', $disallow_params, true) && $this->config->get('config_noindex_status')) {
                $this->document->setRobots('noindex,follow');
            }
        } else {
            $limit = $this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit');
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        );

        if (isset($this->request->get['path'])) {
            $url = '';

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['limit'])) {
                $url .= '&limit=' . $this->request->get['limit'];
            }

            $path = '';

            $parts = explode('_', (string)$this->request->get['path']);

            $category_id = (int)array_pop($parts);

            foreach ($parts as $path_id) {
                if (!$path) {
                    $path = (int)$path_id;
                } else {
                    $path .= '_' . (int)$path_id;
                }

                $category_info = $this->model_catalog_component_category->getCategory($path_id);

                if ($category_info) {
                    $data['breadcrumbs'][] = array(
                        'text' => $this->language->get('text_title'),
                        'href' => $this->url->link('product/component', 'path=' . $path . $url)
                    );
                }
            }
        } else {
            $category_id = 0;
        }

        $category_info = $this->model_catalog_component_category->getCategory($category_id);


//        $this->document->setTitle($this->language->get('text_title'));

        if ($this->config->get('config_noindex_status')) {
            $this->document->setRobots('noindex,follow');
        }

        $data['heading_title'] = $this->language->get('text_title');

//        $this->document->setDescription($category_info['meta_description']);
//        $this->document->setKeywords($category_info['meta_keyword']);

        $data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));

        // Set the last category breadcrumb
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_title'),
            'href' => $this->url->link('product/component')
        );

//        $data['thumb'] = '';

//        $data['description'] = html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8');
        $data['compare'] = $this->url->link('product/compare');

        $url = '';

        if (isset($this->request->get['filter'])) {
            $url .= '&filter=' . $this->request->get['filter'];
        }

        if (isset($this->request->get['sort'])) {
            $url .= '&sort=' . $this->request->get['sort'];
        }

        if (isset($this->request->get['order'])) {
            $url .= '&order=' . $this->request->get['order'];
        }

        if (isset($this->request->get['limit'])) {
            $url .= '&limit=' . $this->request->get['limit'];
        }

        $data['categories'] = array();

        $results = $this->model_catalog_component_category->getCategories();

        foreach ($results as $result) {
//            $filter_data = array(
//                'filter_category_id' => $result['category_id'],
//                'filter_sub_category' => true
//            );

//            $data['categories'][] = array(
//                'name' => $result['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_component->getTotalComponents($filter_data) . ')' : ''),
//                'href' => $this->url->link('product/component',  $url)
//            );

            $data['categories'][] = array(
                'name' => $result['name'],
                'href' => $this->url->link('product/component',  $url) ."&component_category_id=" .$result['category_id'],
                'active'=> !empty($_GET['component_category_id']) && $_GET['component_category_id'] === $result['category_id']
            ); 
        }

        $data['products'] = array();

        $filter_data = array(
            'filter_filter' => $filter,
            'sort' => $sort,
            'order' => $order,
            'start' => ($page - 1) * $limit,
            'limit' => $limit
        );

        if(!empty($_GET['component_category_id'])){
            $filter_data['filter_category_id'] = $_GET['component_category_id'];
        }

        $component_total = $this->model_catalog_component->getTotalComponents($filter_data);

        $results = $this->model_catalog_component->getComponents($filter_data);

        foreach ($results as $result) {
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

            $data['components'][] = array(
                'component_id' => $result['component_id'],
                'thumb' => $image,
                'name' => $result['name'],
                'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_component_description_length')) . '..',
                'price' => $price,
                'minimum' => $result['minimum'] > 0 ? $result['minimum'] : 1,
                'href' => $this->url->link('product/component', 'component_id=' . $result['component_id'] . $url)
            );
        }

        $url = '';

        if (isset($this->request->get['filter'])) {
            $url .= '&filter=' . $this->request->get['filter'];
        }

        if (isset($this->request->get['limit'])) {
            $url .= '&limit=' . $this->request->get['limit'];
        }

        $data['sorts'] = array();

        $data['sorts'][] = array(
            'text' => $this->language->get('text_price_asc'),
            'value' => 'p.price-ASC',
            'href' => $this->url->link('product/component', 'sort=p.price&order=ASC' . $url)
        );

        $data['sorts'][] = array(
            'text' => $this->language->get('text_price_desc'),
            'value' => 'p.price-DESC',
            'href' => $this->url->link('product/component', 'sort=p.price&order=DESC' . $url)
        );

        $data['sorts'][] = array(
            'text' => $this->language->get('text_new_asc'),
            'value' => 'p.date-ASC',
            'href' => $this->url->link('product/component', 'sort=p.date&order=ASC' . $url)
        );

        $data['sorts'][] = array(
            'text' => $this->language->get('text_rating_asc'),
            'value' => 'rating-ASC',
            'href' => $this->url->link('product/component', 'sort=rating&order=ASC' . $url)
        );

        $url = '';

        if (isset($this->request->get['filter'])) {
            $url .= '&filter=' . $this->request->get['filter'];
        }

        if (isset($this->request->get['sort'])) {
            $url .= '&sort=' . $this->request->get['sort'];
        }

        if (isset($this->request->get['order'])) {
            $url .= '&order=' . $this->request->get['order'];
        }

        $data['limits'] = array();

        $limits = array_unique(array($this->config->get('theme_' . $this->config->get('config_theme') . '_component_limit'), 25, 50, 75, 100));

        sort($limits);

        foreach ($limits as $value) {
            $data['limits'][] = array(
                'text' => $value,
                'value' => $value,
                'href' => $this->url->link('product/component', 'limit=' . $value)
            );
        }

        $url = '';

        if (isset($this->request->get['filter'])) {
            $url .= '&filter=' . $this->request->get['filter'];
        }

        if (isset($this->request->get['sort'])) {
            $url .= '&sort=' . $this->request->get['sort'];
        }

        if (isset($this->request->get['order'])) {
            $url .= '&order=' . $this->request->get['order'];
        }

        if (isset($this->request->get['limit'])) {
            $url .= '&limit=' . $this->request->get['limit'];
        }

        $pagination = new Pagination();
        $pagination->total = $component_total;
        $pagination->page = $page;
        $pagination->limit = $limit;
        $pagination->url = $this->url->link('product/component', 'page={page}');

        $data['pagination'] = $pagination->render();

        $data['results'] = sprintf($this->language->get('text_pagination'), ($component_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($component_total - $limit)) ? $component_total : ((($page - 1) * $limit) + $limit), $component_total, ceil($component_total / $limit));
        $data['pages'] = ceil($component_total / $limit);

//        $data['banners']= $this->load->controller('extension/module/banner', ['banner_id' => 4]);
//        var_dump($data['banners']);
        if (!$this->config->get('config_canonical_method')) {
            // http://googlewebmastercentral.blogspot.com/2011/09/pagination-with-relnext-and-relprev.html
            if ($page == 1) {
                $this->document->addLink($this->url->link('product/component', $url), 'canonical');
            } elseif ($page == 2) {
                $this->document->addLink($this->url->link('product/component',  $url), 'prev');
            } else {
                $this->document->addLink($this->url->link('product/component', 'page=' . ($page - 1)), 'prev');
            }

            if ($limit && ceil($component_total / $limit) > $page) {
                $this->document->addLink($this->url->link('product/component', 'page=' . ($page + 1)), 'next');
            }
        } else {

            if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
                $server = $this->config->get('config_ssl');
            } else {
                $server = $this->config->get('config_url');
            };

            $request_url = rtrim($server, '/') . $this->request->server['REQUEST_URI'];
            $canonical_url = $this->url->link('product/component');

            if (($request_url != $canonical_url) || $this->config->get('config_canonical_self')) {
                $this->document->addLink($canonical_url, 'canonical');
            }

            if ($this->config->get('config_add_prevnext')) {

                if ($page == 2) {
                    $this->document->addLink($this->url->link('product/component',  $url, 'prev'));
                } elseif ($page > 2) {
                    $this->document->addLink($this->url->link('product/component', 'page=' . ($page - 1)), 'prev');
                }

                if ($limit && ceil($component_total / $limit) > $page) {
                    $this->document->addLink($this->url->link('product/component', 'page=' . ($page + 1)), 'next');
                }
            }
        }

        $data['sort'] = $sort;
        $data['order'] = $order;
        $data['limit'] = $limit;

        $data['continue'] = $this->url->link('common/home');

        $data['main_url'] =  $this->url->link('product/component');

        $data['column_left'] = $this->load->controller('product/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
//			$data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');
        $data['page'] = $page;
        $this->response->setOutput($this->load->view('product/component', $data));
    }
}
