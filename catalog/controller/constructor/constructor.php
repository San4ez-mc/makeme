<?php
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ControllerConstructorConstructor extends Controller
{
    private $error = array();

    public function index()
    {
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
            $components = $this->request->post['components'];

            $boxing = $this->model_catalog_category->getCategoryBoxing($this->request->post['cat']);

            $product_id = $this->model_catalog_component->addReceipt([
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
                'price' => (int)$this->request->post['total'],
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
                'receipt_author_id' => !empty($this->user) ? $this->user->getId() : 0,
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
                'product_filter' => [$this->request->post['filter_id']],
                'product_store' => [0],
                'product_category' => [75], // пользовательские рецепты
                'main_category_id' => 75, // пользовательские рецепты

            ], $components);

            // додаємо новий рецепт в корзину
            if ($product_id) {
                $this->load->model('catalog/product');

                $product_info = $this->model_catalog_product->getProduct($product_id);

                if ($product_info) {
                    $json = [];
                    $quantity = 1;

                    $option = array();

                    $product_options = $this->model_catalog_product->getProductOptions($product_id);

                    foreach ($product_options as $product_option) {
                        if ($product_option['required'] && empty($option[$product_option['product_option_id']])) {
                            $json['error']['option'][$product_option['product_option_id']] = sprintf($this->language->get('error_required'), $product_option['name']);
                        }
                    }

                    $recurring_id = 0;

                    $recurrings = $this->model_catalog_product->getProfiles($product_info['product_id']);

                    if ($recurrings) {
                        $recurring_ids = array();

                        foreach ($recurrings as $recurring) {
                            $recurring_ids[] = $recurring['recurring_id'];
                        }

                        if (!in_array($recurring_id, $recurring_ids)) {
                            $json['error']['recurring'] = $this->language->get('error_recurring_required');
                        }
                    }

                    if (!$json) {
                        $this->cart->add($product_id, $quantity, $option, $recurring_id);
                    }
                }
            } else {
                $this->error['save'] = $this->language->get('error_save');
            }

        } else {
            $this->error['name'] = $this->language->get('error_name');
        }

        if (!$this->error) {
            echo json_encode(['status' => 'ok']);
        } else {
            echo json_encode(['status' => 'error', 'error' => $this->error]);
        }
    }

    public function deleteAjax()
    {
        $product_id = $this->request->post['product_id'];
        if (!empty($product_id)) {
            try {
                $this->load->model('catalog/product');
                $this->model_catalog_product->deleteProduct($product_id);
            } catch (Exception $e) {
                $this->error['error'] = $e;
            }

            if (!$this->error) {
                echo json_encode(['status' => 'ok']);
            } else {
                echo json_encode(['status' => 'error', 'error' => $this->error]);
            }
        }else{
            echo json_encode(['status' => 'error', 'error' => 'no product']);
        }
    }

    public function makePublicAjax()
    {
        $product_id = $this->request->post['product_id'];
        $public = (int)$this->request->post['public'];
        if (!empty($product_id)) {
            try {
                $this->load->model('catalog/product');
                $this->model_catalog_product->editProductPublic($product_id, $public);
            } catch (Exception $e) {
                $this->error['error'] = $e;
            }

            if (!$this->error) {
                echo json_encode(['status' => 'ok']);
            } else {
                echo json_encode(['status' => 'error', 'error' => $this->error]);
            }
        }else{
            echo json_encode(['status' => 'error', 'error' => 'no product']);
        }
    }
}
