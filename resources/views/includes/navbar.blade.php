    <nav class="navbar navbar-warning navbar-absolute">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if(Request::path()!='/')
                   <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo.jpg') }}" alt="Patuto & Co." class="img-responsive" width="150"></a>
                @endif
            </div>

            <div class="collapse navbar-collapse text-default" id="navigation-example">
                <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="">&nbsp</a>
                        </li>
                    @guest
                        <li><a href="{{ route('login') }}" class="t-black">Ingresar</a></li>
                        <li><a href="{{ route('register') }}" class="t-black">Registro</a></li>
                    @else

                    @if (auth()->user()->admin)
                        <li>
                            <a href="{{ url('/admin/categories') }}" class="t-black">Categorias</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/products') }}" class="t-black">Productos</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle t-black" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                    @endif
                                <li>
                                    <a href="{{ route('logout') }}" class="t-black"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Cerrar sesion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
