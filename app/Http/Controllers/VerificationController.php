<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iot;
use App\Models\User;
use App\Models\Log;
use Carbon\Carbon;

class IotController extends Controller
{
    public function receiveFaceData(Request $request)
    {
        $macFaceRecog = $request->input('mac');
        $label = $request->input('value');

        // Cek apakah ada user dengan label tersebut
        $user = User::where('label', $label)->first();

        $status = $user ? 'success' : 'failed';

        // Simpan log dengan status pending
        $log = Log::create([
            'iot_id' => Iot::where('mac', $macFaceRecog)->first()->id,
            'user_id' => $user ? $user->id : null,
            'status' => 'pending',
        ]);

        // Respon ke modul RFID (simulasikan dengan update status log untuk keperluan demo)
        $log->status = $status;
        $log->save();

        return response()->json(['message' => 'Data received, verification ' . $status]);
    }

    public function checkForRFIDModule(Request $request)
    {
        $macRFID = $request->input('mac');

        // Asumsi modul RFID dan modul face recognition memiliki entry terpisah di tabel iots
        $iotRFID = Iot::where('mac', $macRFID)->first();
        if (!$iotRFID) {
            return response()->json(['message' => 'RFID device not found'], 404);
        }

        // Ambil log terakhir untuk modul ini
        $log = Log::where('iot_id', $iotRFID->id)->latest('updated_at')->first();
        if (!$log) {
            return response()->json(['message' => 'No logs found for this device'], 404);
        }

        return response()->json([
            'mac' => $macRFID,
            'status' => $log->status,
            'timestamp' => $log->updated_at,
        ]);
    }
}
