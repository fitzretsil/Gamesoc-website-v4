<!-- File: /app/View/Posts/add.ctp -->

<?php echo $this->Html->script('ckeditor/ckeditor'); ?>

<h1>Add Post</h1>
<?php
echo $this->Form->create('Post', array( 'novalidate' => true ) );
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3', 'class' => 'ckeditor'));
echo $this->Form->end('Save Post');
?>