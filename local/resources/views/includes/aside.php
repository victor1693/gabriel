<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="local/resources/views/img/profile-users/<?php echo session()->get("id");?>.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo session()->get("nombre");?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
       
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      <li>
          <a href="inicio">
            <i class="fa fa-dashboard"></i> <span>Inicio</span> 
          </a>
        </li>          
        <li>
          <a href="#">
            <i class="fa fa-search"></i> <span>Buscar Opin</span> 
          </a>
        </li> 

         <li>
          <a href="#">
            <i class="fa fa-key"></i> <span>Opin Privados</span> 
          </a>
        </li> 

         <li>
          <a href="saludosgabriel">
            <i class="fa fa-area-chart"></i> <span>My Opin</span> 
          </a>
        </li> 

         <li>
          <a href="#">
            <i class="fa fa-heart"></i> <span>Favoritos</span> 
          </a>
        </li> 

         <li>
          <a href="#">
            <i class="fa fa-thumbs-up"></i> <span>Opin Votatos</span> 
          </a>
        </li> 

         <li>
          <a href="#">
            <i class="fa fa-plus"></i> <span>Crear Opin</span> 
          </a>
        </li> 

         <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> 
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>