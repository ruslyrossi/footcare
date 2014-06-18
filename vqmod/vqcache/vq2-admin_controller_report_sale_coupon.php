<?php
class ControllerReportSaleCoupon extends Controller {
public function export() {
								
				$this->load->model('report/coupon');

				$coupons = array();

				if (isset($this->request->get['filter_date_start'])) {
					$filter_date_start = $this->request->get['filter_date_start'];
				} else {
					$filter_date_start = '';
				}
		
				if (isset($this->request->get['filter_date_end'])) {
					$filter_date_end = $this->request->get['filter_date_end'];
				} else {
					$filter_date_end = '';
				}
				
				if (isset($this->request->get['filter_customer_group'])) {
					$filter_customer_group = $this->request->get['filter_customer_group'];
				} else {
					$filter_customer_group = '';
				}
				
				$data = array(
					'filter_date_start'	=> $filter_date_start, 
					'filter_date_end'	=> $filter_date_end, 
					'filter_customer_group'  => $filter_customer_group,
					'start'             => 0,
					'limit'             => '9999'
				);

				$results = $this->model_report_coupon->getCoupons($data);
				
				foreach ($results as $result) {
					$coupons[] = array(
						'name'   => $result['name'],
						'code'   => $result['code'],
						'orders' => $result['orders'],
						'total'  => $this->currency->format($result['total'], $this->config->get('config_currency'))
					);
				}
				
				$coupons_data = array();
				
				$coupons_column=array();
				
				$coupons_column = array('Coupon Name', 'Coupon Code', 'Orders', 'Total');
					
				$coupons_data[0]=   $coupons_column;   
				
				foreach($coupons as $coupons_row)
				{
					$coupons_data[]=   $coupons_row;            
				}     
				require_once(DIR_SYSTEM . 'library/excel_xml.php');
				$xls = new Excel_XML('UTF-8', false, 'Sales Coupons Report');
				
				$xls->addArray($coupons_data);
				
				$xls->generateXML('sales_coupons_report_'.date('Y-m-d _ H:i:s'));	

			}
	public function index() {     
		$this->language->load('report/sale_coupon');

		$this->document->setTitle($this->language->get('heading_title'));

		if (isset($this->request->get['filter_date_start'])) {
			$filter_date_start = $this->request->get['filter_date_start'];
		} else {
			$filter_date_start = '';
		}

		if (isset($this->request->get['filter_date_end'])) {
			$filter_date_end = $this->request->get['filter_date_end'];
		} else {
			$filter_date_end = '';
		}
		
		if (isset($this->request->get['filter_customer_group'])) {
			$filter_customer_group = $this->request->get['filter_customer_group'];
		} else {
			$filter_customer_group = '';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['filter_date_start'])) {
			$url .= '&filter_date_start=' . $this->request->get['filter_date_start'];
		}

		if (isset($this->request->get['filter_date_end'])) {
			$url .= '&filter_date_end=' . $this->request->get['filter_date_end'];
		}
		
		if (isset($this->request->get['filter_customer_group'])) {
			$url .= '&filter_customer_group=' . $this->request->get['filter_customer_group'];
		}	

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('report/sale_coupon', 'token=' . $this->session->data['token'] . $url, 'SSL'),
			'separator' => ' :: '
		);

		$this->load->model('report/coupon');

		$this->data['coupons'] = array();

		$data = array(
			'filter_date_start'	=> $filter_date_start, 
			'filter_date_end'	=> $filter_date_end, 
			'filter_customer_group'  => $filter_customer_group,
			'start'             => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit'             => $this->config->get('config_admin_limit')
		);

		$coupon_total = $this->model_report_coupon->getTotalCoupons($data); 

		$results = $this->model_report_coupon->getCoupons($data);

		foreach ($results as $result) {
			$action = array();

			$action[] = array(
				'text' => $this->language->get('text_edit'),
				'href' => $this->url->link('sale/coupon/update', 'token=' . $this->session->data['token'] . '&coupon_id=' . $result['coupon_id'] . $url, 'SSL')
			);

			$this->data['coupons'][] = array(
				'name'   => $result['name'],
				'code'   => $result['code'],
				'orders' => $result['orders'],
				'total'  => $this->currency->format($result['total'], $this->config->get('config_currency')),
				'action' => $action
			);
		}

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_no_results'] = $this->language->get('text_no_results');

		$this->data['column_name'] = $this->language->get('column_name');
		$this->data['column_code'] = $this->language->get('column_code');
		$this->data['column_orders'] = $this->language->get('column_orders');
		$this->data['column_total'] = $this->language->get('column_total');
		$this->data['column_action'] = $this->language->get('column_action');

		$this->data['entry_date_start'] = $this->language->get('entry_date_start');
		$this->data['entry_date_end'] = $this->language->get('entry_date_end');
		$this->data['entry_customer_group'] = $this->language->get('entry_customer_group');

$this->data['button_export'] = $this->language->get('button_export');
			$this->data['export'] = $this->url->link('report/sale_coupon/export', 'token=' . $this->session->data['token']. $url , 'SSL');
		$this->data['button_filter'] = $this->language->get('button_filter');

		$this->data['token'] = $this->session->data['token'];
		
		$this->load->model('sale/customer_group');
		
		$this->data['customer_groups'] = $this->model_sale_customer_group->getCustomerGroups();

		$url = '';

		if (isset($this->request->get['filter_date_start'])) {
			$url .= '&filter_date_start=' . $this->request->get['filter_date_start'];
		}

		if (isset($this->request->get['filter_date_end'])) {
			$url .= '&filter_date_end=' . $this->request->get['filter_date_end'];
		}
		
		if (isset($this->request->get['filter_customer_group'])) {
			$url .= '&filter_customer_group=' . $this->request->get['filter_customer_group'];
		}

		$pagination = new Pagination();
		$pagination->total = $coupon_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('report/sale_coupon', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$this->data['pagination'] = $pagination->render();

		$this->data['filter_date_start'] = $filter_date_start;
		$this->data['filter_date_end'] = $filter_date_end;	
		$this->data['filter_customer_group'] = $filter_customer_group;

		$this->template = 'report/sale_coupon.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}
}
?>