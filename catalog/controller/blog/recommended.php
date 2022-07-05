<?php
// *	@source		See SOURCE.txt for source and other copyright.
// *	@license	GNU General Public License version 3; see LICENSE.txt

class ControllerBlogRecommended extends Controller {
	public function index() { 
	
		$this->load->language('blog/latest');

		$this->load->model('blog/article');

		$this->load->model('tool/image');

		$data['articles'] = array();
			
			$article_data = array(
				'sort'               => '',
				'order'              => '',
				'start'              => 0,
				'limit'              => 5
			);
					
//			$article_total = $this->model_blog_article->getTotalArticles($article_data);
			
			$results = $this->model_blog_article->getArticles($article_data);

        $data['blog'] = $this->url->link('blog/category', '', true);
		foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $this->config->get('configblog_image_article_width'), $this->config->get('configblog_image_article_height'));
				} else {
					$image = false;
				}
							
				
			if ($this->config->get('configblog_review_status')) {
					$rating = (int)$result['rating'];
				} else {
					$rating = false;
				}
								
				$data['articles'][] = array(
					'article_id'  => $result['article_id'],
					'thumb'       => $image,
					'name'        => $result['name'],
					'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('configblog_article_description_length')) . '..',
					'date_added'  => date($this->language->get('date_format_word'), strtotime($result['date_added'])),
					'viewed'      => $result['viewed'],
					'rating'      => $rating,
					'reviews'     => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
					'href'        => $this->url->link('blog/article',  '&article_id=' . $result['article_id'])
				);
			}

		return $this->load->view('blog/recommended', $data);

	}
}
?>