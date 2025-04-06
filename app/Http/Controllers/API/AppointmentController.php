<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Http\Requests\AppointmentRequest;
use App\Http\Resources\Appointment as AppointmentResource;
use App\Models\Appointment;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class AppointmentController extends ResponseController
{
    public function getAppointments()
    {
        $user = auth("sanctum")->user();
        $userId = auth()->id();
        $appointment = Appointment::with("user", "animal")->where("user_id", $userId) ->get();
        
        return $this->sendResponse(AppointmentResource::collection($appointment), "Listázva");
    }

    public function getAnyAppointments()
    {
        $user = auth("sanctum")->user();        
        Gate::before(function ($user) {
            if ($user->admin == 2) {

                return true;
            }
        });

        if (!Gate::allows("admin")) {

            return $this->sendError("Azonosítási hiba!", "Nincs jogosultsága!", 401);
        }

        $appointment = Appointment::with("user", "animal")->get();
        
        return $this->sendResponse(AppointmentResource::collection($appointment), "Listázva");
    }
    
    public function newAppointment(AppointmentRequest $request)
    {
        $user = auth("sanctum")->user();
        $userId = auth()->id();
        $appointmentTime = $request->appointment_time;

    // Ellenőrizzük, hogy betelt-e az időpont
        $existingAppointmentsCount = Appointment::where("appointment_time", $request["appointment_time"])
        ->count();

        if ($existingAppointmentsCount >= 3) {
            return response()->json([
             "error" => "Ez az időpont már betelt, kérlek válassz másikat!",
            ], 400);
        }

        // Ellenőrizzük, hogy van-e már a usernek foglalása erre az időpontra
        $existingAppointment = Appointment::where("user_id", $userId)
        ->where("appointment_time", $appointmentTime)
        ->exists();

        if ($existingAppointment) {
            return response()->json([
                "success" => false,
                "message" => "Erre az időpontra már regisztráltál!"
            ], 400);
        }

        // Lekérjük az állatot a név alapján
        $animal = Animal::where("name", $request->name)->first();

        if (!$animal) {
            return response()->json([
                "success" => false,
                "message" => "Az állat nem található!"
            ], 404);
        }

        // Ellenőrizzük, hogy a felhasználó foglalt-e már korábban időpontot ugyanarra az állatra
        $existingAnimalAppointment = Appointment::where("user_id", $userId)
            ->where("animal_id", (new AnimalController)->getAnimalId($request["name"]))
            ->first();

        if ($existingAnimalAppointment) {
            return response()->json([
                "error" => "Már foglaltál időpontot ehhez az állathoz!",
            ], 400);
    }

    // Ellenőrizzük, hogy az adott állat szabad-e a kért időpontban
        $existingAppointment = Appointment::where("animal_id", (new AnimalController)->getAnimalId($request["name"]))
        ->where("appointment_time", $request["appointment_time"])
        ->first();

        if ($existingAppointment) {
            return response()->json([
                "error" => "Ehhez az állathoz erre az időpontra már nem tudsz foglalni, kérlek válassz másik időpontot!",
            ], 400);
    }

        $appointment = new Appointment();
        $appointment->user_id = $userId;
        $appointment->animal_id = $animal->id;
        $appointment->appointment_time = $appointmentTime;
        $appointment->save();

        return $this->sendResponse(new AppointmentResource($appointment), "Időpontfoglalás sikeres!");

    }
    
    public function updateAppointment(Request $request, $id) 
    {

        $userId = auth()->id();
    
        $appointment = Appointment::where("id", $id)->where("user_id", $userId)->first();
    
        // Ha nincs ilyen időpont, akkor hibaüzenet
        if (!$appointment) {
            return response()->json(["error" => "Időpont nem található vagy nincs jogosultsága a módosításához!"], 403);
        }
    
        // Csak azokat az adatokat frissítjük, amelyeket a user küldött
        if ($request->has("name")) {
            $appointment->animal_id = (new AnimalController)->getAnimalId($request["name"]);
        }
    
        if ($request->has("appointment_time")) {
            $appointment->appointment_time = $request["appointment_time"];
        }
    
        $appointment->save();
    
        return response()->json([
            "success" => true,
            "message" => "Foglalás sikeresen módosítva!",
            "data" => new AppointmentResource($appointment),
        ]);
    }
    
    public function destroyAppointment($id) 
    {       
        $userId = auth()->id();
    
        $appointment = Appointment::where("id", $id)->where("user_id", $userId)->first();
    
        if (!$appointment) {
            return response()->json(["error" => "Időpont nem található vagy nincs jogosultság a törléshez!"], 403);
        }
    
       
        $appointment->delete();
            return response()->json([
            "success" => true,
            "message" => "Időpont-foglalását sikeresen törölte!",
        ]);
    }

    
    public function destroyAnyAppointment($id)
    {
        // Admin jogosultságok ellenőrzése
        $user = auth("sanctum")->user();
        Gate::before(function ($user) {
            if ($user->admin == 2) {
                return true;
            }
        });
    
        if (!Gate::allows("admin")) {
            return $this->sendError("Azonosítási hiba!", "Nincs jogosultsága!", 401);
        }
    
        $appointment = Appointment::find($id);
    
        $userEmail = $appointment->user->email;  
    
        $appointment->delete();
    
        (new MailController)->sendMail($userEmail);  
    
        return $appointment;
    }
    
}