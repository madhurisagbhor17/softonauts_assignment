<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    





    
</head>
<body>

 


    <header class="mx-auto" style="width: 95%;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">User Details</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="navbar-nav mr-auto">
                
                
              </div>
    
              @php
                use App\Http\Controllers\UserController;
              @endphp
              <div class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                  <span >{{UserController::userInfo();}} </span>
                
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="logout">Logout</a>
                  
                </div>
              </div>

             
              {{-- @foreach($userinfo as $user) --}}
              {{-- <input type="text" id="stuid" name="stuid" value="{{$user->stuid}}" >  --}}
              {{-- @endforeach --}}
              
            </div>
        </nav>
    </header>


    <div class="section">
      
      <div class="mx-auto "style="width: 95%;"  id="idox">
						

						
      </div>
    </div>






    <script>
      $(document).ready(function(){
          $.ajax({
            type:'get',
            url:'/fetchstudent',
            success:function(response){
    
            console.log(response);
            var len = 0;
              if(response['data'] != null){
                len = response['data'].length;
              }
              var dataox="";

              dataox+="<table class=\"table mt-5 table-hover table-bordered\" ><thead><tr><th scope=\"col\">Sr No</th><th scope=\"col\">First Name</th><th scope=\"col\">Middle Name</th><th scope=\"col\">Last Name</th><th scope=\"col\">Gender</th><th scope=\"col\">Phone</th><th scope=\"col\">Email</th><th scope=\"col\">Password</th><th scope=\"col\">Subject</th><th scope=\"col\"><i class=\"fa-solid fa-pen-to-square\"></i></th></tr></thead>";
              dataox+="<tbody>";  
              var srno =1;
              
              if(len>0){
                for(var i=0;i<len;i++){
                  
                  var stuid = response['data'][i].stuid;
                  console.log(stuid);
                  var fname = response['data'][i].fname;
                  var mname = response['data'][i].mname;
                  var lname = response['data'][i].lname;
                  var gender = response['data'][i].gender;
                  var phone = response['data'][i].phone;
                  var email = response['data'][i].email;
                  var password = response['data'][i].password;
                  // var subject = response['data'][i].subject;
                  
                  
                  dataox+="<tr><th scope=\"col\">"+srno+"</th><th scope=\"col\">"+fname+"</th><th scope=\"col\">"+mname+"</th><th scope=\"col\">"+lname+"</th><th scope=\"col\">"+gender+"</th><th scope=\"col\">"+phone+"</th><th scope=\"col\">"+email+"</th><th scope=\"col\">"+password+"</th><th scope=\"col\"></th><th scope=\"col\"> <a href=\"editstudent?stuid="+stuid+"\"\"><button type=\"button\" class=\"btn btn-primary form-control\">Edit</button></a></th><th scope=\"col\"> <a href=\"deletestudent?stuid="+stuid+"\"\" ><button type=\"button\" class=\"btn btn-danger form-control\" >Delete</button></a> </th></tr></thead>";
                  // dataox+="<tbody>";
                   
                  
                  srno = srno+1;
                                        }
                        }



              dataox+="</tbody>";
              dataox+="</table>";
              console.log(dataox);
            $('#idox').html(dataox); 
          }
        });
      });
    </script>    
</body>
</html>