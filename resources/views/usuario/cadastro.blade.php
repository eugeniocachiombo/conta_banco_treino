@include('inclusao.head')
<title>Cadastro</title>

<div class="container formulario d-flex justify-content-center align-items-center text-light" style="min-height: inherit">
    <div class="row ">
        <div class="col-12 text-center text-md-start">
            <h1>Criar Conta</h1>
        </div>

        <div class="col-12 ">
            <form class="row g-3 d-flex justify-content-center" action="" method="get">
                <div class="col-8 col-md-6 ">
                    <label for="">Nome:</label>
                    <input class="form-control" type="nome" name="" id="" required>
                </div>
                
                <div class="col-8 col-md-6 ">
                    <label for="">Sobrenome:</label>
                    <input class="form-control" type="sobrenome" name="" id="" required>
                </div>

                <div class="col-8 col-md-6 ">
                    <label for="">Email ou Telefone:</label>
                    <input class="form-control" type="email" name="" id="" required>
                </div>

                <div class="col-8 col-md-6 ">
                    <label for="">Senha:</label>
                    <input class="form-control" type="password" name="" id="" required>
                </div>
            </form>
        </div>

        <div class="col-12 text-center text-md-start pt-4">
            <span>
                <button type="submit">
                    Criar
                </button> <br> <br>

                Já tem uma conta?
                <a href="{{ route('usuario.autenticacao') }}" style="color: white; font-wight: bold">Autenticar</a>
            </span>
        </div>
    </div>


</div>
@include('inclusao.foot')
