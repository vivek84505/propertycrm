  <!-- Table -->
  
                            <div class="table-responsive">
                                            <table class="table table-striped" id="users_table">
                                                <thead>
                                                    <tr>
                                                      
                                                        <th>User Name </th>
                                                        <th>Email </th> 
                                                        <th>Mobile</th>
                                                        <th>Role</th>
                                                        <th class="text-right">Action</th>
                                                    </tr>
                                                   <tbody >
                                                       @if(!empty($result))
                                                            @foreach($result as $res)
                                                                <tr>
                                                                    <td>  {{  $res['firstname'] }} {{  $res['lastname'] }}   </td>
                                                                    <td>  {{  $res['email']  }}   </td> 
                                                                    <td>  {{  $res['mobile']  }}  </td> 
                                                                    <td>  {{  $res['userrole']  }}  </td>
                                                                    <td class="text-right" >
                                                                    <div class="btn-group">
                                                                    
                                                                    <button class="btn m-2 btn-xs rounded-0 btn-info edituser" value="{{ $res['user_id'] }}" type="button" >Edit</button>
 
                                                                    <div class="space"></div>                                                                 
                                                                    <button class="btn m-2 btn-xs rounded-0 btn-danger deleteuser " value="{{ $res['user_id'] }}" color-white"> Delete </button>
                                                                       
                                                                       
                                                                     </div>
                                                                    </td>
                                                                </tr>  
                                                            @endforeach
                                                           
                                                            @endif
                                                    </tbody>                                            
                                                </thead>                                              
                                            </table>
                                        </div>

  <!-- User List Model --> 
        <!-- Modal -->
        <div class="modal fade" id="usereditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <!-- Modal Body -->
                        <div class="modal-body">
                             <form  id="usereditform" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" id="user_id" name="user_id" class="edit_user_id" value="">
                            
                                    <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label">Firstname</label>
                                                        <div>
                                                            <input type="text" name="firstname" id="firstname"  class="form-control input-lg edit_firstname"  value="">
                                                        </div>
                                                    </div>


                                                    <div class="form-group col-md-6 ">
                                                        <label class="control-label">Lastname</label>
                                                            <div>
                                                                <input type="text" name="lastname" id="lastname"  class="form-control input-lg edit_lastname"  value="">
                                                            </div>
                                                    </div>
                                            
                                            
                                                    <div class="form-group col-md-6 ">
                                                        <label class="control-label">Email</label>
                                                        <div>
                                                            <input type="email" name="email" id="email"  class="form-control input-lg edit_email"  value="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6 ">
                                                    <label class="control-label">Mobile</label>
                                                    <div>
                                                        <input type="text" name="mobile" id="mobile"  class="form-control input-lg edit_mobile"  value="">
                                                    </div>
                                                    </div>


                                            <div class="form-group col-md-6 ">
                                                <label class="control-label">User Role </label>
                                                    <div>
                                                        <select name="userrole" id="userrole" class="form-control input-lg edit_userrole" >
                                                            <option value="">Select Role </option>
                                                            <option value="superadmin"> Super Admin </option>
                                                            <option value="admin"> Admin </option>
                                                            <option value="user"> User </option>
                                                        </select>
                                                    </div>
                                            </div>
                                            
                        
                                </div>
                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                            
                                </div>
                                </div>
                               

                </div>
            </div>
        </div>
    </div>
  </div>
</div>
 


<script>    
//Edit User JS
$('.edituser').on('click',function(){
    
   
    var userid = $(this).attr('value');
    var token = $('#token').val();           
    var url = "{{ route('getuserbyid') }}";  
    var payload = { "_token": token , "userid":userid};

    $.post(url, payload, function(response){
        
        if(response.length > 0 ){
           let userdata = response[0];

            $('.edit_user_id').val(userdata.user_id);
            $('.edit_firstname').val(userdata.firstname);
            $('.edit_lastname').val(userdata.lastname);
            $('.edit_email').val(userdata.email);
            $('.edit_mobile').val(userdata.mobile);
            $('.edit_userrole').val(userdata.userrole);
 
            $('#usereditModel').modal('show');
        }
        else{
             alert("User Details Not Found!")
        }
      
    });


});
</script>


<script>
$(document).ready(function() {
    $("#usereditform").validate({
        rules: {
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            email: {
                required: true,
                email:true
            },
            mobile: {
                required: true
            },
            userrole: {
                required: true
            }
        },
        messages: {
            firstname: {
                required: "Firstname is required"
            },
            lastname: {
                required: "Lastname is required"
            },
            email: {
                required: "Email is required"
                
            },
            mobile: {
                required:  "Mobile is required"
            },
            userrole: {
                required:  "User Role is required"
            }           
             
        },        
        submitHandler: function(form,e) {
            e.preventDefault();
            console.log('Form submitted');
            $.ajax({
                type: 'POST',
                url: "{{route('useredit')}}",
                dataType: "html",
                data: $('#usereditform').serialize(),
                beforeSend: function() {

                    $("#loader").show();
                },               
                success: function(result) {

                    result = JSON.parse(result);
                   
                    if(result.status === 'success'){

                        alertify.success(result.returnmsg);    
                                

                    }
                    else if (result.status === 'fail'){
                        alertify.error(result.returnmsg);
                    } 

                     

                    getuserlist();
                },
                complete: function() {
                    $("#loader").hide();
                },
                error : function(error) {

                }
            });
            return false;
        }
    });

});
</script>



<script>

// Delete User JS
$('.deleteuser').on('click', function () {
        
    var userid = $(this).attr('value');
    var token = $('#token').val();           

        swal({
            title: "Are you sure?",
            text: "You Want to Delete this User!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
 
          
            $.ajax({
                type:"POST",              
                url: "{{ route('userdelete') }}",                
                data: { "_token": token , "userid":userid },
                dataType: 'json',
                beforeSend:function(){
                    $("#loader").show();
                },
                success: function(result){
                     
                  

                    if(result.status === 'success'){

                        swal("Deleted!", result.returnmsg, 'success');  //alertify.success(result.returnmsg);                     
                        getuserlist();
                    }
                    else if (result.status === 'fail'){

                        swal("Error!", result.returnmsg, 'error'); // alertify.error(result.returnmsg);
                        getuserlist();
                    } 
                       
                },
                complete:function(){
                     $("#loader").hide();
                }
            }); 
            
            
        });
        
        
});


$(document).ready(function(){
     

    $('#users_table').DataTable({  
        searching: true,
        ordering:  true
    });      
  
    $(".dataTables_empty").hide();
});

</script>