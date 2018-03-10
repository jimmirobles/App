<!-- Navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
		<a class="navbar-brand" href="{{ route('dashboard.index') }}">Human Business</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio">
					<a class="nav-link" href="{{ route('dashboard.index') }}">
						<i class="fa fa-home fa-fw"></i>
						<span class="nav-link-text">Inicio</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Clientes">
					<a class="nav-link" href="{{ route('clientes.index') }}">
						<i class="fa fa-user-circle-o fa-fw"></i>
						<span class="nav-link-text">Clientes</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Contactos">
					<a class="nav-link" href="{{ route('contactos.index') }}">
						<i class="fa fa-address-book-o fa-fw"></i>
						<span class="nav-link-text">Contactos</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Servicios">
					<a class="nav-link" href="{{ route('servicios.index') }}">
						<i class="fa fa-database fa-fw"></i>
						<span class="nav-link-text">Servicios</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Comentarios">
					<a class="nav-link" href="{{ route('comentarios.index') }}">
						<i class="fa fa-comments-o fa-fw"></i>
						<span class="nav-link-text">Comentarios</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Hosts">
					<a class="nav-link" href="{{ route('hosts.index') }}">
						<i class="fa fa-globe fa-fw"></i>
						<span class="nav-link-text">Hosts</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reportes">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseReportes" data-parent="#exampleAccordion">
						<i class="fa fa-calendar fa-fw"></i>
						<span class="nav-link-text">Reportes</span>
					</a>
					<ul class="sidenav-second-level collapse" id="collapseReportes">
						<li>
							<a href="{{ route('reporte1') }}">Doctos. por rango</a>
						</li>
						<li>
							<a href="#">Registration Page</a>
						</li>
					</ul>
				</li>
			</ul>
			<ul class="navbar-nav sidenav-toggler">
				<li class="nav-item">
					<a class="nav-link text-center" id="sidenavToggler">
						<i class="fa fa-fw fa-angle-left"></i>
					</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle mr-lg-2" id="settingsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-fw fa-sliders"></i>
						<span class="d-lg-none">Configuración</span>
					</a>
					<div class="dropdown-menu" aria-labelledby="settingsDropdown">
						<h6 class="dropdown-header">Sesion: {{ auth()->user()->name }}</h6>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{{ route('usuarios.index') }}">
							<strong>Usuarios</strong>
							<div class="dropdown-message small">Creacion de usuarios de acceso</div>
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{{ route('clear-all') }}">
							<strong>Limpiar PDF's</strong>
							<span class="small float-right text-muted">Total: {{ count($storageFiles) }}</span>
							<div class="dropdown-message small">Borrar PDF's generados por envío</div>
						</a>
					</div>
				</li>
				<li class="nav-item">
					<form class="form-inline my-2 my-lg-0 mr-lg-2">
						<div class="input-group">
							<input class="form-control" type="text" placeholder="Buscar...">
							<span class="input-group-append">
								<button class="btn btn-primary" type="button">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						<i class="fa fa-fw fa-sign-out"></i>Salir</a>
				</li>
			</ul>
		</div>
	</nav>