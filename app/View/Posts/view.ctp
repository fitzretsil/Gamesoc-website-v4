<!-- File: /app/View/Posts/view.ctp -->

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

	<img src="http://www.gamesoc.org/img/gamesoclogo1.png" width="65px" style="vertical-align: top; float: left;" alt="">
	
	<div class="news" id="1">
		<h2><?php echo $this->Html->link(h($post['Post']['title']), array('action' => 'view', $post['Post']['id'] ) ); ?></h2>
		
		<div class="news-text">
			<?php echo $post['Post']['body']; ?>
		</div>
	
		<hr />
	
		<p><small>Posted by <?php echo $post['User']['username'];?> on <?php echo $this->Time->format('F jS, Y h:i A', $post['Post']['created'] ); ?></small></p>
	
	</div>
	
<?php unset($post); ?>