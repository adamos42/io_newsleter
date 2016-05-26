<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * Module Admin controller
 *
 */
class Subscribers extends Module_Admin {
    /**
     * Constructor
     *
     * @access  public
     * @return  void
     */
    public function construct() {
    
    }
    
    public function get()
    {
    	$this->load->model('newsleter_model', 'model');
    	$this->template['subscribers'] = $this->model->get_subscribers();
    	
    	$this->output('admin/subscribers_list');
    }
}
