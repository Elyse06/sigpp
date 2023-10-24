<?php

namespace App\Console\Commands;

use App\Models\Conge;
use App\Models\Mission;
use App\Models\Permission;
use App\Models\RepoMedical;
use App\Models\SortiePersonnel;
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
        $expiredMission = Mission::where('expires_at', '<', now())->get(); // Remplacez YourModel par le nom de votre modèle et expires_at par le nom de votre colonne de date d'expiration
        $expiredConge = Conge::where('expires_at', '<', now())->get();
        $expiredPermission = Permission::where('expires_at', '<', now())->get();
        $expiredSortie = SortiePersonnel::where('expires_at', '<', now())->get();
        $expiredRepos = RepoMedical::where('expires_at', '<', now())->get();

        foreach ($expiredMission as $record) {
            $record->delete();
            $record->emploie()->detach();
            $this->info('Enregistrement expiré supprimé : ' . $record->id);
        }

        foreach ($expiredConge as $record) {
            $record->delete();
            $this->info('Enregistrement expiré supprimé : ' . $record->id);
        }

        foreach ($expiredPermission as $record) {
            $record->delete();
            $this->info('Enregistrement expiré supprimé : ' . $record->id);
        }

        foreach ($expiredSortie as $record) {
            $record->delete();
            $this->info('Enregistrement expiré supprimé : ' . $record->id);
        }

        foreach ($expiredRepos as $record) {
            $record->delete();
            $this->info('Enregistrement expiré supprimé : ' . $record->id);
        }

        $this->info('Suppression des enregistrements expirés terminée.');
    }
}
