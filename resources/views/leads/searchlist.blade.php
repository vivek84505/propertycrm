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
                                                                    <td>  {{  $res['leadid']  }}   </td> 
                                                                    <td>  {{  $res['firstname'] }} {{  $res['lastname'] }}   </td>
                                                                    <td>  {{  $res['email']  }}   </td> 
                                                                    <td>  {{  $res['mobile']  }}  </td> 
                                                                    <td>  {{  $res['city']  }}  </td>
                                                                    <td class="text-right" >
                                                                    <div class="btn-group">
 
                                                                    <a target="_blank" href="{{ route('leadsedit', ['leadid'=>$res['leadid'] ]) }}" class="btn m-2 btn-xs rounded-0 btn-info "> Edit </a>
                                                                    </div>                                                                 
                                                                    <button class="btn m-2 btn-xs rounded-0 btn-danger deletecustomer " value="{{ $res['leadid'] }}" color-white"> Delete </button>
                                                                       
                                                                       
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
        <div class="modal fade" id="leadeditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <input type="hidden" id="leadid" name="leadid" class="edit_leadid" value="">
                            
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
                                    <button type="submit" class="btn btn-info">Save changes</button>
                            
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
$('.editlead').on('click',function(){
    
   
    var leadid = $(this).attr('value');
    var token = $('#token').val();           
    var url = "{{ route('leadbyid') }}";  
    var payload = { "_token": token , "leadid":leadid};

    $.post(url, payload, function(response){
        
        if(response.length > 0 ){
           let leaddata = response[0];
            console.log("leaddata=======>",leaddata);
            $('.edit_leadid').val(leaddata.leadid);
            $('.edit_firstname').val(leaddata.firstname);
            $('.edit_lastname').val(leaddata.lastname);
            $('.edit_email').val(leaddata.email);
            $('.edit_mobile').val(leaddata.mobile);
            $('.edit_state').val(leaddata.state);
            $('.edit_city').val(leaddata.city);
            $('.edit_website').val(leaddata.website);

            //Adding Dynamic District dropdown on Pageload 
        
        var token = $('#token').val();
        var state_id = leaddata.state; 
    $.post("{{ route('getdistrictbystateid') }}", { "_token": token ,"state_id":leaddata.state}, function(response){
        
        
        response = JSON.parse(response);
        
        html = '';
            html += '<option value="" >Select District </option>';

            if(response.length > 0){
                     $.each(response,function(key,val){
 
     
                        if(leaddata.district === val.district_id ){
                            html += '<option value="'+ val.district_id +' " selected >'+ val.district_name +'</option>';
                    
                        }
                        else{

                            html += '<option value="'+ val.district_id +'" >'+ val.district_name +'</option>';
                    
                        }
                        
                    });                      
            }
            
 
            $(".edit_district").html(html);
       
    }); 
       
 
            
 
            $('#leadeditModel').modal('show');
        }
        else{
             alert("Customer Details Not Found!")
        }
      
    });


});
</script>


<script>
$(document).ready(function() {

   

});
</script>



<script>

// Delete User JS
$('.deletecustomer').on('click', function () {
        
    var leadid = $(this).attr('value');
    var token = $('#token').val();           

        swal({
            title: "Are you sure?",
            text: "You Want to Delete this Lead!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            
           
             $.ajax({
                type:"POST",              
                url: "{{ route('leaddelete') }}",                
                data: { "_token": token , "leadid":leadid },
                dataType: 'json',
                beforeSend:function(){
                    $("#loader").show();
                },
                success: function(result){
                     
                  

                    if(result.status === 'success'){

                        swal("Deleted!", result.returnmsg, 'success');  //alertify.success(result.returnmsg);                     
                        getleadlist();
                    }
                    else if (result.status === 'fail'){

                        swal("Error!", result.returnmsg, 'error'); // alertify.error(result.returnmsg);
                        getleadlist();
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