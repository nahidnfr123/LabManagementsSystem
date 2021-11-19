<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\LabTest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::with('user')
            ->orderBy('created_at', 'DESC')
            ->orderBy('status')->get();
        return view('backend.appointments.index', compact('appointments'));
    }

    public function setStatus($id, $status)
    {
        if ($status == "confirmed") {
            $appointment = Appointment::where('id', $id)->first()->toArray();
            Appointment::where('id', $id)->update(['status' => $status]);
            $user_mail = User::where('id', $appointment['users_id'])->first();
            Mail::send('backend.appointments.mail', $appointment, function ($message) use ($user_mail) {
                $message->to($user_mail['email'], 'Mail send')
                    ->subject('Your Appointment Acepted');
            });
        }
        if ($status == "reject") {
            Appointment::where('id', $id)->update(['status' => $status]);
        }
        alert()->success('Success message', 'Status save successfully');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'appointment_date' => ['required'],
            'lab_test_ids' => ['required'],
        ], [
            'lab_test_ids' => 'Select lab test'
        ]);
        $data = $request->all();
        $labtest = LabTest::find($data['lab_test_ids']);
        $total_cost = 0;
        foreach ($labtest as $key => $test) {
            $total_cost += $test->cost;
        }
        unset($data['_token']);
        $data['status'] = "pending";
        $data['user_id'] = Auth::user()->id;
        $data['cost'] = $total_cost;
        $last_appointment = Appointment::latest()->first();
        if ($last_appointment) {
            $data['appointment_no'] = $last_appointment->appointment_no + 1;
        } else {
            $data['appointment_no'] = 1000;
        }
        // dd($data);
        $store = Appointment::create([
            'appointment_no' => $data['appointment_no'],
            'appointment_date' => $data['appointment_date'],
            'status' => $data['status'],
            'cost' => $data['cost'],
            'users_id' => \auth()->id(),
        ]);
        foreach ($data['lab_test_ids'] as $key => $id) {
            DB::table('appointments_lab_test')->insert([
                'appointments_id' => $store->id,
                'lab_tests_id' => $id
            ]);
        }
        alert()->success('Success message', 'Appointment Added successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
