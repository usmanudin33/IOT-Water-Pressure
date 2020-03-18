<!DOCTYPE html>
<html>

<title>tekanan-air</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="user.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="tampil.js"></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-white">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">
  </span>
</div>

<!-- Sidebar/menu --> 
<nav class="w3-sidebar w3-collapse w3-light-grey w3-animate-left" style="z-index:3;width:200px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
    </div>
    <div class="w3-col s8 w3-bar">
      <span> Selamat datang</span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i> Close Menu</a>
    <a href="#tekanan" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>Tekanan air </a>
    <a href="#kontrol" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  kontrol </a>
    
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-padding-16">
        <div class="w3-left" id=""></div>
        <ul></ul>
 
  <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript">
      
    </script>
        <?php include_once 'kontrol.php'; ?>
        <div class="w3-clear"></div>
      </div>
    </div>
     
    <div class="w3-quarter" >
      <div class="w3-container w3-padding-18" id="tekanan">
       <?php include_once 'data-tekanan.php'; ?>
      </div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.facebook.com/ustman.bae" target="_blank">Usmanbae.injection</a></p>
  </footer>

  <!-- End page content -->
</div>

<script>
  
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
