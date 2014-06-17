<?php  
class ControllerModuleProductfeatures extends Controller {
	protected function index($setting) {
		$this->language->load('module/productfeatures');
		
		$this->data['heading_title'] = sprintf($this->language->get('heading_title'), $this->config->get('config_name'));

		$this->data['message'] = html_entity_decode($setting['description'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/productfeatures.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/productfeatures.tpl';
		} else {
			$this->template = 'default/template/module/productfeatures.tpl';
		}
		
		$this->render();
	}
}
?>