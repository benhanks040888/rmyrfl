@extends('admin.layouts.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Contact Us</h1>
    </div>
  </div>
	<div id="list_table_holder">
		<p class="btn-group" data-toggle="buttons">
			  <label class="btn btn-primary radio-1 active">
				<input type="radio" name="options" id="option1" value="all"> All
			  </label>
			  <label class="btn btn-primary radio-1">
				<input type="radio" name="options" id="option2" value="yes"> Handled
			  </label>
			  <label class="btn btn-primary radio-1">
				<input type="radio" name="options" id="option3" value="no"> Unhandled
			  </label>
		</p>
	</div>
	
	<div class="table-responsive">
		<table class="table table-hover datatable">
			<thead>
				<tr>
				@foreach($fields as $field)
					<th>{{$field['alias']}}</th>
				@endforeach
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
							<td>Name</td>
							<td width="10px">:</td>
							<td id="lblName"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td id="lblEmail"></td>
						</tr>
						<tr>
							<td>Phone</td>
							<td>:</td>
							<td id="lblPhone"></td>
						</tr>
						<tr>
							<td>Address</td>
							<td>:</td>
							<td id="lblAddress"></td>
						</tr>
						<tr>
							<td>Subject</td>
							<td>:</td>
							<td id="lblSubject"></td>
						</tr>
						<tr>
							<td>Message</td>
							<td>:</td>
							<td id="lblMessage"></td>
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
				"sAjaxSource" : "{{URL::route('admin.contact-us.list')}}",
				'iDisplayLength' : 25,
				"aaSorting": [[ 4, "desc" ]],
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
						{ "bSortable": false, "aTargets": [5] }
					],
				'bServerSide': true,
				"fnServerParams":function (aoData) {
					aoData.push({"name":"filter", "value":$('input[type="radio"]:checked').val() });
					},
				"fnDrawCallback": function ( oSettings ) {
					var text;
					for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ ){	
						if(oSettings.aoData[i]._aData[5] == 1)
							text = "Yes";
						else
							text = "No";
							
							text += "-- <a onclick='changeAccept("+oSettings.aoData[i]._aData[0]+");' href='javascript:void(0)'>Change</a>";
						$('td:eq(4)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html(text); 	
						
						$('td:eq(<?php echo $num_fields - $hidden_field ?>)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html("<table>"
						+"<tr><td align=\"center\" colspan=\"2\"><a href=\"javascript:void(0)\" onclick=\"openView("+oSettings.aoData[i]._aData[0]+")\" class=\"btn btn-primary btn-sm\">VIEW</a></td></tr></table>");
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
		
		function openView(id){
			$.ajax({
					url: "{{URL::route('admin.contact-us.detail')}}",  //Server script to process data
					type: 'POST',
					dataType: 'json',
					data: "id="+id,
					cache: false,
					success: function(data){
						if(data.success == 1){
							$("#lblName").html(data.data.name);
							$("#lblEmail").html(data.data.email);
							$("#lblAddress").html(data.data.address);
							$("#lblPhone").html(data.data.phone);
							$("#lblMessage").html(data.data.message);
							$("#lblSubject").html(data.data.subject);
							$("#lblDate").html(data.data.created_at);
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
					url: "{{URL::route('admin.contact-us.switch-active')}}",  //Server script to process data
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
						else{
							alert('Bad request');
						}
					}
				});
			return false;
		}
	</script>
@stop