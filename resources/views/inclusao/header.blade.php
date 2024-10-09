<header class="d-flex justify-content-center align-items-center ">
    <div class="container d-flex justify-content-center align-items-center flex-column" style="min-width: inherit">
        <div class="mt-5 container border d-md-flex d-block justify-content-center align-items-center">
            <div class="col text-center text-md-start">
                <b><i class="fas fa-bank"></i> Sistema Banco - System Bank</b>
            </div>

            <div class="col">
                <h1></h1>
            </div>

            <div class="col text-center text-md-end">
                <i class="fas fa-user pe-2"></i><b>{{ Auth::user()->name }}</b>
            </div>
        </div>

        <div class=" mt-3 border mb-3">
            <nav class="navbar navbar-expand-lg navbar-light bg-none ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"></a>
                    <button style="max-width: 100px" class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page"
                                    href="/usuario/inicio">Início</a>
                            </li>

                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false">Perfil</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('usuario.editar.dados') }}">Editar
                                            dados</a></li>
                                    <li><a class="dropdown-item" href="{{ route('usuario.alterar.senha') }}">Alterar
                                            senha</a></li>
                                    <li><a class="dropdown-item" href="{{ route('usuario.sair') }}">Sair</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false">Contas</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('conta.listar.logado') }}">Minhas
                                            Contas</a></li>
                                    <li><a class="dropdown-item" href="{{ route('conta.adicionar.contas') }}">Adicionar
                                            Contas</a></li>
                                    <li><a class="dropdown-item" href="{{ route('conta.listar.contas') }}">Listar
                                            Contas</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false">Acessos</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('acesso.modificar') }}">Modificar
                                            Acesso</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false">Transação</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('transacao.depositar') }}">Depositar</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('transacao.retirar') }}">Retirar</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false">Empréstimo</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('emprestimo.emprestar', Auth::user()->id) }}">Emprestar</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('emprestimo.cancelar', Auth::user()->id) }}">Cancelar</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('emprestimo.devolver', Auth::user()->id) }}">Devolver</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('emprestimo.lista') }}">Lista</a></li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('emprestimo.lista.meus.emprestimos', Auth::user()->id) }}">Meus
                                            Empréstimos</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false">Cliente</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown"
                                    href="#" role="button" aria-expanded="false">Funcionário</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown"
                                    href="#" role="button" aria-expanded="false">Agência</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown"
                                    href="#" role="button" aria-expanded="false">Cartão</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page"
                                    href="#">Histórico</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
