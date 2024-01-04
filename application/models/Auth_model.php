<?php 
class Auth_model extends CI_Model{

    public function login() 
    {
        $username = $this->input->post('username' ,true);
        $password = $this->input->post('password' , true);

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if($user)
        {
            if($password == $user['password'])
            {
                $data = [
                    'username' => $user['username']
                ];
                $this->session->set_userdata($data);
                redirect('admin', $data);
            } else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                 Username / Password Salah!
		  			</div>');
					redirect('auth');
            }
        } else
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Username / Password Salah!
		  			</div>');
					redirect('auth');
        }
    }

}