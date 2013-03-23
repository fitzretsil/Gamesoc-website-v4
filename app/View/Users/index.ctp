<div class="users index">
	<h2><?php __('Users');?></h2>

	<ul class="actions">
    	<li><?php echo $this->Html->link(__('Add New Member', true), array('action' => 'add')); ?></li>
    </ul>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('full_name');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort( 'paid', 'P' );?></th>
			<th><?php echo $this->Paginator->sort( 'committee', 'C' );?></th>
			<th><?php echo $this->Paginator->sort( 'lifetime_member', 'L' );?></th>
			<th class="actions">&nbsp;</th>
			<th class="actions">&nbsp;</th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $user['User']['full_name']; ?>&nbsp;</td>
		<td><?php echo $user['User']['email']; ?>&nbsp;</td>
		<td><?php
			if ( $user['User']['lifetime_member'] ) {
				echo "N/A";
			}elseif ( $user['User']['paid'] == 1) {
				echo $this->Html->image( 'tango/Green_tick.png', array('height'=>'16px', 'width'=>'16px'));
			} else {
				echo $this->Html->image( 'tango/x-mark-xl.png', array('height'=>'16px', 'width'=>'16px'));
			}
		?>&nbsp;</td>
		<td><?php
			if ( $user['User']['committee'] == 1) {
				echo $this->Html->image( 'tango/Green_tick.png', array('height'=>'16px', 'width'=>'16px'));
			} else {
				echo $this->Html->image( 'tango/x-mark-xl.png', array('height'=>'16px', 'width'=>'16px'));
			}
		?>&nbsp;</td>
		<td><?php
			if ( $user['User']['lifetime_member'] == 1 ) {
				echo $this->Html->image( 'tango/Green_tick.png', array('height'=>'16px', 'width'=>'16px'));
			} else {
				echo $this->Html->image( 'tango/x-mark-xl.png', array('height'=>'16px', 'width'=>'16px'));
			}
		?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link( $this->Html->image( 'tango/edit-cut.png' ), array('action' => 'edit', $user['User']['id']), array( 'escape' => false ) ); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link($this->Html->image( 'tango/edit-delete.png' ), array('action' => 'delete', $user['User']['id']), array( 'escape' => false ), sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>