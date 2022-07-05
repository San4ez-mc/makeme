<?php
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ModelCatalogBoxing extends Model {
	public function addboxing($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "boxing SET name = '" . $this->db->escape($data['name']) . "', sort_order = '" . (int)$data['sort_order'] . "'");

		$boxing_id = $this->db->getLastId();
		
//		if (isset($data['boxing_layout'])) {
//			foreach ($data['boxing_layout'] as $store_id => $layout_id) {
//				$this->db->query("INSERT INTO " . DB_PREFIX . "boxing_to_layout SET boxing_id = '" . (int)$boxing_id . "', store_id = '" . (int)$store_id . "', layout_id = '" . (int)$layout_id . "'");
//			}
//		}

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "boxing SET image = '" . $this->db->escape($data['image']) . "' WHERE boxing_id = '" . (int)$boxing_id . "'");
		}

        if (isset($data['bg_image'])) {
            $this->db->query("UPDATE " . DB_PREFIX . "boxing SET bg_image = '" . $this->db->escape($data['bg_image']) . "' WHERE boxing_id = '" . (int)$boxing_id . "'");
        }
		
		foreach ($data['boxing_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "boxing_description SET boxing_id = '" . (int)$boxing_id . "', language_id = '" . (int)$language_id . "', description = '" . $this->db->escape($value['description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_h1 = '" . $this->db->escape($value['meta_h1']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "'");
		}

		if (isset($data['boxing_store'])) {
			foreach ($data['boxing_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "boxing_to_store SET boxing_id = '" . (int)$boxing_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
		
//		if (isset($data['product_related'])) {
//			foreach ($data['product_related'] as $related_id) {
//				$this->db->query("INSERT INTO " . DB_PREFIX . "product_related_mn SET boxing_id = '" . (int)$boxing_id . "', product_id = '" . (int)$related_id . "'");
//			}
//		}
	
		if (isset($data['article_related'])) {
			foreach ($data['article_related'] as $related_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "article_related_mn SET boxing_id = '" . (int)$boxing_id . "', article_id = '" . (int)$related_id . "'");
			}
		}
				
		// SEO URL
		if (isset($data['boxing_seo_url'])) {
			foreach ($data['boxing_seo_url'] as $store_id => $language) {
				foreach ($language as $language_id => $keyword) {
					if (!empty($keyword)) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "seo_url SET store_id = '" . (int)$store_id . "', language_id = '" . (int)$language_id . "', query = 'boxing_id=" . (int)$boxing_id . "', keyword = '" . $this->db->escape(trim($keyword)) . "'");
					}
				}
			}
		}
		
		$this->cache->delete('boxing');

		return $boxing_id;
	}

	public function editBoxing($boxing_id, $data) {
		
//		$this->db->query("DELETE FROM " . DB_PREFIX . "boxing_to_layout WHERE boxing_id = '" . (int)$boxing_id . "'");
//
//		if (isset($data['boxing_layout'])) {
//			foreach ($data['boxing_layout'] as $store_id => $layout_id) {
//				$this->db->query("INSERT INTO " . DB_PREFIX . "boxing_to_layout SET boxing_id = '" . (int)$boxing_id . "', store_id = '" . (int)$store_id . "', layout_id = '" . (int)$layout_id . "'");
//			}
//		}
		
		$this->db->query("UPDATE " . DB_PREFIX . "boxing SET name = '" . $this->db->escape($data['name']) . "', sort_order = '" . (int)$data['sort_order'] . "' WHERE boxing_id = '" . (int)$boxing_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "boxing SET image = '" . $this->db->escape($data['image']) . "' WHERE boxing_id = '" . (int)$boxing_id . "'");
		}

        if (isset($data['bg_image'])) {
            $this->db->query("UPDATE " . DB_PREFIX . "boxing SET bg_image = '" . $this->db->escape($data['bg_image']) . "' WHERE boxing_id = '" . (int)$boxing_id . "'");
        }
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "boxing_description WHERE boxing_id = '" . (int)$boxing_id . "'");
		
//		foreach ($data['boxing_description'] as $language_id => $value) {
//			$this->db->query("INSERT INTO " . DB_PREFIX . "boxing_description SET boxing_id = '" . (int)$boxing_id . "', language_id = '" . (int)$language_id . "', description = '" . $this->db->escape($value['description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_h1 = '" . $this->db->escape($value['meta_h1']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "'");
//		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "boxing_to_store WHERE boxing_id = '" . (int)$boxing_id . "'");

		if (isset($data['boxing_store'])) {
			foreach ($data['boxing_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "boxing_to_store SET boxing_id = '" . (int)$boxing_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
		
//		$this->db->query("DELETE FROM " . DB_PREFIX . "product_related_mn WHERE boxing_id = '" . (int)$boxing_id . "'");
//
//		if (isset($data['product_related'])) {
//			foreach ($data['product_related'] as $related_id) {
//				$this->db->query("DELETE FROM " . DB_PREFIX . "product_related_mn WHERE boxing_id = '" . (int)$boxing_id . "' AND product_id = '" . (int)$related_id . "'");
//				$this->db->query("INSERT INTO " . DB_PREFIX . "product_related_mn SET boxing_id = '" . (int)$boxing_id . "', product_id = '" . (int)$related_id . "'");
//
//
//			}
//		}
		
//		$this->db->query("DELETE FROM " . DB_PREFIX . "article_related_mn WHERE boxing_id = '" . (int)$boxing_id . "'");
	
		if (isset($data['article_related'])) {
			foreach ($data['article_related'] as $related_id) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "article_related_mn WHERE boxing_id = '" . (int)$boxing_id . "' AND article_id = '" . (int)$related_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "article_related_mn SET boxing_id = '" . (int)$boxing_id . "', article_id = '" . (int)$related_id . "'");
				
	
			}
		}

		$this->db->query("DELETE FROM `" . DB_PREFIX . "seo_url` WHERE query = 'boxing_id=" . (int)$boxing_id . "'");

		if (isset($data['boxing_seo_url'])) {
			foreach ($data['boxing_seo_url'] as $store_id => $language) {
				foreach ($language as $language_id => $keyword) {
					if (!empty($keyword)) {
						$this->db->query("INSERT INTO `" . DB_PREFIX . "seo_url` SET store_id = '" . (int)$store_id . "', language_id = '" . (int)$language_id . "', query = 'boxing_id=" . (int)$boxing_id . "', keyword = '" . $this->db->escape(trim($keyword)) . "'");
					}
				}
			}
		}

		$this->cache->delete('boxing');
	}

	public function deleteboxing($boxing_id) {
		$this->db->query("DELETE FROM `" . DB_PREFIX . "boxing` WHERE boxing_id = '" . (int)$boxing_id . "'");
//		$this->db->query("DELETE FROM `" . DB_PREFIX . "boxing_to_layout` WHERE boxing_id = '" . (int)$boxing_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "boxing_description` WHERE boxing_id = '" . (int)$boxing_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "boxing_to_store` WHERE boxing_id = '" . (int)$boxing_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "seo_url` WHERE query = 'boxing_id=" . (int)$boxing_id . "'");
//		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_related_mn` WHERE boxing_id = '" . (int)$boxing_id . "'");
//		$this->db->query("DELETE FROM `" . DB_PREFIX . "article_related_mn` WHERE boxing_id = '" . (int)$boxing_id . "'");

		$this->cache->delete('boxing');
	}

	public function getBoxing($boxing_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "boxing WHERE boxing_id = '" . (int)$boxing_id . "'");

		return $query->row;
	}

	public function getBoxings($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "boxing";

		if (!empty($data['filter_name'])) {
			$sql .= " WHERE name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		$sort_data = array(
			'name',
			'sort_order'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY name";
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

	public function getBoxingStores($boxing_id) {
		$boxing_store_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "boxing_to_store WHERE boxing_id = '" . (int)$boxing_id . "'");

		foreach ($query->rows as $result) {
			$boxing_store_data[] = $result['store_id'];
		}

		return $boxing_store_data;
	}
	
//	public function getboxingSeoUrls($boxing_id) {
//		$boxing_seo_url_data = array();
//
//		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_url WHERE query = 'boxing_id=" . (int)$boxing_id . "'");
//
//		foreach ($query->rows as $result) {
//			$boxing_seo_url_data[$result['store_id']][$result['language_id']] = $result['keyword'];
//		}
//
//		return $boxing_seo_url_data;
//	}
	
//	public function getBoxingLayouts($boxing_id) {
//		$boxing_layout_data = array();
//		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "boxing_to_layout WHERE boxing_id = '" . (int)$boxing_id . "'");
//		foreach ($query->rows as $result) {
//			$boxing_layout_data[$result['store_id']] = $result['layout_id'];
//		}
//		return $boxing_layout_data;
//	}
	
//	public function getTotalboxingByLayoutId($layout_id) {
//		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "boxing_to_layout WHERE layout_id = '" . (int)$layout_id . "'");
//		return $query->row['total'];
//	}
	
	public function getTotalBoxings() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "boxing");

		return $query->row['total'];
	}
	
//		public function getBoxingDescriptions($boxing_id) {
//		$boxing_description_data = array();
//		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "boxing_description WHERE boxing_id = '" . (int)$boxing_id . "'");
//		foreach ($query->rows as $result) {
//			$boxing_description_data[$result['language_id']] = array(
//				'meta_title'       => $result['meta_title'],
//				'meta_h1'      	   => $result['meta_h1'],
//				'meta_description' => $result['meta_description'],
//				'meta_keyword'     => $result['meta_keyword'],
//				'description'      => $result['description']
//			);
//		}
//		return $boxing_description_data;
//	}
	
//	public function getProductRelated($boxing_id) {
//		$product_related_data = array();
//
//		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_related_mn WHERE boxing_id = '" . (int)$boxing_id . "'");
//
//		foreach ($query->rows as $result) {
//			$product_related_data[] = $result['product_id'];
//		}
//
//		return $product_related_data;
//	}
	
//	public function getArticleRelated($boxing_id) {
//		$article_related_data = array();
//
//		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "article_related_mn WHERE boxing_id = '" . (int)$boxing_id . "'");
//
//		foreach ($query->rows as $result) {
//			$article_related_data[] = $result['article_id'];
//		}
//
//		return $article_related_data;
//	}
}
