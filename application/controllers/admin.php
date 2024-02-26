<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Admin_Model');
        $this->load->model('Sf_Tickets_Model');
    }
    
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();


        $this->form_validation->set_rules('role', 'role', 'required');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
        } 
        else {
            $data = [
                'role' => $this->input->post('role')
            ];

            $this->db->insert('user_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New Role Added!</div>');
            redirect('admin/role');
        }
    }

    public function getEditRole()
    {
        echo json_encode($this->Admin_Model->getEditRoleById($_POST['id']));
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();



        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role_access', $data);
        $this->load->view('templates/footer');
    }

    public function editRole()
    {
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->form_validation->set_rules('role', 'role', 'required');
            $data = [
                'role' => $this->input->post('role')
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user_role', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                 Role Edited</div>');
            redirect('admin/role');
   
    }

    public function deleteRole($id)
    {  
      
        $this->db->where('id', $id);
        $this->db->delete('user_role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Role Deleted!</div>');
        redirect('admin/role');
    }
  
    
    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id

        ];

        $result = $this->db->get_where('user_access_menu', $data);


        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Access Changed!</div>');
    }
}
