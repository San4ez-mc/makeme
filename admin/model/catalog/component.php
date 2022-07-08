<?php
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ModelCatalogComponent extends Model {
	public function addcomponent($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "component SET model = '" . $this->db->escape($data['model']) . "', sku = '" . $this->db->escape($data['sku']) . "', upc = '" . $this->db->escape($data['upc']) . "', ean = '" . $this->db->escape($data['ean']) . "', jan = '" . $this->db->escape($data['jan']) . "', isbn = '" . $this->db->escape($data['isbn']) . "', mpn = '" . $this->db->escape($data['mpn']) . "', location = '" . $this->db->escape($data['location']) . "', quantity = '" . (int)$data['quantity'] . "', minimum = '" . (int)$data['minimum'] . "', subtract = '" . (int)$data['subtract'] . "', stock_status_id = '" . (int)$data['stock_status_id'] . "', date_available = '" . $this->db->escape($data['date_available']) . "', manufacturer_id = '" . (int)$data['manufacturer_id'] . "', shipping = '" . (int)$data['shipping'] . "', price = '" . (float)$data['price'] . "', points = '" . (int)$data['points'] . "', weight = '" . (float)$data['weight'] . "', weight_class_id = '" . (int)$data['weight_class_id'] . "', length = '" . (float)$data['length'] . "', width = '" . (float)$data['width'] . "', height = '" . (float)$data['height'] . "', length_class_id = '" . (int)$data['length_class_id'] . "', status = '" . (int)$data['status'] . "', noindex = '" . (int)$data['noindex'] . "', tax_class_id = '" . (int)$data['tax_class_id'] . "', sort_order = '" . (int)$data['sort_order'] . "', date_added = NOW(), date_modified = NOW()");

		$component_id = $this->db->getLastId();

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "component SET image = '" . $this->db->escape($data['image']) . "' WHERE component_id = '" . (int)$component_id . "'");
		}

		foreach ($data['component_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "component_description SET component_id = '" . (int)$component_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "', tag = '" . $this->db->escape($value['tag']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_h1 = '" . $this->db->escape($value['meta_h1']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "'");
		}

		if (isset($data['component_store'])) {
			foreach ($data['component_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_to_store SET component_id = '" . (int)$component_id . "', store_id = '" . (int)$store_id . "'");
			}
		}

		if (isset($data['component_attribute'])) {
			foreach ($data['component_attribute'] as $component_attribute) {
				if ($component_attribute['attribute_id']) {
					// Removes duplicates
					$this->db->query("DELETE FROM " . DB_PREFIX . "component_attribute WHERE component_id = '" . (int)$component_id . "' AND attribute_id = '" . (int)$component_attribute['attribute_id'] . "'");

					foreach ($component_attribute['component_attribute_description'] as $language_id => $component_attribute_description) {
						$this->db->query("DELETE FROM " . DB_PREFIX . "component_attribute WHERE component_id = '" . (int)$component_id . "' AND attribute_id = '" . (int)$component_attribute['attribute_id'] . "' AND language_id = '" . (int)$language_id . "'");

						$this->db->query("INSERT INTO " . DB_PREFIX . "component_attribute SET component_id = '" . (int)$component_id . "', attribute_id = '" . (int)$component_attribute['attribute_id'] . "', language_id = '" . (int)$language_id . "', text = '" .  $this->db->escape($component_attribute_description['text']) . "'");
					}
				}
			}
		}

		if (isset($data['component_option'])) {
			foreach ($data['component_option'] as $component_option) {
				if ($component_option['type'] == 'select' || $component_option['type'] == 'radio' || $component_option['type'] == 'checkbox' || $component_option['type'] == 'image') {
					if (isset($component_option['component_option_value'])) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "component_option SET component_id = '" . (int)$component_id . "', option_id = '" . (int)$component_option['option_id'] . "', required = '" . (int)$component_option['required'] . "'");

						$component_option_id = $this->db->getLastId();

						foreach ($component_option['component_option_value'] as $component_option_value) {
							$this->db->query("INSERT INTO " . DB_PREFIX . "component_option_value SET component_option_id = '" . (int)$component_option_id . "', component_id = '" . (int)$component_id . "', option_id = '" . (int)$component_option['option_id'] . "', option_value_id = '" . (int)$component_option_value['option_value_id'] . "', quantity = '" . (int)$component_option_value['quantity'] . "', subtract = '" . (int)$component_option_value['subtract'] . "', price = '" . (float)$component_option_value['price'] . "', price_prefix = '" . $this->db->escape($component_option_value['price_prefix']) . "', points = '" . (int)$component_option_value['points'] . "', points_prefix = '" . $this->db->escape($component_option_value['points_prefix']) . "', weight = '" . (float)$component_option_value['weight'] . "', weight_prefix = '" . $this->db->escape($component_option_value['weight_prefix']) . "'");
						}
					}
				} else {
					$this->db->query("INSERT INTO " . DB_PREFIX . "component_option SET component_id = '" . (int)$component_id . "', option_id = '" . (int)$component_option['option_id'] . "', value = '" . $this->db->escape($component_option['value']) . "', required = '" . (int)$component_option['required'] . "'");
				}
			}
		}

		if (isset($data['component_recurring'])) {
			foreach ($data['component_recurring'] as $recurring) {

				$query = $this->db->query("SELECT `component_id` FROM `" . DB_PREFIX . "component_recurring` WHERE `component_id` = '" . (int)$component_id . "' AND `customer_group_id = '" . (int)$recurring['customer_group_id'] . "' AND `recurring_id` = '" . (int)$recurring['recurring_id'] . "'");

				if (!$query->num_rows) {
					$this->db->query("INSERT INTO `" . DB_PREFIX . "component_recurring` SET `component_id` = '" . (int)$component_id . "', customer_group_id = '" . (int)$recurring['customer_group_id'] . "', `recurring_id` = '" . (int)$recurring['recurring_id'] . "'");
				}
			}
		}
		
		if (isset($data['component_discount'])) {
			foreach ($data['component_discount'] as $component_discount) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_discount SET component_id = '" . (int)$component_id . "', customer_group_id = '" . (int)$component_discount['customer_group_id'] . "', quantity = '" . (int)$component_discount['quantity'] . "', priority = '" . (int)$component_discount['priority'] . "', price = '" . (float)$component_discount['price'] . "', date_start = '" . $this->db->escape($component_discount['date_start']) . "', date_end = '" . $this->db->escape($component_discount['date_end']) . "'");
			}
		}

		if (isset($data['component_special'])) {
			foreach ($data['component_special'] as $component_special) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_special SET component_id = '" . (int)$component_id . "', customer_group_id = '" . (int)$component_special['customer_group_id'] . "', priority = '" . (int)$component_special['priority'] . "', price = '" . (float)$component_special['price'] . "', date_start = '" . $this->db->escape($component_special['date_start']) . "', date_end = '" . $this->db->escape($component_special['date_end']) . "'");
			}
		}

		if (isset($data['component_image'])) {
			foreach ($data['component_image'] as $component_image) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_image SET component_id = '" . (int)$component_id . "', image = '" . $this->db->escape($component_image['image']) . "', sort_order = '" . (int)$component_image['sort_order'] . "'");
			}
		}

		if (isset($data['component_download'])) {
			foreach ($data['component_download'] as $download_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_to_download SET component_id = '" . (int)$component_id . "', download_id = '" . (int)$download_id . "'");
			}
		}

		if (isset($data['component_category'])) {
			foreach ($data['component_category'] as $category_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_to_category SET component_id = '" . (int)$component_id . "', category_id = '" . (int)$category_id . "'");
			}
		}
		
		if (isset($data['main_category_id']) && $data['main_category_id'] > 0) {
			$this->db->query("DELETE FROM " . DB_PREFIX . "component_to_category WHERE component_id = '" . (int)$component_id . "' AND category_id = '" . (int)$data['main_category_id'] . "'");
			$this->db->query("INSERT INTO " . DB_PREFIX . "component_to_category SET component_id = '" . (int)$component_id . "', category_id = '" . (int)$data['main_category_id'] . "', main_category = 1");
				} elseif (isset($data['component_category'][0])) {
			$this->db->query("UPDATE " . DB_PREFIX . "component_to_category SET main_category = 1 WHERE component_id = '" . (int)$component_id . "' AND category_id = '" . (int)$data['component_category'][0] . "'");
		}

		if (isset($data['component_filter'])) {
			foreach ($data['component_filter'] as $filter_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_filter SET component_id = '" . (int)$component_id . "', filter_id = '" . (int)$filter_id . "'");
			}
		}

		if (isset($data['component_related'])) {
			foreach ($data['component_related'] as $related_id) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "component_related WHERE component_id = '" . (int)$component_id . "' AND related_id = '" . (int)$related_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_related SET component_id = '" . (int)$component_id . "', related_id = '" . (int)$related_id . "'");
				$this->db->query("DELETE FROM " . DB_PREFIX . "component_related WHERE component_id = '" . (int)$related_id . "' AND related_id = '" . (int)$component_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_related SET component_id = '" . (int)$related_id . "', related_id = '" . (int)$component_id . "'");
			}
		}
		
		if (isset($data['component_related_article'])) {
			foreach ($data['component_related_article'] as $article_id) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "component_related_article WHERE component_id = '" . (int)$component_id . "' AND article_id = '" . (int)$article_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_related_article SET component_id = '" . (int)$component_id . "', article_id = '" . (int)$article_id . "'");
			}
		}

//		if (isset($data['component_reward'])) {
//			foreach ($data['component_reward'] as $customer_group_id => $component_reward) {
//				if ((int)$component_reward['points'] > 0) {
//					$this->db->query("INSERT INTO " . DB_PREFIX . "component_reward SET component_id = '" . (int)$component_id . "', customer_group_id = '" . (int)$customer_group_id . "', points = '" . (int)$component_reward['points'] . "'");
//				}
//			}
//		}
		
		// SEO URL
		if (isset($data['component_seo_url'])) {
			foreach ($data['component_seo_url'] as $store_id => $language) {
				foreach ($language as $language_id => $keyword) {
					if (!empty($keyword)) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "seo_url SET store_id = '" . (int)$store_id . "', language_id = '" . (int)$language_id . "', query = 'component_id=" . (int)$component_id . "', keyword = '" . $this->db->escape(trim($keyword)) . "'");
					}
				}
			}
		}
		
		if (isset($data['component_layout'])) {
			foreach ($data['component_layout'] as $store_id => $layout_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_to_layout SET component_id = '" . (int)$component_id . "', store_id = '" . (int)$store_id . "', layout_id = '" . (int)$layout_id . "'");
			}
		}


		$this->cache->delete('component');
		
		if($this->config->get('config_seo_pro')){		
		$this->cache->delete('seopro');
		}

		return $component_id;
	}

	public function editComponent($component_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "component SET model = '" . $this->db->escape($data['model']) . "', sku = '" . $this->db->escape($data['sku']) . "', upc = '" . $this->db->escape($data['upc']) . "', ean = '" . $this->db->escape($data['ean']) . "', jan = '" . $this->db->escape($data['jan']) . "', isbn = '" . $this->db->escape($data['isbn']) . "', mpn = '" . $this->db->escape($data['mpn']) . "', location = '" . $this->db->escape($data['location']) . "', quantity = '" . (int)$data['quantity'] . "', minimum = '" . (int)$data['minimum'] . "', subtract = '" . (int)$data['subtract'] . "', stock_status_id = '" . (int)$data['stock_status_id'] . "', date_available = '" . $this->db->escape($data['date_available']) . "', manufacturer_id = '" . (int)$data['manufacturer_id'] . "', shipping = '" . (int)$data['shipping'] . "', price = '" . (float)$data['price'] . "', points = '" . (int)$data['points'] . "', weight = '" . (float)$data['weight'] . "', weight_class_id = '" . (int)$data['weight_class_id'] . "', length = '" . (float)$data['length'] . "', width = '" . (float)$data['width'] . "', height = '" . (float)$data['height'] . "', length_class_id = '" . (int)$data['length_class_id'] . "', status = '" . (int)$data['status'] . "', noindex = '" . (int)$data['noindex'] . "', tax_class_id = '" . (int)$data['tax_class_id'] . "', sort_order = '" . (int)$data['sort_order'] . "', date_modified = NOW() WHERE component_id = '" . (int)$component_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "component SET image = '" . $this->db->escape($data['image']) . "' WHERE component_id = '" . (int)$component_id . "'");
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "component_description WHERE component_id = '" . (int)$component_id . "'");

		foreach ($data['component_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "component_description SET component_id = '" . (int)$component_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "', tag = '" . $this->db->escape($value['tag']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_h1 = '" . $this->db->escape($value['meta_h1']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "'");
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "component_to_store WHERE component_id = '" . (int)$component_id . "'");

		if (isset($data['component_store'])) {
			foreach ($data['component_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_to_store SET component_id = '" . (int)$component_id . "', store_id = '" . (int)$store_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "component_attribute WHERE component_id = '" . (int)$component_id . "'");

		if (!empty($data['component_attribute'])) {
			foreach ($data['component_attribute'] as $component_attribute) {
				if ($component_attribute['attribute_id']) {
					// Removes duplicates
					$this->db->query("DELETE FROM " . DB_PREFIX . "component_attribute WHERE component_id = '" . (int)$component_id . "' AND attribute_id = '" . (int)$component_attribute['attribute_id'] . "'");

					foreach ($component_attribute['component_attribute_description'] as $language_id => $component_attribute_description) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "component_attribute SET component_id = '" . (int)$component_id . "', attribute_id = '" . (int)$component_attribute['attribute_id'] . "', language_id = '" . (int)$language_id . "', text = '" .  $this->db->escape($component_attribute_description['text']) . "'");
					}
				}
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "component_option WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_option_value WHERE component_id = '" . (int)$component_id . "'");

		if (isset($data['component_option'])) {
			foreach ($data['component_option'] as $component_option) {
				if ($component_option['type'] == 'select' || $component_option['type'] == 'radio' || $component_option['type'] == 'checkbox' || $component_option['type'] == 'image') {
					if (isset($component_option['component_option_value'])) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "component_option SET component_option_id = '" . (int)$component_option['component_option_id'] . "', component_id = '" . (int)$component_id . "', option_id = '" . (int)$component_option['option_id'] . "', required = '" . (int)$component_option['required'] . "'");

						$component_option_id = $this->db->getLastId();

						foreach ($component_option['component_option_value'] as $component_option_value) {
							$this->db->query("INSERT INTO " . DB_PREFIX . "component_option_value SET component_option_value_id = '" . (int)$component_option_value['component_option_value_id'] . "', component_option_id = '" . (int)$component_option_id . "', component_id = '" . (int)$component_id . "', option_id = '" . (int)$component_option['option_id'] . "', option_value_id = '" . (int)$component_option_value['option_value_id'] . "', quantity = '" . (int)$component_option_value['quantity'] . "', subtract = '" . (int)$component_option_value['subtract'] . "', price = '" . (float)$component_option_value['price'] . "', price_prefix = '" . $this->db->escape($component_option_value['price_prefix']) . "', points = '" . (int)$component_option_value['points'] . "', points_prefix = '" . $this->db->escape($component_option_value['points_prefix']) . "', weight = '" . (float)$component_option_value['weight'] . "', weight_prefix = '" . $this->db->escape($component_option_value['weight_prefix']) . "'");
						}
					}
				} else {
					$this->db->query("INSERT INTO " . DB_PREFIX . "component_option SET component_option_id = '" . (int)$component_option['component_option_id'] . "', component_id = '" . (int)$component_id . "', option_id = '" . (int)$component_option['option_id'] . "', value = '" . $this->db->escape($component_option['value']) . "', required = '" . (int)$component_option['required'] . "'");
				}
			}
		}

		$this->db->query("DELETE FROM `" . DB_PREFIX . "component_recurring` WHERE component_id = " . (int)$component_id);

		if (isset($data['component_recurring'])) {
			foreach ($data['component_recurring'] as $component_recurring) {
				$query = $this->db->query("SELECT `component_id` FROM `" . DB_PREFIX . "component_recurring` WHERE `component_id` = '" . (int)$component_id . "' AND `customer_group_id` = '" . (int)$component_recurring['customer_group_id'] . "' AND `recurring_id` = '" . (int)$component_recurring['recurring_id'] . "'");

				if (!$query->num_rows) {
					$this->db->query("INSERT INTO `" . DB_PREFIX . "component_recurring` SET `component_id` = '" . (int)$component_id . "', `customer_group_id` = '" . (int)$component_recurring['customer_group_id'] . "', `recurring_id` = '" . (int)$component_recurring['recurring_id'] . "'");
				}				
			}
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_discount WHERE component_id = '" . (int)$component_id . "'");

		if (isset($data['component_discount'])) {
			foreach ($data['component_discount'] as $component_discount) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_discount SET component_id = '" . (int)$component_id . "', customer_group_id = '" . (int)$component_discount['customer_group_id'] . "', quantity = '" . (int)$component_discount['quantity'] . "', priority = '" . (int)$component_discount['priority'] . "', price = '" . (float)$component_discount['price'] . "', date_start = '" . $this->db->escape($component_discount['date_start']) . "', date_end = '" . $this->db->escape($component_discount['date_end']) . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "component_special WHERE component_id = '" . (int)$component_id . "'");

		if (isset($data['component_special'])) {
			foreach ($data['component_special'] as $component_special) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_special SET component_id = '" . (int)$component_id . "', customer_group_id = '" . (int)$component_special['customer_group_id'] . "', priority = '" . (int)$component_special['priority'] . "', price = '" . (float)$component_special['price'] . "', date_start = '" . $this->db->escape($component_special['date_start']) . "', date_end = '" . $this->db->escape($component_special['date_end']) . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "component_image WHERE component_id = '" . (int)$component_id . "'");

		if (isset($data['component_image'])) {
			foreach ($data['component_image'] as $component_image) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_image SET component_id = '" . (int)$component_id . "', image = '" . $this->db->escape($component_image['image']) . "', sort_order = '" . (int)$component_image['sort_order'] . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "component_to_download WHERE component_id = '" . (int)$component_id . "'");

		if (isset($data['component_download'])) {
			foreach ($data['component_download'] as $download_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_to_download SET component_id = '" . (int)$component_id . "', download_id = '" . (int)$download_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "component_to_category WHERE component_id = '" . (int)$component_id . "'");

		if (isset($data['component_category'])) {
			foreach ($data['component_category'] as $category_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_to_category SET component_id = '" . (int)$component_id . "', category_id = '" . (int)$category_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "component_filter WHERE component_id = '" . (int)$component_id . "'");

		if (isset($data['main_category_id']) && $data['main_category_id'] > 0) {
			$this->db->query("DELETE FROM " . DB_PREFIX . "component_to_category WHERE component_id = '" . (int)$component_id . "' AND category_id = '" . (int)$data['main_category_id'] . "'");
			$this->db->query("INSERT INTO " . DB_PREFIX . "component_to_category SET component_id = '" . (int)$component_id . "', category_id = '" . (int)$data['main_category_id'] . "', main_category = 1");
		} elseif (isset($data['component_category'][0])) {
			$this->db->query("UPDATE " . DB_PREFIX . "component_to_category SET main_category = 1 WHERE component_id = '" . (int)$component_id . "' AND category_id = '" . (int)$data['component_category'][0] . "'");
		}
		
		if (isset($data['component_filter'])) {
			foreach ($data['component_filter'] as $filter_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_filter SET component_id = '" . (int)$component_id . "', filter_id = '" . (int)$filter_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "component_related WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_related WHERE related_id = '" . (int)$component_id . "'");

		if (isset($data['component_related'])) {
			foreach ($data['component_related'] as $related_id) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "component_related WHERE component_id = '" . (int)$component_id . "' AND related_id = '" . (int)$related_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_related SET component_id = '" . (int)$component_id . "', related_id = '" . (int)$related_id . "'");
				$this->db->query("DELETE FROM " . DB_PREFIX . "component_related WHERE component_id = '" . (int)$related_id . "' AND related_id = '" . (int)$component_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_related SET component_id = '" . (int)$related_id . "', related_id = '" . (int)$component_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "component_related_article WHERE component_id = '" . (int)$component_id . "'");

		if (isset($data['component_related_article'])) {
			foreach ($data['component_related_article'] as $article_id) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "component_related_article WHERE component_id = '" . (int)$component_id . "' AND article_id = '" . (int)$article_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_related_article SET component_id = '" . (int)$component_id . "', article_id = '" . (int)$article_id . "'");
			}
		}

//		$this->db->query("DELETE FROM " . DB_PREFIX . "component_reward WHERE component_id = '" . (int)$component_id . "'");
//
//		if (isset($data['component_reward'])) {
//			foreach ($data['component_reward'] as $customer_group_id => $value) {
//				if ((int)$value['points'] > 0) {
//					$this->db->query("INSERT INTO " . DB_PREFIX . "component_reward SET component_id = '" . (int)$component_id . "', customer_group_id = '" . (int)$customer_group_id . "', points = '" . (int)$value['points'] . "'");
//				}
//			}
//		}
		
		// SEO URL
		$this->db->query("DELETE FROM " . DB_PREFIX . "seo_url WHERE query = 'component_id=" . (int)$component_id . "'");
		
		if (isset($data['component_seo_url'])) {
			foreach ($data['component_seo_url']as $store_id => $language) {
				foreach ($language as $language_id => $keyword) {
					if (!empty($keyword)) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "seo_url SET store_id = '" . (int)$store_id . "', language_id = '" . (int)$language_id . "', query = 'component_id=" . (int)$component_id . "', keyword = '" . $this->db->escape(trim($keyword)) . "'");
					}
				}
			}
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_to_layout WHERE component_id = '" . (int)$component_id . "'");

		if (isset($data['component_layout'])) {
			foreach ($data['component_layout'] as $store_id => $layout_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "component_to_layout SET component_id = '" . (int)$component_id . "', store_id = '" . (int)$store_id . "', layout_id = '" . (int)$layout_id . "'");
			}
		}

		$this->cache->delete('component');
		
		if($this->config->get('config_seo_pro')){		
		$this->cache->delete('seopro');
		}
	}
	
	public function editComponentStatus($component_id, $status) {
        $this->db->query("UPDATE " . DB_PREFIX . "component SET status = '" . (int)$status . "', date_modified = NOW() WHERE component_id = '" . (int)$component_id . "'");
        
		$this->cache->delete('component');
		
		if($this->config->get('config_seo_pro')){		
		$this->cache->delete('seopro');
		}
		
		return $component_id;
    }

	public function copycomponent($component_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "component p WHERE p.component_id = '" . (int)$component_id . "'");

		if ($query->num_rows) {
			$data = $query->row;

			$data['sku'] = '';
			$data['upc'] = '';
			$data['viewed'] = '0';
			$data['keyword'] = '';
			$data['status'] = '0';
			$data['noindex'] = '0';

			$data['component_attribute'] = $this->getComponentAttributes($component_id);
			$data['component_description'] = $this->getComponentDescriptions($component_id);
			$data['component_discount'] = $this->getComponentDiscounts($component_id);
			$data['component_filter'] = $this->getComponentFilters($component_id);
			$data['component_image'] = $this->getComponentImages($component_id);
			$data['component_option'] = $this->getComponentOptions($component_id);
			$data['component_related'] = $this->getComponentRelated($component_id);
			$data['component_related_article'] = $this->getArticleRelated($component_id);
//			$data['component_reward'] = $this->getComponentRewards($component_id);
			$data['component_special'] = $this->getComponentspecials($component_id);
			$data['component_category'] = $this->getComponentCategories($component_id);
			$data['component_download'] = $this->getComponentDownloads($component_id);
			$data['component_layout'] = $this->getComponentLayouts($component_id);
			$data['component_store'] = $this->getComponentstores($component_id);
			$data['component_recurrings'] = $this->getRecurrings($component_id);

			$this->addcomponent($data);
		}
	}

	public function deleteComponent($component_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "component WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_attribute WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_description WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_discount WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_filter WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_image WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_option WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_option_value WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_related WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_related WHERE related_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_related_article WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_reward WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_special WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_to_category WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_to_download WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_to_layout WHERE component_id = '" . (int)$component_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "component_to_store WHERE component_id = '" . (int)$component_id . "'");
//		$this->db->query("DELETE FROM " . DB_PREFIX . "component_recurring WHERE component_id = " . (int)$component_id);
//		$this->db->query("DELETE FROM " . DB_PREFIX . "review WHERE component_id = '" . (int)$component_id . "'");
//		$this->db->query("DELETE FROM " . DB_PREFIX . "seo_url WHERE query = 'component_id=" . (int)$component_id . "'");
//		$this->db->query("DELETE FROM " . DB_PREFIX . "coupon_component WHERE component_id = '" . (int)$component_id . "'");

		$this->cache->delete('component');
		
		if($this->config->get('config_seo_pro')){		
		$this->cache->delete('seopro');
		}
	}

	public function getComponent($component_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "component p LEFT JOIN " . DB_PREFIX . "component_description pd ON (p.component_id = pd.component_id) WHERE p.component_id = '" . (int)$component_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

		return $query->row;
	}

	public function getComponents($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "component p LEFT JOIN " . DB_PREFIX . "component_description pd ON (p.component_id = pd.component_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "'";

		if (isset($data['filter_category']) && !is_null($data['filter_category'])) {
			preg_match('/(.*)(WHERE pd\.language_id.*)/', $sql, $sql_crutch_matches);
		if (isset($sql_crutch_matches[2])) {
		$sql = $sql_crutch_matches[1] . " LEFT JOIN " . DB_PREFIX . "component_to_category p2c ON (p.component_id = p2c.component_id)" . $sql_crutch_matches[2];
		} else {
			$data['filter_category'] = null;
			}
		}
		
		if (!empty($data['filter_name'])) {
			$sql .= " AND pd.name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (!empty($data['filter_model'])) {
			$sql .= " AND p.model LIKE '%" . $this->db->escape($data['filter_model']) . "%'";
		}
		
		if (isset($data['filter_category']) && !is_null($data['filter_category'])) {
			if (!empty($data['filter_category']) && !empty($data['filter_sub_category'])) {
				$implode_data = array();
				
				$this->load->model('catalog/category');
				
				$categories = $this->model_catalog_category->getCategoriesChildren($data['filter_category']);
				
				foreach ($categories as $category) {
					$implode_data[] = "p2c.category_id = '" . (int)$category['category_id'] . "'";
				}
				
				$sql .= " AND (" . implode(' OR ', $implode_data) . ")";
			} else {
				if ((int)$data['filter_category'] > 0) {
					$sql .= " AND p2c.category_id = '" . (int)$data['filter_category'] . "'";
				} else {
					$sql .= " AND p2c.category_id IS NULL";
				}
			}
		}
	
		if (isset($data['filter_manufacturer_id']) && !is_null($data['filter_manufacturer_id'])) {
			$sql .= " AND p.manufacturer_id = '" . (int)$data['filter_manufacturer_id'] . "'";
		}

		if (!empty($data['filter_price'])) {
			$sql .= " AND p.price LIKE '" . $this->db->escape($data['filter_price']) . "%'";
		}
		
		if (isset($data['filter_price_min']) && !is_null($data['filter_price_min'])) {
			$sql .= " AND p.price >= '" . (float)$data['filter_price_min'] . "'";
		}
		
		if (isset($data['filter_price_max']) && !is_null($data['filter_price_max'])) {
			$sql .= " AND p.price <= '" . (float)$data['filter_price_max'] . "'";
		}

		if (isset($data['filter_quantity']) && $data['filter_quantity'] !== '') {
			$sql .= " AND p.quantity = '" . (int)$data['filter_quantity'] . "'";
		}
		
		if (isset($data['filter_quantity_min']) && !is_null($data['filter_quantity_min'])) {
			$sql .= " AND p.quantity >= '" . (int)$data['filter_quantity_min'] . "'";
		}
		
		if (isset($data['filter_quantity_max']) && !is_null($data['filter_quantity_max'])) {
			$sql .= " AND p.quantity <= '" . (int)$data['filter_quantity_max'] . "'";
		}

		if (isset($data['filter_status']) && $data['filter_status'] !== '') {
			$sql .= " AND p.status = '" . (int)$data['filter_status'] . "'";
		}
		
		if (isset($data['filter_noindex']) && $data['filter_noindex'] !== '') {
			$sql .= " AND p.noindex = '" . (int)$data['filter_noindex'] . "'";
		}

		$sql .= " GROUP BY p.component_id";

		$sort_data = array(
			'pd.name',
			'p.model',
			'p.price',
			'p.quantity',
			'p.status',
			'p.noindex',
			'p.sort_order'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY pd.name";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getComponentsByCategoryId($category_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "component p LEFT JOIN " . DB_PREFIX . "component_description pd ON (p.component_id = pd.component_id) LEFT JOIN " . DB_PREFIX . "component_to_category p2c ON (p.component_id = p2c.component_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p2c.category_id = '" . (int)$category_id . "' ORDER BY pd.name ASC");

		return $query->rows;
	}

	public function getComponentDescriptions($component_id) {
		$component_description_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "component_description WHERE component_id = '" . (int)$component_id . "'");

		foreach ($query->rows as $result) {
			$component_description_data[$result['language_id']] = array(
				'name'             => $result['name'],
				'description'      => $result['description'],
				'meta_title'       => $result['meta_title'],
				'meta_h1'	       => $result['meta_h1'],
				'meta_description' => $result['meta_description'],
				'meta_keyword'     => $result['meta_keyword'],
				'tag'              => $result['tag']
			);
		}

		return $component_description_data;
	}

	public function getComponentCategories($component_id) {
		$component_category_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "component_to_category WHERE component_id = '" . (int)$component_id . "'");

		foreach ($query->rows as $result) {
			$component_category_data[] = $result['category_id'];
		}

		return $component_category_data;
	}
	
	public function getComponentMainCategoryId($component_id) {
		$query = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "component_to_category WHERE component_id = '" . (int)$component_id . "' AND main_category = '1' LIMIT 1");
		
		return ($query->num_rows ? (int)$query->row['category_id'] : 0);
	}

	public function getComponentFilters($component_id) {
		$component_filter_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "component_filter WHERE component_id = '" . (int)$component_id . "'");

		foreach ($query->rows as $result) {
			$component_filter_data[] = $result['filter_id'];
		}

		return $component_filter_data;
	}

	public function getComponentAttributes($component_id) {
		$component_attribute_data = array();

		$component_attribute_query = $this->db->query("SELECT attribute_id FROM " . DB_PREFIX . "component_attribute WHERE component_id = '" . (int)$component_id . "' GROUP BY attribute_id");

		foreach ($component_attribute_query->rows as $component_attribute) {
			$component_attribute_description_data = array();

			$component_attribute_description_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "component_attribute WHERE component_id = '" . (int)$component_id . "' AND attribute_id = '" . (int)$component_attribute['attribute_id'] . "'");

			foreach ($component_attribute_description_query->rows as $component_attribute_description) {
				$component_attribute_description_data[$component_attribute_description['language_id']] = array('text' => $component_attribute_description['text']);
			}

			$component_attribute_data[] = array(
				'attribute_id'                  => $component_attribute['attribute_id'],
				'component_attribute_description' => $component_attribute_description_data
			);
		}

		return $component_attribute_data;
	}

	public function getComponentOptions($component_id) {
		$component_option_data = array();

		$component_option_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "component_option` po LEFT JOIN `" . DB_PREFIX . "option` o ON (po.option_id = o.option_id) LEFT JOIN `" . DB_PREFIX . "option_description` od ON (o.option_id = od.option_id) WHERE po.component_id = '" . (int)$component_id . "' AND od.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY o.sort_order ASC");

		foreach ($component_option_query->rows as $component_option) {
			$component_option_value_data = array();

			$component_option_value_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "component_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON(pov.option_value_id = ov.option_value_id) WHERE pov.component_option_id = '" . (int)$component_option['component_option_id'] . "' ORDER BY ov.sort_order ASC");

			foreach ($component_option_value_query->rows as $component_option_value) {
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

			$component_option_data[] = array(
				'component_option_id'    => $component_option['component_option_id'],
				'component_option_value' => $component_option_value_data,
				'option_id'            => $component_option['option_id'],
				'name'                 => $component_option['name'],
				'type'                 => $component_option['type'],
				'value'                => $component_option['value'],
				'required'             => $component_option['required']
			);
		}

		return $component_option_data;
	}

	public function getComponentOptionValue($component_id, $component_option_value_id) {
		$query = $this->db->query("SELECT pov.option_value_id, ovd.name, pov.quantity, pov.subtract, pov.price, pov.price_prefix, pov.points, pov.points_prefix, pov.weight, pov.weight_prefix FROM " . DB_PREFIX . "component_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.component_id = '" . (int)$component_id . "' AND pov.component_option_value_id = '" . (int)$component_option_value_id . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

		return $query->row;
	}

	public function getComponentImages($component_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "component_image WHERE component_id = '" . (int)$component_id . "' ORDER BY sort_order ASC");

		return $query->rows;
	}

	public function getComponentDiscounts($component_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "component_discount WHERE component_id = '" . (int)$component_id . "' ORDER BY quantity, priority, price");

		return $query->rows;
	}

	public function getComponentSpecials($component_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "component_special WHERE component_id = '" . (int)$component_id . "' ORDER BY priority, price");

		return $query->rows;
	}

//	public function getComponentRewards($component_id) {
//		$component_reward_data = array();
//
//		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "component_reward WHERE component_id = '" . (int)$component_id . "'");
//
//		foreach ($query->rows as $result) {
//			$component_reward_data[$result['customer_group_id']] = array('points' => $result['points']);
//		}
//
//		return $component_reward_data;
//	}

	public function getComponentDownloads($component_id) {
		$component_download_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "component_to_download WHERE component_id = '" . (int)$component_id . "'");

		foreach ($query->rows as $result) {
			$component_download_data[] = $result['download_id'];
		}

		return $component_download_data;
	}

	public function getComponentStores($component_id) {
		$component_store_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "component_to_store WHERE component_id = '" . (int)$component_id . "'");

		foreach ($query->rows as $result) {
			$component_store_data[] = $result['store_id'];
		}

		return $component_store_data;
	}
	
	public function getComponentseoUrls($component_id) {
		$component_seo_url_data = array();
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE query = 'component_id=" . (int)$component_id . "'");

		foreach ($query->rows as $result) {
			$component_seo_url_data[$result['store_id']][$result['language_id']] = $result['keyword'];
		}

		return $component_seo_url_data;
	}
	
	public function getComponentLayouts($component_id) {
		$component_layout_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "component_to_layout WHERE component_id = '" . (int)$component_id . "'");

		foreach ($query->rows as $result) {
			$component_layout_data[$result['store_id']] = $result['layout_id'];
		}

		return $component_layout_data;
	}

	public function getComponentRelated($component_id) {
		$component_related_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "component_related WHERE component_id = '" . (int)$component_id . "'");

		foreach ($query->rows as $result) {
			$component_related_data[] = $result['related_id'];
		}

		return $component_related_data;
	}
	
	public function getArticleRelated($component_id) {
		$article_related_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "component_related_article WHERE component_id = '" . (int)$component_id . "'");

		foreach ($query->rows as $result) {
			$article_related_data[] = $result['article_id'];
		}

		return $article_related_data;
	}

	public function getRecurrings($component_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "component_recurring` WHERE component_id = '" . (int)$component_id . "'");

		return $query->rows;
	}

	public function getTotalComponents($data = array()) {
		$sql = "SELECT COUNT(DISTINCT p.component_id) AS total FROM " . DB_PREFIX . "component p LEFT JOIN " . DB_PREFIX . "component_description pd ON (p.component_id = pd.component_id)";

		if (isset($data['filter_category']) && !is_null($data['filter_category'])) {
			$sql .= " LEFT JOIN " . DB_PREFIX . "component_to_category p2c ON (p.component_id = p2c.component_id)";
		}
		
		$sql .= " WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "'";

		if (!empty($data['filter_name'])) {
			$sql .= " AND pd.name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (!empty($data['filter_model'])) {
			$sql .= " AND p.model LIKE '%" . $this->db->escape($data['filter_model']) . "%'";
		}
		
		if (isset($data['filter_category']) && !is_null($data['filter_category'])) {
			if (!empty($data['filter_category']) && !empty($data['filter_sub_category'])) {
				$implode_data = array();
				
				$this->load->model('catalog/category');
				
				$categories = $this->model_catalog_category->getCategoriesChildren($data['filter_category']);
				
				foreach ($categories as $category) {
					$implode_data[] = "p2c.category_id = '" . (int)$category['category_id'] . "'";
				}
				
				$sql .= " AND (" . implode(' OR ', $implode_data) . ")";
			} else {
				if ((int)$data['filter_category'] > 0) {
					$sql .= " AND p2c.category_id = '" . (int)$data['filter_category'] . "'";
				} else {
					$sql .= " AND p2c.category_id IS NULL";
				}
			}
		}
		
		if (isset($data['filter_manufacturer_id']) && !is_null($data['filter_manufacturer_id'])) {
			$sql .= " AND p.manufacturer_id = '" . (int)$data['filter_manufacturer_id'] . "'";
		}

		if (isset($data['filter_price']) && !is_null($data['filter_price'])) {
			$sql .= " AND p.price LIKE '" . $this->db->escape($data['filter_price']) . "%'";
		}
		
		if (isset($data['filter_price_min']) && !is_null($data['filter_price_min'])) {
			$sql .= " AND p.price >= '" . (float)$data['filter_price_min'] . "'";
		}
		
		if (isset($data['filter_price_max']) && !is_null($data['filter_price_max'])) {
			$sql .= " AND p.price <= '" . (float)$data['filter_price_max'] . "'";
		}

		if (isset($data['filter_quantity']) && $data['filter_quantity'] !== '') {
			$sql .= " AND p.quantity = '" . (int)$data['filter_quantity'] . "'";
		}
		
		if (isset($data['filter_quantity_min']) && !is_null($data['filter_quantity_min'])) {
			$sql .= " AND p.quantity >= '" . (int)$data['filter_quantity_min'] . "'";
		}
		
		if (isset($data['filter_quantity_max']) && !is_null($data['filter_quantity_max'])) {
			$sql .= " AND p.quantity <= '" . (int)$data['filter_quantity_max'] . "'";
		}

		if (isset($data['filter_status']) && $data['filter_status'] !== '') {
			$sql .= " AND p.status = '" . (int)$data['filter_status'] . "'";
		}
		
		if (isset($data['filter_noindex']) && $data['filter_noindex'] !== '') {
			$sql .= " AND p.noindex = '" . (int)$data['filter_noindex'] . "'";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}

	public function getTotalcomponentsByTaxClassId($tax_class_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "component WHERE tax_class_id = '" . (int)$tax_class_id . "'");

		return $query->row['total'];
	}

	public function getTotalcomponentsByStockStatusId($stock_status_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "component WHERE stock_status_id = '" . (int)$stock_status_id . "'");

		return $query->row['total'];
	}

	public function getTotalcomponentsByWeightClassId($weight_class_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "component WHERE weight_class_id = '" . (int)$weight_class_id . "'");

		return $query->row['total'];
	}

	public function getTotalcomponentsByLengthClassId($length_class_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "component WHERE length_class_id = '" . (int)$length_class_id . "'");

		return $query->row['total'];
	}

	public function getTotalcomponentsByDownloadId($download_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "component_to_download WHERE download_id = '" . (int)$download_id . "'");

		return $query->row['total'];
	}

	public function getTotalcomponentsByManufacturerId($manufacturer_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "component WHERE manufacturer_id = '" . (int)$manufacturer_id . "'");

		return $query->row['total'];
	}

	public function getTotalcomponentsByAttributeId($attribute_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "component_attribute WHERE attribute_id = '" . (int)$attribute_id . "'");

		return $query->row['total'];
	}

	public function getTotalcomponentsByOptionId($option_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "component_option WHERE option_id = '" . (int)$option_id . "'");

		return $query->row['total'];
	}

	public function getTotalcomponentsByProfileId($recurring_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "component_recurring WHERE recurring_id = '" . (int)$recurring_id . "'");

		return $query->row['total'];
	}

	public function getTotalcomponentsByLayoutId($layout_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "component_to_layout WHERE layout_id = '" . (int)$layout_id . "'");

		return $query->row['total'];
	}
}
