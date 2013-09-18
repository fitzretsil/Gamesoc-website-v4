<!-- File: /app/View/Posts/index.ctp -->

<?php if ( $admin ) { ?>
	<div class="admin">
		<?php echo $this->Html->link(
		    'Add Post',
		    array('controller' => 'posts', 'action' => 'add')
		); ?>
	</div>
<?php } ?>

<?php foreach ($posts as $post): ?>

	<div class="profile">
		<?php echo $this->Html->image( $post['User']['pic'], array( 'width' => '65px', 'height' => '65px', 'alt' => $post['User']['username'], 'class' => 'profile' ) ); ?>
		<h5><?php echo $post['User']['username'];?></h5>
	</div>

	<div class="news" id="1">
		<?php if ( $admin ) { ?>
			<div class="admin">
				<?php echo $this->Form->postLink(
	                'Delete',
	                array('action' => 'delete', $post['Post']['id']),
	                array('confirm' => 'Are you sure?'));
	            ?> &middot;
				<?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
			</div>
		<?php } ?>
		<h2><?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'] ) ); ?></h2>

		<div class="news-text">
			<?php echo $post['Post']['body']; ?>
		</div>

		<p><small>Posted <?php echo $this->Time->format('F jS, Y h:i A', $post['Post']['created'] ); ?></small></p>
		
		<hr />

	</div>

<?php endforeach; ?>

<?php
// Shows the page numbers
echo $this->Paginator->numbers();

// Shows the next and previous links
echo $this->Paginator->prev('Ç Previous', null, null, array('class' => 'disabled'));
echo $this->Paginator->next('Next È', null, null, array('class' => 'disabled'));

?>

<?php unset($post); ?>