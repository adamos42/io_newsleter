<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 * 
 *
 */
class Newsleter extends My_Controller
{
	/* ------------------------------------------------------------------------------------------------------------- */
	
	/**
	 * @var $request array JSON request array
	 */
	private $request = array();
	/* ------------------------------------------------------------------------------------------------------------- */
	
	/**
	 * @var $params array JSON request params array
	 */
	private $params = array();
	/* ------------------------------------------------------------------------------------------------------------- */
	
	/**
	 * @var $response array JSON response array
	 */
	private $response = array();
	/* ------------------------------------------------------------------------------------------------------------- */
	
	/**
	 * @var $default array The default JSON response pattern
	 */
	private $default = array('success' => FALSE, 'result' => array(), 'error' => array(), 'message' => "");
	/* ------------------------------------------------------------------------------------------------------------- */
	
	/**
	 * @var $filter_request array The request method filter
	 */
	private $filter_request = array('success', 'result', 'request', 'response', 'message');
	/* ------------------------------------------------------------------------------------------------------------- */
	
    public function __construct()
    {
        parent::__construct();
        
        $this->params = $_REQUEST;
        
        if(isset($_REQUEST['debug'])) echo "<pre>\$this->params: ".print_r($this->params, true)."</pre>";
    }
    /* ------------------------------------------------------------------------------------------------------------- */
     
    public function subscribe()
    {
    	if(isset($this->params['name']) && isset($this->params['email']))
    	{
			$this->load->model('newsleter_model', 'model');
			if(isset($_REQUEST['debug'])) echo "<pre>\$this->model: ".print_r($this->model, true)."</pre>";
			
			$success = $this->model->subscribe($this->params['name'], $this->params['email']);
			
			$this->success($success);	
    	}
    	
    	$this->response();
    }
    /* ------------------------------------------------------------------------------------------------------------- */
 
    public function output( $method =NULL )
    {
    	// If invalid request then response that and exit the code
    	if($method == NULL && !in_array($method, $this->filter_request) && !method_exists($this, $request))
    	{
    		header('HTTP/1.1 400 Bad Request', true, 400);
    		exit('INVALID REQUEST');
    	}
    	else if(method_exists($this, $method) && !in_array($method, $this->filter_request))
    	{
    		if(isset($_GET['debug'])) echo "<pre>\$method: ".print_r($method, true)."</pre>";
    	
    		$this->request($method);
    		$this->$method();
    	}
    }
    /* ------------------------------------------------------------------------------------------------------------- */
    
    private function request( $method )
    {
    	// Saving the method name
    	$this->request['method'] = $method;
    	
    	// Creating the response array
    	$this->response = $this->default;
    	 
    	// Gettint the request beginning time
    	if(isset($_SERVER['REQUEST_TIME_FLOAT'])) $this->request['timestamp'] = $_SERVER['REQUEST_TIME_FLOAT'];
    	else $this->request['timestamp'] = $_SERVER['REQUEST_TIME'];
    }
    /* ------------------------------------------------------------------------------------------------------------- */
    
    private function success( $success =TRUE )
    {
    	$this->response['success'] = $success;
    	return $this;
    }
    /* ------------------------------------------------------------------------------------------------------------- */
    
    private function result( $data =array() )
    {
    	$this->response['result'] = $data;
    	return $this;
    }
    /* ------------------------------------------------------------------------------------------------------------- */
    
    private function error( $message ="" )
    {
    	$this->response['error'][] = $message;
    	$this->response['success'] = FALSE;
    	return $this;
    }
    /* ------------------------------------------------------------------------------------------------------------- */
    
    private function message( $message ="" )
    {
    	$this->response['message'] = $message;
    	return $this;
    }
    /* ------------------------------------------------------------------------------------------------------------- */
    
    private function response( $success =NULL, $results =array(), $message="" )
    {
    	$this->response['timestamp'] = microtime(TRUE);
    	$this->response['ellapsed_time'] = $this->response['timestamp']-$this->request['timestamp'];
    	
    	header('Content-Type: application/json');
    	echo json_encode($this->response);
    }
    /* ------------------------------------------------------------------------------------------------------------- */
}
/* ----------------------------------------------------------------------------------------------------------------- */
/* End of file: newsleter.php */
/* Location: ./modules/io_newsleter/controllers/newsleter.php */
