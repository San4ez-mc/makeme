<?php
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ControllerExtensionExtensionReviews extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/extension/reviews');

		$this->load->model('setting/extension');

		$this->load->model('setting/reviews');

		$this->getList();
	}

	public function install() {
		$this->load->language('extension/extension/reviews');

		$this->load->model('setting/extension');

		$this->load->model('setting/reviews');

		if ($this->validate()) {
			$this->model_setting_extension->install('reviews', $this->request->get['extension']);

			$this->load->model('user/user_group');

			$this->model_user_user_group->addPermission($this->user->getGroupId(), 'access', 'extension/reviews/' . $this->request->get['extension']);
			$this->model_user_user_group->addPermission($this->user->getGroupId(), 'modify', 'extension/reviews/' . $this->request->get['extension']);

			// Call install method if it exsits
			$this->load->controller('extension/reviews/' . $this->request->get['extension'] . '/install');

			$this->session->data['success'] = $this->language->get('text_success');
		} else {
			$this->session->data['error'] = $this->error['warning'];
		}
	
		$this->getList();
	}

	public function uninstall() {
		$this->load->language('extension/extension/reviews');

		$this->load->model('setting/extension');

		$this->load->model('setting/reviews');

		if ($this->validate()) {
			$this->model_setting_extension->uninstall('reviews', $this->request->get['extension']);

			$this->model_setting_reviews->deletereviewssByCode($this->request->get['extension']);

			// Call uninstall method if it exsits
			$this->load->controller('extension/reviews/' . $this->request->get['extension'] . '/uninstall');

			$this->session->data['success'] = $this->language->get('text_success');
		}

		$this->getList();
	}
	
	public function add() {
		$this->load->language('extension/extension/reviews');

		$this->load->model('setting/extension');

		$this->load->model('setting/reviews');

		if ($this->validate()) {
			$this->load->language('reviews' . '/' . $this->request->get['extension']);
			
			$this->model_setting_reviews->addreviews($this->request->get['extension'], $this->language->get('heading_title'));

			$this->session->data['success'] = $this->language->get('text_success');
		}

		$this->getList();
	}

	public function delete() {
		$this->load->language('extension/extension/reviews');

		$this->load->model('setting/extension');

		$this->load->model('setting/reviews');

		if (isset($this->request->get['reviews_id']) && $this->validate()) {
			$this->model_setting_reviews->deletereviews($this->request->get['reviews_id']);

			$this->session->data['success'] = $this->language->get('text_success');
		}
		
		$this->getList();
	}

	protected function getList() {
		$data['text_layout'] = sprintf($this->language->get('text_layout'), $this->url->link('design/layout', 'user_token=' . $this->session->data['user_token'], true));
		$data['text_hide_reviewss'] = sprintf($this->language->get('text_hide_reviewss'), $this->url->link('user/user_permission', 'user_token=' . $this->session->data['user_token'], true));

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

		$extensions = $this->model_setting_extension->getInstalled('reviews');

		foreach ($extensions as $key => $value) {
			if (!is_file(DIR_APPLICATION . 'controller/extension/reviews/' . $value . '.php') && !is_file(DIR_APPLICATION . 'controller/reviews/' . $value . '.php')) {
				$this->model_setting_extension->uninstall('reviews', $value);

				unset($extensions[$key]);
				
				$this->model_setting_reviews->deletereviewssByCode($value);
			}
		}

		$data['extensions'] = array();

		// Create a new language container so we don't pollute the current one
		$language = new Language($this->config->get('config_language'));
		
		// Compatibility code for old extension folders
		$files = glob(DIR_APPLICATION . 'controller/extension/reviews/*.php');

		$this->load->model('user/user_group');
		
		$user_group_info = $this->model_user_user_group->getUserGroup($this->user->getGroupId());

		if(isset($user_group_info['permission']['hiden'])) {
			$hiden = $user_group_info['permission']['hiden'];
		} else {
			$hiden = array();
		}

		$data['hiden'] = false;

		if ($files) {
			foreach ($files as $file) {
				$extension = basename($file, '.php');
				
				
				if (!in_array('extension/reviews/' . $extension, $hiden)) {
					$this->load->language('extension/reviews/' . $extension, 'extension');
					$reviews_data = array();
					$reviewss = $this->model_setting_reviews->getreviewssByCode($extension);
					foreach ($reviewss as $reviews) {
						if ($reviews['setting']) {
							$setting_info = json_decode($reviews['setting'], true);
						} else {
							$setting_info = array();
						}
						
						$reviews_data[] = array(
						'reviews_id' => $reviews['reviews_id'],
						'name'      => $reviews['name'],
						'status'    => (isset($setting_info['status']) && $setting_info['status']) ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
						'edit'      => $this->url->link('extension/reviews/' . $extension, 'user_token=' . $this->session->data['user_token'] . '&reviews_id=' . $reviews['reviews_id'], true),
						'delete'    => $this->url->link('extension/extension/reviews/delete', 'user_token=' . $this->session->data['user_token'] . '&reviews_id=' . $reviews['reviews_id'], true)
					);
					}
					$data['extensions'][] = array(
					'name'      => $this->language->get('extension')->get('heading_title'),
					'status'    => $this->config->get('reviews_' . $extension . '_status') ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
					'reviews'    => $reviews_data,
					'install'   => $this->url->link('extension/extension/reviews/install', 'user_token=' . $this->session->data['user_token'] . '&extension=' . $extension, true),
					'uninstall' => $this->url->link('extension/extension/reviews/uninstall', 'user_token=' . $this->session->data['user_token'] . '&extension=' . $extension, true),
					'installed' => in_array($extension, $extensions),
					'edit'      => $this->url->link('extension/reviews/' . $extension, 'user_token=' . $this->session->data['user_token'], true)
				);
				} else {
					$data['hiden'] = true;
				}
			}
		}

		$sort_order = array();

		foreach ($data['extensions'] as $key => $value) {
			if($value['installed']){
				$add = '0';
			}else{
				$add = '1';
			}
				$sort_order[$key] = $add.$value['name'];
		}

		array_multisort($sort_order, SORT_ASC, $data['extensions']);

		$data['promotion'] = $this->load->controller('marketplace/promotion');

		$this->response->setOutput($this->load->view('extension/extension/reviews', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/extension/reviews')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}
