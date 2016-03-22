<script type='text/javascript'>
	$(document).ready(function(){
		$("input[name='checkall']").click(function(){
			$("input[name='checkbox_prod[]']").click();
		})

		$(".btnremove").click(function(){
			var _checkbox     = $("input[name='checkbox_prod[]']:checked").serialize();
			if(_checkbox != "")
			{
				$.post("/ajax/common/removeproducts",_checkbox,function(ret){
					window.location = "/main/cart";
				},'json');
			}else
			{
				jAlert({
					'title'    : "Error",
					'class'    : "modal-sm",
					"msg"      : "Please select the product that you want to remove.",
					"footer"   : true
				})
			}
		})

		$(".btn-release").click(function(){
			$.post("/ajax/common/releaseorder",function(ret){
				jAlert({
						"title"    : "Success",
						"class"    : "modal-sm",
						"msg"      : ret.message,
						"footer"   : true	
					})
				$(".c_alert").on('hidden.bs.modal', function(){
					window.location = "/main/cart";
					$(this).data('modal', null);
				});
			},'json');
		})

	})
</script>
<div class='container'>
	<div class='row-fluid mt clearfix'>
		<div class='white-panel pn-content mb clearfix c_padding'>
			<p class="text-left c_paddingTitle clearfix">
				<span class='fa fa-shopping-cart'></span> &nbsp;Cart
			</p>
			<hr/>
			<div class='row-fluid'>
				<div class='table-responsive'>
					<table class='table table-striped table-hover table-border'>
					<tr>
						<td colspan="6" class='text-right'>
							<input type='button' name='btnremove' class='btn btn-sm btn-primary btnremove' value='Remove Products' />
						</td>
					</tr>
					<tr>
						<th class='text-center'><input type='checkbox' name='checkall' /></th>
						<th>Product Name</th>
						<th>Product Desc</th>
						<th class='text-center'>Qty</th>
						<th class='text-center'>Price</th>
						<th class='text-right'>Amount</th>
					</tr>
					<?php
					if(!empty(Yii::$app->session['order']))
					{
						$totalamt           = 0;
						foreach(Yii::$app->session['order'] as $key => $fields)
						{

							$product_id     = unserialize(base64_decode($key));
							$qry            = "SELECT * FROM products WHERE product_id=$product_id";
							$results        = $this->context->common->executeQuery($qry)->queryOne();

							$totalamt       += Yii::$app->session['order'][$key]['qty'] * (double)$results['price'];
							?>
							<tr>
								<td class='text-center'><input type='checkbox' name='checkbox_prod[]' value='<?php print $results['product_id']; ?>' /></td>
								<td class='text-left'><?php print $results['product_name']; ?></td>
								<td class='text-left'><?php print $results['product_desc']; ?></td>
								<td class='text-center'><?php print Yii::$app->session['order'][$key]['qty']; ?></td>
								<td class='text-center'><?php print number_format($results['price'],2); ?></td>
								<td class='text-right'><?php print number_format(Yii::$app->session['order'][$key]['qty'] * (double)$results['price'],2); ?></td>
							</tr>
							<?php
						}
						?>
						<tr>
							<td colspan='5' class='text-right'><strong>Total:</strong></td>
							<td class='text-right'><h4><strong><?php print number_format($totalamt, 2); ?></strong></h4></td>
						</tr>
						<tr>
							<td colspan='6' class='text-right c_padding'>
								<input type='button' value='Release Order' class='btn btn-sm btn-primary btn-release' />
							</td>
						</tr> 
						<?php
					}else
					{
						?>
						<tr>
							<td colspan="6">Empty Cart <br/><a href='/main/shops' class='btn btn-primary btn-sm'>Go to sho page</a></td>
						</tr>
						<?php
					}
					?>
					
						
					</table>
				</div>
			</div>
		</div>
	</div>
</div>