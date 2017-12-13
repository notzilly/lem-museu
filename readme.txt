1- Instalar Composer https://getcomposer.org/download/
2- Instalar Framework Laravel 5.5 https://laravel.com/docs/5.5/installation
3- Rodar o comando "composer install" (instala dependências pelo composer) na pasta root do projeto
4- Criar um arquivo chamado ".env" com o mesmo conteúdo de ".env.example" na pasta root do projeto
5- Rodar o comando "php artisan key:generate" para gerar chave da aplicação
6- Rodar o comando "php artisan serve" para startar o servidor de desenvolvimento
7- Para criar o arquivo xml transformado, acesse a url "127.0.0.1:8000/xml/<nome_do_xml_que_deseja_gerar>.xml", ele vai ser salvo dentro da pasta "docs/"
8- O nome padrão está hardcoded nos controllers como "museu.xml"
9- Para usar algo diferente disto, é necessário alterar o nome no controllers também
10- Acesse o sistema pela URL "127.0.0.1:8000/"

Luis Henrique Medeiros 201420333