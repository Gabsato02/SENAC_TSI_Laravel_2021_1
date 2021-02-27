# SENAC_TSI_Laravel_2021_1
Repositório para as aulas de Laravel de TSI no Centro Universitário SENAC.

CRIAÇÃO DE PROJETO COM VERSÃO ESTÁVEL: composer create-project --prefer-dist laravel/laravel nome_do_projeto
INTERACTIVE SHELL DO PHP: php -a 
INICIAR SERVIDOR COM PORTA ESPECÍFICA: php artisan serve --port=8080
CRIAÇÃO DE MODEL DE DADOS: php artisan make:model nome_da_model
CRIAÇÃO DE MODEL + MIGRATION: php artisan make:model nome_da_model -m
CRIAÇÃO DE MIGRATION PARA CRIAR A TABELA: php artisan make:migration nome_da_migration --create=NomeDaTabela
ENTRAR NO MYSQL (TERMINAL DO XAMPP): mysql -u root -p
GARANTIR ACESSOS AO USUÁRIO PARA O BD:
	CREATE USER 'senac-tsi-mvc'@'localhost' IDENTIFIED BY '210587';
	GRANT ALL PRIVILEGES ON senac_tsi_mvc.* TO 'senac-tsi-mvc'@'localhost';
	FLUSH PRIVILEGES;
RODAR MIGRATION: php artisan migrate
