<div class="events index">
	<h2><?php echo __('Upcoming Events'); ?></h2>
	<table cellpadding="0" cellspacing="0" border="0">
	<?php foreach ($events as $event): ?>
	<tr>
		<td><?php echo ( $event['Event']['type'] == "LAN" ) ? $this->Html->image( 'gamesoc/gaming.png' ) : $this->Html->image( 'gamesoc/social.png' ); ?></td>
		<td><?php echo $this->Html->link( h($event['Event']['name']), array( 'action' => 'view', $event['Event']['id'] ) ); ?> @ <?php echo h($event['Event']['location']); ?>&nbsp;</td>
		<td><strong>Starts:</strong> <?php echo h( $this->Time->nice( $event['Event']['start'] ) ); ?>&nbsp;</td>
		<td><strong>Ends:</strong> <?php echo h( $this->Time->nice( $event['Event']['end'] ) ); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} events out of {:count} total upcoming events')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
