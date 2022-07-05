<?php
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ControllerCatalogBoxing extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('catalog/boxing');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/boxing');

		$this->getList();
	}

	public function add() {
		$this->load->language('catalog/boxing');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/boxing');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_boxing->addboxing($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/boxing', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('catalog/boxing');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/boxing');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_boxing->editBoxing($this->request->get['boxing_id'], $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/boxing', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('catalog/boxing');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/boxing');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $boxing_id) {
				$this->model_catalog_boxing->deleteboxing($boxing_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/boxing', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}

		$this->getList();
	}

	protected function getList() {
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
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
			'href' => $this->url->link('catalog/boxing', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		$data['add'] = $this->url->link('catalog/boxing/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('catalog/boxing/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['boxings'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$boxing_total = $this->model_catalog_boxing->getTotalBoxings();

		$results = $this->model_catalog_boxing->getBoxings($filter_data);

		foreach ($results as $result) {
			$data['boxings'][] = array(
				'boxing_id' => $result['boxing_id'],
				'name'            => $result['name'],
				'sort_order'      => $result['sort_order'],
//				'noindex'  	  	  => $result['noindex'],
				'href_shop'  	  => HTTP_CATALOG . 'index.php?route=product/boxing/info&boxing_id=' . ($result['boxing_id']),
				'edit'            => $this->url->link('catalog/boxing/edit', 'user_token=' . $this->session->data['user_token'] . '&boxing_id=' . $result['boxing_id'] . $url, true)
			);
		} 

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

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('catalog/boxing', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, true);
		$data['sort_sort_order'] = $this->url->link('catalog/boxing', 'user_token=' . $this->session->data['user_token'] . '&sort=sort_order' . $url, true);
//		$data['sort_noindex'] = $this->url->link('catalog/boxing', 'user_token=' . $this->session->data['user_token'] . '&sort=noindex' . $url, true);
 
		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $boxing_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/boxing', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($boxing_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($boxing_total - $this->config->get('config_limit_admin'))) ? $boxing_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $boxing_total, ceil($boxing_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/boxing_list', $data));
	}

	protected function getForm() {
		$data['text_form'] = !isset($this->request->get['boxing_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

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

		if (isset($this->error['keyword'])) {
			$data['error_keyword'] = $this->error['keyword'];
		} else {
			$data['error_keyword'] = '';
		}

		$url = '';

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
			'href' => $this->url->link('catalog/boxing', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		if (!isset($this->request->get['boxing_id'])) {
			$data['action'] = $this->url->link('catalog/boxing/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('catalog/boxing/edit', 'user_token=' . $this->session->data['user_token'] . '&boxing_id=' . $this->request->get['boxing_id'] . $url, true);
		}

		$data['cancel'] = $this->url->link('catalog/boxing', 'user_token=' . $this->session->data['user_token'] . $url, true);

		if (isset($this->request->get['boxing_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$boxing_info = $this->model_catalog_boxing->getBoxing($this->request->get['boxing_id']);
		}

		$data['user_token'] = $this->session->data['user_token'];
		
		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();
//		if (isset($this->request->post['boxing_description'])) {
//			$data['boxing_description'] = $this->request->post['boxing_description'];
//		} elseif (isset($this->request->get['boxing_id'])) {
//			$data['boxing_description'] = $this->model_catalog_boxing->getBoxingDescriptions($this->request->get['boxing_id']);
//		} else {
//			$data['boxing_description'] = array();
//		}

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($boxing_info)) {
			$data['name'] = $boxing_info['name'];
		} else {
			$data['name'] = '';
		}
		
		if (!empty($boxing_info)) {
			$data['heading_title'] = $data['name'] = $boxing_info['name'];
		} else {
			$data['heading_title'] = $this->language->get('heading_title');
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

		if (isset($this->request->post['boxing_store'])) {
			$data['boxing_store'] = $this->request->post['boxing_store'];
		} elseif (isset($this->request->get['boxing_id'])) {
			$data['boxing_store'] = $this->model_catalog_boxing->getBoxingStores($this->request->get['boxing_id']);
		} else {
			$data['boxing_store'] = array(0);
		}

		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($boxing_info)) {
			$data['image'] = $boxing_info['image'];
		} else {
			$data['image'] = '';
		}

        if (isset($this->request->post['bg_image'])) {
            $data['bg_image'] = $this->request->post['bg_image'];
        } elseif (!empty($boxing_info)) {
            $data['bg_image'] = $boxing_info['bg_image'];
        } else {
            $data['bg_image'] = '';
        }

		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($boxing_info) && is_file(DIR_IMAGE . $boxing_info['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($boxing_info['image'], 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

        if (isset($this->request->post['bg_image']) && is_file(DIR_IMAGE . $this->request->post['bg_image'])) {
            $data['bg_thumb'] = $this->model_tool_image->resize($this->request->post['bg_image'], 100, 100);
        } elseif (!empty($boxing_info) && is_file(DIR_IMAGE . $boxing_info['bg_image'])) {
            $data['bg_thumb'] = $this->model_tool_image->resize($boxing_info['bg_image'], 100, 100);
        } else {
            $data['bg_thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
        }

		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

        $data['boxing_id'] = $this->request->get['boxing_id'];

//		if (isset($this->request->post['noindex'])) {
//			$data['noindex'] = $this->request->post['noindex'];
//		} elseif (!empty($boxing_info)) {
//			$data['noindex'] = $boxing_info['noindex'];
//		} else {
//			$data['noindex'] = 1;
//		}
		
//		if (isset($this->request->post['boxing_layout'])) {
//			$data['boxing_layout'] = $this->request->post['boxing_layout'];
//		} elseif (isset($this->request->get['boxing_id'])) {
//			$data['boxing_layout'] = $this->model_catalog_boxing->getboxingLayouts($this->request->get['boxing_id']);
//		} else {
//			$data['boxing_layout'] = array();
//		}
//		$this->load->model('design/layout');
		
//		$data['layouts'] = $this->model_design_layout->getLayouts();
//
		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($boxing_info)) {
			$data['sort_order'] = $boxing_info['sort_order'];
		} else {
			$data['sort_order'] = '';
		}
//
//		if (isset($this->request->post['product_related'])) {
//			$products = $this->request->post['product_related'];
//		} elseif (isset($boxing_info)) {
//			$products = $this->model_catalog_boxing->getProductRelated($this->request->get['boxing_id']);
//		} else {
//			$products = array();
//		}

//		$data['product_related'] = array();
//
//		$this->load->model('catalog/product');
//
//		foreach ($products as $product_id) {
//			$related_info = $this->model_catalog_product->getProduct($product_id);
//
//			if ($related_info) {
//				$data['product_related'][] = array(
//					'product_id' => $related_info['product_id'],
//					'name'       => $related_info['name']
//				);
//			}
//		}

//		if (isset($this->request->post['article_related'])) {
//			$articles = $this->request->post['article_related'];
//		} elseif (isset($boxing_info)) {
//			$articles = $this->model_catalog_boxing->getArticleRelated($this->request->get['boxing_id']);
//		} else {
//			$articles = array();
//		}

//		$data['article_related'] = array();
//
//		$this->load->model('blog/article');
//
//		foreach ($articles as $article_id) {
//			$related_info = $this->model_blog_article->getArticle($article_id);
//
//			if ($related_info) {
//				$data['article_related'][] = array(
//					'article_id' => $related_info['article_id'],
//					'name'       => $related_info['name']
//				);
//			}
//		}

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();
//
//		if (isset($this->request->post['boxing_seo_url'])) {
//			$data['boxing_seo_url'] = $this->request->post['boxing_seo_url'];
//		} elseif (isset($this->request->get['boxing_id'])) {
//			$data['boxing_seo_url'] = $this->model_catalog_boxing->getboxingSeoUrls($this->request->get['boxing_id']);
//		} else {
//			$data['boxing_seo_url'] = array();
//		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/boxing_form', $data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/boxing')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['name']) < 1) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}
		
//		foreach ($this->request->post['boxing_description'] as $language_id => $value) {
//			if ((utf8_strlen($value['meta_title']) < 0) || (utf8_strlen($value['meta_title']) > 255)) {
//				$this->error['meta_title'][$language_id] = $this->language->get('error_meta_title');
//			}
//
//			if ((utf8_strlen($value['meta_h1']) < 0) || (utf8_strlen($value['meta_h1']) > 255)) {
//				$this->error['meta_h1'][$language_id] = $this->language->get('error_meta_h1');
//			}
//		}

//		if ($this->request->post['boxing_seo_url']) {
//			$this->load->model('design/seo_url');
//
//			foreach ($this->request->post['boxing_seo_url'] as $store_id => $language) {
//				foreach ($language as $language_id => $keyword) {
//					if (!empty($keyword)) {
//						if (count(array_keys($language, $keyword)) > 1) {
//							$this->error['keyword'][$store_id][$language_id] = $this->language->get('error_unique');
//						}
//
//						$seo_urls = $this->model_design_seo_url->getSeoUrlsByKeyword($keyword);
//
//						foreach ($seo_urls as $seo_url) {
//							if (($seo_url['store_id'] == $store_id) && (!isset($this->request->get['boxing_id']) || (($seo_url['query'] != 'boxing_id=' . $this->request->get['boxing_id'])))) {
//								$this->error['keyword'][$store_id][$language_id] = $this->language->get('error_keyword');
//							}
//						}
//					}
//				}
//			}
//		}

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'catalog/boxing')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		$this->load->model('catalog/product');

		foreach ($this->request->post['selected'] as $boxing_id) {
			$product_total = $this->model_catalog_product->getTotalProductsByboxingId($boxing_id);

			if ($product_total) {
				$this->error['warning'] = sprintf($this->language->get('error_product'), $product_total);
			}
		}

		return !$this->error;
	}

	public function autocomplete() {
		$json = array();

		if (isset($this->request->get['filter_name'])) {
			$this->load->model('catalog/boxing');

			$filter_data = array(
				'filter_name' => $this->request->get['filter_name'],
				'start'       => 0,
				'limit'       => $this->config->get('config_limit_autocomplete')
			);

			$results = $this->model_catalog_boxing->getBoxings($filter_data);

			foreach ($results as $result) {
				$json[] = array(
					'boxing_id' => $result['boxing_id'],
					'name'            => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
				);
			}
		}

		$sort_order = array();

		foreach ($json as $key => $value) {
			$sort_order[$key] = $value['name'];
		}

		array_multisort($sort_order, SORT_ASC, $json);

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
