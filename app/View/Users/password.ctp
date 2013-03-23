<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Change Password'); ?></legend>
        <?php
        echo $this->Form->input('password', array( 'label' => 'New Password') );
        echo $this->Form->input('confirm_password', array('type'=>'password') );
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>