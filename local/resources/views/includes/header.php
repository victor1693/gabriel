<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Opinion</b>App</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
           
          <!-- User Account: style can be found in dropdown.less -->
          <?php
            if(session()->get("tipo")=='admin')
            {
              echo'<li class="dropdown user user-menu"><a href=""> <span class="hidden-xs">Admnistrador</span></a> </li>';
            }
          ?>
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <!-- <img src="local/resources/views/img/profile-users/<?php echo session()->get("id");?>.jpg" class="user-image" alt="User Image">-->
              <img src="http://www.opinion-app.com/upload/fotos/users/0/0.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo session()->get("nombre");?></span>
            </a>             
          </li>
           <li class="dropdown user user-menu">
            <a href="logout"> 
              <span class="hidden-xs">Salir</span>
            </a>             
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href=" " data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>