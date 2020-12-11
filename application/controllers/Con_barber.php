<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author
*/
class Con_barber extends CI_Controller {

	public function index()
	{
		$this->load->view('maininclude');
	}
	public function sign_in(){
		$this->load->view('load/sign_in');
	}
	public function sign_up(){
		$this->load->view('maininclude');
	}
	public function actlogin()
	{
        $hp = $this->input->post('username');
            $cek = $this->db->get_where('user',array('username' => $hp));
        if ($cek->num_rows() > 0 ) {
            $isi = $cek->row();
            $array = array(
                'id' => $isi->id_user,
                'nama' => $isi->nama,
                'alamat' => $isi->alamat,
                'level' => $isi->level,
            );
            
            $this->session->set_userdata($array);
            $this->session->set_flashdata('berhasil', 'Selamat Datang');
            redirect('dashboard');
        }else{
            $this->session->set_flashdata('gagal', 'Username / Password Yang Anda Masukan Salah');
            redirect('/');          
        }
    }
	public function actregis()
    {
        $n = $this->input->post('nama');
        $um = $this->input->post('umur');
        $us = $this->input->post('username');
        $p = $this->input->post('password');
        if($n == '' OR $um == '' OR $us == '' OR $p == ''){
            $this->session->set_flashdata('gagal','Data kosong');
            redirect('/');
        }else{
    	$username = $this->db->get_where('user',array('username' => $this->input->post('username')));
		if($username->num_rows() > 0) {
    		$this->session->set_flashdata('gagal', 'Username Sudah Ada');
    	}else{
    		$query = $this->db->insert('user',array(
    			'nama' => $this->input->post('nama'),
    			'username' => $this->input->post('username'),
    			'password' => md5($this->input->post('password')),
    			'noHp' => '0',
    			'umur' => $this->input->post('umur'),
                'level' => 'member',
    			'created_at' => date('Y-m-d H:i:s'),
    		));

    		if ($query == TRUE) {
    			redirect('con_barber/sign_in');
    		}else{
                redirect('con_barber/sign_up');
    		}
    	   }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}