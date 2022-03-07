<?php

class ControllerAccountMenu extends Controller
{
    public function index()
    {
        $this->load->language('common/menu');

        $data['menu_items'] = [
            [
                'name' => 'Личная информация',
                'href' => $this->url->link('account/account'),
                'icon' => 'lk__menu-el--info'
            ],
            [
                'name' => 'MM Club',
                'href' => $this->url->link('account/mmclub'),
                'icon' => 'lk__menu-el--club'
            ],
            [
                'name' => 'Список желаний',
                'href' => $this->url->link('account/wishlist'),
                'icon' => 'lk__menu-el--desires'
            ],
            [
                'name' => 'Мои адреса',
                'href' => $this->url->link('account/address'),
                'icon' => 'lk__menu-el--address'
            ],
            [
                'name' => 'История заказов',
                'href' => $this->url->link('account/order'),
                'icon' => 'lk__menu-el--history'
            ],
            [
                'name' => 'Мои рецепты',
                'href' => $this->url->link('account/receipts'),
                'icon' => 'lk__menu-el--recipes'
            ],
            [
                'name' => 'Выход',
                'href' => $this->url->link('account/logout'),
                'icon' => 'lk__menu-el--exit'
            ]
        ];

        return $this->load->view('account/menu', $data);
    }
}
