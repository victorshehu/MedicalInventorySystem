
<html>



<style>

ul.list{
background-color:#eee;
cursor:pointer;
list-style-type: none;

}

li.list{
list-style-type: none;
}
ul.header {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}


li.header {
  float: left;
}

li.header a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li.header a:hover {
  background-color: #111;
}
 
 </style>

<body>

<ul class = "header">
<li class ="header"><h5><a href ="home.php" >Home </a><h5></li>
<li class ="header"><h5><a href ="search.php" >Search for an Item </a><h5></li>
<li class ="header"><h5><a  href ="display.php" >Display List in all Rooms</a></h5></li>
<li class ="header"><h5><a href ="Add.php" >Add</a></h5></li>
<li class ="header"><h5><a href ="delete.php" >Delete</a></h5></li>
<li class ="header"><h5><a href ="edit.php" >Update</a></h5></li>
<li class ="header"><h5><a href ="check_Room1.php" >Upload</a></h5></li>
<li class ="header" style = "float:right"><h5><a href = "logout.php">Sign Out</a></h5></li>
</ul>
</body>
</html>
