<?php

class ControllerProductPromo extends Controller
{
    private $error = array();

    public function index()
    {
        $this->load->language('information/promo');

        $this->document->setTitle($this->config->get('config_meta_title') . ' | ' . $this->language->get('heading_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));
        $this->document->setKeywords($this->config->get('config_meta_keyword'));

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        ];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('about/information')
        ];

        $this->load->model('catalog/promo');
        $this->load->model('tool/image');
        $this->load->model('catalog/product');
        $this->load->model('account/wishlist');

        if (isset($this->request->get['promo_id'])) {
            $promo_id = (int)$this->request->get['promo_id'];
        } else {
            $promo_id = 0;
        }

        $promo_info = $this->model_catalog_promo->getPromo($promo_id);

        if ($promo_info) {
            $url = '';

            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }

            if (isset($this->request->get['limit'])) {
                $url .= '&limit=' . $this->request->get['limit'];
            }

            $data['breadcrumbs'][] = array(
                'text' => $promo_info['name'],
                'href' => $this->url->link('product/product', $url . '&promo_id=' . $this->request->get['promo_id'])
            );

            $this->document->addLink($this->url->link('product/promo', 'promo_id=' . $this->request->get['promo_id']), 'canonical');

            $data['promo_id'] = (int)$this->request->get['promo_id'];

            $promo_desc = $this->model_catalog_promo->getPromoDescription($data['promo_id']);

            $data['name'] = $promo_desc['name'];
            $data['description'] = $promo_desc['description'];
            $data['date_end'] =  date($this->language->get('datetime_format2'), $promo_info['date_end']);
            $data['date_end_human'] = date($this->language->get('date_format_short'), $promo_info ['date_end']);

            $this->load->model('tool/image');

            if ($promo_info['image']) {
                $data['thumb'] = $this->model_tool_image->resize($promo_info['image'], 625, 340);
            } else {
                $data['thumb'] = '';
            }

            $data['products'] = array();

            $results = $this->model_catalog_promo->getPromoProducts($this->request->get['promo_id']);

            foreach ($results as $product_id) {
                $product = $this->model_catalog_product->getProduct($product_id);

                if ($product['image']) {
                    $image = $this->model_tool_image->resize($product['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_height'));
                } else {
                    $image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_height'));
                }

                if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                    $price = $this->currency->format($this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                } else {
                    $price = false;
                }

                if (!is_null($product['special']) && (float)$product['special'] >= 0) {
                    $special = $this->currency->format($this->tax->calculate($product['special'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                    $tax_price = (float)$product['special'];
                } else {
                    $special = false;
                    $tax_price = (float)$product['price'];
                }

                if ($this->config->get('config_tax')) {
                    $tax = $this->currency->format($tax_price, $this->session->data['currency']);
                } else {
                    $tax = false;
                }

                if ($this->config->get('config_review_status')) {
                    $rating = (int)$product['rating'];
                } else {
                    $rating = false;
                }

                if (!empty($product['receipt_author_id'])) {
                    $customer = $this->model_account_customer->getCustomer($product['receipt_author_id']);
                }

                $data['products'][] = array(
                    'product_id' => $product['product_id'],
                    'thumb' => $image,
                    'name' => $product['name'],
                    'description' => utf8_substr(trim(strip_tags(html_entity_decode($product['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_promo_description_length')) . '..',
                    'price' => $price,
                    'special' => $special,
                    'tax' => $tax,
                    'minimum' => $product['minimum'] > 0 ? $product['minimum'] : 1,
                    'rating' => $rating,
                    'href' => $this->url->link('product/product', 'product_id=' . $product['product_id']),
                    'is_receipt' => $product['is_receipt'],
                    'author_name' => !empty($customer) ? $customer['firstname'] . ' ' . $customer['lastname'] : '',
                    'in_wishlist' => $this->model_account_wishlist->isInWishlist($product['product_id'])
                );
            }

            $data['constructor'] = $this->url->link('constructor/stage1');
            $data['looked_products'] = $this->load->controller('extension/module/matrosite_looked');

            $this->document->addScript('catalog/view/theme/makeme/libs/jQuery-Countdown-Plugin/jquery.countdown.min.js', 'footer');
            $this->document->addScript('catalog/view/theme/makeme/scripts/catalog.js', 'footer');

            $data['column_left'] = $this->load->controller('common/column_left');
            $data['column_right'] = $this->load->controller('common/column_right');
            $data['content_top'] = $this->load->controller('common/content_top');
            $data['content_bottom'] = $this->load->controller('common/content_bottom');
            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');

            $this->response->setOutput($this->load->view('product/promo', $data));
        } else {

            if (isset($this->request->get['limit'])) {
                $limit = (int)$this->request->get['limit'];
            } else {
                $limit = 6;
            }

            if (isset($this->request->get['sort'])) {
                $sort = $this->request->get['sort'];
            } else {
                $sort = 'name';
            }

            if (isset($this->request->get['order'])) {
                $order = $this->request->get['order'];
            } else {
                $order = 'ASC';
            }

            if (isset($this->request->get['page'])) {
                $page = (int)$this->request->get['page'];
            } else {
                $page = 1;
            }

            $promo_total = $this->model_catalog_promo->getTotalPromos();

            $filter_data = array(
                'sort' => $sort,
                'order' => $order,
                'start' => ($page - 1) * $this->config->get('config_limit_admin'),
                'limit' => $this->config->get('config_limit_admin')
            );

            $results = $this->model_catalog_promo->getPromos($filter_data);

            $data['pages'] = ceil($promo_total / $limit);

            foreach ($results as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 625, 340);
                } else {
                    $image = $this->model_tool_image->resize('placeholder.png', 625, 340);
                }

                $promo_desc = $this->model_catalog_promo->getPromoDescription($result['promo_id']);

                if (!empty($promo_desc)) {
                    $data['promos'][] = array(
                        'promo_id' => $result['promo_id'],
                        'name' => $promo_desc['name'],
                        'description' => strlen($promo_desc['description'] > 200) ? substr($promo_desc['description'], 0, 200) . '...' : $promo_desc['description'],
                        'thumb' => $image,
                        'discount' => $result['discount'],
                        'date_start' => date($this->language->get('date_format_short'), strtotime($result['date_start'])),
                        'date_end' => date($this->language->get('date_format_short'), strtotime($result['date_end'])),
                        'href' => $this->url->link('product/promo', 'promo_id=' . $result['promo_id'], true)
                    );
                }
            }

            $data['column_left'] = $this->load->controller('common/column_left');
            $data['column_right'] = $this->load->controller('common/column_right');
            $data['content_top'] = $this->load->controller('common/content_top');
            $data['content_bottom'] = $this->load->controller('common/content_bottom');
            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');

            $this->response->setOutput($this->load->view('product/promos', $data));
        }
    }
}
