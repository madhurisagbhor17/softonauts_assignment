<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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

        <form method="" id="" enctype="multipart/form-data">
            
                 @csrf
                    <div class="form-group ">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder=""  value="{{ $fname }}">
                    </div>
    
                    <div class="form-group ">
                        <label for="">Middle Name</label>
                        <input type="text" class="form-control" id="mname" name="mname" placeholder="" value="{{ $mname }}">
                    </div>
                    <div class="form-group ">
                        <label for="">Last Name </label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="" value="{{ $lname }}">
                    </div>
                 
                    <div class="form-group ">
                        <label for="">gender</label>
                        <input type="text" class="form-control" id="gender" name="gender" placeholder="" value="{{ $gender }}">
                    </div>
                    <div class="form-group ">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="{{ $phone }}">
                    </div>
                
                    <div class="form-group ">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{ $email }}">
                    </div>
    
                    <div class="form-group ">
                        <label for="">password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="" value="{{ $password }}">
                    </div>
    
                    <div class="form-group ">
                        <label for="">Course</label>
                        <select id="subject" name="subject"  data-placeholder="Choose a course..." multiple class="form-control chosen-select" value="{{ $subject ?? ''}}">
                            
                        </select>
                    </div>
    
                
    
                    <div class="form-group">
                        <button type="button" id="addbtn" class="btn btn-primary form-control">Submit</button>
                        
                    </div>
    
                   
                    
        </form>
    </div>



</body>
</html>