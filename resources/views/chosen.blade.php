<!DOCTYPE html>
<html lang="en">
<head>
  <title>chosen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.proto.js"></script>
  
  
  
  <script>
    $(document).ready(function () {
      $(".chosen-select").chosen();
   });
   
  </script>
</head>
<body>

<div class="container">
  <form class="form-inline" action="/action_page.php" >
    <div class="form-group">
      <select name="carlist"   multiple class="chosen-select form-control" style="width: 800px;">
      <option value="volvo">Volvo</option>
      <option value="saab">Saab</option>
      <option value="opel">Opel</option>
      <option value="audi">Audi</option>
    </select>
    </div>
    
   
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>