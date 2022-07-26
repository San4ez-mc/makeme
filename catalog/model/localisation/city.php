<?php

class ModelLocalisationCity extends Model
{
    public function getCity($city_id)
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "city WHERE city_id = '" . (int)$city_id . "'");

        return $query->row;
    }

    public function getCities($data = array())
    {
        $city_data = $this->cache->get('city.status');
        if (!$city_data) {

            $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "city WHERE status = '1' ORDER BY sort_order ASC");

            $city_data = $query->rows;

            $this->cache->set('city.status', $city_data);
        }

        return $city_data;
    }

    public function getCitiesByZoneId($zone_id, $q = '', $limit = 10)
    {
//        $city_data = $this->cache->get('city.' . (int)$zone_id);
//
//        if (!$city_data) {
            $where = '';
            if (strlen($q) > 0) {
                $where = ' AND name LIKE "%' . $q . '%"';
            }

            $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "city WHERE zone_id = '" . (int)$zone_id . "' AND status = '1' " . $where . " ORDER BY sort_order ASC LIMIT " . $limit);
            $city_data = $query->rows;

            $this->cache->set('city.' . (int)$zone_id, $city_data);
//        }

        return $city_data;
    }

    public function getCityByZoneId($zone_id)
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone WHERE zone_id = '" . (int)$zone_id . "' AND status = '1'");
        $city_data = $query->rows;

        $this->cache->set('city.' . (int)$zone_id, $city_data);

        return !empty($city_data[0]) ? $city_data[0] : '';
    }
}