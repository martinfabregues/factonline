<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
<!--        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('assets/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p></p>
                 Status 
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>-->

        <!-- search form (Optional) -->
<!--        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">PANEL DE CONTROL</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('/') }}"><i class='fa fa-navicon'></i> <span>Inicio</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>Clientes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/clientes') }}"><i class="fa fa-circle-o"></i>Administrar Clientes</a></li>                    
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>Proveedores</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/proveedores') }}"><i class="fa fa-circle-o"></i>Administrar Proveedores</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-suitcase'></i> <span>Productos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/productos') }}"><i class="fa fa-circle-o"></i>Administrar Productos</a></li>
                </ul>
            </li>     
            <li class="treeview">
                <a href="#"><i class='fa fa-file'></i> <span>Facturación</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/facturas') }}"><i class="fa fa-circle-o"></i>Administrar Comprobantes</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-gears'></i> <span>Configuración</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>Empresa</a></li>
                    <li><a href="{{ url('/puntosventa') }}"><i class="fa fa-circle-o"></i>Puntos de Venta</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
