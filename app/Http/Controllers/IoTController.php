<?php

namespace App\Http\Controllers;

use App\Models\AbsensiLog;
use App\Models\DeviceCommand;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Untuk logging

class IoTController extends Controller
{
    public function receiveData(Request $request)
    {
        // Cari user berdasarkan MAC address dan nama
        $user = User::where('mac', $request->input('mac'))
                    ->where('name', $request->input('label'))
                    ->first();

        // Jika user tidak ditemukan, kembalikan respon error
        if (!$user) {
            return response()->json(['message' => 'User not found', 'status' => 'failed'], 404);
        }

        // Simulasikan penerimaan data dari modul IoT
        $data = $request->all(); // Ambil semua data yang dikirimkan
        Log::info('Data received from IoT device:', $data);
        
        // Proses data (Misal, verifikasi MAC address dan jenis data)
        // Simpan data ke database atau lakukan aksi yang sesuai
        // Catat log
        AbsensiLog::create([
            'mac' => $request->input('mac'),
            'type' => 'face_recognition',
            'action' => 'face_detected',
            'details' => json_encode($request->all()), // Simpan detail request sebagai JSON
        ]);

        DeviceCommand::create([
            'mac' => $request->mac,
            'label' => $request->label,
            // timestamp dihandle oleh Laravel secara otomatis
        ]);

        return response()->json(['message' => 'Data received successfully', 'status' => 'success']);
    }

    public function checkUpdate(Request $request)
    {
        $macAddress = $request->mac;
        $command = DeviceCommand::where('mac', $macAddress)->latest()->first();

        if ($command) {
            return response()->json([
                'id' => $command->id,
                'mac' => $command->mac,
                'command' => $command->command
            ]);
        }

        return response()->json(['message' => 'No command found', 'status' => 'pending']);
    }

}
