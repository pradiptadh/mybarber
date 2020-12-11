<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_barber extends CI_Model {

	public function count_booking()
	{
		$this->db->select('tanggal_booking');
		$query = $this->db->get_where('booking',array('tanggal_booking'=>date('Y-m-d')));
		return $query->num_rows();
	}	
	public function count_done()
	{
		$query = $this->db->query("SELECT no_antri as no FROM booking WHERE tanggal_booking = '".date('Y-m-d')."' AND jam_booking <= '".date('H:i',strtotime('-1 hour'))."'");
		return $query->num_rows();
	}
	public function count_queue()
	{
		$query = $this->db->get_where('booking',array('id_user'=>$this->session->userdata('id'),'tanggal_booking'=>date('Y-m-d')));
		return $query->num_rows();
	}
	public function count_order()
	{
		$query = $this->db->query("SELECT no_antri as no FROM booking WHERE tanggal_booking = '".date('Y-m-d')."' AND jam_booking <= '".date('H:i',strtotime('+1 hour'))."' AND jam_booking >= '".date('H:i',strtotime('-1 hour'))."' AND status = 'booking'");
		return $query;
	}
	public function avatar()
	{
		$this->db->select('avatar');
		$this->db->get_where('user',array('id_user'=>$this->session->userdata('id')));
	}
	public function add_booking()
	{
		$this->db->select_max('no_antri');
		$this->db->select_max('jam_booking');
		$query = $this->db->get_where('booking',array('tanggal_booking'=>date('Y-m-d'),'status'=>'pending'));
		$no_antri = $query->row()->no_antri + 1;

		if ($this->db->get_where('booking',array('tanggal_booking'=>date('Y-m-d'),'status'=>'pending'))->num_rows() == 0) {
			$jam_booking = date('H:i',strtotime('+1 hour',strtotime(date('h:i'))));
		}else{
			$jam_booking = date('H:i',strtotime('+1 hour',strtotime($query->row()->jam_booking)));
		}
		if ($jam_booking > '17:00' OR $jam_booking < '08:00') {
			$this->session->set_flashdata('gagal', 'Maaf Tidak Bisa Booking, no antrian Habis');
			redirect('dashboard');
		}else{
			$query = $this->db->insert('booking',array(
				'id_user'=>$this->session->userdata('id'),
				'no_antri'=>$no_antri,
				'jam_booking'=>$jam_booking,
				'status'=>'pending',
				'tanggal_booking'=>date('Y-m-d'),
				'created_at'=>date('Y-m-d H:i:s'),
			));
			$id = $this->db->insert_id();
			if ($query == TRUE) {
				$this->session->set_flashdata('berhasil', 'Berhasil Booking Antrian');
				redirect('dashboard/tiket/'.$id);
			}else{
				$this->session->set_flashdata('gagal', 'Gagal Booking Antrian');
				redirect('dashboard');
			}
		}
	}
	public function booking_jam()
	{
		$this->db->select_max('no_antri');
		$query = $this->db->get_where('booking',array('tanggal_booking'=>date('Y-m-d')))->row();
		$no_antri = $query->no_antri + 1;

		$jam_booking = $this->db->query("SELECT * FROM booking WHERE tanggal_booking = '".$this->input->post('tanggal_booking')."' AND jam_booking <= '".date('H:i',strtotime('+1 hour',strtotime($this->input->post('jam'))))."' AND jam_booking >= '".date('H:i',strtotime('-1 hour',strtotime($this->input->post('jam'))))."'")->num_rows();
		if ($this->input->post('jam') > '17:00' OR $this->input->post('jam') < '08:00') {
			$this->session->set_flashdata('gagal', 'Maaf Tidak Bisa Booking, Toko Akan Tutup');
			redirect('dashboard');
		}elseif($jam_booking > 0){
			if($this->db->query("SELECT * FROM booking WHERE status = 'batal'")->num_rows() > 0){
				$query =  $this->db->insert('booking',array(
					'id_user'=>$this->session->userdata('id'),
					'no_antri'=>$no_antri,
					'jam_booking'=>$this->input->post('jam'),
					'status'=>'booking',
					'tanggal_booking'=>$this->input->post('tanggal_booking'),
					'created_at'=>date('Y-m-d H:i:s'),
				));

				$id = $this->db->insert_id();
				if ($query == TRUE) {
					$this->session->set_flashdata('berhasil', 'Berhasil Booking Antrian');
					redirect('dashboard/tiket/'.$id);
				}else{
					$this->session->set_flashdata('gagal', 'Gagal Booking Antrian');
					redirect('dashboard');
				}
			}else{
				$this->session->set_flashdata('gagal', 'Maaf Tidak Bisa Booking, jam booking sudah terisi');
				redirect('dashboard');
			}
		}elseif($this->input->post('tanggal_booking') == ''){
			$this->session->set_flashdata('gagal', 'Maaf Tidak Bisa Booking, Harap pilih tanggal');
			redirect('dashboard');
		}elseif($this->input->post('jam') <= date('H:i:s') AND $this->input->post('tanggal_booking') <= date('Y-m-d')){
			$this->session->set_flashdata('gagal', 'Maaf Tidak Bisa Booking, waktu tidak tersedia');
			redirect('dashboard');
		}else{
			$query =  $this->db->insert('booking',array(
				'id_user'=>$this->session->userdata('id'),
				'no_antri'=>$no_antri,
				'jam_booking'=>$this->input->post('jam'),
				'status'=>'booking',
				'tanggal_booking'=>$this->input->post('tanggal_booking'),
				'created_at'=>date('Y-m-d H:i:s'),
			));

			$id = $this->db->insert_id();
			if ($query == TRUE) {
				$this->session->set_flashdata('berhasil', 'Berhasil Booking Antrian');
				redirect('dashboard/tiket/'.$id);
			}else{
				$this->session->set_flashdata('gagal', 'Gagal Booking Antrian');
				redirect('dashboard');
			}

		}
	}
	public function booking_lain()
	{
		$this->db->select_max('no_antri');
		$this->db->select_max('jam_booking');
		$query = $this->db->get_where('booking',array('tanggal_booking'=>date('Y-m-d'), 'status'=>'pending'));
		if ($this->input->post('jam') == '00:00' OR $this->input->post('jam') == NULL  OR $this->input->post('jam') == '') {
			if ($this->db->get_where('booking',array('tanggal_booking'=>date('Y-m-d'),'status'=>'pending'))->num_rows() == 0) {
				$jam_booking = date('H:i',strtotime('+1 hour',strtotime(date('h:i'))));
			}else{
				$jam_booking = date('H:i',strtotime('+1 hour',strtotime($query->row()->jam_booking)));
			}
			$status = 'pending';
		}else{
			$hitung = $this->db->query("SELECT * FROM booking WHERE tanggal_booking= '".date('Y-m-d')."' AND jam_booking <= '".date('H:i',strtotime('+1 hour',strtotime($this->input->post('jam'))))."' AND jam_booking >= '".date('H:i',strtotime('-1 hour',strtotime($this->input->post('jam'))))."'")->num_rows();
			if($hitung > 0){
				$this->session->set_flashdata('gagal', 'Maaf Tidak Bisa Booking, jam booking sudah terisi');
				redirect('dashboard');
			}else{
				$jam_booking = $this->input->post('jam');
				$status = 'booking';
			}
		}

		$no_antri = $query->row()->no_antri + 1;

		if ($jam_booking > '17:00' OR $jam_booking < '08:00') {
			$this->session->set_flashdata('gagal', 'Maaf Tidak Bisa Booking, no antrian Habis');
			redirect('dashboard');
		}else{
			$query = $this->db->insert('booking',array(
				'id_user'=>$this->session->userdata('id'),
				'no_antri'=>$no_antri,
				'jam_booking'=>$jam_booking,
				'status'=>$status,
				'tanggal_booking'=>date('Y-m-d'),
				'created_at'=>date('Y-m-d H:i:s'),
			));
			$id = $this->db->insert_id();
			if ($query == TRUE) {
				$last = $this->db->insert('alamat',array(
					'id_booking'=>$id,
					'nama'=>$this->input->post('nama'),
					'nohp'=>$this->input->post('nohp'),
					'umur'=>$this->input->post('umur'),
					'alamat'=>$this->input->post('alamat')
				));
				if ($last==true) {
					
					$this->session->set_flashdata('berhasil', 'Berhasil Booking Antrian');
					redirect('dashboard/tiket/'.$id);
				}
			}else{
				$this->session->set_flashdata('gagal', 'Gagal Booking Antrian');
				redirect('dashboard');
			}

		}
	}
	public function history()
	{
		$this->db->select('user.nama as nama,booking.no_antri as nomer,user.umur as umur, booking.jam_booking as booking, booking.tanggal_booking as tgl, booking.status as status, booking.id_booking as id_booking, booking.created_at as created');
		$this->db->from('booking');
		$this->db->join('user', 'booking.id_user = user.id_user');
		$this->db->where('booking.id_user',$this->session->userdata('id'));
		$this->db->order_by('booking.tanggal_booking', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function data_booking($id)
	{
		$this->db->select('user.nama as nama,user.umur as umur,booking.no_antri as nomer, booking.jam_booking as booking, booking.tanggal_booking as tgl, booking.status as status, booking.id_booking as id_booking, booking.created_at as created');
		$this->db->from('booking');
		$this->db->join('user', 'booking.id_user = user.id_user');
		$this->db->where('booking.id_booking',$id);
		$this->db->order_by('booking.tanggal_booking', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function history_admin()
	{
		$this->db->select('user.nama as nama,booking.no_antri as nomer, booking.jam_booking as booking, booking.tanggal_booking as tgl, booking.status as status, booking.id_booking as id_booking, booking.created_at as created');
		$this->db->from('booking');
		$this->db->join('user', 'booking.id_user = user.id_user');
		$this->db->order_by('booking.tanggal_booking', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function history_lain()
	{
		$this->db->select('user.nama as nama,booking.no_antri as nomer, booking.jam_booking as booking');
		$this->db->from('booking');
		$this->db->join('user', 'booking.id_user = user.id_user');
		$this->db->where('booking.id_user',$this->session->userdata('id'));
		$this->db->order_by('booking.tanggal_booking', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function profile()
	{
		$query = $this->db->get_where('user',array('id_user'=>$this->session->userdata('id')));
		return $query->row();
	}
	public function book()
	{
		$query = $this->db->get_where('booking',array('id_booking'=>$this->session->userdata('id')));
		return $query->row();
	}
	public function act_profile()
	{
		$cek = $this->db->get_where('user',array('id_user'=>$this->session->userdata('id')))->row();
		if($this->input->post('password') != NULL){
			if ($cek->password != md5($this->input->post('password'))) {
				$this->session->set_flashdata('gagal', 'Password lama tidak sesuai');
				redirect('dashboard/profile');
			}else if($this->input->post('pass_baru') != NULL){
				$this->db->update('user',array(
					'nama'=>$this->input->post('nama'),
					'noHp'=>$this->input->post('nohp'),
					'umur'=>$this->input->post('umur'),
					'alamat'=>$this->input->post('alamat'),
					'password'=>md5($this->input->post('pass_baru'))
				),array(
					'id_user'=>$this->session->userdata('id')
				));
				$this->session->set_flashdata('berhasil', 'Data dan Password Berhasil di ubah');
				redirect('dashboard/profile');
			}
		}else{
			$this->db->update('user',array(
				'nama'=>$this->input->post('nama'),
				'noHp'=>$this->input->post('nohp'),
				'umur'=>$this->input->post('umur'),
				'alamat'=>$this->input->post('alamat'),
			),array(
				'id_user'=>$this->session->userdata('id')
			));
			$this->session->set_flashdata('berhasil', 'Data Berhasil di ubah');
			redirect('dashboard/profile');
		}
		
	}
	public function data_user()
	{
		return $this->db->get('user')->result();
	}
	public function act_edit_user()
	{
		$query = $this->db->update('user',array(
			'nama'=>$this->input->post('nama'),
			'noHp'=>$this->input->post('nohp'),
			'alamat'=>$this->input->post('alamat'),
			'umur'=>$this->input->post('umur'),
		),array(
			'id_user'=>$this->input->post('idnya')
		));
		if ($query == TRUE) {
			$this->session->set_flashdata('berhasil', 'Berhasil Ubah Data');
			redirect('dashboard/user');
		}else{
			$this->session->set_flashdata('gagal', 'Gagal Ubah Data');
			redirect('dashboard/user');
		}
	}
	public function act_edit_booking()
	{
		$query = $this->db->update('booking',array(
			'jam_booking'=>$this->input->post('jam_booking'),
			'status'=>$this->input->post('status'),
			'tanggal_booking'=>$this->input->post('tanggal_booking'),
			'created_at'=>$this->input->post('created_at'),
		),array(
			'id_booking'=>$this->input->post('idnya')
		));
		if ($query == TRUE) {
			$this->session->set_flashdata('berhasil', 'Berhasil Ubah Data');
			redirect('dashboard/data_booking');
		}else{
			$this->session->set_flashdata('gagal', 'Gagal Ubah Data');
			redirect('dashboard/data_booking');
		}
	}
	public function deleteuser()
	{
		$query = $this->db->delete('user',array('id_user'=>$this->input->post('idnya')));
		if ($query == TRUE) {
			$this->session->set_flashdata('berhasil', 'Berhasil Delete Data');
			redirect('dashboard/user');

		}else{
			$this->session->set_flashdata('gagal', 'Gagal Delete Data');
			redirect('dashboard/user');
		}
	}
		public function deletebooking()
	{
		$query = $this->db->delete('booking',array('id_booking'=>$this->input->post('idnya')));
		if ($query == TRUE) {
			$this->session->set_flashdata('berhasil', 'Berhasil Delete Data');
			redirect('dashboard/data_booking');
		}else{
			$this->session->set_flashdata('gagal', 'Gagal Delete Data');
			redirect('dashboard/data_booking');
		}
	}
	public function act_batalbook()
	{
		$query = $this->db->update('booking',array(
			'status'=>'batal')
		,array('id_booking'=>$this->input->post('idnya')));

		if ($query == TRUE) {
			$this->session->set_flashdata('berhasil', 'Berhasil Batalkan Pesanan');
			redirect('dashboard/data_booking');
		}else{
			$this->session->set_flashdata('gagal', 'Gagal Batalkan Pesanan');
			redirect('dashboard/data_booking');
		}

	}
	public function act_selesaibook()
	{
		$query = $this->db->update('booking',array(
			'status'=>'selesai')
		,array('id_booking'=>$this->input->post('idnya')));

		if ($query == TRUE) {
			$this->session->set_flashdata('berhasil', 'Berhasil selesaikan Pesanan');
			redirect('dashboard/data_booking');
		}else{
			$this->session->set_flashdata('gagal', 'Gagal selesaikan Pesanan');
			redirect('dashboard/data_booking');
		}

	}
	public function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}
}

/* End of file Model_barber.php */
/* Location: ./application/models/Model_barber.php */