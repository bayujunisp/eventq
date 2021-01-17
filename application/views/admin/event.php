<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Event Data</h1>
	<!-- <p class="mb-4">event for event.</p> -->

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>

		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Name Event</th>
							<th>Organizer</th>
              <th>Date Event</th>
              <th>Schedule</th>
              <th>Max Attendance</th>
              <th>Description</th>
              <th>Location</th>
              <th>Category</th>
              <th>Images</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="show_data">

          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<!-- MODAL ADD -->
<form id="form_save" enctype="multipart/form-data" method="POST">
	<div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add New Event</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Event Name</label>
						<div class="col-md-10">
							<input type="text" name="name_event" id="name_event" class="form-control" placeholder="Event Name" required="required">
						</div>
					</div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Organizer</label>
            <div class="col-md-10">
              <input type="text" name="organizer" id="organizer" class="form-control" placeholder="Organizer" required="required">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Date Event</label>
            <div class="col-md-10">
              <input type="date" name="date_event" id="date_event" class="form-control" placeholder="Event Date" required="required">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Max Attendance</label>
            <div class="col-md-10">
              <input type="number" name="max_attendance" id="max_attendance" class="form-control" placeholder="Max Attendance" required="required">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Schedule Event</label>
            <div class="col-md-10">

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Start</label>
                <div class="col-md-10">
                  <input type="time" name="start" id="start" class="form-control" placeholder="Start" required="required">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label">End</label>
                <div class="col-md-10">
                  <input type="time" name="end" id="end" class="form-control" placeholder="End" required="required">
                </div>
              </div>

            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-2 col-form-label">Description</label>
            <div class="col-md-10">
              <textarea name="description" id="description" class="form-control" rows="3" required="required"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Event Location</label>
            <div class="col-md-10">
              <input type="text" name="location_event" id="location_event" class="form-control" placeholder="Event Location" required="required">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Event Category</label>
            <div class="col-md-10">
              <select class="form-control" name="category_event" id="category_event" required="required">

                <option value="0" selected disabled="true">--Choose Category--</option>
                <?php foreach ($category as $cat) {
                 ?>
                 <option value="<?php echo $cat->category; ?>"> <?php echo $cat->category; ?></option>
                 <?php } ?>
               </select>
             </div>
           </div>
           <div class="form-group row">
            <label class="col-md-2 col-form-label">Images</label>
            <div class="col-md-10">
              <input type="file" name="images" id="images" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <input type="submit" name="submit" value="Save" class="btn btn-primary">
         <!-- <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button> -->
       </div>
     </div>
   </div>
 </div>
</form>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
<form id="form_edit" enctype="multipart/form-data" method="POST">
	<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id_event_edit" id="id_event">
					 <div class="form-group row">
            <label class="col-md-2 col-form-label">Event Name</label>
            <div class="col-md-10">
              <input type="text" name="name_event_edit" id="name_event" class="form-control" placeholder="Event Name" required="required">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Organizer</label>
            <div class="col-md-10">
              <input type="text" name="organizer_edit" id="organizer" class="form-control" placeholder="Organizer" required="required">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Date Event</label>
            <div class="col-md-10">
              <input type="date" name="date_event_edit" id="date_event" class="form-control" placeholder="Event Date" required="required">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Max Attendance</label>
            <div class="col-md-10">
              <input type="number" name="max_attendance_edit" id="max_attendance" class="form-control" placeholder="Max Attendance" required="required">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Schedule Event</label>
            <div class="col-md-10">

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Start</label>
                <div class="col-md-10">
                  <input type="time" name="start_edit" id="start" class="form-control" placeholder="Start" required="required">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label">End</label>
                <div class="col-md-10">
                  <input type="time" name="end_edit" id="end" class="form-control" placeholder="End" required="required">
                </div>
              </div>

            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-2 col-form-label">Description</label>
            <div class="col-md-10">
              <textarea name="description_edit" id="description" class="form-control" rows="3" required="required"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Event Location</label>
            <div class="col-md-10">
              <input type="text" name="location_event_edit" id="location_event" class="form-control" placeholder="Event Location" required="required">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Event Category</label>
            <div class="col-md-10">
              <select class="form-control" name="category_event_edit" id="category_event" required="required">

                <option value="0" selected disabled="true">--Choose Category--</option>
                <?php foreach ($category as $cat) {
                 ?>
                 <option value="<?php echo $cat->category; ?>"> <?php echo $cat->category; ?></option>
                 <?php } ?>
               </select>
             </div>
           </div>
           <div class="form-group row">
            <label class="col-md-2 col-form-label">Status</label>
            <div class="col-md-10">
              <select class="form-control" name="status_edit" id="category_event" required="required">
                 <option value="Open"> Open</option>
                 <option value="Close"> Close</option>
               </select>
             </div>
           </div>

           <div class="form-group row">
            <label class="col-md-2 col-form-label">Images</label>
            <div class="col-md-10">
          <input type="hidden" name="images1" id="images1">
              <input type="file" name="images_edit" id="images" class="form-control">
            </div>
          </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!--END MODAL EDIT-->

<!--MODAL DELETE-->
<form>
	<div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete event</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<strong>Are you sure to delete this record?</strong>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_event_delete" id="id_event_delete" class="form-control">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!--END MODAL DELETE-->
<script type="text/javascript">
	$(document).ready(function(){
    show_event(); //call function show all event
    
    $('#dataTable').dataTable();

    //function show all event
    function show_event(){
    	$.ajax({
    		type  : 'ajax',
    		url   : '<?php echo site_url('admin/event_data')?>',
    		async : false,
    		dataType : 'json',
    		success : function(data){
    			var html = '';
    			var i;
    			var no = 1;
    			for(i=0; i<data.length; i++){
    				html += '<tr>'+
    				'<td>'+no+'</td>'+
    				'<td>'+data[i].name_event+'</td>'+
            '<td>'+data[i].organizer+'</td>'+
            '<td>'+data[i].date_event+'</td>'+
            '<td>'+'Mulai : '+data[i].start+'<br>'+
            'Selesai : '+data[i].end+
            '</td>'+
            '<td>'+data[i].max_attendance+'</td>'+
            '<td>'+data[i].description+'</td>'+
            '<td>'+data[i].location_event+'</td>'+
            '<td>'+data[i].category_event+'</td>'+
            '<td>'+ '<img src="<?php echo base_url()?>assets/images_event/'+data[i].images+'" width="100px" height="100px">' +'</td>'+
            '<td>'+data[i].status+'</td>'+
            '<td style="text-align:right;">'+
            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data="'+data[i].id_event+'">Edit</a>'+' '+
            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data="'+data[i].id_event+'">Delete</a>'+
            '</td>'+
            '</tr>';
            no++;
          }
          $('#show_data').html(html);
        }

      });
    }
        //Save event
        $('#form_save').submit(function(e){
          e.preventDefault(); 
          $.ajax({
           type : "POST",
           url  : "<?php echo site_url('admin/add_event')?>",
           data:new FormData(this),
           processData:false,
           contentType:false,
           cache:false,
           async:false,
           success: function(data){
            $('[name="name_event"]').val("");
            $('[name="organizer"]').val("");
            $('[name="date_event"]').val("");
            $('[name="max_attendance"]').val("");
            $('[name="start"]').val("");
            $('[name="end"]').val("");
            $('[name="description"]').val("");
            $('[name="location_event"]').val("");
            $('[name="category_event"]').val("");
            $('[name="images"]').val("");
            $('#Modal_Add').modal('hide');
            swal("Success","Data Has Been Added.","success");
            show_event();
          }
        });
        });

        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
          var id=$(this).attr('data');
          $.ajax({
            type : "GET",
            url  : "<?php echo site_url('admin/get_event')?>",
            dataType : "JSON",
            data : {id:id},
            success: function(data){
              $.each(data,function(id_event, name_event, organizer, date_event, max_attendance, start, end, description, location_event, category_event, images){
                $('#Modal_Edit').modal('show');
                $('[name="id_event_edit"]').val(id_event);
                $('[name="name_event_edit"]').val(name_event);
                $('[name="organizer_edit"]').val(organizer);
                $('[name="date_event_edit"]').val(date_event);
                $('[name="max_attendance_edit"]').val(max_attendance);
                $('[name="start_edit"]').val(start);
                $('[name="end_edit"]').val(end);
                $('[name="description_edit"]').val(description);
                $('[name="location_event_edit"]').val(location_event);
                $('[name="category_event_edit"]').val(category_event);
                $('[name="images1"]').val(images);
              });
            }
          });
          return false;
        });

        //update record to database
        $('#btn_update').on('click',function(){
        	var id_event = $('#id_event_edit').val();
        	var event = $('#event_edit').val();
        	$.ajax({
        		type : "POST",
        		url  : "<?php echo site_url('admin/update_event')?>",
        		dataType : "JSON",
        		data : {id_event:id_event , event:event},
        		success: function(data){
        			$('[name="id_event_edit"]').val("");
        			$('[name="event_edit"]').val("");
        			$('#Modal_Edit').modal('hide');
        			swal("Success","Data Has Been Updated.","success");
        			show_event();
        		}
        	});
        	return false;
        });


        $('#show_data').on('click','.item_delete',function(){
          var id_event = $(this).data('id_event');
          swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it",
            cancelButtonText: "cancel",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm) {
            if (isConfirm) {

               //ajax delete data to database
               $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/delete_event')?>",
                dataType : "JSON",
                data : {id_event:id_event},
                success: function(data){
                  $('[name="id_event_delete"]').val("");
                  $('#Modal_Delete').modal('hide');
                  swal("Success","Data Has Been Deleted.","success");
                  show_event();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                  })
                }
              });
             } else {
              swal("Cancelled", "Your data is safe", "error");
            }
          });

        });


      });

    </script>


