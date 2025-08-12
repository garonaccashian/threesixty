<x-app-layout>
    <h1>Create Appointment</h1>
    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf
        <label for="appointment_time">Appointment Date & Time:</label>
        <input type="datetime-local" name="appointment_time" id="appointment_time" required>
        <button type="submit">Book Appointment</button>
    </form>
</x-app-layout>
