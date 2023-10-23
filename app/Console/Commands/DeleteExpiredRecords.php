<?php

namespace App\Console\Commands;

use App\Models\Mission;
use Illuminate\Console\Command;

class DeleteExpiredRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Supprimer les enregistrements expirés';

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
        $expiredRecords = Mission::where('expires_at', '<', now())->get(); // Remplacez YourModel par le nom de votre modèle et expires_at par le nom de votre colonne de date d'expiration

        foreach ($expiredRecords as $record) {
            $record->delete();
            $record->emploie()->detach();
            $this->info('Enregistrement expiré supprimé : ' . $record->id);
        }

        $this->info('Suppression des enregistrements expirés terminée.');
    }
}
