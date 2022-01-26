<?php

class ControllerAccountMenu extends Controller
{
    public function index()
    {
        $this->load->language('common/menu');

        $data['menu_items'] = [
            [
                'name' => 'Личная информация',
                'href' => $this->url->link('account/account')
            ],
            [
                'name' => 'MM Club',
                'href' => $this->url->link('account/mmclub')
            ],
            [
                'name' => 'Список желаний',
                'href' => $this->url->link('account/wishlist')
            ],
            [
                'name' => 'Мои адреса',
                'href' => $this->url->link('account/adress')
            ],
            [
                'name' => 'История заказов',
                'href' => $this->url->link('account/order')
            ],
            [
                'name' => 'Мои рецепты',
                'href' => $this->url->link('account/receipts')
            ]
        ];

        return $this->load->view('common/menu', $data);
    }
}
