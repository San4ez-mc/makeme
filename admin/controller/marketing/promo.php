<?php

class ControllerMarketingPromo extends Controller
{
    private $error = array();

    public function index()
    {
        $this->load->language('marketing/promo');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('marketing/promo');

        $this->getList();
    }

    public function add()
    {
        $this->load->language('marketing/promo');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('marketing/promo');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
            $this->model_marketing_promo->addPromo($this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $url = '';

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }

            $this->response->redirect($this->url->link('marketing/promo', 'user_token=' . $this->session->data['user_token'] . $url, true));
        }

        $this->getForm();
    }

    public function edit()
    {
        $this->load->language('marketing/promo');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('marketing/promo');
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {

            $this->model_marketing_promo->editPromo($this->request->get['promo_id'], $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $url = '';

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }

			$this->response->redirect($this->url->link('marketing/promo', 'user_token=' . $this->session->data['user_token'] . $url, true));
        }

        $this->getForm();
    }

    public function delete()
    {
        $this->load->language('marketing/promo');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('marketing/promo');

        if (isset($this->request->post['selected']) && $this->validateDelete()) {
            foreach ($this->request->post['selected'] as $promo_id) {
                $this->model_marketing_promo->deletePromo($promo_id);
            }

            $this->session->data['success'] = $this->language->get('text_success');

            $url = '';

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['page'])) {
                $url .= '&page=' . $this->request->get['page'];
            }

            $this->response->redirect($this->url->link('marketing/promo', 'user_token=' . $this->session->data['user_token'] . $url, true));
        }

        $this->getList();
    }

    protected function getList()
    {
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

        $url = '';

        if (isset($this->request->get['sort'])) {
            $url .= '&sort=' . $this->request->get['sort'];
        }

        if (isset($this->request->get['order'])) {
            $url .= '&order=' . $this->request->get['order'];
        }

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('marketing/promo', 'user_token=' . $this->session->data['user_token'] . $url, true)
        );

        $data['add'] = $this->url->link('marketing/promo/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
        $data['delete'] = $this->url->link('marketing/promo/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

        $data['promos'] = array();

        $filter_data = array(
            'sort' => $sort,
            'order' => $order,
            'start' => ($page - 1) * $this->config->get('config_limit_admin'),
            'limit' => $this->config->get('config_limit_admin')
        );

        $promo_total = $this->model_marketing_promo->getTotalPromos();

        $results = $this->model_marketing_promo->getPromos($filter_data);

        foreach ($results as $result) {
            $data['promos'][] = array(
                'promo_id' => $result['promo_id'],
                'name' => $result['name'],
                'discount' => $result['discount'],
                'date_start' => date($this->language->get('date_format_short'), strtotime($result['date_start'])),
                'date_end' => date($this->language->get('date_format_short'), strtotime($result['date_end'])),
                'status' => ($result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled')),
                'edit' => $this->url->link('marketing/promo/edit', 'user_token=' . $this->session->data['user_token'] . '&promo_id=' . $result['promo_id'] . $url, true)
            );
        }

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->session->data['success'])) {
            $data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {
            $data['success'] = '';
        }

        if (isset($this->request->post['selected'])) {
            $data['selected'] = (array)$this->request->post['selected'];
        } else {
            $data['selected'] = array();
        }

        $url = '';

        if ($order == 'ASC') {
            $url .= '&order=DESC';
        } else {
            $url .= '&order=ASC';
        }

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }

        $data['sort_name'] = $this->url->link('marketing/promo', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, true);
        $data['sort_code'] = $this->url->link('marketing/promo', 'user_token=' . $this->session->data['user_token'] . '&sort=code' . $url, true);
        $data['sort_discount'] = $this->url->link('marketing/promo', 'user_token=' . $this->session->data['user_token'] . '&sort=discount' . $url, true);
        $data['sort_date_start'] = $this->url->link('marketing/promo', 'user_token=' . $this->session->data['user_token'] . '&sort=date_start' . $url, true);
        $data['sort_date_end'] = $this->url->link('marketing/promo', 'user_token=' . $this->session->data['user_token'] . '&sort=date_end' . $url, true);
        $data['sort_status'] = $this->url->link('marketing/promo', 'user_token=' . $this->session->data['user_token'] . '&sort=status' . $url, true);

        $url = '';

        if (isset($this->request->get['sort'])) {
            $url .= '&sort=' . $this->request->get['sort'];
        }

        if (isset($this->request->get['order'])) {
            $url .= '&order=' . $this->request->get['order'];
        }

        $pagination = new Pagination();
        $pagination->total = $promo_total;
        $pagination->page = $page;
        $pagination->limit = $this->config->get('config_limit_admin');
        $pagination->url = $this->url->link('marketing/promo', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

        $data['pagination'] = $pagination->render();

        $data['results'] = sprintf($this->language->get('text_pagination'), ($promo_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($promo_total - $this->config->get('config_limit_admin'))) ? $promo_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $promo_total, ceil($promo_total / $this->config->get('config_limit_admin')));

        $data['sort'] = $sort;
        $data['order'] = $order;

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('marketing/promo_list', $data));
    }

    protected function getForm()
    {
        $data['text_form'] = !isset($this->request->get['promo_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

        $data['user_token'] = $this->session->data['user_token'];

        if (isset($this->request->get['promo_id'])) {
            $data['promo_id'] = (int)$this->request->get['promo_id'];
        } else {
            $data['promo_id'] = 0;
        }

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['name'])) {
            $data['error_name'] = $this->error['name'];
        } else {
            $data['error_name'] = '';
        }

        if (isset($this->error['code'])) {
            $data['error_code'] = $this->error['code'];
        } else {
            $data['error_code'] = '';
        }

        if (isset($this->error['date_start'])) {
            $data['error_date_start'] = $this->error['date_start'];
        } else {
            $data['error_date_start'] = '';
        }

        if (isset($this->error['date_end'])) {
            $data['error_date_end'] = $this->error['date_end'];
        } else {
            $data['error_date_end'] = '';
        }

        $url = '';

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }

        if (isset($this->request->get['sort'])) {
            $url .= '&sort=' . $this->request->get['sort'];
        }

        if (isset($this->request->get['order'])) {
            $url .= '&order=' . $this->request->get['order'];
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('marketing/promo', 'user_token=' . $this->session->data['user_token'] . $url, true)
        );

        if (!isset($this->request->get['promo_id'])) {
            $data['action'] = $this->url->link('marketing/promo/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
        } else {
            $data['action'] = $this->url->link('marketing/promo/edit', 'user_token=' . $this->session->data['user_token'] . '&promo_id=' . $this->request->get['promo_id'] . $url, true);
        }

        $data['cancel'] = $this->url->link('marketing/promo', 'user_token=' . $this->session->data['user_token'] . $url, true);

        if (isset($this->request->get['promo_id']) && (!$this->request->server['REQUEST_METHOD'] != 'POST')) {
            $promo_info = $this->model_marketing_promo->getPromo($this->request->get['promo_id']);
        }

        if (isset($this->request->post['name'])) {
            $data['name'] = $this->request->post['name'];
        } elseif (!empty($promo_info)) {
            $data['name'] = $promo_info['name'];
        } else {
            $data['name'] = '';
        }

        if (isset($this->request->post['discount'])) {
            $data['discount'] = $this->request->post['discount'];
        } elseif (!empty($promo_info)) {
            $data['discount'] = $promo_info['discount'];
        } else {
            $data['discount'] = '';
        }

        if (isset($this->request->post['promo_product'])) {
            $products = $this->request->post['promo_product'];
        } elseif (isset($this->request->get['promo_id'])) {
            $products = $this->model_marketing_promo->getPromoProducts($this->request->get['promo_id']);
        } else {
            $products = array();
        }

        $this->load->model('catalog/product');

        $data['promo_product'] = array();

        foreach ($products as $product_id) {
            $product_info = $this->model_catalog_product->getProduct($product_id);

            if ($product_info) {
                $data['promo_product'][] = array(
                    'product_id' => $product_info['product_id'],
                    'name' => $product_info['name']
                );
            }
        }

        if (isset($this->request->post['promo_category'])) {
            $categories = $this->request->post['promo_category'];
        } elseif (isset($this->request->get['promo_id'])) {
            $categories = $this->model_marketing_promo->getPromoCategories($this->request->get['promo_id']);
        } else {
            $categories = array();
        }

        $this->load->model('catalog/category');
        $this->load->model('localisation/language');

        $data['languages'] = $this->model_localisation_language->getLanguages();

        if (isset($this->request->post['promo_description'])) {
            $data['promo_description'] = $this->request->post['promo_description'];
        } elseif (isset($this->request->get['promo_id'])) {
            $data['promo_description'] = $this->model_marketing_promo->getPromoDescriptions($this->request->get['promo_id']);
        } else {
            $data['promo_description'] = array();
        }

        $data['promo_category'] = array();

        foreach ($categories as $category_id) {
            $category_info = $this->model_catalog_category->getCategory($category_id);

            if ($category_info) {
                $data['promo_category'][] = array(
                    'category_id' => $category_info['category_id'],
                    'name' => ($category_info['path'] ? $category_info['path'] . ' &gt; ' : '') . $category_info['name']
                );
            }
        }

        // Image
        if (isset($this->request->post['image'])) {
            $data['image'] = $this->request->post['image'];
        } elseif (!empty($product_info)) {
            $data['image'] = $product_info['image'];
        } else {
            $data['image'] = '';
        }

        $this->load->model('tool/image');

        if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
            $data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
        } elseif (!empty($promo_info) && is_file(DIR_IMAGE . $promo_info['image'])) {
            $data['thumb'] = $this->model_tool_image->resize($promo_info['image'], 100, 100);
        } else {
            $data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
        }

        if (isset($this->request->post['date_start'])) {
            $data['date_start'] = $this->request->post['date_start'];
        } elseif (!empty($promo_info)) {
            $data['date_start'] = !empty($promo_info['date_start']) ? date('Y-m-d', $promo_info['date_start']) : '';
        } else {
            $data['date_start'] = date('Y-m-d', time());
        }

        if (isset($this->request->post['date_end'])) {
            $data['date_end'] = $this->request->post['date_end'];
        } elseif (!empty($promo_info)) {
            $data['date_end'] = !empty($promo_info['date_end']) ? date('Y-m-d', $promo_info['date_end']) : '';
        } else {
            $data['date_end'] = date('Y-m-d', strtotime('+1 month'));
        }

        if (isset($this->request->post['status'])) {
            $data['status'] = $this->request->post['status'];
        } elseif (!empty($promo_info)) {
            $data['status'] = $promo_info['status'];
        } else {
            $data['status'] = true;
        }

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('marketing/promo_form', $data));
    }

    protected function validateForm()
    {
        if (!$this->user->hasPermission('modify', 'marketing/promo')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 128)) {
            $this->error['name'] = $this->language->get('error_name');
        }

        return !$this->error;
    }

    protected function validateDelete()
    {
        if (!$this->user->hasPermission('modify', 'marketing/promo')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        return !$this->error;
    }

    public function history()
    {
        $this->load->language('marketing/promo');

        $this->load->model('marketing/promo');

        if (isset($this->request->get['page'])) {
            $page = (int)$this->request->get['page'];
        } else {
            $page = 1;
        }

        $data['histories'] = array();

        $results = $this->model_marketing_promo->getPromoHistories($this->request->get['promo_id'], ($page - 1) * 10, 10);

        foreach ($results as $result) {
            $data['histories'][] = array(
                'order_id' => $result['order_id'],
                'customer' => $result['customer'],
                'amount' => $result['amount'],
                'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
            );
        }

        $history_total = $this->model_marketing_promo->getTotalpromoHistories($this->request->get['promo_id']);

        $pagination = new Pagination();
        $pagination->total = $history_total;
        $pagination->page = $page;
        $pagination->limit = 10;
        $pagination->url = $this->url->link('marketing/promo/history', 'user_token=' . $this->session->data['user_token'] . '&promo_id=' . $this->request->get['promo_id'] . '&page={page}', true);

        $data['pagination'] = $pagination->render();

        $data['results'] = sprintf($this->language->get('text_pagination'), ($history_total) ? (($page - 1) * 10) + 1 : 0, ((($page - 1) * 10) > ($history_total - 10)) ? $history_total : ((($page - 1) * 10) + 10), $history_total, ceil($history_total / 10));

        $this->response->setOutput($this->load->view('marketing/promo_history', $data));
    }
}