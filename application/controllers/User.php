<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    // public function __construct() {
    //     parent::__construct();
    //     $admin_id=$this->session->userdata('id');
    //     if($admin_id==NULL)
    //     {
    //         redirect("Welcome/index");
    //     }
        
    // }

	/**
	 
	 */
    public function admin_login() {
        $email_address = $this->input->post('email', true);
        $admin_password = md5($this->input->post('password', true));
        //$access_label=$this->input->post('access_label',true);
        //$this->load->model('admin_model');
        $admin_info = $this->User_model->check_admin_login_info($email_address, $admin_password,$access_label);




//        echo $email_address.'--------'.$admin_password;
//        exit();
        $sdata = array();
        if ($admin_info) {
            $sdata['id'] = $admin_info->id;
            $sdata['name'] = $admin_info->name;
            //$sdata['access_label']=$admin_info->access_label;
            $this->session->set_userdata($sdata);
            redirect('dashboard');
        } else {

            $sdata['exception'] = "Your User Id Or Password Invalid !";
            $this->session->set_userdata($sdata);
            redirect('Welcome');
        }
    }

    public function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        //$this->session->unset_userdata('type');
        $sdata = array();
        $sdata['message'] = "You are successfully Logout !";
        $this->session->set_userdata($sdata);
        redirect("Welcome/index");
    }



	public function registration()
	{
		$this->load->view('users/register');
    }
    
	public function add_user()
	{
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required',
                        array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() == FALSE)
        {     
            // echo form_error('email');
            // exit;
                $this->load->view('users/register');
        }
        else
            {
                $data = array();
                $data['name'] = $this->input->post('name');
                $data['email'] = $this->input->post('email');
                $data['type'] = $this->input->post('type');
                $data['password'] = md5($this->input->post('password'));

                $result = $this->User_model->inserter('users', $data);

                if ($result > 0) {
                    $message = "User info save successfully";
                    $this->session->set_flashdata('message', $message);
                    return redirect('registration'); 

                } else {

                $message = "Please! Fill The Fields.";
                $this->session->set_flashdata('message', $message);
                return redirect('registration'); 
                }

                // $sdata=array();
                // $sdata['message']="User info save successfully";
                // $this->session->set_userdata($sdata);
                // return redirect('User/registration');               
            }
        
    }
    
    public function manage_user()
	{
        $data['user_info'] = $this->User_model->get_data('users');
        
        $data['home_content'] = $this->load->view('users/home',$data,true);
        $this->load->view('users/master', $data);
    }

    public function edit_user($id){

        $where = array(
            'id' => $id,          
        );


        $data=array();
        
        $data['user_byid']=$this->User_model->get_data('users','',$where);

        $data['home_content'] = $this->load->view('users/edit_user',$data,true);
        $this->load->view('users/master', $data);
    }
    public function update_user(){

        $id = $this->input->post('id');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required',
                        array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() == FALSE)
        {     
            // echo form_error('email');
            // exit;
            $wher = array(
                'id' => $id,          
            );
    
    
            $data=array();
            
            $data['user_byid']=$this->User_model->get_data('users','',$wher);
    
            $data['home_content'] = $this->load->view('users/edit_user',$data,true);
            $this->load->view('users/master', $data);
                //return redirect('edituser'.$id); 
        }
        else
            {
                $where = array(
                    'id' => $this->input->post('id'),          
                );

                $data = array();
                $data['name'] = $this->input->post('name');
                $data['email'] = $this->input->post('email');
                $data['type'] = $this->input->post('type');
                $data['password'] = md5($this->input->post('password'));

                $result = $this->User_model->updater($where,'users', $data);

                if ($result > 0) {
                    $message = "User info update successfully";
                    $this->session->set_flashdata('message', $message);
                    return redirect('user'); 

                } else {

                $message = "Please! Fill The Fields.";
                $this->session->set_flashdata('message', $message);
                return redirect('user'); 
                }

                // $sdata=array();
                // $sdata['message']="User info save successfully";
                // $this->session->set_userdata($sdata);
                // return redirect('User/registration');               
            }



        // $this->User_model->update_product_info($product_id);
        // $sdata=array();
        // $sdata['message']="Product info update successfully";
        // $this->session->set_userdata($sdata);
        // return redirect('super_admin/manage_product');
    }

    public function deleteuser($id){

        $this->User_model->deleter('id',$id,'users');

        $sdata=array();
        $sdata['message']="User info Delete";
        $this->session->set_userdata($sdata);
        return redirect('user');
    }
}
