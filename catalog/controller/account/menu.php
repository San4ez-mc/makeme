<?php

class ControllerAccountMenu extends Controller
{
    public function index()
    {
        $this->load->language('common/menu');

        $this->load->model('account/customer');
        $data['image'] = $this->model_account_customer->getCustomerImage($this->customer->getID());

        if (isset($this->request->post['firstname'])) {
            $data['firstname'] = $this->request->post['firstname'];
        } else {
            $data['firstname'] = $this->customer->getFirstName();
        }

        if (isset($this->request->post['lastname'])) {
            $data['lastname'] = $this->request->post['lastname'];
        } else {
            $data['lastname'] = $this->customer->getLastName();
        }

        if (isset($this->request->post['email'])) {
            $data['email'] = $this->request->post['email'];
        } else {
            $data['email'] = $this->customer->getEmail();
        }

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
