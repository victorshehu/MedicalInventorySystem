<?php
 
session_start();

?>



<html>
<head>
<title>Results</title>
<link rel= "icon" type="image/jpg" href ="Images/homepic1a.jpg"/>
<link rel="stylesheet" type="text/css" href="CSS/results.css"> 
<!-- Code got from https://datatables.net/manual/installation -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
      $(function(){
        $("#nav-placeholder").load("nav.html");
      });
    </script>


<script type="text/javascript">

$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>
  

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>



<style type "text/css">

</style>
</head>
<body>

<div id = "nav-placeholder"></div> 
<table id = "myTable" border = 1 background-color:rgb(0,0,255)opacity:0.6 class = "display">




<?php
require 'config.php';

  echo"<thead>";
        echo "<tr>";
           echo "<th>Index</th>";
           echo "<th>Name 2</th>";
           echo "<th>Room Number</th>";
           echo "<th>Room Name</th>";
           echo "<th>Shelf No</th>";
           echo "<th>Quantity</th>";
       echo"</tr>";
       echo"</thead>";
       echo "<tbody>";
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

   // echo "<script>console.log( 'Debug Objects: " . $output ."' );</script>";
}



 $_SESSION['itemname'] = $_GET{'itemname'};
$searchq = $_GET{'itemname'};

$searchq = htmlspecialchars($searchq); 

$sql_query = "SELECT i.ItemNo, i.ItemName, r.RoomNo, r.RoomName, i.ShelfNo,i.Quantity from RoomsTable1 r, ItemsTables i WHERE r.RoomNo = i.RoomNo and i.ItemName like '%$searchq%'";




$result = mysqli_query($conn, $sql_query);


//echo $conn ? 'connected' : 'not conected';

$count = mysqli_num_rows($result);
debug_to_console( "Test1" );
$index = 1;


if($count == "0"){
echo'<h2>No results found!</h2>';
	}


else{
while($row = mysqli_fetch_assoc($result)){
$itemno = $row['ItemNo'];
$itemno_array[] = $row['ItemNo']; // stores all item id in the array

$item = $row['ItemName'];
$item_array[] = $row['ItemName'];

$roomno = $row['RoomNo'];
$roomno_array[] = $row['RoomNo'];

$roomname = $row['RoomName'];
$roomname_array[] = $row['RoomName'];

$shelfno = $row['ShelfNo'];
$shelfno_array[] = $row['ShelfNo'];

$quantity = $row['Quantity'];
$quantity_array[] = $row['Quantity'];


$_SESSION['thisItemname'] = $item;
$_SESSION['thisQuantity'] = $quantity;
$_SESSION['thisItemno'] = $itemno;
//if ($_POST{'itemname'}!= null){




echo"<tr>";
echo"<td  class='item-no'>$index</td>";
echo"<td  class='item-name'>$item</td>";
echo"<td>$roomno</td>";
echo"<td><button  >edit</button>$roomname</td>";
echo"<td class='item-shelf'>$shelfno</td>";
echo"<td class='item-quantity' >$quantity</td>";
echo"</tr>";
//echo"<tr><td>$item</td><td>$roomno</td><td>$roomname</td><td>$shelfno</td>
//<td>$quantity</td></tr>";

$index = $index+ 1;
	
//}

}
}

 echo"</tbody>";
?>


</table>







<div id = "form2">
<form name = "form2" action = "resultworker.php" method = "post" >
<input type = " text" name = "indexnumber" id = "indexnumber" >
<input type = " text" name = "itemname" id = "itemname">
<input type = " text" name = "shelfno" id = "shelfno" >
<input type = " text" name = "currentquantity" id= "currentquantity" >
<label>Enter the how much you want to add or subtract<label>
<input type = " text" name = "addedquantity" placehoder = "Enter New Quantity" >
<input  type = "submit" name = "add"  value = "add" onclick = "post();">
<input type = "submit" name = "subtract" value = "subtract" onclick = "post();">


</form>
</div>
<form>


</form>

   <script type="text/javascript">
$(document).ready(function(){
 $("button").click(function() {
    $("tr").on("mousedown",function() {

          var name= $(this).find('.item-name').text();
        var shelf= $(this).find('.item-shelf').text();   
        var itemno= $(this).find('.item-no').text();
        var itemquantity = $(this).find('.item-quantity').text();

 
       if (confirm("Do you want to edit "  + $.trim(name) ))
{// display form 
$("#form2 input[name=indexnumber]").val(itemno);
$("#form2 input[name=itemname]").val(name);
$("#form2 input[name=shelfno]").val(shelf);
$("#form2 input[name=currentquantity]").val(itemquantity );
$("#form2").show("slow");
}
        // remove the alert later
      


    });
});

});
</script>

<?php

$_SESSION['itemno_array'] =  $itemno_array; // stores the item id array as a session variable


?>

<?php

$profile_viewer_uid = $_COOKIE['profile_viewer_uid'];
//echo $profile_viewer_uid;
?>


<script>

function myFunction() {
  var x = document.getElementById("form1");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>



</body>

</html>


