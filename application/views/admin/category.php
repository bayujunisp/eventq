<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Category Event</h1>
          <!-- <p class="mb-4">Category for event.</p> -->

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
                      <th>Id Category</th>
                      <th>Category</th>
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
            <form>
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Category Name</label>
                            <div class="col-md-10">
                              <input type="text" name="category" id="category" class="form-control" placeholder="Category Name">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->

                <!-- MODAL EDIT -->
        <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <input type="hidden" name="id_category_edit" id="id_category_edit">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Category </label>
                            <div class="col-md-10">
                              <input type="text" name="category_edit" id="category_edit" class="form-control" placeholder="Category">
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id_category_delete" id="id_category_delete" class="form-control">
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
    show_category(); //call function show all category
    
    $('#mydata').dataTable();
     
    //function show all category
    function show_category(){
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo site_url('admin/category_data')?>',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                var no = 1;
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                          '<td>'+no+'</td>'+
                          '<td>'+data[i].id_category+'</td>'+
                            '<td>'+data[i].category+'</td>'+
                            '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id_category="'+data[i].id_category+'" data-category="'+data[i].category+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_category="'+data[i].id_category+'">Delete</a>'+
                                '</td>'+
                            '</tr>';
                            no++;
                }
                $('#show_data').html(html);
            }

        });
    }

        //Save category
        $('#btn_save').on('click',function(){
            var category = $('#category').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/add_category')?>",
                dataType : "JSON",
                data : {category:category},
                success: function(data){
                    $('[name="category"]').val("");
                    $('#Modal_Add').modal('hide');
                    swal("Success","Data Has Been Added.","success");
                    show_category();
                }
            });
            return false;
        });

        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var id_category = $(this).data('id_category');
            var category = $(this).data('category');
            
            $('#Modal_Edit').modal('show');
            $('[name="id_category_edit"]').val(id_category);
            $('[name="category_edit"]').val(category);
        });

        //update record to database
         $('#btn_update').on('click',function(){
            var id_category = $('#id_category_edit').val();
            var category = $('#category_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/update_category')?>",
                dataType : "JSON",
                data : {id_category:id_category , category:category},
                success: function(data){
                    $('[name="id_category_edit"]').val("");
                    $('[name="category_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    swal("Success","Data Has Been Updated.","success");
                    show_category();
                }
            });
            return false;
        });

          $('#show_data').on('click','.item_delete',function(){
          var id_category = $(this).data('id_category');
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
                url  : "<?php echo site_url('admin/delete_category')?>",
                dataType : "JSON",
                data : {id_category:id_category},
                success: function(data){
                  $('[name="id_category_delete"]').val("");
                  $('#Modal_Delete').modal('hide');
                  swal("Success","Data Has Been Deleted.","success");
                  show_category();
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


