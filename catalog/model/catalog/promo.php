<?php
class ModelCatalogPromo extends Model {

	public function getPromo($promo_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "promo WHERE promo_id = '" . (int)$promo_id . "'");

		return $query->row;
	}

    public function getPromoDescription($promo_id) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "promo_description WHERE promo_id = '" . (int)$promo_id . "' AND language_id = '" . (int)$this->config->get('config_language_id') . "'");

        return !empty($query->rows) ? $query->rows[0] : null;
    }

	public function getPromos($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "promo";

		$sort_data = array(
			'name',
			'code',
			'discount',
			'date_start',
			'date_end',
			'status'
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

	public function getPromoProducts($promo_id) {
		$Promo_product_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "promo_product WHERE promo_id = '" . (int)$promo_id . "'");

		foreach ($query->rows as $result) {
			$Promo_product_data[] = $result['product_id'];
		}

		return $Promo_product_data;
	}

	public function getPromoCategories($promo_id) {
		$Promo_category_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "promo_category WHERE promo_id = '" . (int)$promo_id . "'");

		foreach ($query->rows as $result) {
			$Promo_category_data[] = $result['category_id'];
		}

		return $Promo_category_data;
	}

	public function getTotalPromos() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "promo");

		return $query->row['total'];
	}
}