
# Teste Prático - Desenvolvedor Web Júnior


O projeto foi criado com a versão Laravel Framework 11.37.0 e PHP 8.4.0 no backend, Banco Mysql e HTML;CSS e javascript no front.
  

Para dar início a visualização do projeto deve-se instalar a versão PHP 8.4.0 no seu sistema operacional.Após a instalação, instalar o composer ( https://getcomposer.org/download/) e o nodejs.

Uma vez feitos os passos supracitados, pode-se instalar o laravel pelo seguinte comando no prompt.
~~~php
 composer global require laravel/installer' 
 ~~~

 


Clone o projeto, abra-o com a ide de sua preferência, abra o terminal e, em seguida, insira o comando 
~~~php
npm install && npm run build
~~~

Após finalizado, procure pelo arquivo .env no diretório do projeto e altera a senha do banco de dados para a sua senha no campo DB_PASSWORD.

Agora no prompt rode o comando para subir as tabelas ao banco;
~~~php
 php artisan migrate
 ~~~
 

Pronto! agora é só rodar o comando 
~~~php
"php artisan serve"
~~~
 para subir o sevidor local pelo link http://localhost:8000/





