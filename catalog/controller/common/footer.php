<?php

class ControllerCommonFooter extends Controller
{
    public function index()
    {
        $this->load->language('common/footer');

        $this->load->model('catalog/information');

        $data['informations'] = array();

        foreach ($this->model_catalog_information->getInformations() as $result) {
            if ($result['bottom']) {
                $data['informations'][] = array(
                    'title' => $result['title'],
                    'href' => $this->url->link('information/information', 'information_id=' . $result['information_id'])
                );
            }
        }

        $data['menu1'] = [
            [
                'name' => 'Конструктор',
                'url' => $this->url->link('constructor/stage1'),
                'route' => 'constructor/stage1'
            ],
            [
                'name' => 'Каталог',
                'url' => $this->url->link('product/catalog'),
                'route' => 'product/catalog'
            ],
            [
                'name' => 'Компоненты',
                'url' => $this->url->link('product/component'),
                'route' => 'product/component'
            ],
            [
                'name' => 'О нас',
                'url' => $this->url->link('information/about'),
                'route' => 'information/about'
            ],
            [
                'name' => 'Документы',
                'url' => $this->url->link('information/information&information_id=7'),
                'route' => 'information/information&information_id=7'
            ],
        ];

        $data['menu2'] = [
            [
                'name' => 'Доставка и оплата',
                'url' => $this->url->link('information/delivery'),
                'route' => 'information/delivery'
            ],
            [
                'name' => 'MM Club',
                'url' => $this->url->link('information/mmclub'),
                'route' => 'information/mmclub'
            ],
            [
                'name' => 'Акции',
                'url' => $this->url->link('information/promo'),
                'route' => 'information/promo'
            ],
            [
                'name' => 'Блог',
                'url' => $this->url->link('blog/category'),
                'route' => 'blog/category'
            ],
            [
                'name' => 'Публичная оферта',
                'url' => $this->url->link('information/information', ['information_id' => 3]),
                'route' => 'information/information'
            ],
        ];

        $data['cart'] = $this->load->controller('common/cart');

        $data['route'] = !empty($_GET['route']) ? $_GET['route'] : '';

        $host = isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1')) ? HTTPS_SERVER : HTTP_SERVER;
        if ($this->request->server['REQUEST_URI'] == '/') {
            $data['og_url'] = $this->url->link('common/home');
        } else {
            $data['og_url'] = $host . substr($this->request->server['REQUEST_URI'], 1, (strlen($this->request->server['REQUEST_URI']) - 1));
        }

        $data['powered'] = sprintf($this->language->get('text_powered'), $this->config->get('config_name'), date('Y', time()));

        // Whos Online
        if ($this->config->get('config_customer_online')) {
            $this->load->model('tool/online');

            if (isset($this->request->server['REMOTE_ADDR'])) {
                $ip = $this->request->server['REMOTE_ADDR'];
            } else {
                $ip = '';
            }

            if (isset($this->request->server['HTTP_HOST']) && isset($this->request->server['REQUEST_URI'])) {
                $url = ($this->request->server['HTTPS'] ? 'https://' : 'http://') . $this->request->server['HTTP_HOST'] . $this->request->server['REQUEST_URI'];
            } else {
                $url = '';
            }

            if (isset($this->request->server['HTTP_REFERER'])) {
                $referer = $this->request->server['HTTP_REFERER'];
            } else {
                $referer = '';
            }

            $this->model_tool_online->addOnline($ip, $this->customer->getId(), $url, $referer);
        }

        $data['address'] = $this->config->get('config_address');
        $data['year'] = date('Y');
        $data['worktime'] = $this->config->get('config_open');
        $data['phone'] = $this->config->get('config_telephone');

        $data['scripts'] = $this->document->getScripts('footer');
        $data['styles'] = $this->document->getStyles('footer');

        $this->load->model('tool/image');

        $data['socials'] = [
            [
                'link' => $this->config->get('config_social_link_1'),
                'type'=> !empty($this->config->get('config_image_social_1')) ? 'image' : 'icon',
                'image'=> $this->model_tool_image->resize($this->config->get('config_image_social_1'), 24, 24),
                'icon'=> $this->config->get('config_social_icon_1')
            ],
            [
                'link' => $this->config->get('config_social_link_2'),
                'type'=> !empty($this->config->get('config_image_social_2')) ? 'image' : 'icon',
                'image'=> $this->model_tool_image->resize($this->config->get('config_image_social_2'), 24, 24),
                'icon'=> $this->config->get('config_social_icon_2')
            ],
            [
                'link' => $this->config->get('config_social_link_3'),
                'type'=> !empty($this->config->get('config_image_social_3')) ? 'image' : 'icon',
                'image'=> $this->model_tool_image->resize($this->config->get('config_image_social_3'), 24, 24),
                'icon'=> $this->config->get('config_social_icon_3')
            ]
        ];

        if (!$this->customer->isLogged()) {
            $data['login_popup'] = $this->load->controller('account/login_popup');
            $data['register_popup'] = $this->load->controller('account/register_popup');
            $data['password_popup'] = $this->load->controller('account/reset_popup');
        }

        return $this->load->view('common/footer', $data);
    }
}
