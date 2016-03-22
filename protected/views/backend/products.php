<script type='text/javascript'>
	$(document).ready(function(){
		var   keyword		= '';
		getProductlist(keyword);
		
		$("form[name='frmsearch']").submit(function(e){
			
			var _self		= $(this);
			
			keyword			= $("input[name='keyword']", _self).val();
			getProductlist(keyword);
			
			e.stopPropagation();
			e.preventDefault();
		})
		
		function getProductlist(keyword)
		{
			$.post('/ajax/common/getproductlist',{'keyword':keyword}, function(ret){
				var html			= "";
				var tbloption       = '';
				if(ret.returns)
				{
					tbloption  		= {
										striped: true,
										pagination: true,
										pageSize: 25,
										pageList: [10, 25, 50, 100, 200],
										columns: [
													  {
														field: 'product_name',
														title: 'Product Name',
														align: 'left',
														sortable: true
													  },
													  {
														field: 'product_desc',
														title: 'Description',
														align: 'left',
														sortable: true
													  },
													  {
														field: 'qty',
														title: 'Current Stock Level',
														align: 'center',
														sortable: true,

													  },
													  {
														field: 'warehouse_name',
														title: 'Warehouse/BIN Location',
														align: 'center',
														sortable: true,

													  },
													  {
														field: 'stock_level',
														title: 'Min. Stock Level',
														align: 'center',
														sortable: true,

													  },
													  {
														field: 'status',
														title: 'Status',
														align: 'center',
														sortable: true,
														formatter: function(value){
															if(value!='')
															{
																return (parseInt(value)==1)?'<span class="label label-success">Active</span>':'<span class="label label-warning">In-Active</span>';
															}
														}
													  },
													  {
														field: 'product_id',
														title: '',
														align: 'right',
														formatter: function(value){
															if(value!='')
															{
																var action	= "<a href='/<?php print uri_segment(1); ?>/products/form/edit/"+$.base64.encode(value)+"'><span title='Edit' class='text-warning fa fa-edit'>&nbsp; </span></a>"+
																	   		  "<a href='/<?php print uri_segment(1); ?>/products/delete/"+$.base64.encode(value)+"'><span title='Delete' class='text-danger fa fa-trash'>&nbsp; </span></a>";
																return action;
															}
														}
													  }
												  ],
										data: ret.results
										
									}
				}

				$('#tbl_productlist').bootstrapTable('destroy').bootstrapTable(tbloption);
				
				html	= '<a href="/<?php print uri_segment(1); ?>/products/form/add"><span class="fa fa-tag fa-2x">&nbsp;</span>Add Product</a>';
				$('#tbl_productlist tr th:last-child div.th-inner').html(html);
			},'json');
		
		}
		
	})
</script>
<div class="clearfix col-md-12">
	<div class='row-fluid mt clearfix'>
		<div class='white-panel pn-content mb clearfix c_padding'>
			<p class="text-left c_paddingTitle"> <span class='fa fa-tag'></span> &nbsp;List of Products</p>
			<hr/>
			<div class='row-fluid'>
				<form name='frmsearch' class='form' action='' method='post' >
					<div class="form-group clearfix text-left">
						<div class="col-md-2 col-lg-1 col-sm-2 col-xs-12 c_paddingSides">
							<label class="control-label">Keyword:</label>
						</div>
						<div class="col-md-8 col-lg-10 col-sm-8 col-xs-12 c_paddingSides">
							<input type="text" autocomplete="off" placeholder='Search for keyword!' value="" name="keyword" class="form-control">
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 col-lg-1 clearfix c_paddingSides">
							<input type='submit' class='btn btn-sm btn-primary btn-search-users col-md-12 col-sm-12 col-xs-12 col-lg-12' value='Search'>
						</div>
					</div>
				</form>
			</div>
			<div class='row-fluid table-responsive c_padding'>
				<table id='tbl_productlist' class='table table-striped table-hover'>
					
				</table>
			</div>
		</div>
	</div>
</div>