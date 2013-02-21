<!-- File: /app/View/Posts/edit.ctp -->

<?php echo $this->Html->script('ckeditor/ckeditor'); ?>

<h1>Edit Post</h1>
<?php
    echo $this->Form->create('Post');
    echo $this->Form->input('title');
    echo $this->Form->input('body', array('rows' => '3', 'class' => 'ckeditor'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Save Post');
?>