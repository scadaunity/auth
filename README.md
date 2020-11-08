# ![Screenshot](https://forum.codeigniter.com/images/duende/logo.png) Scadaunity\Auth
 ![Screenshot](https://forum.codeigniter.com/images/duende/logo.png)

- Infraestrutura de autenticação leve e seguro para seus aplicativos criados com o framework CODEIGNITER 4.

A biblioteca ainda se encontra em fase de desenvolvimento não recomendamos sua utilização em modo de produção e não nos responsabilizamos pelo uso desta biblioteca ainda em periodo de desenvolvimento.

[![Build Status](https://travis-ci.org/doctrine/instantiator.svg?branch=master)](https://travis-ci.org/doctrine/instantiator)
[![Code Coverage](https://scrutinizer-ci.com/g/doctrine/instantiator/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/doctrine/instantiator/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/doctrine/instantiator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/doctrine/instantiator/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/doctrine/instantiator/v/stable.png)](https://packagist.org/packages/doctrine/instantiator)
[![Latest Unstable Version](https://poser.pugx.org/doctrine/instantiator/v/unstable.png)](https://packagist.org/packages/doctrine/instantiator)

## Table of contents
- [Quick start](#Quickstart)
- [Instalação](#Instalação)
- [Configuração](#Configuração)
-
## Quick start
Três opções estão disponiveis:
 
- Composer (Indicado): 
```
composer require "scadaunity/auth"
```
- Clonar o repositório:

``` 
git clone https://github.com/scadaunity/auth.git
```
- [Download da versão mais recente.](https://github.com/scadaunity/auth/archive/master.zip)

## Instalação
- Via composer
```sh
    composer require "scadaunity/Auth"
```

- Após a instalação via composer, você encontrará dentro da pasta vendor, os seguintes diretórios e arquivos, conforme abaixo: 

```sh
Scadaunity/
    └── Auth/
        ├── Config/
        │   ├── Auth.php
            └── Routes.php
        ├── Controllers/
        │   ├── Admin.php
        │   └── Auth.php
        ├── Database/
        │   ├── Migrations/
        │   │    └── 2020-05-06-034404_AuthTables.php
        │   └── Seeds/
        ├── Models/
        │   ├── AttemptModel.php
        │   └── UserModel.php
        └── Views/
            ├── confirm-signup.php
            ├── forgot.php
            ├── login.php
            └── register.php
```

## Configuração

 #####1 Configurar o namespace.
- abra app / Config / Autoload.php e adicione o namespace  Modules à psr4, conforme o exemplo abaixo.

```
$psr4 = [
    'App'           => APPPATH, // To ensure filters, etc still found,
    //APP_NAMESPACE => APPPATH, // For custom namespace
    'Config'        => APPPATH . 'Config',
    "Scadaunity\\Auth" => ROOTPATH. 'vendor/Scadaunity/Auth',
];
```

