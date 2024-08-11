<div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                              <thead class=" bg-slate-200 dark:bg-slate-700">
                                <tr>
                            <th scope="col" class=" table-th ">
                                   User ID 
                                  </th>
                                  <th scope="col" class=" table-th ">
                                   User Name 
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Email
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Mobile
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Role
                                  </th>

                                  
                                 

                                  <th scope="col" class=" table-th ">
                                    Status
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Action
                                  </th>

                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                          
                              @if(!empty($result))
                                @foreach($result as $res)
                                <tr>
                                  <td class="table-td">{{  $res['user_id'] ?? '' }}</td>
                                  <td class="table-td ">{{  $res['firstname']  ?? '' }} {{  $res['lastname']  ?? '' }}</td>
                                  <td class="table-td">{{  $res['email']  ?? '' }}</td>
                                  <td class="table-td">{{  $res['mobile']  ?? '' }}</td>
                                  <td class="table-td">{{  $res['userrole']  ?? '' }}</td>
                                 
                                  
                                  <td class="table-td ">
                                    @if($res['isactive'] == '1')
                                    <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                              bg-success-500">
                                      Active
                                    </div>
                                    @else
                                    <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                              bg-warning-500">
                                      Inactive
                                    </div>
                                
                                   
                                    @endif

                                  </td>
                                  <td class="table-td ">
                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                      <button class="action-btn" type="button">
                                        <iconify-icon icon="heroicons:eye"></iconify-icon>
                                      </button>
                                      <button class="action-btn edituser" value="{{ $res['user_id'] }}"  type="button">
                                        <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                      </button>
                                      <button class="action-btn" type="button">
                                        <iconify-icon icon="heroicons:trash"></iconify-icon>
                                      </button>
                                    </div>
                                  </td>
                                </tr>
                                            @endforeach
                                                           
                                                            @endif
                              </tbody>
                            </table>
                          </div>


                           <!-- User List Model start --> 
        <!-- Modal -->

        <!-- Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="usereditModel" tabindex="-1" aria-labelledby="default_modal" aria-hidden="true">
  <div class="modal-dialog relative w-auto pointer-events-none">
    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
      <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
          <h3 class="text-xl font-medium text-white dark:text-white capitalize">
            Edit User
          </h3>
          <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
            <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <form id="usereditform">
          <div class="p-6 space-y-4">
            <div class="card-text h-full">
              <div class="from-group">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" id="user_id" name="user_id" class="edit_user_id" value="">

                  <div class="input-area">
                    <label for="firstName" class="form-label">First Name</label>
                    <input id="firstname" name="firstname" type="text" class="form-control edit_firstname" placeholder="First Name">
                  </div>

                  <div class="input-area">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input id="lastname" name="lastname" type="text" class="form-control edit_lastname" placeholder="Last Name">
                  </div>

                  <div class="input-area">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" class="form-control edit_email" placeholder="Email">
                  </div>

                  <div class="input-area">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input id="mobile" name="mobile" type="text" class="form-control edit_mobile" placeholder="Mobile">
                  </div>

                  <div class="input-area">
                    <label for="userrole" class="form-label">Role</label>
                    <select name="userrole" id="userrole" class="form-control edit_userrole">
                      <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select Role</option>
                      <option value="superadmin" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Super Admin </option>
                      <option value="admin" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Admin</option>
                      <option value="user" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">User</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
            <button type="submit" class="btn inline-flex justify-center text-white bg-black-500">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


 


                <script>

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
            alert('test');
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


</script>


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
