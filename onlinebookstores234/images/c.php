<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}

body {
  background-image: url(BG.jpg);
  margin: 0;
}

.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: yellow;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: yellow;
  width: 100%;
  left: 0;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content .header {
  background: red;
  padding: 16px;
  color: white;
}

.dropdown:hover .dropdown-content {
  display: block;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  background-color: #ccc;
  height: 250px;
}

.column a {
  float: none;
  color: black;
  padding: 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.column a:hover {
  background-color: pink;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body style="background-color:white;">

<div class="navbar">
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <div class="header">
        <h2></h2>
      </div>   
      <div class="row">
        <div class="column">
          <h3>VASES</h3>
          <a href="#">CERAMIC</a>
          <a href="#">GLASS</a>
          <a href="#">METAL</a>
          <a href="#">MARBLE</a>
        </div>
        <div class="column">
          <h3>PLANT BOTANICALS</h3>
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
        <div class="column">
          <h3>LAMPS AND LIGHTS</h3>
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
      </div>
    </div>
  </div> 
</div>

<div style="padding:16px">
  <h3>Discover your perfect home decor items</h3>
  <!-- <p>Hover over the "Dropdown" link to see the mega menu.</p> -->
</div>

</body>
</html>
