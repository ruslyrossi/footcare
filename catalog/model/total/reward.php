<?php
class ModelTotalReward extends Model {
	public function getTotal(&$total_data, &$total, &$taxes) {
		if (isset($this->session->data['reward'])) {
			$this->language->load('total/reward');
			
			$rate = $this->config->get('config_reward_rate');
			
			$points = $this->customer->getRewardPoints();
			
			if ($this->session->data['reward'] <= $points && !empty($rate)) {
				$discount_total = 0;

				$points_total = 0;

				foreach ($this->cart->getProducts() as $product) {
					if ($product['points']) {
						$points_total += $product['points'];
					}
				}	

				$points = min($points, $points_total);
				
				$discount_total = (1 / $rate) * $this->session->data['reward'];

				$total_data[] = array(
					'code'       => 'reward',
					'title'      => sprintf($this->language->get('text_reward'), $this->session->data['reward']),
					'text'       => $this->currency->format(-$discount_total),
					'value'      => -$discount_total,
					'sort_order' => $this->config->get('reward_sort_order')
				);

				$total -= $discount_total;
			} 
		}
	}

	public function confirm($order_info, $order_total) {
		$this->language->load('total/reward');

		$points = 0;

		$start = strpos($order_total['title'], '(') + 1;
		$end = strrpos($order_total['title'], ')');

		if ($start && $end) {  
			$points = substr($order_total['title'], $start, $end - $start);
		}	

		if ($points) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "customer_reward SET customer_id = '" . (int)$order_info['customer_id'] . "', description = '" . $this->db->escape(sprintf($this->language->get('text_order_id'), (int)$order_info['order_id'])) . "', points = '" . (float)-$points . "', date_added = NOW()");				
		}
	}		
}
?>