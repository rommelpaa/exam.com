<?php

use yii\helpers\Html;
$this->beginPage(); 
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php print strtoupper($this->context->module->name).' - '.$this->context->pageTitle; ?></title>

    <?php print Yii::$app->view->renderFile('@app/views/snippet/head.php'); ?>
</head>

<body>


<?php $this->beginBody(); ?>
<div class="modal fade loaderpage">
	<div class='row-fluid'>
		<div class="modal-dialog modal-sm text-center h1">
			<div class="modal-content">
				<span class='fa fa-spinner fa-spin'></span>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
</div>

<div class="modal fade c_alert">
	<div class='row-fluid'>
		<div class="modal-dialog modal-sm text-center">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-remove"></span></button>
					<p class="modal-title text-left" id="myModalLabel">Modal title</p>
				</div>
				<div class="modal-body">
					<!--Content Goes here-->
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
</div>
<section class='container-fluid'>
	<?php
		if(!empty($leftpanel))
		{

	?>
			<div class='row'>
				<header>
					<nav role="navigation" class="navbar navbar-default">
						<div class="container-fluid clearfix">
						
							<button class='c_menu_toggle fa fa-bars' type='button'></button>
							<div class='menu_notification hidden-xs displaynone'>
								<button class='btn btn-sm btn-default' type='button'>
									<p class='fa fa-tasks fa-lg'>
										<!--span class='badge c_badge'>5</span-->
									</p>
								</button>
								<button class='btn btn-sm btn-default' type='button'>
									<p class='fa fa-envelope-o fa-lg'>
										<!--span class='badge c_badge'>10</span-->
									</p>
								</button>
							</div>
						</div>
					</nav>
				</header>
			</div>
			<div class='main-content row'>
				<div class='left-panel clearfix'>
					<div class='row-fluid'>
						<?php print Yii::$app->view->renderFile($leftpanel,$data); ?>
					</div>
				</div>

				<div class='content-panel clearfix'>
					<div class='row-fluid clearfix'>
						<?php print Yii::$app->view->renderFile($subpages,$data); ?>
					</div>
				</div>
			</div>
	<?php 
		}else
		{
			//error page
			?>
			<div class='row'>
				<header>
					<nav role="navigation" class="navbar navbar-default">
						<div class="container-fluid clearfix">
						
						</div>
					</nav>
				</header>
			</div>
			<div class='main-content row'>
				<div class='clearfix'>
					<div class='row-fluid clearfix'>
						<?php print Yii::$app->view->renderFile($subpages,$data); ?>
					</div>
				</div>
			</div>
			<?php
		} 
	?>
</section>
<?php $this->endBody(); ?>

</body>
</html>
<?php $this->endPage(); ?>