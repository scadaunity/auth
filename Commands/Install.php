<?php
namespace Scadaunity\Auth\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Install extends BaseCommand
{
    protected $group = 'ScadaUnity';
    protected $name = 'auth:install';
    protected $description = 'Inicia o instalador do componente de autenticação Scada Unity Auth.';

    public function run(array $params)
    {
        CLI::write('Bem vindo ao assistente de instalação do modulo de autenticação Scada unity - Auth',  'green');
    }
}