<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id')=="") {
			redirect('con_barber/sign_in');
		}
		date_default_timezone_set("Asia/Jakarta");
		
	}  
	public function index()
	{
		$data['booking'] = $this->model_barber->count_booking();
		$data['done'] = $this->model_barber->count_done();
		$data['queue'] = $this->model_barber->count_queue();
		$data['order'] = $this->model_barber->count_order();
		$data['avatar'] = $this->model_barber->avatar();
		$data['page_view'] = 'admin/dashboard';
		$this->load->view('admin/index',$data);
	}
	public function booking()
	{
		$query = $this->db->get_where('user',array('id_user'=>$this->session->userdata('id')));
		if ($query->row()->umur == 0) {
			redirect('dashboard/profile');
		}else{
			$data['booking'] = $this->model_barber->count_booking();
			$data['done'] = $this->model_barber->count_done();
			$data['queue'] = $this->model_barber->count_queue();
			$data['order'] = $this->model_barber->count_order();
			$data['avatar'] = $this->model_barber->avatar();
			$data['history'] = $this->model_barber->history();
			$data['page_view'] = 'admin/booking';
			$this->load->view('admin/index',$data);
		}
	}
	public function history()
	{
		$data['booking'] = $this->model_barber->count_booking();
		$data['done'] = $this->model_barber->count_done();
		$data['queue'] = $this->model_barber->count_queue();
		$data['order'] = $this->model_barber->count_order();
		$data['avatar'] = $this->model_barber->avatar();
		$data['history'] = $this->model_barber->history();
		$data['page_view'] = 'admin/history';
		$this->load->view('admin/index',$data);
	}
	public function profile()
	{
		$data['booking'] = $this->model_barber->count_booking();
		$data['done'] = $this->model_barber->count_done();
		$data['queue'] = $this->model_barber->count_queue();
		$data['order'] = $this->model_barber->count_order();
		$data['avatar'] = $this->model_barber->avatar();
		$data['profile'] = $this->model_barber->profile();
		$data['page_view'] = 'admin/profile';
		$this->load->view('admin/index',$data);
	}
	public function user()
	{
		$data['booking'] = $this->model_barber->count_booking();
		$data['done'] = $this->model_barber->count_done();
		$data['queue'] = $this->model_barber->count_queue();
		$data['order'] = $this->model_barber->count_order();
		$data['avatar'] = $this->model_barber->avatar();
		$data['user'] = $this->model_barber->data_user();
		$data['page_view'] = 'admin/user';
		$this->load->view('admin/index',$data);
	}
	public function data_booking()
	{
		$data['booking'] = $this->model_barber->count_booking();
		$data['done'] = $this->model_barber->count_done();
		$data['queue'] = $this->model_barber->count_queue();
		$data['order'] = $this->model_barber->count_order();
		$data['avatar'] = $this->model_barber->avatar();
		$data['history'] = $this->model_barber->history_admin();
		$data['page_view'] = 'admin/data_booking';
		$this->load->view('admin/index',$data);
	}
	public function data_booking_user()
	{
		$data['booking'] = $this->model_barber->count_booking();
		$data['done'] = $this->model_barber->count_done();
		$data['queue'] = $this->model_barber->count_queue();
		$data['order'] = $this->model_barber->count_order();
		$data['avatar'] = $this->model_barber->avatar();
		$data['history'] = $this->model_barber->history_admin();
		$data['page_view'] = 'admin/data_booking_user';
		$this->load->view('admin/index',$data);
	}
	public function tiket($id)
	{
		if ($id==NULL) {
			$this->session->set_flashdata('gagal', 'Tidak ada data');
		}else{
			$data['booking'] = $this->model_barber->count_booking();
			$data['done'] = $this->model_barber->count_done();
			$data['queue'] = $this->model_barber->count_queue();
			$data['order'] = $this->model_barber->count_order();
			$data['avatar'] = $this->model_barber->avatar();
			$data['history'] = $this->model_barber->data_booking($id);
			$data['page_view'] = 'admin/history';
			$this->load->view('admin/index',$data);
		}
	}
	public function cek_print()
	{
		$cek = $this->db->get_where('booking',array('id_booking'=>$this->input->post('idnya')))->num_rows();
		if ($cek > 0) {
			$val = array('success'=>true,'message'=>'berhasil');
		}else{
			$val = array('success'=>false,'message'=>'gagal');
		}
		echo json_encode($val);
	}
	public function printdata($id)
	{
		$data['history'] = $this->model_barber->data_booking($id);
		$this->load->view('admin/print', $data);
	}
	public function edit_user()
	{
		$id = $this->input->post('idnya');
		$data['profile'] = $this->db->get_where('user',array('id_user'=>$id))->row();
		$this->load->view('admin/data_user', $data);
	}
	public function edit_booking()
	{
		$id = $this->input->post('idnya');
		$data['book'] = $this->db->get_where('booking',array('id_booking'=>$id))->row();
		$this->load->view('admin/edit_data_book', $data);
	}
	public function actedit_user()
	{
		$this->model_barber->act_edit_user();
	}
	public function actedit_booking()
	{
		$this->model_barber->act_edit_booking();
	}
	public function delete_user()
	{
		$this->model_barber->deleteuser();
	}
	public function delete_booking()
	{
		$this->model_barber->deletebooking();
	}
	public function actbooking()
	{
		$this->model_barber->add_booking();
	}
	public function booking_jam()
	{
		$this->model_barber->booking_jam();
	}
	public function booking_lain()
	{
		$this->model_barber->booking_lain();
	}
	public function act_profile()
	{
		$this->model_barber->act_profile();
	}
	public function batal_book()
	{
		$this->model_barber->act_batalbook();
	}
	public function selesai_book()
	{
		$this->model_barber->act_selesaibook();
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */