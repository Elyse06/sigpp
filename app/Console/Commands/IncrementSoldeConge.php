<?php

namespace App\Console\Commands;

use App\Models\SoldeConge;
use Illuminate\Console\Command;

class IncrementSoldeConge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'increment:solde';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Incrementation du solde du conge';

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
        $lastDayOfMonth = now()->endOfMonth();
        $soldeConges = SoldeConge::all(); // Ou utilisez une condition pour filtrer les enregistrements si nécessaire.

        foreach ($soldeConges as $soldeConge) {
            if (now()->isSameDay($lastDayOfMonth)) {
                $soldeConge->solde += 2;
                $soldeConge->save();
            }
        }
    }
}
