<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::role('patient')->get();
        $totalAppointmentsCompleted = Appointment::where('status', 'confirmed')->get();
        $totalAppointmentsToday = Appointment::whereDate('appointment_date', Carbon::today())->get();
        $incompleteAppointments = Appointment::where('status', 'pending')->get();
        return view('backend.index', compact('users', 'totalAppointmentsCompleted', 'totalAppointmentsToday', 'incompleteAppointments'));
    }
}
