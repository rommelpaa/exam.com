<script type='text/javascript'>
	$(document).ready(function(){
		var c_alert         = $(".c_alert");
		$(".btn-add-to-cart").click(function(){
			var _self       = $(this);
			var _attr_id    = _self.attr('attr_id');

			$.post('/ajax/common/addtocart',{'pId': _attr_id},function(ret){
		
				jAlert({
                    'class'     : 'modal-sm',
					"title"     : ret.title,
					"msg"       : ret.message,
					"footer"    : true
				});
		
			},'json');


		})
	})
</script>

<style type='text/css'>
	li .pagination               { background: #e1e1e1 none repeat scroll 0 0; padding: 5px 10px; }
	li .pagination.active        { background: #008fd0 none repeat scroll 0 0; color: #FFFFFF; }
	.thumbnail                   { height:360px; position: relative; word-wrap:break-word;}
</style>
<div class='container'>
	<div class='row-fluid mt clearfix'>
		<div class='white-panel pn-content mb clearfix c_padding'>
			<p class="text-left c_paddingTitle clearfix">
				<span class='fa fa-shopping-cart'></span> &nbsp;Shop
				<span class='pull-right'><a href='/main/cart' class='btn btn-sm btn-primary'>Checkout</a></span>
			</p>
			<hr/>
			<div class='row-fluid'>
				<form name='frmshop' class='form' action='' method='post' >
					<?php

						if(!empty($results))
						{
							?>
							<div class='form-group clearfix'>
							<?php
								foreach($results as $row)
								{

									?>
									<div class='col-lg-3 col-md-4 col-sm-6 col-xs-6 c_padding product-list'>
										<div class="thumbnail">
											<?php
												if($row['product_image']=='')
												{
													$imagename    = '/uploads/noimages.png';
												}else
												{
													$imagename    = '/uploads/thumbs/'.trim($row['product_image']);
												}
											?>
											<img src="<?php print $imagename ?>" width='240' height'200' alt="<?php print $row['product_name']; ?>" class='img-responsive center-block' />
										    <div class="caption text-left">
										       <h4><?php print $row['product_name']; ?></h4>
										       <p><?php print (strlen($row['product_desc']>30))?substr($row['product_desc'],0, 30).' ...':$row['product_desc']; ?></p>
										       <p class='text-center'><input type='button' class="btn btn-primary cursor btn-add-to-cart" attr_id='<?php print base64_encode(serialize($row['product_id'])); ?>' value='Add to Cart'>
										    </div>
									    </div>
									</div>
									<?php
								}
							?>
							</div>
							<div class='form-group text-right'>
								<ul class='list-inline c_padding'>
									<?php

										for($i=1; $i<=$pagination; $i++)
										{
											?>
											<li><a href='/main/shops/?page=<?php print $i; ?>' class='pagination <?php print ($page==$i)?'active':'' ?>'><?php print $i; ?></a></li>
											<?php
										}
									?>
									
								</ul>
							</div>
							<?php
						}
					?>
					
				</form>
			</div>
		</div>
	</div>
</div>