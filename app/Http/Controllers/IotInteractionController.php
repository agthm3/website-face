<?php

namespace App\Http\Controllers;

use App\Models\Iot;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Log;
use Carbon\Carbon;

class IotInteractionController extends Controller
{
public function handleIotInput(Request $request)
{
    $mac = $request->input('mac');
    $value = $request->input('value');

    // Menentukan apakah input berasal dari face recognition atau RFID
    $iot = Iot::where('mac', $mac)->firstOrFail();

    $status = 'failed'; // Status default
    $user = null;

    if ($iot->name == 'face_recog') {
        $user = User::where('label', $value)->first();
    } elseif ($iot->name == 'rfid_reader') {
        $user = User::where('uuid', $value)->first();
    }

    if ($user) {
        $status = $iot->name == 'face_recog' ? 'pending' : 'success';
    }

    // Simpan log
    Log::create([
        'iot_id' => $iot->id,
        'user_id' => $user ? $user->id : null,
        'status' => $status,
    ]);

    return response()->json(['message' => "Input received. Status: $status."]);
}



public function getAllLogs()
{
    $logs = Log::with('iot') // Pastikan Anda memiliki relasi 'iot' di model Log
                ->select('id', 'iot_id', 'user_id', 'status', 'created_at', 'updated_at')
                ->orderBy('created_at', 'desc')
                ->get();

    return response()->json($logs);
}




}
