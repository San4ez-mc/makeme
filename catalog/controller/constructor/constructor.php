<?php
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ControllerConstructorConstructor extends Controller
{
    private $error = array();

    public function index()
    {
        if ($this->customer->isLogged()) {
            $this->response->redirect($this->url->link('account/account', '', true));
        }

        $data = [];

        if (!empty($_GET['cat']) && !empty($_GET['subcat']) && !empty($_GET['filter_id'])) {
            $data['cat'] = $_GET['cat'];
            $data['subcat'] = $_GET['subcat'];
            $data['filter_id'] = $_GET['filter_id'];
        }
        $data['shopping_cart'] = $this->url->link('checkout/cart');

        return $this->load->view('constructor/popup', $data);
    }

    public function save()
    {
        if (!empty($this->request->post['name'])) {
            $this->load->model('catalog/category');
            $this->load->model('catalog/component');
            $components = $this->request->post['components'] || [];

            $boxing = $this->model_catalog_category->getCategoryBoxing($this->request->post['cat']);

            $result = $this->model_catalog_component->addReceipt([
                'name' => $this->request->post['name'],
                'sku' => '',
                'upc' => '',
                'ean' => '',
                'jan' => '',
                'isbn' => '',
                'mpn' => '',
                'location' => '',
                'quantity' => 1,
                'minimum' => 1,
                'subtract' => 1,
                'stock_status_id' => 7, // перевірити
                'date_available' => date('Y-m-d'),
                'manufacturer_id' => 0,
                'shipping' => 1,
                'price' => 0, // порахувати
                'points' => 0,
                'weight' => 0,
                'weight_class_id' => 1,
                'length' => 0,
                'width' => 0,
                'height' => 0,
                'length_class_id' => 1,
                'status' => 1,
                'noindex' => 1,
                'tax_class_id' => 0,
                'sort_order' => 0,
                'is_receipt' => 1,
                'receipt_author_id' => !empty($this->user) ? $this->user->getId(): 0,
                'image' => $boxing['image'],
                'product_description' => [
                    1 => [
                        'name' => $this->request->post['name'],
                        'description' => 'Рецепт созданный пользователем',
                        'tag' => '',
                        'meta_title' => '',
                        'meta_h1' => '',
                        'meta_description' => '',
                        'meta_keyword' => '',
                    ],
                    2 => [
                        'name' => 'User created recipe',
                        'description' => 'User created recipe',
                        'tag' => '',
                        'meta_title' => '',
                        'meta_h1' => '',
                        'meta_description' => '',
                        'meta_keyword' => '',
                    ]
                ],
                'product_store' => [0],
                'product_category' => [75], // пользовательские рецепты
                'main_category_id' => 75, // пользовательские рецепты

            ], $components);

            // todo додати його в корзину
        } else {
            $this->error['password'] = $this->language->get('error_password');
        }

        return !$this->error;
    }
}
