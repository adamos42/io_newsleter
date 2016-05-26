<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * Module Admin controller
 *
 */
class Io_newsleter extends Module_Admin {
    /**
     * Constructor
     *
     * @access  public
     * @return  void
     */
    public function construct() {
    
      $config = array();    
      include MODPATH."io_newsleter/config/config.php";
    
    }
 
    /**
     * Admin panel
     * Called from the modules list.
     *
     * @access  public
     * @return  parsed view
     *
     */
    public function index() {
    
        $config = array();    
        include MODPATH."io_newsleter/config/config.php";
        
        $this->template['config'] = $config['module']['newsleter'];
    
        $this->output('admin/newsleter');
        
    }
    
    public function subscribers_list()
    {
    	$this->load->model('newsleter_model', 'model');
    	$this->template['subscribers'] = $this->model->get_subscribers();
    	
    	$this->output('admin/subscribers_list');
    }
}
