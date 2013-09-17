<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Edinburgh University GameSoc');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('gs.default');
		echo $this->Html->meta( 'News', '/posts/index.rss', array('type' => 'rss') );

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="logo">
	            <?php echo $this->Html->image( 'gamesoc/logo.png', array( 'alt' => $cakeDescription, 'border' => 0, 'style' => 'height: 150px;' ) ); ?>
	        </div><!-- end of #logo -->

			<ul class="menu">
	            <li class="page_item"><?php echo $this->Html->link('Home', '/' ); ?></li>
	            <li class="page_item page-item-2"><?php echo $this->Html->link('About', array('controller' => 'pages', 'action' => 'display', 'about' ) ); ?></li>
	            <li class="page_item page_item-3"><?php echo $this->Html->link('How to LAN', array('controller' => 'pages', 'action' => 'display', 'lan' ) ); ?></li>
	            <li class="page_item page-item-4"><?php echo $this->Html->link( 'Events', array( 'controller'=> 'events', 'action' => 'index' ) ); ?></li>
	                <!-- <ul class='children'>
	                    <li class="page_item page-item-49"><a href="http://wp-themes.com/?page_id=49">Pub Nights</a></li>
	                    <li class="page_item page-item-49"><a href="http://wp-themes.com/?page_id=49">LANs</a></li>
	                </ul>
	            </li>
	            <li class="page_item page-item-2"><a href="http://wp-themes.com/?page_id=2">Hardware</a></li>
	            <li class="page_item page-item-2"><a href="http://wp-themes.com/?page_id=2">Contact</a></li>
	           -->
	        </ul>
		</div>

		<?php echo $this->Session->flash(); ?>

		<div id="content" class="grid col-540">

			<?php echo $this->fetch('content'); ?>
		</div>

		<div id="widgets" class="home-widgets">
	        <div class="grid-right col-300">
	        	<div class="widget-wrapper">

	                <div class="widget-title-home"><h3>Want to know more?</h3></div>
	                <div class="textwidget">
	                	You can also find GameSoc on the following sites:
	                	<table>
	                		<tr>
	                			<td width="30px"><?php echo $this->Html->image( 'gamesoc/f_logo.png', array( 'width' => '30px' ) ); ?></td>
	                			<td><?php echo $this->Html->link( 'Facebook', 'http://www.facebook.com/Edinburgh.Gamesoc', array( 'target' => '_blank' ) ); ?></td>
	                		</tr>
	                		<tr>
	                			<td width="30px"><?php echo $this->Html->image( 'gamesoc/yt-logo.png', array( 'width' => '30px' ) ); ?></td>
	                			<td><?php echo $this->Html->link( 'YouTube', 'http://www.youtube.com/eugamesoc', array( 'target' => '_blank' ) ); ?></td>
	                		</tr>
	                		<tr>
	                			<td width="30px"><?php echo $this->Html->image( 'gamesoc/steam-logo.jpg', array( 'width' => '30px' ) ); ?></td>
	                			<td><?php echo $this->Html->link( 'Steam', 'http://steamcommunity.com/groups/eugamesoc', array( 'target' => '_blank' ) ); ?></td>
	                		</tr>
	                		<tr>
	                			<td width="30px"><?php echo $this->Html->image( 'gamesoc/twitter-logo.png', array( 'width' => '30px' ) ); ?></td>
	                			<td><?php echo $this->Html->link( 'Twitter', 'http://twitter.com/Gamesoc', array( 'target' => '_blank' ) ); ?></td>
	                		</tr>
	                	</table>
	                </div>

	            </div><!-- end of .widget-wrapper -->

	        </div><!-- end of .col-300 -->

	        <div class="grid-right col-300">
	        	<div class="widget-wrapper">

	                <div class="widget-title-home"><h3>Committee Login</h3></div>
	                <div class="textwidget">
	                	<?php if ($this->Session->read('Auth.User')){ ?>
	                		You are currently viewing this site as <?php echo $this->Session->read('Auth.User.username'); ?>.
	                		<?php echo $this->Html->link( 'Change Password', array( 'controller' => 'users', 'action' => 'password' ) ); ?>
	                		&middot;
	                		<?php echo $this->Html->link( 'Logout', array( 'controller' => 'users', 'action' => 'logout' ) ); ?>
	                	<?php } else { ?>
	                		You are currently viewing this site as a guest.
	                		<?php echo $this->Html->link( 'Login', array( 'controller' => 'users', 'action' => 'login' ) ); ?>
	                	<?php } ?>

	                	<?php if ( $this->Session->read('Auth.User.committee') == 1 ) { ?>
	                		<ul>
	                			<li><?php echo $this->Html->link( 'View Members', array( 'controller' => 'users' ) ); ?></li>
	                		</ul>
	                	<?php } ?>
	                </div>

	            </div><!-- end of .widget-wrapper -->

	        </div><!-- end of .col-300 -->
	    </div><!-- end of #widgets -->
	 </div><!-- end of #wrapper -->
</div><!-- end of #container -->

		<div id="footer">
			<div id="footer-wrapper">
				<div class="grid col-940">

	        		<div class="grid col-540"></div><!-- end of col-540 -->

	         		<div class="grid col-380 fit">
	         			<ul class="social-icons"></ul><!-- end of .social-icons -->
	         		</div><!-- end of col-380 fit -->

        		 </div><!-- end of col-940 -->

        		<div class="grid col-300 copyright">
        			&copy; 2013 Edinburgh University Computer Gaming Society
        		</div><!-- end of .copyright -->

        		<div class="grid col-300 scroll-top"><a href="#scroll-top" title="scroll to top">&uarr;</a></div>

       			<div class="grid col-300 fit powered">
            		Based on the
            		<a href="http://themeid.com/responsive-theme/" title="Responsive Theme">Responsive Theme</a>
            		and powered by
            		<?php echo $this->Html->link(
						$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
						'http://www.cakephp.org/',
						array('target' => '_blank', 'escape' => false)
					);?>
        		</div><!-- end .powered -->

			</div>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
