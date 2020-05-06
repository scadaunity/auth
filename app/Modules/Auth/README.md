# Auth

Esta biblioteca é um modulo de autenticação para projetos desenvolvidos com o framework Codeigniter 4

[![Build Status](https://travis-ci.org/doctrine/instantiator.svg?branch=master)](https://travis-ci.org/doctrine/instantiator)
[![Code Coverage](https://scrutinizer-ci.com/g/doctrine/instantiator/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/doctrine/instantiator/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/doctrine/instantiator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/doctrine/instantiator/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/doctrine/instantiator/v/stable.png)](https://packagist.org/packages/doctrine/instantiator)
[![Latest Unstable Version](https://poser.pugx.org/doctrine/instantiator/v/unstable.png)](https://packagist.org/packages/doctrine/instantiator)

## Índice

- [Instalação](#Instalação)
- [Configuração](#Configuração)

## Instalação

No download, você encontrará os seguintes diretórios e arquivos,
- Faça o download do arquivo zip,
- Crie uma pasta Modules dentro da pasta app,
- Extraia o arquivo zip dentro da pasta Modules,
- A estrutura de diretorios deverá estar conforme abaixo: 

```sh
app/
└── Modules/
    └── Auth/
        ├── Controllers/
        │   └── Auth.php
        ├── Models/
        │   ├── AttemptModel.php
        │   ├── UserModel.php
        │   └── VerifyModel.php
        └── Views/
            ├── confirm-signup.php
            ├── forgot.php
            ├── login.php
            └── register.php
```

## Configuração

Configurar o namespace Modules para que o autoload consiga trabalhar com o padrão HMVC.
- abra app / Config / Autoload.php e adicione o namespace  Modules à psr4, conforme o exemplo abaixo.

```
$psr4 = [
    'App'           => APPPATH, // To ensure filters, etc still found,
    //APP_NAMESPACE => APPPATH, // For custom namespace
    'Config'        => APPPATH . 'Config',
    'Modules'       => APPPATH . 'Modules', // HMVC
];
```

