<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

{{-- chosen --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.proto.js"></script>



</head>
<body>

  

<div class="mx-auto pt-4 " style="width: 600px;">

    <form method="POST" id="addform" enctype="multipart/form-data">
        
             @csrf
                <div class="form-group ">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="" >
                </div>

                <div class="form-group ">
                    <label for="">Middle Name</label>
                    <input type="text" class="form-control" id="mname" name="mname" placeholder="" >
                </div>
                <div class="form-group ">
                    <label for="">Last Name </label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="" >
                </div>
             
                <div class="form-group ">
                    <label for="">gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" placeholder="" >
                </div>
                <div class="form-group ">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="" >
                </div>
            
                <div class="form-group ">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="" >
                </div>

                <div class="form-group ">
                    <label for="">password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="" >
                </div>

                <div class="form-group ">
                    <label for="">Course</label>
                    <select id="subject" name="subject[]"  data-placeholder="Choose a course..." multiple class="form-control chosen-select" >
                        
                    </select>
                </div>

            

                <div class="form-group">
                    <button type="button" id="addbtn" class="btn btn-primary form-control">Submit</button>
                    
                </div>

                <div class="form-group">
                    <a href="/"><button type="button"  class="form-control btn btn-success ">Login</button></a>
                    
                </div>
                
    </form>
</div>

    

         
<script>
$(document).ready(function (){
            $("#addbtn").click(function (event) {
                    
            event.preventDefault();
                    
            
            var form = $('#addform')[0];
                    
            
            var data = new FormData(form);
                    
            
            $("#addbtn").prop("disabled", true);
                    
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "/api/addstudent",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function(data){
                    console.log("SUCCESS:",data);
                    $('#addbtn').prop("disable", false);
                    alert(data.Details);
                    $('#addform').trigger("reset");
                },
                error:function(e) {
                    console.log("ERROR :",e);
                    $('#addbtn').prop("disable", false);
                    // alert(e.responseText);
                }
            });

            });

});
</script>   




<script>
    
    $(document).ready(function(){
        $(".chosen-select").chosen();
                    $.ajax({
                    url: '/fetchsub',
                    type: 'get',
                    success: function(response){
                    //  console.log(response);
                        var len = 0;
                        if(response['data'] != null){
                            len = response['data'].length;
                            
                        }
    
                        if(len > 0){
                            var option="";
                            for(var i=0; i<len; i++){

                            var id = response['data'][i].subid;
                            // console.log(id);
                            var name = response['data'][i].sname;
                        //    console.log(id+" "+name);
                            option += "<option value='"+id+"'>"+name+"</option>";
                            

                            }
                            $("#subject").append(option).trigger("chosen:updated"); 
                        }
    
                    }
                    });
    });
</script>
    
</body>
</html>
