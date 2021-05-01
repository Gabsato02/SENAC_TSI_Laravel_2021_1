# SENAC_TSI_Laravel_2021_1
Repositório para as aulas de Laravel de TSI no Centro Universitário SENAC.

CRIAÇÃO DE PROJETO COM VERSÃO ESTÁVEL: composer create-project --prefer-dist laravel/laravel nome_do_projeto

INTERACTIVE SHELL DO PHP: php -a 
INICIAR SERVIDOR COM PORTA ESPECÍFICA: php artisan serve --port=8080

CRIAÇÃO DE CONTROLLER: php artisan make:controller nome_da_controller (plural)
CRIAÇÃO DE MODEL DE DADOS: php artisan make:model nome_da_model (singular)
CRIAÇÃO DE MODEL + MIGRATION: php artisan make:model nome_da_model -m
CRIAÇÃO DE MIGRATION PARA CRIAR A TABELA: php artisan make:migration nome_da_migration --create=NomeDaTabela
CRIAÇÃO DE RESOURCE CONTROLLER, MODEL E MIGRATION: php artisan make:model nome_da_model -crm
ALTERAÇÃO DE TABLE (ADICIONAR NOVO CAMPO): php artisan make:migration add_relation_model1_and_model2 --table=nome_da_tabela1

RODAR MIGRATION: php artisan migrate

ENTRAR NO MYSQL (TERMINAL DO XAMPP): mysql -u root -p
GARANTIR ACESSOS AO USUÁRIO PARA O BD:
	CREATE USER 'senac-tsi-mvc'@'localhost' IDENTIFIED BY '210587';
	GRANT ALL PRIVILEGES ON senac_tsi_mvc.* TO 'senac-tsi-mvc'@'localhost';
	FLUSH PRIVILEGES;

ACESSAR MODEL/BANCO DE DADOS PELO CONSOLE: php artisan tinker
	INSERT INTO: App\Models\Nome_da_classe::create(['campo'=>'valor']);
	SELECT FROM com atribuição a variável: $var = App\Models\Nome_da_classe::find(id);
	SELECT *: App\Models\Nome_da_classe::all();
	UPDATE: $var->update(['campo'=>'novo_valor']);

LISTAR ROTAS: php artisan route:list
LINKAR UMA PASTA DO PROJETO A PASTA PUBLIC: php artisan nome_da_pasta:link
CRIAR UM MIDDLEWARE: php artisan make:middleware nome_do_middleware

INSTALA A COLEÇÃO COLLECTIVE DE HTML: composer require laravelcollective/html
INSTALA O SPATIE: composer require spatie/laravel-permission
INSTALA AS PERMISSÕES DO SPATIE: php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"