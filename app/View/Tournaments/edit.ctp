<div class="tournaments form">
<?php echo $this->Form->create('Tournament'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tournament'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('start');
		echo $this->Form->input('event_id');
		echo $this->Form->input('game');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tournament.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tournament.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tournaments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tournament Participants'), array('controller' => 'tournament_participants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tournament Participant'), array('controller' => 'tournament_participants', 'action' => 'add')); ?> </li>
	</ul>
</div>
