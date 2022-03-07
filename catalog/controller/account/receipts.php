<?php
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ControllerAccountReceipts extends Controller
{
    public function index()
    {
        if (!$this->customer->isLogged()) {
            $this->session->data['redirect'] = $this->url->link('account/account', '', true);

            $this->response->redirect($this->url->link('account/login', '', true));
        }

        $this->load->language('account/receipts');

        $this->document->setTitle($this->language->get('heading_title'));
        $this->document->setRobots('noindex,follow');

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_account'),
            'href' => $this->url->link('account/account', '', true)
        );
//
//        if (isset($this->session->data['success'])) {
//            $data['success'] = $this->session->data['success'];
//
//            unset($this->session->data['success']);
//        } else {
//            $data['success'] = '';
//        }
//
//        $data['edit'] = $this->url->link('account/edit', '', true);
//        $data['password'] = $this->url->link('account/password', '', true);
//        $data['address'] = $this->url->link('account/address', '', true);
//
//        $data['credit_cards'] = array();
//
//        $files = glob(DIR_APPLICATION . 'controller/extension/credit_card/*.php');
//
//        foreach ($files as $file) {
//            $code = basename($file, '.php');
//
//            if ($this->config->get('payment_' . $code . '_status') && $this->config->get('payment_' . $code . '_card')) {
//                $this->load->language('extension/credit_card/' . $code, 'extension');
//
//                $data['credit_cards'][] = array(
//                    'name' => $this->language->get('extension')->get('heading_title'),
//                    'href' => $this->url->link('extension/credit_card/' . $code, '', true)
//                );
//            }
//        }
//
//        $data['wishlist'] = $this->url->link('account/wishlist');
//        $data['order'] = $this->url->link('account/order', '', true);
//        $data['download'] = $this->url->link('account/download', '', true);
//
//        if ($this->config->get('total_reward_status')) {
//            $data['reward'] = $this->url->link('account/reward', '', true);
//        } else {
//            $data['reward'] = '';
//        }
//
//        $data['return'] = $this->url->link('account/return', '', true);
//        $data['transaction'] = $this->url->link('account/transaction', '', true);
//        $data['newsletter'] = $this->url->link('account/newsletter', '', true);
//        $data['recurring'] = $this->url->link('account/recurring', '', true);

        $this->load->model('account/customer');

//        $affiliate_info = $this->model_account_customer->getAffiliate($this->customer->getId());

//        if (!$affiliate_info) {
//            $data['affiliate'] = $this->url->link('account/affiliate/add', '', true);
//        } else {
//            $data['affiliate'] = $this->url->link('account/affiliate/edit', '', true);
//        }
//
//        if ($affiliate_info) {
//            $data['tracking'] = $this->url->link('account/tracking', '', true);
//        } else {
//            $data['tracking'] = '';
//        }


        $this->load->model('catalog/component');

        $results = $this->model_catalog_component->getReceipts();

        $url = '';

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

            if (!is_null($result['special']) && (float)$result['special'] >= 0) {
                $special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                $tax_price = (float)$result['special'];
            } else {
                $special = false;
                $tax_price = (float)$result['price'];
            }

            if ($this->config->get('config_tax')) {
                $tax = $this->currency->format($tax_price, $this->session->data['currency']);
            } else {
                $tax = false;
            }

            if ($this->config->get('config_review_status')) {
                $rating = (int)$result['rating'];
            } else {
                $rating = false;
            }

            $data['receipts'][] = array(
                'product_id' => $result['product_id'],
                'thumb' => $image,
                'name' => $result['name'],
                'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
                'price' => $price,
                'special' => $special,
                'tax' => $tax,
                'minimum' => $result['minimum'] > 0 ? $result['minimum'] : 1,
                'rating' => $result['rating'],
                'href' => $this->url->link('product/product', 'product_id=' . $result['product_id'] . $url)
            );
        }
        var_dump($data['receipts']);

        $data['customer'] = [
            'firstname' => $this->customer->getFirstName(),
            'lastname' => $this->customer->getLastName(),
            'email' => $this->customer->getEmail(),
        ];

        $data['menu'] = $this->load->controller('account/menu');

        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $this->response->setOutput($this->load->view('account/receipts', $data));
    }

}
