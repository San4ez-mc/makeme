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

//		$data['contact'] = $this->url->link('information/contact');
//		$data['return'] = $this->url->link('account/return/add', '', true);
//		$data['sitemap'] = $this->url->link('information/sitemap');
//		$data['tracking'] = $this->url->link('information/tracking');
//		$data['manufacturer'] = $this->url->link('product/manufacturer');
//		$data['voucher'] = $this->url->link('account/voucher', '', true);
//		$data['affiliate'] = $this->url->link('affiliate/login', '', true);
//		$data['special'] = $this->url->link('product/special');
//		$data['account'] = $this->url->link('account/account', '', true);
//		$data['order'] = $this->url->link('account/order', '', true);
//		$data['wishlist'] = $this->url->link('account/wishlist', '', true);
//		$data['newsletter'] = $this->url->link('account/newsletter', '', true);
//        $data['logged'] = $this->customer->isLogged();
//        $data['home'] = $this->url->link('common/home');

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
                'url' => $this->url->link('information/public_offer'),
                'route' => 'information/public_offer'
            ],
        ];

//        $data['constructor'] = $this->url->link('constructor/stage1');
//        $data['catalog'] = $this->url->link('product/catalog');
//        $data['components'] = $this->url->link('product/component');
//        $data['about'] = $this->url->link('information/about');

//        $data['delivery'] = $this->url->link('information/delivery');
//        $data['mmclub'] = $this->url->link('information/mmclub');
//        $data['blog'] = $this->url->link('blog/category');
//        $data['promo'] = $this->url->link('information/promo');
//        $data['public_offer'] = $this->url->link('information/public_offer');

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

        $data['scripts'] = $this->document->getScripts('footer');
        $data['styles'] = $this->document->getStyles('footer');

        if (!$this->customer->isLogged()) {
            $data['login_popup'] = $this->load->controller('account/login_popup');
            $data['register_popup'] = $this->load->controller('account/register_popup');
            $data['password_popup'] = $this->load->controller('account/reset_popup');
        }

        return $this->load->view('common/footer', $data);
    }
}
