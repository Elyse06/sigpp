<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function getExpiredConges()
    {
        $currentDate = Carbon::now();
        $expiredConges = Conge::where('fincon', '<', $currentDate)->get();

        // Vous pouvez personnaliser le message en fonction du type d'autorisation
        $notifications = $expiredConges->map(function ($conge) {
            return "Le délai est dépassé pour {$conge->employee_id}";
        });

        return response()->json($notifications);
    }
}
