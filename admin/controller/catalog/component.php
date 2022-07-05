<?php
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ControllerCatalogComponent extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('catalog/component');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/component');

		$this->getList();
	}

	public function add() {
		$this->load->language('catalog/component');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/component');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_component->addcomponent($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_model'])) {
				$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_price'])) {
				$url .= '&filter_price=' . $this->request->get['filter_price'];
			}
			
			if (isset($this->request->get['filter_price_min'])) {
				$url .= '&filter_price_min=' . $this->request->get['filter_price_min'];
			}
			
			if (isset($this->request->get['filter_price_max'])) {
				$url .= '&filter_price_max=' . $this->request->get['filter_price_max'];
			}

			if (isset($this->request->get['filter_quantity'])) {
				$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
			}
			
			if (isset($this->request->get['filter_quantity_min'])) {
				$url .= '&filter_quantity_min=' . $this->request->get['filter_quantity_min'];
			}
			
			if (isset($this->request->get['filter_quantity_max'])) {
				$url .= '&filter_quantity_max=' . $this->request->get['filter_quantity_max'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}
			
			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
				if (isset($this->request->get['filter_sub_category'])) {
					$url .= '&filter_sub_category';
				}
			}
			
			if (isset($this->request->get['filter_manufacturer_id'])) {
				$url .= '&filter_manufacturer_id=' . $this->request->get['filter_manufacturer_id'];
			}
			
			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('catalog/component');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/component');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_component->editcomponent($this->request->get['component_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_model'])) {
				$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_price'])) {
				$url .= '&filter_price=' . $this->request->get['filter_price'];
			}
			
			if (isset($this->request->get['filter_price_min'])) {
				$url .= '&filter_price_min=' . $this->request->get['filter_price_min'];
			}
			
			if (isset($this->request->get['filter_price_max'])) {
				$url .= '&filter_price_max=' . $this->request->get['filter_price_max'];
			}

			if (isset($this->request->get['filter_quantity'])) {
				$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
			}
			
			if (isset($this->request->get['filter_quantity'])) {
				$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
			}
			
			if (isset($this->request->get['filter_quantity_min'])) {
				$url .= '&filter_quantity_min=' . $this->request->get['filter_quantity_min'];
			}
			
			if (isset($this->request->get['filter_quantity_max'])) {
				$url .= '&filter_quantity_max=' . $this->request->get['filter_quantity_max'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}
			
			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}
			
			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
				if (isset($this->request->get['filter_sub_category'])) {
					$url .= '&filter_sub_category';
				}
			}
			
			if (isset($this->request->get['filter_manufacturer_id'])) {
				$url .= '&filter_manufacturer_id=' . $this->request->get['filter_manufacturer_id'];
			}
			
			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('catalog/component');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/component');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $component_id) {
				$this->model_catalog_component->deletecomponent($component_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_model'])) {
				$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_price'])) {
				$url .= '&filter_price=' . $this->request->get['filter_price'];
			}
			
			if (isset($this->request->get['filter_price_min'])) {
				$url .= '&filter_price_min=' . $this->request->get['filter_price_min'];
			}
			
			if (isset($this->request->get['filter_price_max'])) {
				$url .= '&filter_price_max=' . $this->request->get['filter_price_max'];
			}

			if (isset($this->request->get['filter_quantity'])) {
				$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
			}
			
			if (isset($this->request->get['filter_quantity_min'])) {
				$url .= '&filter_quantity_min=' . $this->request->get['filter_quantity_min'];
			}
			
			if (isset($this->request->get['filter_quantity_max'])) {
				$url .= '&filter_quantity_max=' . $this->request->get['filter_quantity_max'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}
			
			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
				if (isset($this->request->get['filter_sub_category'])) {
					$url .= '&filter_sub_category';
				}
			}
			
			if (isset($this->request->get['filter_manufacturer_id'])) {
				$url .= '&filter_manufacturer_id=' . $this->request->get['filter_manufacturer_id'];
			}
			
			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getList();
	}

	public function copy() {
		$this->load->language('catalog/component');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/component');

		if (isset($this->request->post['selected']) && $this->validateCopy()) {
			foreach ($this->request->post['selected'] as $component_id) {
				$this->model_catalog_component->copycomponent($component_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_model'])) {
				$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_price'])) {
				$url .= '&filter_price=' . $this->request->get['filter_price'];
			}
			
			if (isset($this->request->get['filter_price_min'])) {
				$url .= '&filter_price_min=' . $this->request->get['filter_price_min'];
			}
			
			if (isset($this->request->get['filter_price_max'])) {
				$url .= '&filter_price_max=' . $this->request->get['filter_price_max'];
			}

			if (isset($this->request->get['filter_quantity'])) {
				$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
			}
			
			if (isset($this->request->get['filter_quantity_min'])) {
				$url .= '&filter_quantity_min=' . $this->request->get['filter_quantity_min'];
			}
			
			if (isset($this->request->get['filter_quantity_max'])) {
				$url .= '&filter_quantity_max=' . $this->request->get['filter_quantity_max'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}
			
			if (isset($this->request->get['filter_category'])) {
				$url .= '&filter_category=' . $this->request->get['filter_category'];
				if (isset($this->request->get['filter_sub_category'])) {
					$url .= '&filter_sub_category';
				}
			}
			
			if (isset($this->request->get['filter_manufacturer_id'])) {
				$url .= '&filter_manufacturer_id=' . $this->request->get['filter_manufacturer_id'];
			}
			
			if (isset($this->request->get['filter_noindex'])) {
				$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getList();
	}

	protected function getList() {
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = '';
		}

		if (isset($this->request->get['filter_model'])) {
			$filter_model = $this->request->get['filter_model'];
		} else {
			$filter_model = '';
		}

		if (isset($this->request->get['filter_price'])) {
			$filter_price = $this->request->get['filter_price'];
		} else {
			$filter_price = '';
		}

		if (isset($this->request->get['filter_price_min'])) {
			$filter_price_min = $this->request->get['filter_price_min'];
		} else {
			$filter_price_min = null;
		}

		if (isset($this->request->get['filter_price_max'])) {
			$filter_price_max = $this->request->get['filter_price_max'];
		} else {
			$filter_price_max = null;
		}

		if (isset($this->request->get['filter_quantity'])) {
			$filter_quantity = $this->request->get['filter_quantity'];
		} else {
			$filter_quantity = '';
		}

		if (isset($this->request->get['filter_quantity_min'])) {
			$filter_quantity_min = $this->request->get['filter_quantity_min'];
		} else {
			$filter_quantity_min = null;
		}

		if (isset($this->request->get['filter_quantity_max'])) {
			$filter_quantity_max = $this->request->get['filter_quantity_max'];
		} else {
			$filter_quantity_max = null;
		}

		if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = '';
		}
		
		$filter_sub_category = null;
		if (isset($this->request->get['filter_category'])) {
			$filter_category = $this->request->get['filter_category'];
			if (!empty($filter_category) && isset($this->request->get['filter_sub_category'])) {
				$filter_sub_category = true;
			} elseif (isset($this->request->get['filter_sub_category'])) {
				unset($this->request->get['filter_sub_category']);
			}
		} else {
			$filter_category = null;
			if (isset($this->request->get['filter_sub_category'])) {
				unset($this->request->get['filter_sub_category']);
			}
		}

		$filter_category_name = null;
		if (isset($filter_category)) {
			if ($filter_category>0) {
				$this->load->model('catalog/category');



				$category = $this->model_catalog_component_category->getCategory($filter_category);
				if ($category) {
					$filter_category_name = ($category['path']) ? $category['path'] . ' &gt; ' . $category['name'] : $category['name'];
				} else {
					$filter_category = null;
					unset($this->request->get['filter_category']);
					$filter_sub_category = null;
					if (isset($this->request->get['filter_sub_category'])) {
						unset($this->request->get['filter_sub_category']);
					}
				}
			} else {
				$filter_category_name = $this->language->get('text_none_category');
			}
		}

		$filter_manufacturer_id = null;
		$filter_manufacturer_name = '';
		if (isset($this->request->get['filter_manufacturer_id'])) {
			$filter_manufacturer_id = (int)$this->request->get['filter_manufacturer_id'];
			if($filter_manufacturer_id > 0) {
				$this->load->model('catalog/manufacturer');
				$manufacturer = $this->model_catalog_manufacturer->getManufacturer($filter_manufacturer_id);
				if ($manufacturer) {
					$filter_manufacturer_name = $manufacturer['name'];
				} else {
					$filter_manufacturer_name = null;
					unset($this->request->get['filter_manufacturer_id']);
				}
			} else {
				$filter_manufacturer_id = 0;
				$filter_manufacturer_name =  $this->language->get('text_none_manufacturer');
			}
		}


		$filter_manufacturer_name = null;
		if (isset($filter_manufacturer)) {
			if ($filter_manufacturer>0) {
				$this->load->model('catalog/manufacturer');
				$manufacturer = $this->model_catalog_manufacturer->getManufacturer($filter_manufacturer);
				if ($manufacturer) {
					$filter_manufacturer_name = $manufacturer['name'];
				} else {
					$filter_manufacturer = null;
					unset($this->request->get['filter_manufacturer']);
				}
			} elseif ($filter_manufacturer==0) {
				$filter_manufacturer_name = $this->language->get('text_none_manufacturer');
			}
		}

		
		if (isset($this->request->get['filter_noindex'])) {
			$filter_noindex = $this->request->get['filter_noindex'];
		} else {
			$filter_noindex = '';
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'pd.name';
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

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}
		
		if (isset($this->request->get['filter_price_min'])) {
			$url .= '&filter_price_min=' . $this->request->get['filter_price_min'];
		}
		
		if (isset($this->request->get['filter_price_max'])) {
			$url .= '&filter_price_max=' . $this->request->get['filter_price_max'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}
		
		if (isset($this->request->get['filter_quantity_min'])) {
			$url .= '&filter_quantity_min=' . $this->request->get['filter_quantity_min'];
		}
		
		if (isset($this->request->get['filter_quantity_max'])) {
			$url .= '&filter_quantity_max=' . $this->request->get['filter_quantity_max'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}
		
		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . $this->request->get['filter_category'];
			if (isset($this->request->get['filter_sub_category'])) {
				$url .= '&filter_sub_category';
			}
		}
		
		
		if (isset($this->request->get['filter_manufacturer_id'])) {
			$url .= '&filter_manufacturer_id=' . $this->request->get['filter_manufacturer_id'];
		}
		
		if (isset($this->request->get['filter_noindex'])) {
			$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
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
			'href' => $this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		$data['add'] = $this->url->link('catalog/component/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['copy'] = $this->url->link('catalog/component/copy', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('catalog/component/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['enabled'] = $this->url->link('catalog/component/enable', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['disabled'] = $this->url->link('catalog/component/disable', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['components'] = array();

		$filter_data = array(
			'filter_name'	  => $filter_name,
			'filter_model'	  => $filter_model,
			'filter_price'	  => $filter_price,
			'filter_price_min'=> $filter_price_min,
			'filter_price_max'=> $filter_price_max,
			'filter_quantity' => $filter_quantity,
			'filter_quantity_min' 	=> $filter_quantity_min,
			'filter_quantity_max' 	=> $filter_quantity_max,
			'filter_status'   		=> $filter_status,
			'filter_category'		=> $filter_category,
			'filter_sub_category'	=> $filter_sub_category,
			'filter_manufacturer_id'=> $filter_manufacturer_id,
			'filter_noindex' 		=> $filter_noindex,
			'sort'            		=> $sort,
			'order'           		=> $order,
			'start'           		=> ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'           		=> $this->config->get('config_limit_admin')
		);


		$this->load->model('tool/image');

		$component_total = $this->model_catalog_component->getTotalComponents($filter_data);

		$results = $this->model_catalog_component->getComponents($filter_data);

		foreach ($results as $result) {
			if (is_file(DIR_IMAGE . $result['image'])) {
				$image = $this->model_tool_image->resize($result['image'], 40, 40);
			} else {
				$image = $this->model_tool_image->resize('no_image.png', 40, 40);
			}

			$special = false;

			$component_specials = $this->model_catalog_component->getComponentSpecials($result['component_id']);

			foreach ($component_specials  as $component_special) {
				if (($component_special['date_start'] == '0000-00-00' || strtotime($component_special['date_start']) < time()) && ($component_special['date_end'] == '0000-00-00' || strtotime($component_special['date_end']) > time())) {
					$special = $this->currency->format($component_special['price'], $this->config->get('config_currency'));

					break;
				}
			}

			$data['components'][] = array(
				'component_id' => $result['component_id'],
				'image'      => $image,
				'name'       => $result['name'],
				'model'      => $result['model'],
				'price'      => $this->currency->format($result['price'], $this->config->get('config_currency')),
				'special'    => $special,
				'quantity'   => $result['quantity'],
				'status'     => $result['status'] ? $this->language->get('text_enabled_short') : $this->language->get('text_disabled_short'),
				'noindex'    => $result['noindex'] ? $this->language->get('text_enabled_short') : $this->language->get('text_disabled_short'),
				'href_shop'  => HTTP_CATALOG . 'index.php?route=component/component&component_id=' . $result['component_id'],
				'edit'       => $this->url->link('catalog/component/edit', 'user_token=' . $this->session->data['user_token'] . '&component_id=' . $result['component_id'] . $url, true)
			);
		}

		$data['user_token'] = $this->session->data['user_token'];

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

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}
		
		if (isset($this->request->get['filter_price_min'])) {
			$url .= '&filter_price_min=' . $this->request->get['filter_price_min'];
		}
		
		if (isset($this->request->get['filter_price_max'])) {
			$url .= '&filter_price_max=' . $this->request->get['filter_price_max'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}
		
		if (isset($this->request->get['filter_quantity_min'])) {
			$url .= '&filter_quantity_min=' . $this->request->get['filter_quantity_min'];
		}
		
		if (isset($this->request->get['filter_quantity_max'])) {
			$url .= '&filter_quantity_max=' . $this->request->get['filter_quantity_max'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}
		
		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . $this->request->get['filter_category'];
			if (isset($this->request->get['filter_sub_category'])) {
				$url .= '&filter_sub_category';
			}
		}
		
		if (isset($this->request->get['filter_manufacturer_id'])) {
			$url .= '&filter_manufacturer_id=' . $this->request->get['filter_manufacturer_id'];
		}
		
		if (isset($this->request->get['filter_noindex'])) {
			$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . '&sort=pd.name' . $url, true);
		$data['sort_model'] = $this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . '&sort=p.model' . $url, true);
		$data['sort_price'] = $this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . '&sort=p.price' . $url, true);
		$data['sort_quantity'] = $this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . '&sort=p.quantity' . $url, true);
		$data['sort_status'] = $this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . '&sort=p.status' . $url, true);
		$data['sort_noindex'] = $this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . '&sort=p.noindex' . $url, true);
		$data['sort_order'] = $this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . '&sort=p.sort_order' . $url, true);

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}
		
		if (isset($this->request->get['filter_price_min'])) {
			$url .= '&filter_price_min=' . $this->request->get['filter_price_min'];
		}
		
		if (isset($this->request->get['filter_price_max'])) {
			$url .= '&filter_price_max=' . $this->request->get['filter_price_max'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}
		
		if (isset($this->request->get['filter_quantity_min'])) {
			$url .= '&filter_quantity_min=' . $this->request->get['filter_quantity_min'];
		}
		
		if (isset($this->request->get['filter_quantity_max'])) {
			$url .= '&filter_quantity_max=' . $this->request->get['filter_quantity_max'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}
		
		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . $this->request->get['filter_category'];
			if (isset($this->request->get['filter_sub_category'])) {
				$url .= '&filter_sub_category';
			}
		}
		
		if (isset($this->request->get['filter_manufacturer_id'])) {
			$url .= '&filter_manufacturer_id=' . $this->request->get['filter_manufacturer_id'];
		}
		
		if (isset($this->request->get['filter_noindex'])) {
			$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $component_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($component_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($component_total - $this->config->get('config_limit_admin'))) ? $component_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $component_total, ceil($component_total / $this->config->get('config_limit_admin')));

		$data['filter_name'] = $filter_name;
//		$data['filter_model'] = $filter_model;
//		$data['filter_price'] = $filter_price;
//		$data['filter_price_min'] = $filter_price_min;
//		$data['filter_price_max'] = $filter_price_max;
//		$data['filter_quantity'] = $filter_quantity;
//		$data['filter_quantity_min'] = $filter_quantity_min;
//		$data['filter_quantity_max'] = $filter_quantity_max;
//		$data['filter_status'] = $filter_status;
//		$data['filter_category_name'] = $filter_category_name;
//		$data['filter_category'] = $filter_category;
//		$data['filter_sub_category'] = $filter_sub_category;
//		$data['filter_manufacturer_name'] = $filter_manufacturer_name;
//		$data['filter_manufacturer_id'] = $filter_manufacturer_id;
		$data['filter_noindex'] = $filter_noindex;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/component_list', $data));
	}

	protected function getForm() {
		$data['text_form'] = !isset($this->request->get['component_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = array();
		}

		if (isset($this->error['meta_title'])) {
			$data['error_meta_title'] = $this->error['meta_title'];
		} else {
			$data['error_meta_title'] = array();
		}
		
		if (isset($this->error['meta_h1'])) {
			$data['error_meta_h1'] = $this->error['meta_h1'];
		} else {
			$data['error_meta_h1'] = array();
		}

		if (isset($this->error['model'])) {
			$data['error_model'] = $this->error['model'];
		} else {
			$data['error_model'] = '';
		}

		if (isset($this->error['keyword'])) {
			$data['error_keyword'] = $this->error['keyword'];
		} else {
			$data['error_keyword'] = '';
		}

		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}
		
		if (isset($this->request->get['filter_price_min'])) {
			$url .= '&filter_price_min=' . $this->request->get['filter_price_min'];
		}
		
		if (isset($this->request->get['filter_price_max'])) {
			$url .= '&filter_price_max=' . $this->request->get['filter_price_max'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}
		
		if (isset($this->request->get['filter_quantity_min'])) {
			$url .= '&filter_quantity_min=' . $this->request->get['filter_quantity_min'];
		}
		
		if (isset($this->request->get['filter_quantity_max'])) {
			$url .= '&filter_quantity_max=' . $this->request->get['filter_quantity_max'];
		}

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}
		
		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}
		
		if (isset($this->request->get['filter_category'])) {
			$url .= '&filter_category=' . $this->request->get['filter_category'];
			if (isset($this->request->get['filter_sub_category'])) {
				$url .= '&filter_sub_category';
			}
		}
		
		if (isset($this->request->get['filter_manufacturer_id'])) {
			$url .= '&filter_manufacturer_id=' . $this->request->get['filter_manufacturer_id'];
		}
		
		if (isset($this->request->get['filter_noindex'])) {
			$url .= '&filter_noindex=' . $this->request->get['filter_noindex'];
		}

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
			'href' => $this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		if (!isset($this->request->get['component_id'])) {
			$data['action'] = $this->url->link('catalog/component/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('catalog/component/edit', 'user_token=' . $this->session->data['user_token'] . '&component_id=' . $this->request->get['component_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . $url, true);

		if (isset($this->request->get['component_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$component_info = $this->model_catalog_component->getComponent($this->request->get['component_id']);
		}

		$data['user_token'] = $this->session->data['user_token'];

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['component_description'])) {
			$data['component_description'] = $this->request->post['component_description'];
		} elseif (isset($this->request->get['component_id'])) {
			$data['component_description'] = $this->model_catalog_component->getComponentDescriptions($this->request->get['component_id']);
		} else {
			$data['component_description'] = array();
		}
		
		$language_id = $this->config->get('config_language_id');
		if (isset($data['component_description'][$language_id]['name'])) {
			$data['heading_title'] = $data['component_description'][$language_id]['name'];
		}

		if (isset($this->request->post['model'])) {
			$data['model'] = $this->request->post['model'];
		} elseif (!empty($component_info)) {
			$data['model'] = $component_info['model'];
		} else {
			$data['model'] = '';
		}

		if (isset($this->request->post['sku'])) {
			$data['sku'] = $this->request->post['sku'];
		} elseif (!empty($component_info)) {
			$data['sku'] = $component_info['sku'];
		} else {
			$data['sku'] = '';
		}

		if (isset($this->request->post['upc'])) {
			$data['upc'] = $this->request->post['upc'];
		} elseif (!empty($component_info)) {
			$data['upc'] = $component_info['upc'];
		} else {
			$data['upc'] = '';
		}

		if (isset($this->request->post['ean'])) {
			$data['ean'] = $this->request->post['ean'];
		} elseif (!empty($component_info)) {
			$data['ean'] = $component_info['ean'];
		} else {
			$data['ean'] = '';
		}

		if (isset($this->request->post['jan'])) {
			$data['jan'] = $this->request->post['jan'];
		} elseif (!empty($component_info)) {
			$data['jan'] = $component_info['jan'];
		} else {
			$data['jan'] = '';
		}

		if (isset($this->request->post['isbn'])) {
			$data['isbn'] = $this->request->post['isbn'];
		} elseif (!empty($component_info)) {
			$data['isbn'] = $component_info['isbn'];
		} else {
			$data['isbn'] = '';
		}

		if (isset($this->request->post['mpn'])) {
			$data['mpn'] = $this->request->post['mpn'];
		} elseif (!empty($component_info)) {
			$data['mpn'] = $component_info['mpn'];
		} else {
			$data['mpn'] = '';
		}

		if (isset($this->request->post['location'])) {
			$data['location'] = $this->request->post['location'];
		} elseif (!empty($component_info)) {
			$data['location'] = $component_info['location'];
		} else {
			$data['location'] = '';
		}

		$this->load->model('setting/store');

		$data['stores'] = array();

		$data['stores'][] = array(
			'store_id' => 0,
			'name'     => $this->language->get('text_default')
		);

		$stores = $this->model_setting_store->getStores();

		foreach ($stores as $store) {
			$data['stores'][] = array(
				'store_id' => $store['store_id'],
				'name'     => $store['name']
			);
		}

		if (isset($this->request->post['component_store'])) {
			$data['component_store'] = $this->request->post['component_store'];
		} elseif (isset($this->request->get['component_id'])) {
			$data['component_store'] = $this->model_catalog_component->getComponentStores($this->request->get['component_id']);
		} else {
			$data['component_store'] = array(0);
		}

		if (isset($this->request->post['shipping'])) {
			$data['shipping'] = $this->request->post['shipping'];
		} elseif (!empty($component_info)) {
			$data['shipping'] = $component_info['shipping'];
		} else {
			$data['shipping'] = 1;
		}

		if (isset($this->request->post['price'])) {
			$data['price'] = $this->request->post['price'];
		} elseif (!empty($component_info)) {
			$data['price'] = $component_info['price'];
		} else {
			$data['price'] = '';
		}

		$this->load->model('catalog/recurring');

		$data['recurrings'] = $this->model_catalog_recurring->getRecurrings();

		if (isset($this->request->post['component_recurrings'])) {
			$data['component_recurrings'] = $this->request->post['component_recurrings'];
		} elseif (!empty($component_info)) {
			$data['component_recurrings'] = $this->model_catalog_component->getRecurrings($component_info['component_id']);
		} else {
			$data['component_recurrings'] = array();
		}

		$this->load->model('localisation/tax_class');

		$data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();

		if (isset($this->request->post['tax_class_id'])) {
			$data['tax_class_id'] = $this->request->post['tax_class_id'];
		} elseif (!empty($component_info)) {
			$data['tax_class_id'] = $component_info['tax_class_id'];
		} else {
			$data['tax_class_id'] = 0;
		}

		if (isset($this->request->post['date_available'])) {
			$data['date_available'] = $this->request->post['date_available'];
		} elseif (!empty($component_info)) {
			$data['date_available'] = ($component_info['date_available'] != '0000-00-00') ? $component_info['date_available'] : '';
		} else {
			$data['date_available'] = date('Y-m-d');
		}

		if (isset($this->request->post['quantity'])) {
			$data['quantity'] = $this->request->post['quantity'];
		} elseif (!empty($component_info)) {
			$data['quantity'] = $component_info['quantity'];
		} else {
			$data['quantity'] = 1;
		}

		if (isset($this->request->post['minimum'])) {
			$data['minimum'] = $this->request->post['minimum'];
		} elseif (!empty($component_info)) {
			$data['minimum'] = $component_info['minimum'];
		} else {
			$data['minimum'] = 1;
		}

		if (isset($this->request->post['subtract'])) {
			$data['subtract'] = $this->request->post['subtract'];
		} elseif (!empty($component_info)) {
			$data['subtract'] = $component_info['subtract'];
		} else {
			$data['subtract'] = 1;
		}

		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($component_info)) {
			$data['sort_order'] = $component_info['sort_order'];
		} else {
			$data['sort_order'] = 1;
		}

		$this->load->model('localisation/stock_status');

		$data['stock_statuses'] = $this->model_localisation_stock_status->getStockStatuses();

		if (isset($this->request->post['stock_status_id'])) {
			$data['stock_status_id'] = $this->request->post['stock_status_id'];
		} elseif (!empty($component_info)) {
			$data['stock_status_id'] = $component_info['stock_status_id'];
		} else {
			$data['stock_status_id'] = 0;
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($component_info)) {
			$data['status'] = $component_info['status'];
		} else {
			$data['status'] = true;
		}
		
		if (isset($this->request->post['noindex'])) {
			$data['noindex'] = $this->request->post['noindex'];
		} elseif (!empty($component_info)) {
			$data['noindex'] = $component_info['noindex'];
		} else {
			$data['noindex'] = 1;
		}

		if (isset($this->request->post['weight'])) {
			$data['weight'] = $this->request->post['weight'];
		} elseif (!empty($component_info)) {
			$data['weight'] = $component_info['weight'];
		} else {
			$data['weight'] = '';
		}

		$this->load->model('localisation/weight_class');

		$data['weight_classes'] = $this->model_localisation_weight_class->getWeightClasses();

		if (isset($this->request->post['weight_class_id'])) {
			$data['weight_class_id'] = $this->request->post['weight_class_id'];
		} elseif (!empty($component_info)) {
			$data['weight_class_id'] = $component_info['weight_class_id'];
		} else {
			$data['weight_class_id'] = $this->config->get('config_weight_class_id');
		}

		if (isset($this->request->post['length'])) {
			$data['length'] = $this->request->post['length'];
		} elseif (!empty($component_info)) {
			$data['length'] = $component_info['length'];
		} else {
			$data['length'] = '';
		}

		if (isset($this->request->post['width'])) {
			$data['width'] = $this->request->post['width'];
		} elseif (!empty($component_info)) {
			$data['width'] = $component_info['width'];
		} else {
			$data['width'] = '';
		}

		if (isset($this->request->post['height'])) {
			$data['height'] = $this->request->post['height'];
		} elseif (!empty($component_info)) {
			$data['height'] = $component_info['height'];
		} else {
			$data['height'] = '';
		}

		$this->load->model('localisation/length_class');

		$data['length_classes'] = $this->model_localisation_length_class->getLengthClasses();

		if (isset($this->request->post['length_class_id'])) {
			$data['length_class_id'] = $this->request->post['length_class_id'];
		} elseif (!empty($component_info)) {
			$data['length_class_id'] = $component_info['length_class_id'];
		} else {
			$data['length_class_id'] = $this->config->get('config_length_class_id');
		}

		$this->load->model('catalog/manufacturer');

		if (isset($this->request->post['manufacturer_id'])) {
			$data['manufacturer_id'] = $this->request->post['manufacturer_id'];
		} elseif (!empty($component_info)) {
			$data['manufacturer_id'] = $component_info['manufacturer_id'];
		} else {
			$data['manufacturer_id'] = 0;
		}

		if (isset($this->request->post['manufacturer'])) {
			$data['manufacturer'] = $this->request->post['manufacturer'];
		} elseif (!empty($component_info)) {
			$manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($component_info['manufacturer_id']);

			if ($manufacturer_info) {
				$data['manufacturer'] = $manufacturer_info['name'];
			} else {
				$data['manufacturer'] = '';
			}
		} else {
			$data['manufacturer'] = '';
		}

		// Categories
		$this->load->model('catalog/component_category');
		
		$data['categories'] = $this->model_catalog_component_category->getAllCategories();
		
		if (isset($this->request->post['main_category_id'])) {
			$data['main_category_id'] = $this->request->post['main_category_id'];
				} elseif (isset($component_info)) {
			$data['main_category_id'] = $this->model_catalog_component->getComponentMainCategoryId($this->request->get['component_id']);
				} else {
			$data['main_category_id'] = 0;
		}			

		if (isset($this->request->post['component_category'])) {
			$categories = $this->request->post['component_category'];
		} elseif (isset($this->request->get['component_id'])) {
			$categories = $this->model_catalog_component->getComponentCategories($this->request->get['component_id']);
		} else {
			$categories = array();
		}

		$data['component_categories'] = array();

		foreach ($categories as $category_id) {
			$category_info = $this->model_catalog_component_category->getCategory($category_id);

			if ($category_info) {
				$data['component_categories'][] = array(
					'category_id' => $category_info['category_id'],
					'name'        => ($category_info['path']) ? $category_info['path'] . ' &gt; ' . $category_info['name'] : $category_info['name']
				);
			}
		}

		// Filters
		$this->load->model('catalog/filter');

		if (isset($this->request->post['component_filter'])) {
			$filters = $this->request->post['component_filter'];
		} elseif (isset($this->request->get['component_id'])) {
			$filters = $this->model_catalog_component->getComponentFilters($this->request->get['component_id']);
		} else {
			$filters = array();
		}

		$data['component_filters'] = array();

		foreach ($filters as $filter_id) {
			$filter_info = $this->model_catalog_filter->getFilter($filter_id);

			if ($filter_info) {
				$data['component_filters'][] = array(
					'filter_id' => $filter_info['filter_id'],
					'name'      => $filter_info['group'] . ' &gt; ' . $filter_info['name']
				);
			}
		}

		// Attributes
		$this->load->model('catalog/attribute');

		if (isset($this->request->post['component_attribute'])) {
			$component_attributes = $this->request->post['component_attribute'];
		} elseif (isset($this->request->get['component_id'])) {
			$component_attributes = $this->model_catalog_component->getComponentAttributes($this->request->get['component_id']);
		} else {
			$component_attributes = array();
		}

		$data['component_attributes'] = array();

		foreach ($component_attributes as $component_attribute) {
			$attribute_info = $this->model_catalog_attribute->getAttribute($component_attribute['attribute_id']);

			if ($attribute_info) {
				$data['component_attributes'][] = array(
					'attribute_id'                  => $component_attribute['attribute_id'],
					'name'                          => $attribute_info['name'],
					'component_attribute_description' => $component_attribute['component_attribute_description']
				);
			}
		}

		// Options
		$this->load->model('catalog/option');

		if (isset($this->request->post['component_option'])) {
			$component_options = $this->request->post['component_option'];
		} elseif (isset($this->request->get['component_id'])) {
			$component_options = $this->model_catalog_component->getComponentOptions($this->request->get['component_id']);
		} else {
			$component_options = array();
		}

		$data['component_options'] = array();

		foreach ($component_options as $component_option) {
			$component_option_value_data = array();

			if (isset($component_option['component_option_value'])) {
				foreach ($component_option['component_option_value'] as $component_option_value) {
					$component_option_value_data[] = array(
						'component_option_value_id' => $component_option_value['component_option_value_id'],
						'option_value_id'         => $component_option_value['option_value_id'],
						'quantity'                => $component_option_value['quantity'],
						'subtract'                => $component_option_value['subtract'],
						'price'                   => $component_option_value['price'],
						'price_prefix'            => $component_option_value['price_prefix'],
						'points'                  => $component_option_value['points'],
						'points_prefix'           => $component_option_value['points_prefix'],
						'weight'                  => $component_option_value['weight'],
						'weight_prefix'           => $component_option_value['weight_prefix']
					);
				}
			}

			$data['component_options'][] = array(
				'component_option_id'    => $component_option['component_option_id'],
				'component_option_value' => $component_option_value_data,
				'option_id'            => $component_option['option_id'],
				'name'                 => $component_option['name'],
				'type'                 => $component_option['type'],
				'value'                => isset($component_option['value']) ? $component_option['value'] : '',
				'required'             => $component_option['required']
			);
		}

		$data['option_values'] = array();

		foreach ($data['component_options'] as $component_option) {
			if ($component_option['type'] == 'select' || $component_option['type'] == 'radio' || $component_option['type'] == 'checkbox' || $component_option['type'] == 'image') {
				if (!isset($data['option_values'][$component_option['option_id']])) {
					$data['option_values'][$component_option['option_id']] = $this->model_catalog_option->getOptionValues($component_option['option_id']);
				}
			}
		}

		$this->load->model('customer/customer_group');

		$data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();

		if (isset($this->request->post['component_discount'])) {
			$component_discounts = $this->request->post['component_discount'];
		} elseif (isset($this->request->get['component_id'])) {
			$component_discounts = $this->model_catalog_component->getComponentDiscounts($this->request->get['component_id']);
		} else {
			$component_discounts = array();
		}

		$data['component_discounts'] = array();

		foreach ($component_discounts as $component_discount) {
			$data['component_discounts'][] = array(
				'customer_group_id' => $component_discount['customer_group_id'],
				'quantity'          => $component_discount['quantity'],
				'priority'          => $component_discount['priority'],
				'price'             => $component_discount['price'],
				'date_start'        => ($component_discount['date_start'] != '0000-00-00') ? $component_discount['date_start'] : '',
				'date_end'          => ($component_discount['date_end'] != '0000-00-00') ? $component_discount['date_end'] : ''
			);
		}

		if (isset($this->request->post['component_special'])) {
			$component_specials = $this->request->post['component_special'];
		} elseif (isset($this->request->get['component_id'])) {
			$component_specials = $this->model_catalog_component->getComponentSpecials($this->request->get['component_id']);
		} else {
			$component_specials = array();
		}

		$data['component_specials'] = array();

		foreach ($component_specials as $component_special) {
			$data['component_specials'][] = array(
				'customer_group_id' => $component_special['customer_group_id'],
				'priority'          => $component_special['priority'],
				'price'             => $component_special['price'],
				'date_start'        => ($component_special['date_start'] != '0000-00-00') ? $component_special['date_start'] : '',
				'date_end'          => ($component_special['date_end'] != '0000-00-00') ? $component_special['date_end'] :  ''
			);
		}

		// Image
		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($component_info)) {
			$data['image'] = $component_info['image'];
		} else {
			$data['image'] = '';
		}

		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($component_info) && is_file(DIR_IMAGE . $component_info['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($component_info['image'], 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		// Images
		if (isset($this->request->post['component_image'])) {
			$component_images = $this->request->post['component_image'];
		} elseif (isset($this->request->get['component_id'])) {
			$component_images = $this->model_catalog_component->getComponentImages($this->request->get['component_id']);
		} else {
			$component_images = array();
		}

		$data['component_images'] = array();

		foreach ($component_images as $component_image) {
			if (is_file(DIR_IMAGE . $component_image['image'])) {
				$image = $component_image['image'];
				$thumb = $component_image['image'];
			} else {
				$image = '';
				$thumb = 'no_image.png';
			}

			$data['component_images'][] = array(
				'image'      => $image,
				'thumb'      => $this->model_tool_image->resize($thumb, 100, 100),
				'sort_order' => $component_image['sort_order']
			);
		}

		// Downloads
		$this->load->model('catalog/download');

		if (isset($this->request->post['component_download'])) {
			$component_downloads = $this->request->post['component_download'];
		} elseif (isset($this->request->get['component_id'])) {
			$component_downloads = $this->model_catalog_component->getComponentDownloads($this->request->get['component_id']);
		} else {
			$component_downloads = array();
		}

		$data['component_downloads'] = array();

		foreach ($component_downloads as $download_id) {
			$download_info = $this->model_catalog_download->getDownload($download_id);

			if ($download_info) {
				$data['component_downloads'][] = array(
					'download_id' => $download_info['download_id'],
					'name'        => $download_info['name']
				);
			}
		}

		if (isset($this->request->post['component_related'])) {
			$components = $this->request->post['component_related'];
		} elseif (isset($this->request->get['component_id'])) {
			$components = $this->model_catalog_component->getComponentRelated($this->request->get['component_id']);
		} else {
			$components = array();
		}

		$data['component_relateds'] = array();

		foreach ($components as $component_id) {
			$related_info = $this->model_catalog_component->getComponent($component_id);

			if ($related_info) {
				$data['component_relateds'][] = array(
					'component_id' => $related_info['component_id'],
					'name'       => $related_info['name']
				);
			}
		}
		
		if (isset($this->request->post['component_related_article'])) {
			$articles = $this->request->post['component_related_article'];
		} elseif (isset($component_info)) {
			$articles = $this->model_catalog_component->getArticleRelated($this->request->get['component_id']);
		} else {
			$articles = array();
		}
	
		$data['component_related_article'] = array();
		$this->load->model('blog/article');
		
		foreach ($articles as $article_id) {
			$article_info = $this->model_blog_article->getArticle($article_id);
			
			if ($article_info) {
				$data['component_related_article'][] = array(
					'article_id' => $article_info['article_id'],
					'name'       => $article_info['name']
				);
			}
		}

		if (isset($this->request->post['points'])) {
			$data['points'] = $this->request->post['points'];
		} elseif (!empty($component_info)) {
			$data['points'] = $component_info['points'];
		} else {
			$data['points'] = '';
		}

//		if (isset($this->request->post['component_reward'])) {
//			$data['component_reward'] = $this->request->post['component_reward'];
//		} elseif (isset($this->request->get['component_id'])) {
//			$data['component_reward'] = $this->model_catalog_component->getComponentRewards($this->request->get['component_id']);
//		} else {
			$data['component_reward'] = array();
//		}

//		if (isset($this->request->post['component_seo_url'])) {
//			$data['component_seo_url'] = $this->request->post['component_seo_url'];
//		} elseif (isset($this->request->get['component_id'])) {
//			$data['component_seo_url'] = $this->model_catalog_component->getComponentSeoUrls($this->request->get['component_id']);
//		} else {
			$data['component_seo_url'] = array();
//		}

		if (isset($this->request->post['component_layout'])) {
			$data['component_layout'] = $this->request->post['component_layout'];
		} elseif (isset($this->request->get['component_id'])) {
			$data['component_layout'] = $this->model_catalog_component->getComponentLayouts($this->request->get['component_id']);
		} else {
			$data['component_layout'] = array();
		}

		$this->load->model('design/layout');

		$data['layouts'] = $this->model_design_layout->getLayouts();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/component_form', $data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/component')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['component_description'] as $language_id => $value) {
			if ((utf8_strlen($value['name']) < 1) || (utf8_strlen($value['name']) > 255)) {
				$this->error['name'][$language_id] = $this->language->get('error_name');
			}

			if ((utf8_strlen($value['meta_title']) < 0) || (utf8_strlen($value['meta_title']) > 255)) {
				$this->error['meta_title'][$language_id] = $this->language->get('error_meta_title');
			}
			
						if ((utf8_strlen($value['meta_h1']) < 0) || (utf8_strlen($value['meta_h1']) > 255)) {
				$this->error['meta_h1'][$language_id] = $this->language->get('error_meta_h1');
			}
		}

		if ((utf8_strlen($this->request->post['model']) < 1) || (utf8_strlen($this->request->post['model']) > 64)) {
			$this->error['model'] = $this->language->get('error_model');
		}

		if ($this->request->post['component_seo_url']) {
			$this->load->model('design/seo_url');

			foreach ($this->request->post['component_seo_url'] as $store_id => $language) {
				foreach ($language as $language_id => $keyword) {
					if (!empty($keyword)) {
						if (count(array_keys($language, $keyword)) > 1) {
							$this->error['keyword'][$store_id][$language_id] = $this->language->get('error_unique');
						}

						$seo_urls = $this->model_design_seo_url->getSeoUrlsByKeyword($keyword);

						foreach ($seo_urls as $seo_url) {
							if (($seo_url['store_id'] == $store_id) && (!isset($this->request->get['component_id']) || (($seo_url['query'] != 'component_id=' . $this->request->get['component_id'])))) {
								$this->error['keyword'][$store_id][$language_id] = $this->language->get('error_keyword');

								break;
							}
						}
					}
				}
			}
		}

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		return !$this->error;
	}
	
	public function enable() {
        $this->load->language('catalog/component');
        $this->document->setTitle($this->language->get('heading_title'));
        $this->load->model('catalog/component');
        if (isset($this->request->post['selected']) && $this->validateEnable()) {
            foreach ($this->request->post['selected'] as $component_id) {
                $this->model_catalog_component->editcomponentStatus($component_id, 1);
            }
            $this->session->data['success'] = $this->language->get('text_success');
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
            $this->response->redirect($this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . $url, true));
        }
        $this->getList();
    }
    public function disable() {
        $this->load->language('catalog/component');
        $this->document->setTitle($this->language->get('heading_title'));
        $this->load->model('catalog/component');
        if (isset($this->request->post['selected']) && $this->validateDisable()) {
            foreach ($this->request->post['selected'] as $component_id) {
                $this->model_catalog_component->editcomponentStatus($component_id, 0);
            }
            $this->session->data['success'] = $this->language->get('text_success');
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
            $this->response->redirect($this->url->link('catalog/component', 'user_token=' . $this->session->data['user_token'] . $url, true));
        }
        $this->getList();
    }
	
	protected function validateEnable() {
		if (!$this->user->hasPermission('modify', 'catalog/component')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
	
	protected function validateDisable() {
		if (!$this->user->hasPermission('modify', 'catalog/component')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'catalog/component')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	protected function validateCopy() {
		if (!$this->user->hasPermission('modify', 'catalog/component')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	public function autocomplete() {
		$json = array();

		if (isset($this->request->get['filter_name']) || isset($this->request->get['filter_model'])) {
			$this->load->model('catalog/component');
			$this->load->model('catalog/option');

			if (isset($this->request->get['filter_name'])) {
				$filter_name = $this->request->get['filter_name'];
			} else {
				$filter_name = '';
			}

			if (isset($this->request->get['filter_model'])) {
				$filter_model = $this->request->get['filter_model'];
			} else {
				$filter_model = '';
			}

			if (isset($this->request->get['limit'])) {
				$limit = (int)$this->request->get['limit'];
			} else {
				$limit = $this->config->get('config_limit_autocomplete');
			}

			$filter_data = array(
				'filter_name'  => $filter_name,
				'filter_model' => $filter_model,
				'start'        => 0,
				'limit'        => $limit
			);

			$results = $this->model_catalog_component->getComponents($filter_data);

			foreach ($results as $result) {
				$option_data = array();

				$component_options = $this->model_catalog_component->getComponentOptions($result['component_id']);

				foreach ($component_options as $component_option) {
					$option_info = $this->model_catalog_option->getOption($component_option['option_id']);

					if ($option_info) {
						$component_option_value_data = array();

						foreach ($component_option['component_option_value'] as $component_option_value) {
							$option_value_info = $this->model_catalog_option->getOptionValue($component_option_value['option_value_id']);

							if ($option_value_info) {
								$component_option_value_data[] = array(
									'component_option_value_id' => $component_option_value['component_option_value_id'],
									'option_value_id'         => $component_option_value['option_value_id'],
									'name'                    => $option_value_info['name'],
									'price'                   => (float)$component_option_value['price'] ? $this->currency->format($component_option_value['price'], $this->config->get('config_currency')) : false,
									'price_prefix'            => $component_option_value['price_prefix']
								);
							}
						}

						$option_data[] = array(
							'component_option_id'    => $component_option['component_option_id'],
							'component_option_value' => $component_option_value_data,
							'option_id'            => $component_option['option_id'],
							'name'                 => $option_info['name'],
							'type'                 => $option_info['type'],
							'value'                => $component_option['value'],
							'required'             => $component_option['required']
						);
					}
				}

				$json[] = array(
					'component_id' => $result['component_id'],
					'name'       => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),
					'model'      => $result['model'],
					'option'     => $option_data,
					'price'      => $result['price']
				);
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
