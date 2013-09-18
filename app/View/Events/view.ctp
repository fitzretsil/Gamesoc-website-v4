<div class="events view">

	<?php echo !empty($event['Event']['picture']) ? $this->Html->image( $event['Event']['picture'] ) : ""; ?>

	<h2><?php  echo __($event['Event']['name']); ?></h2>

	<p><strong>Start:</strong> <?php echo $this->Time->nice($event['Event']['start']); ?>&nbsp;&nbsp;<strong>End:</strong> <?php echo $this->Time->nice($event['Event']['end']); ?><br />
	<strong>Location:</strong> <?php echo h($event['Event']['location']); ?></p>
	<dl>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($event['Event']['details']); ?>
			&nbsp;
		</dd>
		<?php if ( sizeOf ( $event['Tournament'] ) > 0 ) {?>
			<dt><?php echo __('Tournaments'); ?></dt>
			<dd>
				<table>
					<?php foreach ( $event['Tournament'] as $tournament ) { ?>
						<tr><td><?php echo $tournament['name']; ?></td><td><?php echo $tournament['start']; ?></td></tr>	
					<?php } ?>
				</table>
			</dd>
		<?php } ?>
	</dl>
</div>
