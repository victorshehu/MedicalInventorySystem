
<html>
<head>
<title>Display</title>
<link rel= "icon" type="image/jpg" href ="Images/homepic1a.jpg">
<link rel="stylesheet" type="text/css" href="CSS/display.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">        </script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">        </script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">        </script>
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <script>
      $(function(){
        $("#nav-placeholder").load("nav.html");
      });
    </script>
</head>

<body>
  <div id="nav-placeholder">

</div>




<table border = 1 background-color:rgb(0,0,255)opacity:0.6>

<?php
require 'config.php';


$sql_query = "SELECT  * from RoomsTable1";


$result = mysqli_query($conn, $sql_query);




$count = mysqli_num_rows($result);



echo"<tr><td>Room Number</td><td>Room name</td></tr>";



</table>

</body>
</html>


<script>
$(document).ready(function(){
    $('#roomno').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
             $.ajax ({
                  url:"test2.php",
                  method: "POST",
                  data: {query:query},
                  success: function(data)
                    {
                        $('#Roomlist').fadeIn(); 
                        $('#Roomlist').html(data);
                    }

               });
        }
     
     });


$(document).on('click', 'li', function(){
    $('#roomno').val($(this).text());
    $('#Roomlist').fadeOut();


});

});





</script>
