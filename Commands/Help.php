<?php
namespace Scadaunity\Auth\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Help extends BaseCommand
{
    protected $group = 'ScadaUnity';
    protected $name = 'auth:help';
    protected $description = 'Exibe informações basica de uso.';

    public function run(array $params)
    {
        //$color = CLI::prompt('Digite o nome da sua aplicação?');
        CLI::write('Bem vindo! sua dependencia ja foi instalada');
        CLI::newLine();
        CLI::write('Agora precisamos criar as tabelas no seu banco de dados');
        CLI::write('Certifiquese de ja ter configurado o seu banco de dados em app/config/database');
    }
}