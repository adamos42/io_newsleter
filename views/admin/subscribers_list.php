<ul class="subscribersPanelList list mb20 mt10">
 
    <?php foreach($subscribers as $s) :?>
 
    <li class="subscriber<?php echo $s->key ?> pointer" id="subscriber<?php echo $s->key ?>" data-id="<?php echo $s->key ?>">
        <a class="edit name" data-id="<?php echo $s->key ?>"><span class="label"><?php echo lang('name'); ?>:</span><?php echo $s->name; ?></a>
        <a class="edit email" data-id="<?php echo $s->key ?>"><span class="label"><?php echo lang('email'); ?>:</span><?php echo $s->email; ?></a>
        <span class="registered" data-id="<?php echo $s->key ?>"><span class="label"><?php echo lang('registered'); ?>:</span><?php echo date('Y.m.d H:i', strtotime($s->registered)); ?></span>
        <span class="action"><a class="icon edit"></a></span>
        <span class="action"><a class="icon delete"></a></span>
    </li>
 
    <?php endforeach ;?>
 
</ul>
