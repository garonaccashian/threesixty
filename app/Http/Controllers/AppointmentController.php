<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index() {
        $appointments = Appointment::where('user_id', Auth::id())->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create() {
        return view('appointments.create');
    }

    public function store(Request $request) {
        $request->validate(['appointment_time' => 'required|date|after:now']);
        Appointment::create([
            'user_id' => Auth::id(),
            'appointment_time' => $request->appointment_time,
            'status' => 'pending',
        ]);
        return redirect()->route('appointments.index')->with('success', 'Appointment booked!');
    }

    public function destroy(Appointment $appointment) {
<<<<<<< HEAD
        $this->authorize('delete', $appointment);
=======
      //  $this->authorize('delete', $appointment);
>>>>>>> dev
        $appointment->delete();
        return back()->with('success', 'Appointment cancelled.');
    }
}
