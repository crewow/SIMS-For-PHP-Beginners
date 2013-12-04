     <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
                
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                        <div class="nav-collapse collapse">
                        <ul class="nav">
              <li class="active">
                <a href="./AdminIndex.php">Home</a>
              </li>         
              <li class="">
                <a href="./AdminIndex.php">Welcome <?php echo $_SESSION[myusername]; ?></a>
              </li>
            </ul>
              <form method="post" class="navbar-form pull-left" action="SearchServer.php" >
  <input class="span4" id="searchg" name="searchg" type="text" placeholder="Search">
  <button class="btn" type="submit">Search</button>
  </form>
             <form class="btn-group pull-right">
              <a  href="Logout.php" class="btn btn-danger">Logout</a>
            </form>
                      </div>
        </div>
      </div>
    </div>