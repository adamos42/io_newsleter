<div id="maincolumn" class="newsleter">
 
    <h2 class="main newsleter">
      <?php echo lang('module_newsleter_title'); ?>
      
      <div style="float: right">
      
         <span class="newsleter-version"> <?php echo lang('version'); ?>: <?=$config['version']?> </span>
      
         <a href="https://github.com/adamos42/io_newsleter" target="_blank">
            <span class="github-icon"></span>
         </a>
      </div>
    </h2>
    
    <!-- Tabs -->
	 <div id="newsleterTab" class="mainTabs">
		<ul class="tab-menu">
			<li><a><?php echo lang('module_newsleter_subscribers'); ?></a></li>
			<li><a><?php echo lang('module_newsleter_newsleters'); ?></a></li>
			<li><a><?php echo lang('module_newsleter_history'); ?></a></li>
		</ul>
		<div class="clear"></div>
	 </div>
    
    <div id="newsleterTabContent">
    
		<div id="newsleterSubscribers" class="tabcontent">
		
		</div>
		
		<div id="newsleterNewsleters" class="tabcontent">
		
		</div>
		
		<div id="newsleterHistory" class="tabcontent">
		
		</div>
		
   </div>
    
</div>
 
<script type="text/javascript">
 
    // Init the panel toolbox is mandatory
    ION.initToolbox('empty_toolbox');
    
    // Tabs
	new TabSwapper({tabsContainer: 'newsleterTab', sectionsContainer: 'newsleterTabContent', selectedClass: 'selected', deselectedClass: '', tabs: 'li', clickers: 'li a', sections: 'div.tabcontent', cookieName: 'newsleterTab' });
	
	// Update the authors list
    ION.HTML(
            'module/io_newsleter/subscribers/get',      // URL to the controller
            {},                                 // Data send by POST. Nothing
            {'update':'newsleterSubscribers'}  // JS request options
    );
 
</script>

