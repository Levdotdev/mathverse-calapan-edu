<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: QuestionController
 * 
 * Automatically generated via CLI.
 */
class QuestionController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('QuestionModel');
        if(segment(2) != 'logout') {
            $id = $this->lauth->get_user_id();
            if(!logged_in()){
                redirect('auth/login');
            }
            else if($this->lauth->is_user_verified($id) == 0){
                if($this->lauth->set_logged_out()) {
                    redirect('auth/login');
                }
            }
            else if(logged_in() && $this->lauth->get_role($id) == "admin") {
                redirect('');
            }
        }
    }

    public function index(){
        $data['questions'] = $this->ProductModel->questions();
        $this->call->view('questions', $data);
    }
}