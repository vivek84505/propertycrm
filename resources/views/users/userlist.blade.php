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
                                                                    <td>  {{  $res['firstname'] }}  </td>
                                                                    <td>  {{  $res['email']  }}   </td>
                                                                    <td>  {{  $res['mobile']  }}  </td>
                                                                    <td>  {{  $res['userrole']  }}  </td>
                                                                    <td class="text-right" >
                                                                    <div class="btn-group">
                                                                    
                                                                    <button class="btn btn-secondary btn-sm "  type="button">Edit</button>
                                                                                                                                    
                                                                    <button class="btn btn-danger btn-sm deleteuser " value=" {{ $res['user_id'] }} " color-white"> Delete </button>
                                                                       
                                                                       
                                                                     </div>
                                                                    </td>
                                                                </tr>  
                                                            @endforeach
                                                           
                                                            @endif
                                                    </tbody>                                            
                                                </thead>                                              
                                            </table>
                                        </div>


                                        <script>

    

$('.deleteuser').on('click', function () {
        
    var userid = $(this).attr('value');
    var token = $('#token').val();           

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
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