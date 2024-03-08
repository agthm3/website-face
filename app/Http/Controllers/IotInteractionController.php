<?php

namespace App\Http\Controllers;

use App\Models\Iot;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Log;
use App\Models\VerificationProcess;
use Carbon\Carbon;

class IotInteractionController extends Controller
{
public function handleIotInput(Request $request)
    {
        $mac = trim($request->input('mac'));
        $value = trim($request->input('value'));

        // Mencari perangkat IoT berdasarkan MAC address
        $iot = Iot::where('mac', $mac)->firstOrFail();

        // Penanganan input dari perangkat face recognition
        if ($iot->name == 'face_recog') {
            $user = User::where('label', $value)->first();
            if ($user) {
                // Cek apakah sudah ada proses verifikasi yang aktif atau berhasil sebelumnya untuk user ini
                $existingProcess = VerificationProcess::where('user_id', $user->id)
                                                      ->whereIn('status', ['pending', 'success'])
                                                      ->exists();
                if (!$existingProcess) {
                    // Jika tidak ada, buat proses verifikasi baru dengan status 'pending'
                    VerificationProcess::create([
                        'user_id' => $user->id,
                        'status' => 'pending',
                    ]);
                    Log::create([
                        'iot_id' => $iot->id,
                        'user_id' => $user->id,
                        'status' => 'pending',
                    ]);
                    return response()->json(['message' => "Face recognition received. Status: pending."]);
                } else {
                    // Jika proses verifikasi sudah ada, catat sebagai gagal untuk menghindari duplikasi
                    Log::create([
                        'iot_id' => $iot->id,
                        'user_id' => $user->id,
                        'status' => 'failed',
                    ]);
                    return response()->json(['message' => "A verification process already exists for this user. Status: failed"], 400);
                }
            } else {
                // User tidak ditemukan berdasarkan label face recognition
                return response()->json(['message' => "User not found based on face recognition label. Status: failed"], 404);
            }
        }
        // Penanganan input dari perangkat RFID reader
        else if ($iot->name == 'rfid_reader') {
            $user = User::where('uuid', $value)->first();
            if ($user) {
                // Cari proses verifikasi 'pending' untuk user ini
                $verificationProcess = VerificationProcess::where('user_id', $user->id)->where('status', 'pending')->first();
                if ($verificationProcess) {
                    // Update status di VerificationProcess menjadi 'success' dan hapus entri
                    $verificationProcess->delete();

                    Log::create([
                        'iot_id' => $iot->id,
                        'user_id' => $user->id,
                        'status' => 'success',
                    ]);
                    return response()->json(['message' => "RFID scan received. Verification process completed and data removed. Status: success"]);
                } else {
                    // Tidak ada proses 'pending' yang sesuai, catat sebagai gagal
                    Log::create([
                        'iot_id' => $iot->id,
                        'user_id' => $user->id,
                        'status' => 'failed',
                    ]);
                    return response()->json(['message' => "No pending face recognition found for this user. Status: failed"], 400);
                }
            } else {
                // User tidak ditemukan berdasarkan UUID RFID
                return response()->json(['message' => "User not found based on RFID UUID. Status: failed"], 404);
            }
        } else {
            // Tipe perangkat IoT tidak valid atau tidak dikenali
            return response()->json(['message' => "Invalid IOT device type. Status: failed"], 400);
        }
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
