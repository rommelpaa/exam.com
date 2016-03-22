<div class="clearfix col-md-12">
	<div class='row-fluid mt clearfix'>
		<div class='white-panel pn-content mb clearfix c_padding'>
			<p class="text-left c_paddingTitle"> <span class='fa fa-tag'></span> &nbsp;<?php print strtoupper(uri_segment(2)).' > '.$this->context->pageTitle; ?></p>
			<hr/>
			<div class='row-fluid'>
				<?php
					if(!empty($alert))
					{
						?>
						<div class="alert <?php print $alert['type']; ?> text-left" role='alert'>
							<label class='control-label'><?php print $alert['message']; ?></label>
						</div>
						<?php
					}
				?>
				<form name='frmproducts' class='form' action='' method='post' enctype="multipart/form-data">
					<div class='row-fluid clearfix'>
						<div class='col-md-8'>
							<div class='form-group clearfix'>
								<div class='col-md-3 text-left'>
									<label class='control-label'>Product Image:</label>
								</div>
								<div class='col-md-9'>
									<input type='file' accept="image/*" name='product_image'/>
									<input type='hidden' name='prod_images' value='<?php print !empty($results[0]['product_image'])?$results[0]['product_image']:''; ?>' />
								</div>
							</div>
							<div class='form-group clearfix'>
								<div class='col-md-3 text-left'>
									<label class='control-label'>Product Name:</label>
								</div>
								<div class='col-md-9'>
									<input type='text' class='form-control' name='product_name' value='<?php print !empty($results[0]['product_name'])?$results[0]['product_name']:'' ?>' />
								</div>
							</div>
							<div class='form-group clearfix'>
								<div class='col-md-3 text-left'>
									<label class='control-label'>Product Desc:</label>
								</div>
								<div class='col-md-9'>
									<textarea class='form-control' name='product_desc' rows='5'><?php print !empty($results[0]['product_desc'])?$results[0]['product_desc']:'' ?></textarea>
								</div>
							</div>
							<div class='form-group clearfix'>
								<div class='col-md-3 text-left'>
									<label class='control-label'>Min. Stock Level:</label>
								</div>
								<div class='col-md-3'>
									<input type='text' name='stock_level' class='form-control' value="<?php print !empty($results[0]['stock_level'])?$results[0]['stock_level']:'' ?>" />
								</div>
							</div>
							<div class='form-group clearfix'>
								<div class='col-md-3 text-left'>
									<label class='control-label'>Quantity:</label>
								</div>
								<div class='col-md-3'>
									<input type='text' name='qty' class='form-control' value="<?php print !empty($results[0]['qty'])?$results[0]['qty']:'' ?>" />
								</div>
							</div>
							<div class='form-group clearfix'>
								<div class='col-md-3 text-left'>
									<label class='control-label'>SKU:</label>
								</div>
								<div class='col-md-3'>
									<input type='text' name='sku' class='form-control' value="<?php print !empty($results[0]['sku'])?$results[0]['sku']:'' ?>" />
								</div>
							</div>
							<div class='form-group clearfix'>
								<div class='col-md-3 text-left'>
									<label class='control-label'>Price:</label>
								</div>
								<div class='col-md-3'>
									<input type='text' name='price' class='form-control' value="<?php print !empty($results[0]['price'])?$results[0]['price']:'' ?>" />
								</div>
							</div>
							<div class='form-group clearfix'>
								<div class='col-md-3 text-left'>
									<label class='control-label'>Warehouse / BIN Location:</label>
								</div>
								<div class='col-md-9'>
									<select name="selwarehouse" class="form-control">
									<option value=''>--SELECT WAREHOUSE--</option>
									<?php
									$tablename        = "warehouse";
									$filter           = "WHERE status=1 ORDER BY datecreated ASC";
									$rs               = $this->context->common->getDataList($tablename, $filter);
									if(!empty($rs))
									{
										foreach($rs as $row)
										{
											$warehouse_id      = 0;
											if(!empty($results))
											{
												$warehouse_id   = (int)$results[0]['warehouse_id'];
											}
											?>
											<option value='<?php print $row['warehouse_id']; ?>' <?php print getActiveOption($row['warehouse_id'], $warehouse_id); ?>><?php print $row['warehouse_name']; ?></option>
											<?php
										}
									}
									?>
									</select>
								</div>
							</div>
							<div class='form-group clearfix'>
								<div class='col-md-3 text-left'>
									<label class='control-label'>Status:</label>
								</div>
								<div class='col-md-9'>
									<select name='selstatus' class='form-control'>
										<?php
										$status      = 0;
										if(!empty($results))
										{
											$status   = (int)$results[0]['status'];
										}
										?>
										<option value='1' <?php print getActiveOption($status,1); ?>>Active</option>
										<option value='0' <?php print getActiveOption($status,0); ?>>In Active</option>
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class='form-group clearfix'>
						<div class='col-md-8 text-right'>
							<input type='submit' value='Submit' class='btn btn-primary btn-sm' />
							<a href='<?php print base_url().uri_segment(1); ?>/products'><input type='button' class='btn btn-default btn-sm' value='Back' /></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>