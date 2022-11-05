<?php
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ControllerAccountAccount extends Controller
{
    private $error = array();

    public function index()
    {
        if (!$this->customer->isLogged()) {
            $this->session->data['redirect'] = $this->url->link('account/account', '', true);

            $this->response->redirect($this->url->link('account/login', '', true));
        }

        $this->load->language('account/account');

        $this->document->setTitle($this->language->get('heading_title'));
        $this->document->setRobots('noindex,follow');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
            $this->load->model('account/customer');
            $this->model_account_customer->editCustomer($this->customer->getID(), $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');
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

        if (isset($this->error['telephone'])) {
            $data['error_telephone'] = $this->error['telephone'];
        } else {
            $data['error_telephone'] = '';
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_account'),
            'href' => $this->url->link('account/account', '', true)
        );

        if (isset($this->session->data['success'])) {
            $data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {
            $data['success'] = '';
        }

        $data['edit'] = $this->url->link('account/edit', '', true);
        $data['password'] = $this->url->link('account/password', '', true);
        $data['address'] = $this->url->link('account/address', '', true);

        $data['credit_cards'] = array();

        $files = glob(DIR_APPLICATION . 'controller/extension/credit_card/*.php');

        foreach ($files as $file) {
            $code = basename($file, '.php');

            if ($this->config->get('payment_' . $code . '_status') && $this->config->get('payment_' . $code . '_card')) {
                $this->load->language('extension/credit_card/' . $code, 'extension');

                $data['credit_cards'][] = array(
                    'name' => $this->language->get('extension')->get('heading_title'),
                    'href' => $this->url->link('extension/credit_card/' . $code, '', true)
                );
            }
        }

        $data['wishlist'] = $this->url->link('account/wishlist');
        $data['order'] = $this->url->link('account/order', '', true);
        $data['download'] = $this->url->link('account/download', '', true);

        if ($this->config->get('total_reward_status')) {
            $data['reward'] = $this->url->link('account/reward', '', true);
        } else {
            $data['reward'] = '';
        }

        $data['return'] = $this->url->link('account/return', '', true);
        $data['transaction'] = $this->url->link('account/transaction', '', true);
        $data['newsletter'] = $this->url->link('account/newsletter', '', true);
        $data['recurring'] = $this->url->link('account/recurring', '', true);

        $this->load->model('account/customer');

        $custom_fields = $this->model_account_customer->getCustomerCustomFields($this->customer->getID());

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

        if (isset($this->request->post['custom_field']['account']['middlename'])) {
            $data['middlename'] = $this->request->post['custom_field']['account']['middlename'];
        } elseif (!empty($custom_fields['middlename'])) {
            $data['middlename'] = $custom_fields['middlename'];
        } else {
            $data['middlename'] = '';
        }

        if (isset($this->request->post['email'])) {
            $data['email'] = $this->request->post['email'];
        } else {
            $data['email'] = $this->customer->getEmail();
        }

        if (isset($this->request->post['telephone'])) {
            $data['telephone'] = $this->request->post['telephone'];
        } else {
            $data['telephone'] = $this->customer->getTelephone();
        }

        if (isset($this->request->post['custom_field']['account']['birthdate'])) {
            $data['birthdate'] = $this->request->post['custom_field']['account']['birthdate'];
        } elseif (!empty($custom_fields['birthdate'])) {
            $data['birthdate'] = $custom_fields['birthdate'];
        } else {
            $data['birthdate'] = '';
        }

        if (isset($this->request->post['password'])) {
            $data['password'] = $this->request->post['password'];
        } else {
            $data['password'] = $this->model_account_customer->getCustomerPassword($this->customer->getID());
        }

        if (isset($this->request->post['custom_field']['account']['city'])) {
            $data['city'] = $this->request->post['custom_field']['account']['city'];
        } elseif (!empty($custom_fields['city'])) {
            $data['city'] = $custom_fields['city'];
        } else {
            $data['city'] = '';
        }

        if (isset($this->request->post['custom_field']['account']['address'])) {
            $data['address'] = $this->request->post['custom_field']['account']['address'];
        } elseif (!empty($custom_fields['address'])) {
            $data['address'] = $custom_fields['address'];
        } else {
            $data['address'] = '';
        }

        $data['menu'] = $this->load->controller('account/menu');

        $this->document->addStyle('catalog/view/theme/makeme/libs/jquery-ui-datepicker/jquery-ui.min.css');
        $this->document->addScript('catalog/view/theme/makeme/libs/jquery-ui-datepicker/jquery-ui.min.js', 'footer');

        $data['change_email'] = $this->load->controller('account/account/changeEmailForm');
        $data['change_email_success'] = $this->load->controller('account/account/changeEmailSuccessForm');
        $data['change_password'] = $this->load->controller('account/account/changePasswordForm');
        $data['change_password_success'] = $this->load->controller('account/account/changePasswordSuccessForm');
        $data['change_error'] = $this->load->controller('account/account/changeErrorForm');

//		$data['column_left'] = $this->load->controller('common/column_left');
//		$data['column_right'] = $this->load->controller('common/column_right');
//		$data['content_top'] = $this->load->controller('common/content_top');
//		$data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $this->response->setOutput($this->load->view('account/account', $data));
    }

    public function country()
    {
        $json = array();

        $this->load->model('localisation/country');

        $country_info = $this->model_localisation_country->getCountry($this->request->get['country_id']);

        if ($country_info) {
            $this->load->model('localisation/zone');

            $json = array(
                'country_id' => $country_info['country_id'],
                'name' => $country_info['name'],
                'iso_code_2' => $country_info['iso_code_2'],
                'iso_code_3' => $country_info['iso_code_3'],
                'address_format' => $country_info['address_format'],
                'postcode_required' => $country_info['postcode_required'],
                'zone' => $this->model_localisation_zone->getZonesByCountryId($this->request->get['country_id']),
                'status' => $country_info['status']
            );
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function changeEmailForm()
    {
        return $this->load->view('account/modals/change_email');
    }

    public function changeEmailSuccessForm()
    {
        return $this->load->view('account/modals/change_email_success');
    }

    public function changePasswordForm()
    {
        return $this->load->view('account/modals/change_password');
    }

    public function changePasswordSuccessForm()
    {
        return $this->load->view('account/modals/change_password_success');
    }

    public function changeErrorForm()
    {
        return $this->load->view('account/modals/change_error');
    }

    protected function validateForm()
    {
        $request = $this->request->post;
        if ((utf8_strlen($request['firstname']) < 1) || (utf8_strlen($request['lastname']) < 1)) {
            $this->error['name'] = $this->language->get('error_name');
        }

        if ((utf8_strlen($request['telephone']) !== 17)) {
            $this->error['telephone'] = $this->language->get('error_telephone');
        }

        return !$this->error;
    }

    public function changeEmailAjax()
    {
        if (!empty($this->request->post['email'])) {
            try {

                $this->load->model('account/customer');
                $customer_id = $this->customer->getID();
                $email = $this->request->post['email'];
                $this->model_account_customer->editEmail($customer_id, $email);
                $json = [
                    'status' => 'success'
                ];
            } catch (Exception $e) {
                $json = [
                    'status' => 'error',
                    'message' => $e->getMessage()
                ];
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function changePasswordAjax()
    {
        if (!empty($this->request->post['password']) && !empty($this->request->post['email'])) {
            try {
                $this->load->model('account/customer');
                $password = $this->model_account_customer->getCustomerPassword($this->customer->getID());
                if ($password !== $this->request->post['old_password']) {
                    $this->load->model('account/customer');
                    $password = $this->request->post['password'];
                    $email = $this->request->post['email'];
                    $this->model_account_customer->editPassword($email, $password);
                    $json = [
                        'status' => 'success'
                    ];
                } else {
                    $json = [
                        'status' => 'error',
                        'message' => 'wrong old password'
                    ];
                }
            } catch (Exception $e) {
                $json = [
                    'status' => 'error',
                    'message' => $e->getMessage()
                ];
            }
        } else {
            $json = [
                'status' => 'error',
                'message' => 'no data'
            ];
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function changeAvatarAjax()
    {
        if (!empty($_FILES['file'])) {
            try {
                $dir = 'image/avatar';
                if (!file_exists($dir)) {
                        mkdir($dir, 0777);
                }

                $image = $dir . '/' . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $image);

                $this->load->model('account/customer');
                $customer_id = $this->customer->getID();
                $this->model_account_customer->editImage($customer_id, $image);
                $json = [
                    'status' => 'success'
                ];
            } catch (Exception $e) {
                $json = [
                    'status' => 'error',
                    'message' => $e->getMessage()
                ];
            }
        } else {
            $json = [
                'status' => 'error',
                'message' => 'no data'
            ];
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}