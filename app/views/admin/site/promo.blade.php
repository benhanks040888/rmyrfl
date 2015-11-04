@extends('admin.layouts.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Promo List</h1>
    </div>
  </div>
  
  <a href="{{URL::route('admin.promo.add')}}" class="btn badge btn-info">+ Add New Data</a>
  
  <hr/>
  
  <div id="list_table_holder">
		<p class="btn-group" data-toggle="buttons">
			  <label class="btn btn-primary radio-1 active">
				<input type="radio" name="options" id="option1" value="all"> All
			  </label>
			  <label class="btn btn-primary radio-1">
				<input type="radio" name="options" id="option2" value="yes"> Active
			  </label>
			  <label class="btn btn-primary radio-1">
				<input type="radio" name="options" id="option3" value="no"> Inactive
			  </label>
		</p>
	</div>
	
	<div class="table-responsive">
		<table class="table table-hover datatable">
			<thead>
				<tr>
				<?php
					foreach($fields as $field){
						echo "<th>".$field['alias']."</th>";
					}
				?>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	
	<div id="modalView" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Detail</h3>
				</div>
				<div class="modal-body">
					<table class="table table-hover">
						<tr>
							<td>Title (EN)</td>
							<td width="10px">:</td>
							<td id="lblTitleEN"></td>
						</tr>
						<tr>
							<td>Title (ID)</td>
							<td>:</td>
							<td id="lblTitleID"></td>
						</tr>
						<tr>
							<td>Content (EN)</td>
							<td>:</td>
							<td id="lblContentEN"></td>
						</tr>
						<tr>
							<td>Content (ID)</td>
							<td>:</td>
							<td id="lblContentID"></td>
						</tr>
						<tr>
							<td>File Name</td>
							<td>:</td>
							<td id="lblFileName"></td>
						</tr>
						<tr>
							<td>Image</td>
							<td>:</td>
							<td id="lblImage"></td>
						</tr>
						<tr>
							<td>Created Date</td>
							<td>:</td>
							<td id="lblDate"></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
@stop
	
@section('scripts')
	<script>	
		$('#option1').prop('checked', true);
		$(document).ready(function(){
			<?php $hidden_field = 0; ?>
			$('.radio-1').click(function(){
				setTimeout(reDrawDataTable,1);
			});
			var oTable = $(".datatable").dataTable({
				"sPaginationType": "full_numbers",
				"sAjaxSource" : "{{URL::route('admin.promo.list')}}",
				'iDisplayLength' : 25,
				"aaSorting": [[ 1, "asc" ]],
				'aafilter':'yes',
				"aoColumns":[
						<?php 
						for($i=0;$i<$num_fields;$i++){
							echo '{';
							if($fields[$i]['hidden'] == true){
								echo '"bSearchable": false,"bVisible": false';
								$hidden_field++;
							}
							elseif($fields[$i]['unsearchable'] == true){
								echo '"bSearchable": false';
							}
							echo '},';
						}
						?>
						
					{"bSortable": false}
					],
				"aoColumnDefs": [
						{ "bSortable": false, "aTargets": [1,2,3,4,5] }
					],
				'bServerSide': true,
				"fnServerParams":function (aoData) {
					aoData.push({"name":"filter", "value":$('input[type="radio"]:checked').val() });
					},
				"fnDrawCallback": function ( oSettings ) {
					var text;
					for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ ){		
						if(oSettings.aoData[i]._aData[4] == 1)
							text = "Yes";
						else
							text = "No";
							
							text += "-- <a onclick='changeAccept("+oSettings.aoData[i]._aData[0]+");' href='javascript:void(0)'>Change</a>";
						$('td:eq(3)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html(text); 	
						
						$('td:eq(<?php echo $num_fields - $hidden_field ?>)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html("<table><tr><td><a href=\"{{URL::Route('admin.promo.edit',array('id' => ''))}}/"+oSettings.aoData[i]._aData[0]+"\" class=\"btn btn-primary btn-xs\">EDIT</a></td>"
						+"<td><a href=\"javascript:void(0)\" onclick=\"deleteRow("+oSettings.aoData[i]._aData[0]+")\" class=\"btn btn-danger btn-xs\">DELETE</a></td></tr>"
						+"<tr><td align=\"center\"><a href=\"{{URL::Route('admin.promo-order',array('id' => ''))}}/"+oSettings.aoData[i]._aData[0]+"\" class=\"btn btn-info btn-sm\">ORDER</a></td>"
						+"<td align=\"center\"><a href=\"javascript:void(0)\" onclick=\"openView("+oSettings.aoData[i]._aData[0]+")\" class=\"btn btn-primary btn-sm\">VIEW</a></td></tr></table>");
					}
				}                            
			});
			$('input[aria-controls="DataTables_Table_0"]').unbind();
			$('input[aria-controls="DataTables_Table_0"]').bind('keyup', function(e) {
				if(e.keyCode == 13) {
					oTable.fnFilter(this.value);   
				}
			});
		});
		
		function reDrawDataTable(){
			//$(".datatable").dataTable().fnClearTable();
			$(".datatable").dataTable().fnDraw();
		}
		
		function deleteRow(id){
			if(confirm("Are you sure you want to delete this row?")){
				$.ajax({
					url: "{{URL::route('admin.promo.delete')}}",  //Server script to process data
					type: 'POST',
					dataType: 'json',
					data: "id="+id,
					cache: false,
					success: function(data){
						if(data == 1){
							$(".datatable").dataTable().fnClearTable();
						}
						else{
							alert('Bad request');
						}
					}
				});
			}
			return false;
		}
		
		function openView(id){
			$.ajax({
					url: "{{URL::route('admin.promo.detail')}}",  //Server script to process data
					type: 'POST',
					dataType: 'json',
					data: "id="+id,
					cache: false,
					success: function(data){
						if(data.success == 1){
							$("#lblTitleEN").html(data.data.title_en);
							$("#lblTitleID").html(data.data.title_id);
							$("#lblContentEN").html(data.data.content_en);
							$("#lblContentID").html(data.data.content_id);
							$("#lblFileName").html(data.data.file_name);
							$("#lblDate").html(data.data.created_at);
							if(data.data.image !== "")
								$("#lblImage").html("<img width='100px' src='"+base_url+"/"+data.data.image+"'/>");
							else
								$("#lblImage").html("");
							$("#modalView").modal('show');
						}
						else{
							alert('Data not found');
						}
					}
				});
			return false;
		}
		
		function changeAccept(id){
			$.ajax({
				url: "{{URL::route('admin.promo.switch-active')}}",  //Server script to process data
				type: 'POST',
				dataType: 'json',
				//Ajax events
				//error: errorHandler,
				// Form data
				data: "id="+id,
				//Options to tell jQuery not to process data or worry about content-type.
				cache: false,
				//contentType: false,
				//processData: false,
				success: function(data){
					if(data == 1){
						$(".datatable").dataTable().fnClearTable();
					}
					else if(data == -1){
						alert("Please provide the file for this promo");
					}
					else{
						alert('Bad request');
					}
				}
			});
			return false;
		}
	</script>
@stop