## Descrição

Projeto de um Ponto de Venda com cadastros de Cliente, Produto e Venda, utilizando o Framework Laravel, para a disciplina Programação para Web, do Curso de Pós Graduação do IFBA de Vitória da Conquista - BA

<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre o Laravel

O Laravel é um framework de desenvolvimento rápido para PHP, livre e de código aberto. Cuja o principal objetivo é permitir que você trabalhe de forma estruturada e rápida.

## Instalação do Ambiente no Ubuntu 18.04

<h4>Instalando e configurando o Laravel</h4>

Instalando o PHP:<br>
    sudo apt-get install php

Verificando se foi instalado corretamente:<br>
    php -v

Instalando a extensão Mbstring do php:<br>
    sudo apt-get install php-mbstring

Instalando a extensão do suporte para o XML:<br>
    sudo apt-get install php-xml
    
Instalando a extensão do zip do php:<br>
    sudo apt-get install php-zip

Baixando e instalando o composer:<br>
    curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

Testando o composer:<br>
    composer

Rodar o composer sem o sudo:<br>
    sudo chown -R $USER ~/.composer/

Inicializar um projeto sem o instalador:<br>
    composer create-project --prefer-dist laravel/laravel project-name
    
Instalando o instalador do laravel:<br>
    composer global require "laravel/installer"

Para o comando laravel funcionar precisamos adicionar uma linha no arquivo bashrc se você estiver usando apenas o terminal:<br>
    echo 'export PATH="$HOME/.composer/vendor/bin:$PATH"' >> ~/.bashrc
    source ~/.bashrc

<h4>Configurando Mysql Versão (5.6)</h4>

Criando Banco de dados (O Laravel não cria automaticamente)<br>
create database pdv;

Criar um usuário chamado pdv:<br>
CREATE USER 'pdv'@'localhost' IDENTIFIED BY '123456';<br>

GRANT ALL PRIVILEGES ON  pdv.* TO 'pdv'@'localhost';<br>
	
FLUSH PRIVILEGES;<br>
exit;<br>

Fazer o migrate do BD (Rodar na pasta raiz da Aplicação)<br>
php artisan migrate

<h4>Rodando aplicação</h4>

Instalando dependencias do Projeto (Rodar na pasta raiz da Aplicação):<br>
composer install

Executando servidor (Rodar na pasta raiz da Aplicação)<br>
php artisan serve

É "só" isso :D

