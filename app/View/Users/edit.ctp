<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Edit User'); ?></legend>
        <?php
        echo $this->Form->input('username');
        echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('matriculation');
        echo $this->Form->input('email');
        echo $this->Form->input('paid');
        echo $this->Form->input('committee');
        echo $this->Form->input('lifetime_member');
        echo $this->Form->input('role', array(
            'options' => array(
				'president' => 'President',
				'secretary' => 'Secretary',
				'treasurer' => 'Treasurer',
				'kit_monkey' => 'Kit Monkey',
				'clan_leader' => 'Clan Leader',
            	'server_admin' => 'Server Admin',
            	'webmaster' => 'Webmaster',
            	'publicity_officer' => 'Publicity Officer',
            	'social_secretary' => 'Social Secretary',
            	'ordinary_member' => 'Ordinary Member',
			)
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>