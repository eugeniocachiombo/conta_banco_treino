@include('inclusao.head')
<title>Autenticação</title>

<div class="container formulario d-flex justify-content-center align-items-center text-light" style="min-height: inherit">
    <form action="/usuario/inicio" class="row g-4 d-block justify-content-center" style="min-width: 50px"
        method="get">
        <i class="fas fa-bank text-center" style="font-size: 100px"></i>
        <h1 class="text-center">Autenticação</h1>

        <div class="col d-block justify-content-center">
            <label class="">Email ou Telefone:</label>
            <input class="form-control" type="email" name="" id="" required> <br>

            <label class="">Senha:</label>
            <input class="form-control" type="password" name="" id="" required>
        </div>

        <div class="text-center">
            <span>
                <button type="submit" style="min-width: 320px">
                    Entrar
                </button> <br> <br>

                Ainda não tem uma conta?
                <a href="{{ route('usuario.cadastro') }}" style="color: white; font-wight: bold">Criar</a>
            </span>
        </div>
    </form>
</div>
@include('inclusao.foot')
