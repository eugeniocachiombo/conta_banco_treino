## REGRAS DE NEGÓCIO E ACESSOS (System Bank)

**Menu Início ***

<table border="1">
    <tr>
        <th>Usuário</th>
        <th>Admin</th>
        <th>Gestor</th>
        <th>Cliente</th>
        <th>Descrição</th>
    </tr>
    <tr>
        <td>Inicio</td>
        <td>Acesso</td>
        <td>Acesso</td>
        <td>Acesso</td>
        <td>
        O usuário poderá ver o saldo da conta, quantidade de cartões que possui e as suas informações pessoais.
        </td>
    </tr>
</table>


<table border="1">
    <tr>
        <th>Usuário</th>
        <th>Admin</th>
        <th>Gestor</th>
        <th>Cliente</th>
        <th>Descrição</th>
    </tr>
    <tr>
        <td>Inicio</td>
        <td>Acesso</td>
        <td>Acesso</td>
        <td>Acesso</td>
        <td>
        O usuário poderá ver o saldo da conta, quantidade de cartões que possui e as suas informações pessoais.
        </td>
    </tr>
</table>
				
				

Menu Perfil ******
Usuário	Admin	Gestor	Cliente	Descrição
Editar dados	Acesso	Acesso	Acesso	O usuário poderá alterar as suas informações pessoais.
Alterar Senha	Acesso	Acesso	Acesso	O usuário poderá alterar a sua senha.
Sair	Acesso	Acesso	Acesso	O usuário poderá terminar a sessão.




Menu Contas ******
Usuário	Admin	Gestor	Cliente	Descrição
Minhas contas	Acesso	Acesso	Acesso	O usuário poderá verificar quantidade de contas que possui.
Adicionar contas	Acesso	Acesso	Negado	O usuário poderá adicionar uma conta nova a um outro usuário.
Listar contas	Acesso	Acesso	Negado	O usuário poderá listar todas as contas existentes no sistema.

Menu Acessos ******
Usuário	Admin	Gestor	Cliente	Descrição
Modificar Acesso	Acesso	Negado	Negado	O usuário poderá modificar o acesso de um usuário no sistema.


Menu Transações ******
Usuário	Admin	Gestor	Cliente	Descrição
Depositar	Acesso	Acesso	Negado	O usuário poderá depositar algum dinheiro.
Retirar	Acesso	Acesso	Negado	O usuário poderá retirar algum dinheiro.
Transferir	Acesso	Acesso	Acesso	O usuário poderá transferir algum dinheiro.


Menu Empréstimo ******
Usuário	Admin	Gestor	Cliente	Descrição
Emprestar	Negado	Negado	Acesso	O usuário poderá emprestar algum dinheiro.
Devolver	Negado	Negado	Acesso	O usuário poderá devolver algum dinheiro.
Meus Empréstimos	Negado	Negado	Acesso	O usuário poderá ver os empréstimos feitos.
Listar	Acesso	Acesso	Negado	O usuário poderá ver a lista de empréstimos.

## Menu Cliente 
Usuário	Admin	Gestor	Cliente	Descrição
Associar	Acesso	Acesso	Negado	O usuário poderá associar um cliente ao banco para poder ter acesso ao cartão multicaixa.
Listar	Acesso	Acesso	Negado	O usuário poderá listar todos clientes associados ao banco.


Menu Funcionário ******
Usuário	Admin	Gestor	Cliente	Descrição
Associar	Acesso	Negado	Negado	O usuário poderá associar um funcionário ao banco para poder ter acesso ao cartão multicaixa.
Listar	Acesso	Negado	Negado	O usuário poderá listar todos funcionários associados ao banco.


Menu Agência ******
Usuário	Admin	Gestor	Cliente	Descrição
Cadastrar	Acesso	Negado	Negado	O usuário poderá cadastrar uma agência ao sistema.
Listar	Acesso	Negado	Negado	O usuário poderá listar todas as agências cadastradas no sistema.


Menu Cartão ******
Usuário	Admin	Gestor	Cliente	Descrição
Habilitar	Acesso	Negado	Negado	O usuário poderá habilitar cartão multicaixa para um usário no sistema.
Listar	Acesso	Negado	Negado	O usuário poderá listar todos os usuários que possuem cartão multicaixa e as informações do cartão.

