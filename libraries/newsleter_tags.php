<?php
//require_once APPPATH.'libraries/Tagmanager/Page.php';
class Newsleter_Tags extends TagManager
{
	/* ------------------------------------------------------------------------------------------------------------- */
	
	public static $ci = null;
	
	/* ------------------------------------------------------------------------------------------------------------- */
	
    /**
     * Tags declaration
     * To be available, each tag must be declared in this static array.
     *
     * @var array
     *
     */
    public static $tag_definitions = array
    (
        	"newsleter_form"	=>	"newsleter_form_tag",
    );
    /* ------------------------------------------------------------------------------------------------------------- */
    
    public static function initialize()
    {    	
    	self::$ci =& get_instance();
    }
    /* ------------------------------------------------------------------------------------------------------------- */
    
    public static function newsleter_form_tag(FTL_Binding $tag)
    {	
    	
    }
    /* ------------------------------------------------------------------------------------------------------------- */
}
