  <!-- Table -->
  <!-- 'leadsourceid','leadsource','isactive','createdby','createddate','lastmodifiedby','lastmodifieddate' -->
  <div class="table-responsive">
                                            <table class="table table-striped" id="leadsource_table">
                                                <thead>
                                                    <tr>
                                                      
                                                        <th>leadsourceid </th>
                                                        <th>leadsource </th> 
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
                                                                     <td>  {{  $res['leadsourceid']  }}   </td> 
                                                                    <td>  {{  $res['leadsource']  }}  </td> 
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
                                                                    
                                                                    <button class="btn m-2 btn-xs rounded-0 btn-info editleadsource" value="{{ $res['leadsourceid'] }}" type="button" >Edit</button>
 
                                                                    <div class="space"></div>                                                                 
                                                                    <button class="btn m-2 btn-xs rounded-0 btn-danger deletesource " value="{{ $res['leadsourceid'] }}" color-white"> Delete </button>
                                                                       
                                                                       
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
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Lead Source</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <!-- Modal Body -->
                        <div class="modal-body">
                             <form  id="leadsourceeditform" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" id="leadsourceid" name="leadsourceid" class="edit_leadsourceid" value="">
                            
                                    <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label">Lead Source</label>
                                                        <div>
                                                            <input type="text" name="leadsource" id="leadsource"  class="form-control input-lg edit_leadsource"  value="">
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
$('.editleadsource').on('click',function(){
    
   
    var leadsourceid = $(this).attr('value');
    var token = $('#token').val();           
    var url = "{{ route('getleadsourcebyid') }}";  
    var payload = { "_token": token , "leadsourceid":leadsourceid};


    $.post(url, payload, function(response){
        
        if(response.length > 0 ){
           let leadsourcedata = response[0];
            
            console.log("leadsourcedata===========>",leadsourcedata);

            $('.edit_leadsourceid').val(leadsourcedata.leadsourceid);
            $('.edit_leadsource').val(leadsourcedata.leadsource);
            $('.edit_isactive').val(leadsourcedata.isactive);
            
            $('#leadsourceeditModel').modal('show');
        }
        else{
             alert("User Details Not Found!")
        }
      
    });


});
</script>


<script>
$(document).ready(function() {
    $("#leadsourceeditform").validate({
        rules: {
            leadsource: {
                required: true,
                maxlength:30
            },
            isactive: {
                required: true
            }
        },
        messages: {
            leadsource: {
                required: "Leadsource is required"
            }                       
             
        },        
        submitHandler: function(form,e) {
            e.preventDefault();
            console.log('Form submitted');
            $.ajax({
                type: 'POST',
                url: "{{route('leadsourceedit')}}",
                dataType: "html",
                data: $('#leadsourceeditform').serialize(),
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

                     

                    getleadsourcelist();
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
$('.deletesource').on('click', function () {
        
    var leadsourceid = $(this).attr('value');
    var token = $('#token').val();           

        swal({
            title: "Are you sure?",
            text: "You Want to Delete this Leadsource!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
 
          
            $.ajax({
                type:"POST",              
                url: "{{ route('leadsourcdelete') }}",                
                data: { "_token": token , "leadsourceid":leadsourceid },
                dataType: 'json',
                beforeSend:function(){
                    $("#loader").show();
                },
                success: function(result){
                     
                  console.log("result==========>",result);


                    if(result.status === 'success'){

                        swal("Deleted!", result.returnmsg, 'success');  //alertify.success(result.returnmsg);                     
                        getleadsourcelist();
                    }
                    else if (result.status === 'fail'){

                        swal("Error!", result.returnmsg, 'error'); // alertify.error(result.returnmsg);
                        getleadsourcelist();
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