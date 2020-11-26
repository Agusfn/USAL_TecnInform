		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="{{ route('productos.index') }}"><span style="color: #444;font-size: 21px;">{{ config('app.name') }}</span></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>

				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span>{{ Auth::user()->nombre }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault();$('#logout-form').submit();"><i class="lnr lnr-exit"></i> <span>Cerrar sesión</span></a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
							</ul>
						</li>

					</ul>
				</div>
			</div>
		</nav>