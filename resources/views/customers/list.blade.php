  <!-- Table -->
  
                            <div class="table-responsive">
                                            <table class="table table-striped" id="users_table">
                                                <thead>
                                                    <tr>
                                                      
                                                        <th>Client ID </th>
                                                        <th>Name </th> 
                                                        <th>Email</th>
                                                        <th>Mobile</th>
                                                        <th>City</th>
                                                        <th class="text-right">Action</th>
                                                    </tr>
                                                   <tbody >
                                                       @if(!empty($result))
                                                            @foreach($result as $res)
                                                                <tr>
                                                                    <td>  {{  $res['customerid']  }}   </td> 
                                                                    <td>  {{  $res['firstname'] }} {{  $res['lastname'] }}   </td>
                                                                    <td>  {{  $res['email']  }}   </td> 
                                                                    <td>  {{  $res['mobile']  }}  </td> 
                                                                    <td>  {{  $res['city']  }}  </td>
                                                                    <td class="text-right" >
                                                                    <div class="btn-group">
                                                                    
                                                                    <button class="btn m-2 btn-xs rounded-0 btn-info editcustomer" value="{{ $res['customerid'] }}" type="button" >Edit</button>
 
                                                                    <div class="space"></div>                                                                 
                                                                    <button class="btn m-2 btn-xs rounded-0 btn-danger deletecustomer " value="{{ $res['customerid'] }}" color-white"> Delete </button>
                                                                       
                                                                       
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
        <div class="modal fade" id="customereditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Client</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <!-- Modal Body -->
                        <div class="modal-body">
                             <form  id="customereditform" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" id="customerid" name="customerid" class="edit_customerid" value="">
                            
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
                                                        <label class="control-label">Website</label>
                                                        <div>
                                                            <input type="url" name="website" id="website"  class="form-control input-lg edit_website"  value="">
                                                        </div>
                                                    </div>

                                                   

                                                    <div class="form-group col-md-6 ">
                                                    <label class="control-label">State</label>
                                                    <div>
                                                        <select name="state" id="state" class="form-control  edit_state"  >
                                                        <option value=""> Select State </option>
                                                        @foreach($states as $state )
                                                        <option value="{{ $state['state_id'] }}"> {{ $state['state_name'] }} </option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                    </div>


                                                    <div class="form-group col-md-6 ">
                                                     <label class="col-form-label">District</label>                                                
                                                        <select name="district" id="district" class="form-control edit_district"  >
                                                            
                                                        </select>
                                                    </div>


                                                      <div class="form-group col-md-6 ">
                                                        <label class="control-label">City</label>
                                                        <div>
                                                            <input type="text" name="city" id="city"  class="form-control input-lg edit_city"  value="">
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
$('.editcustomer').on('click',function(){
    
   
    var customerid = $(this).attr('value');
    var token = $('#token').val();           
    var url = "{{ route('getcustomersbyid') }}";  
    var payload = { "_token": token , "customerid":customerid};

    $.post(url, payload, function(response){
        
        if(response.length > 0 ){
           let customerdata = response[0];
            console.log("customerdata=======>",customerdata);
            $('.edit_customerid').val(customerdata.customerid);
            $('.edit_firstname').val(customerdata.firstname);
            $('.edit_lastname').val(customerdata.lastname);
            $('.edit_email').val(customerdata.email);
            $('.edit_mobile').val(customerdata.mobile);
            $('.edit_state').val(customerdata.state);
            $('.edit_city').val(customerdata.city);
            $('.edit_website').val(customerdata.website);

            //Adding Dynamic District dropdown on Pageload 
        
        var token = $('#token').val();
        var state_id = customerdata.state; 
    $.post("{{ route('getdistrictbystateid') }}", { "_token": token ,"state_id":customerdata.state}, function(response){
        
        
        response = JSON.parse(response);
        
        html = '';
            html += '<option value="" >Select District </option>';

            if(response.length > 0){
                     $.each(response,function(key,val){
 
     
                        if(customerdata.district === val.district_id ){
                            html += '<option value="'+ val.district_id +' " selected >'+ val.district_name +'</option>';
                    
                        }
                        else{

                            html += '<option value="'+ val.district_id +'" >'+ val.district_name +'</option>';
                    
                        }
                        
                    });                      
            }
            
 
            $(".edit_district").html(html);
       
    }); 
       
 
            
 
            $('#customereditModel').modal('show');
        }
        else{
             alert("Customer Details Not Found!")
        }
      
    });


});
</script>


<script>
$(document).ready(function() {
    $("#customereditform").validate({
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
                url: "{{route('customeredit')}}",
                dataType: "html",
                data: $('#customereditform').serialize(),
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

                     

                    getcustomerlist();
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
$('.deletecustomer').on('click', function () {
        
    var customerid = $(this).attr('value');
    var token = $('#token').val();           

        swal({
            title: "Are you sure?",
            text: "You Want to Delete this Client!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            
           
             $.ajax({
                type:"POST",              
                url: "{{ route('customersdelete') }}",                
                data: { "_token": token , "customerid":customerid },
                dataType: 'json',
                beforeSend:function(){
                    $("#loader").show();
                },
                success: function(result){
                     
                  

                    if(result.status === 'success'){

                        swal("Deleted!", result.returnmsg, 'success');  //alertify.success(result.returnmsg);                     
                        getcustomerlist();
                    }
                    else if (result.status === 'fail'){

                        swal("Error!", result.returnmsg, 'error'); // alertify.error(result.returnmsg);
                        getcustomerlist();
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



<script>
    $(".edit_state").change(function(){

        var token = $('#token').val();
        var state_id = $(this).val();
      $.ajax({
          type:"POST",
          url: "{{ route('getdistrictbystateid') }}",
          data: { "_token": token ,"state_id":state_id},
          dataType: 'json',
          beforeSend:function(){
              $("#loader").show();
          },
          success: function(res){
            html = '';
            html += '<option value="" >Select District </option>';

            if(res.length > 0){
                    // console.log("res====>",res);
             $.each(res,function(key,val){
               
                  html += '<option value="'+ val.district_id +'" >'+ val.district_name +'</option>';
               
             }) ;                      
            }

            $(".edit_district").html(html);
           


         },
         complete:function(){
             $("#loader").hide();
         }
      }); 




    })
</script>