<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coach;

class AppointmentController extends Controller
{
    public function index() {
        $appointments = Appointment::where('user_id', Auth::id())->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create() {
        $coaches = Coach::all();
    return view('appointments.create', compact('coaches'));
        return view('appointments.create');
    }

    public function store(Request $request) {
        $request->validate(['appointment_time' => 'required|date|after:now']);
        Appointment::create([
            'user_id' => Auth::id(),
            'coach_id' => $request->coach_id,
            'appointment_time' => $request->appointment_time,
            'status' => 'pending',
        ]);
        return redirect()->route('appointments.index')->with('success', 'Appointment booked!');
    }

    public function destroy(Appointment $appointment) {
      //  $this->authorize('delete', $appointment);
        $appointment->delete();
        return back()->with('success', 'Appointment cancelled.');
    }
}
