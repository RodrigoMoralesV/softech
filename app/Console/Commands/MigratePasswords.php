<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MigratePasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate plain text passwords to bcrypt hashed passwords';

    /**
     * Create a new command instance.
     *
     * @return void
    */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $clientes = DB::table('cliente')->get();

        foreach ($clientes as $cliente) {
            // Check if the password is already hashed
            if (!Hash::needsRehash($cliente->clave_cliente)) {
                continue;
            }

            $hashedPassword = Hash::make($cliente->clave_cliente);
            DB::table('cliente')
                ->where('id_cliente', $cliente->id_cliente)
                ->update(['clave_cliente' => $hashedPassword]);

            $this->info("Migrated password for cliente ID: {$cliente->id_cliente}");
        }

        $this->info('All passwords have been migrated successfully.');
        return 0;
    }
}
