<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Colors">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title> Property CRM </title>

    <!-- Favicon -->
  @include('include.header_assets');
  <?php 
    //  print_r($userdata);die;
    $userdata = [];
  ?>

</head>

<body>

    <div class="page-wrapper">

      @include('include/header');

        <!-- ###### Layout Container Area ###### -->
        
            <!-- Side Menu Area -->
           @include('include/sidebar');
           
            <!-- Layout Container -->
            <div class="layout-container sidemenu-container">
               
                 <!-- Breadcrumb Area -->
                 <div class="breadcrumb-area">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Leads Search</a></li>
                              
                             </ol>
                         </nav>
                    </div>
                </div>

            

                 <!-- Wrapper -->
                 <div class="wrapper wrapper-content">
                    <div class="container-fluid">
                    <div   >
                    <div class="row">

                  
                       
                            <div  class="col-lg-12">
                           
                                <div  class="ibox bg-boxshadow mb-50">
                                    <!-- Title -->
                                    <!-- <div class="ibox-title basic-form mb-30">
                                        <h5> Leads Search  </h5>
                                    </div> -->
                                    <!-- Ibox-content -->
                                    <div class="ibox-content">
                                     
                                    <form id="leadsearch_form" >
                                        <div class="row">
                                            
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                             
                                            
                                            <div class="col-md-3">
                                                <label class="col-form-label">State</label>                                                
                                                <select name="state" id="state" class="form-control"  >
                                                     <option value=""> Select State </option>
                                                    @foreach($states as $state )
                                                    <option value="{{ $state['state_id'] }}"> {{ $state['state_name'] }} </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                             <div class="col-md-3">
                                                <label class="col-form-label">District</label>                                                
                                                <select name="district" id="district" class="form-control"  >
                                                    
                                                </select>
                                            </div>
 
                                            
                                             <div class="col-md-3">
                                                <label class="col-form-label">Lead Source </label>                                                
                                                <select name="leadsource" id="leadsource" class="form-control"  >
                                                    <option value=""> Select Source </option>
                                                    @foreach($leadSourceData as $leadsource )
                                                    <option value="{{ $leadsource['leadsourceid'] }}"> {{ $leadsource['leadsource'] }} </option>
                                                    @endforeach
                                                   
                                                </select>
                                            </div>



                                             <div class="col-md-3">
                                                <label class="col-form-label">Property Type </label>                                                
                                                <select name="property_type" id="property_type" class="form-control"  >
                                                     <option value=""> Select Type </option>                                                     
                                                    <option value="resedential"> Resedential </option>
                                                    <option value="commercial"> Commercial </option>
                                                    <option value="plot"> Plot </option>
                                                   
                                                </select>
                                            </div>

                                             
                                               
                                           
                                            
                                        </div>
 
                                        

                                         
                                        <div class="col-md-12  text-right submitbutton">
                                            <button class="btn btn-danger btn-sm mr-10" type="reset"  >Clear</button>
                                            <button class="btn btn-primary btn-sm" type="submit">Search</button>
                                         </div>
                                    </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>



                        <!-- Users Table -->

                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Ibox -->
                                <div class="ibox bg-boxshadow mb-50">
                                    <!-- Ibox Title -->
                                    <div class="ibox-title">
                                        <h5 class="mb-30">Lead List </h5>
                                    </div>
                                    <div class="ibox-content">
                                        
                                      <div id="leadsearchlist">

                                      </div>      
                                      
                                    </div>
                                </div>
                            </div>
                        </div>

                       


                    </div>
            </div>
                 

    


                     @include('include/footer');
                     
         

        
    </div>

   

    <!-- jQuery 2.2.4 -->
    @include('include.footer_assets');

</body>
<!-- ajax: "{{route('usersgetall')}}", -->
 


<script>
    $(document).ready(function() {

        $.validator.addMethod("greaterThan",
    function (value, element, param) {
          var $otherElement = $(param);
          return parseInt(value, 10) > parseInt($otherElement.val(), 10);
    });
 
    $("#leadsearch_form").validate({
        rules: {
            
        },
        messages: {
             
             
        },        
        submitHandler: function(form,e) {
            e.preventDefault();
            console.log('Form submitted'); 

                $.ajax({
                type:"POST",
                 
                url: "{{ route('leadsearchall') }}",
                data: $('#leadsearch_form').serialize(),
                dataType: 'json',
                beforeSend:function(){
                $("#loader").show();
                },
                success: function(res){


                if(res.html.length > 0){

                    $("#leadsearchlist").html(res.html);

                }
                else{

                     $("#leadsearchlist").html('<tr id="noRecordTR" style="display:none"> <td>No Record Found</td></tr>');
                }


                },
                complete:function(){
                    $("#loader").hide();
                }
            });
            return false;
        }
    });

});
</script>

<script>

$("#property_type").change(function(){

    // alert('dsadas');
    // units = [{'1' : '1bhk'},{'2' : '1.5bhk'},{'3' : '2bhk'},{'4' : '2.5bhk'}];
    // console.log(JSON.stringify(units));
     
     

    var property_type = $(this).val();
   
      
   
     
});
     



    $("#state").change(function(){

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

            $("#district").html(html);
           


         },
         complete:function(){
             $("#loader").hide();
         }
      }); 




    })
</script>



<script type="text/javascript">
    $(document).ready(function() {
        $('#units_interested_in').multiselect();
    });
</script>

<script>

    function getleadlist(){
           
         $.ajax({
                type:"POST",
                 
                url: "{{ route('leadsearchall') }}",
                data: $('#leadsearch_form').serialize(),
                dataType: 'json',
                beforeSend:function(){
                $("#loader").show();
                },
                success: function(res){


                if(res.html.length > 0){

                    $("#leadsearchlist").html(res.html);

                }
                else{

                     $("#leadsearchlist").html('<tr id="noRecordTR" style="display:none"> <td>No Record Found</td></tr>');
                }


                },
                complete:function(){
                    $("#loader").hide();
                }
            });
}


</script>

 
</html>