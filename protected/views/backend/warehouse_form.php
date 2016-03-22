<div class="clearfix col-md-12">
	<div class='row-fluid mt clearfix'>
		<div class='white-panel pn-content mb clearfix c_padding'>
			<p class="text-left c_paddingTitle"> <span class='fa fa-flag'></span> &nbsp;<?php print strtoupper(uri_segment(2)).' > '.$this->context->pageTitle; ?></p>
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
				<form name='frmwarehouse' class='form' action='' method='post' >
					<div class='row-fluid clearfix'>
						<div class='col-md-6'>
							<div class='form-group clearfix'>
								<div class='col-md-4 text-left'>
									<label class='control-label'>Warehouse Code:</label>
								</div>
								<div class='col-md-8 text-left'>
									<label class='control-label'><?php print !empty($results[0]['warehouse_code'])?$results[0]['warehouse_code']:'' ?></label>
								</div>
							</div>
							<div class='form-group clearfix'>
								<div class='col-md-4 text-left'>
									<label class='control-label'>Warehouse Name:</label>
								</div>
								<div class='col-md-8'>
									<input type='text' name='warehouse_name' class='form-control' value="<?php print !empty($results[0]['warehouse_name'])?$results[0]['warehouse_name']:'' ?>" />
								</div>
							</div>
							<div class='form-group clearfix'>
								<div class='col-md-4 text-left'>
									<label class='control-label'>Warehouse Desc:</label>
								</div>
								<div class='col-md-8'>
									<textarea class='form-control' name='warehouse_desc' rows='5'><?php print !empty($results[0]['warehouse_desc'])?$results[0]['warehouse_desc']:'' ?></textarea>
								</div>
							</div>
							<div class='form-group clearfix'>
								<div class='col-md-4 text-left'>
									<label class='control-label'>Status:</label>
								</div>
								<div class='col-md-8'>
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
						<div class='col-md-6 text-right'>
							<input type='submit' value='Submit' class='btn btn-primary btn-sm' />
							<a href='<?php print base_url().uri_segment(1) ?>/warehouse'><input type='button' class='btn btn-default btn-sm' value='Back' /></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>