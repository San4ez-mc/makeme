<?php
class ControllerExtensionModuleReviews extends Controller {
    public function index()
    {
        $this->load->language('product/product');

        $this->load->model('catalog/review');
        $this->load->model('tool/image');

        if (isset($this->request->get['page'])) {
            $page = (int)$this->request->get['page'];
        } else {
            $page = 1;
        }

        $data['reviews'] = array();

        $results = $this->model_catalog_review->getReviews( ($page - 1) * 5, 5);
//var_dump($results);
        foreach ($results as $result) {
            $data['reviews'][] = array(
                'author' => $result['author'],
                'about' => $result['about'],
                'thumb' => $this->model_tool_image->resize($result['image'], 400, 400),
                'text' => nl2br($result['text']),
                'rating' => (int)$result['rating'],
                'href' => $this->url->link('product/product', 'product_id=' . $result['product_id']),
                'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
            );
        }

        return $this->load->view('extension/module/reviews', $data);
    }
}