<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="padding-bottom: 20px;">
        <div class="pull-left image">
         <img src="http://www.opinion-app.com/upload/fotos/users/0/0.png" class="user-image" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo session()->get("nombre");?></p>
          <a href="#" ><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
       
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree"  >
             
        <li>
          <a href="inicio">
            <i class="fa fa-search"></i> <span>Buscar Opin</span> 
          </a>
        </li> 

         <li>
          <a href="#">
            <i class="fa fa-key"></i> <span>Opin Privados</span> 
          </a>
        </li> 

         <li>
          <a href="myopins">
            <i class="fa fa-area-chart"></i> <span>My Opin</span> 
          </a>
        </li> 

         <li>
          <a href="favorites">
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
            <li><a href="profile"><i class="fa fa-circle-o"></i>Perfil</a></li> 
            <li><a href="#"><i class="fa fa-circle-o"></i>Lenguaje</a></li> 
            <li><a href="#"><i class="fa fa-circle-o"></i>Notificaciones</a></li> 
            <li><a href="#"><i class="fa fa-circle-o"></i>Compartir</a></li> 
            <li><a href="#"><i class="fa fa-circle-o"></i>Cotáctanos</a></li> 
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>