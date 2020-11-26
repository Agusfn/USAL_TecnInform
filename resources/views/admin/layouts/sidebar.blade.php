		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{ route('productos.index') }}" {{ request()->is('*/productos*') ? "class=active" : "" }}><i class="lnr lnr-tag"></i> <span>Productos</span></a></li>
						<li><a href="{{ route('usuarios.index') }}" {{ request()->is('*/usuarios*') ? "class=active" : "" }}><i class="lnr lnr-store"></i> <span>Usuarios y carritos</span></a></li>
						<li><a href="{{ route('categorias.index') }}" {{ request()->is('*/categorias*') ? "class=active" : "" }}><i class="lnr lnr-text-align-justify"></i> <span>Categorias</span></a></li>
					</ul>
				</nav>
			</div>
		</div>