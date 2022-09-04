  <!-- Table -->
  <!-- 'leadstatusid','leadsource','isactive','createdby','createddate','lastmodifiedby','lastmodifieddate' -->
  <div class="table-responsive">
                                            <table class="table table-striped" id="leadsource_table">
                                                <thead>
                                                    <tr>
                                                      
                                                        <!-- <th>leadstatusid </th> -->
                                                        <th>leadstatus </th> 
                                                        <th>status </th> 
                                                        <th>createdby</th>
                                                        <th>createddate</th>
                                                        <th>lastmodifiedby</th>
                                                        <th>lastmodifieddate</th>
                                                        <th class="text-right">Action</th>
                                                    </tr>
                                                   <tbody >
                                                       @if(!empty($result))
                                                            @foreach($result as $res)
                                                                <tr>
                                                                     <!-- <td>  {{  $res['leadstatusid']  }}   </td>  -->
                                                                    <td>  {{  $res['leadstatus']  }}  </td> 
                                                                    <td>   
                                                                         @if($res['isactive'] == 1)
                                                                         <span class="badge badge-success m-2">Active</span>
                                                                         @else  
                                                                         <span class="badge badge-danger m-2">Inactive</span>                                                                         @endif
                                                                    </td> 
                                                                    <td>  {{  $res['createdby']  }}  </td>
                                                                    <td>  {{  $res['createddate']  }}  </td>
                                                                    <td>  {{  $res['lastmodifiedby']  }}  </td>
                                                                    <td>  {{  $res['lastmodifieddate']  }}  </td>
                                                                    <td class="text-right" >
                                                                    <div class="btn-group">
                                                                    
                                                                    <button class="btn m-2 btn-xs rounded-0 btn-info editleadstatus" value="{{ $res['leadstatusid'] }}" type="button" >Edit</button>
 
                                                                    <div class="space"></div>                                                                 
                                                                    <button class="btn m-2 btn-xs rounded-0 btn-danger deletestatus " value="{{ $res['leadstatusid'] }}" color-white"> Delete </button>
                                                                       
                                                                       
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
        <div class="modal fade" id="leadsourceeditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Lead Status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <!-- Modal Body -->
                        <div class="modal-body">
                             <form  id="leadstatuseeditform" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" id="leadstatusid" name="leadstatusid" class="edit_leadstatusid" value="">
                            
                                    <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label">Lead Status</label>
                                                        <div>
                                                            <input type="text" name="leadstatus" id="leadstatus"  class="form-control input-lg edit_leadstatus"  value="">
                                                        </div>
                                                    </div>
                

                                            <div class="form-group col-md-6 ">
                                                <label class="control-label">Isactive </label>
                                                    <div>
                                                        <select name="isactive" id="isactive" class="form-control input-lg edit_isactive" >
                                                            <option value="">Select Status </option>
                                                             <option value="1"> Active </option>
                                                            <option value="0"> Inactive </option>
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
$('.editleadstatus').on('click',function(){
    
   
    var leadstatusid = $(this).attr('value');
    var token = $('#token').val();           
    var url = "{{ route('getleadstatusbyid') }}";  
    var payload = { "_token": token , "leadstatusid":leadstatusid};


    $.post(url, payload, function(response){
        
        if(response.length > 0 ){
           let leadstatusdata = response[0];
            
            console.log("leadsourcedata===========>",leadstatusdata);

            $('.edit_leadstatusid').val(leadstatusdata.leadstatusid);
            $('.edit_leadstatus').val(leadstatusdata.leadstatus);
            $('.edit_isactive').val(leadstatusdata.isactive);
            
            $('#leadsourceeditModel').modal('show');
        }
        else{
             alert("Lead status Details Not Found!")
        }
      
    });


});
</script>


<script>
$(document).ready(function() {
    $("#leadstatuseeditform").validate({
        rules: {
            leadstatus: {
                required: true,
                maxlength:30
            },
            isactive: {
                required: true
            }
        },
        messages: {
            leadstatus: {
                required: "Leadstatus is required",
                maxlength: "Max limit 30 characters"
            },
            isactive: {
                required: "status is required"
            }                       
             
        },        
        submitHandler: function(form,e) {
            e.preventDefault();
            console.log('Form submitted');
            $.ajax({
                type: 'POST',
                url: "{{route('leadstatusedit')}}",
                dataType: "html",
                data: $('#leadstatuseeditform').serialize(),
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

                     

                    getleadstatuselist();
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
$('.deletestatus').on('click', function () {
        
    var leadstatusid = $(this).attr('value');
    var token = $('#token').val();           

        swal({
            title: "Are you sure?",
            text: "You Want to Delete this Leadstatus!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
 
          
            $.ajax({
                type:"POST",              
                url: "{{ route('leadstatusdelete') }}",                
                data: { "_token": token , "leadstatusid":leadstatusid },
                dataType: 'json',
                beforeSend:function(){
                    $("#loader").show();
                },
                success: function(result){
                     
                  console.log("result==========>",result);


                    if(result.status === 'success'){

                        swal("Deleted!", result.returnmsg, 'success');  //alertify.success(result.returnmsg);                     
                        getleadstatuselist();
                    }
                    else if (result.status === 'fail'){

                        swal("Error!", result.returnmsg, 'error'); // alertify.error(result.returnmsg);
                        getleadstatuselist();
                    } 
                       
                },
                complete:function(){
                     $("#loader").hide();
                }
            }); 
            
            
        });
        
        
});


$(document).ready(function(){
     

    $('#leadsource_table').DataTable({  
        searching: true,
        ordering:  true
    });      
  
    $(".dataTables_empty").hide();
});

</script>