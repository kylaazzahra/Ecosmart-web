<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ApiController extends Controller
{
    //
    public function klasifikasi(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image'
        ]);
    
        $image = $request->file('gambar');
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('images/temp');
        $image->move($destinationPath, $filename);
        $rootPath = public_path();
        
        $fullPath = $destinationPath . DIRECTORY_SEPARATOR . $filename;
        
        $imageUrl = asset('images/temp/' . $filename);
        $rilPath = $rootPath . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . $filename;
        \Log::info("imageUrl: $imageUrl");
        \Log::info("rilPath: $rilPath");
        \Log::info("fullPath: $fullPath");

        
        try {
            
            $cfile = new \CURLFile(
                $fullPath,
                Storage::mimeType($rilPath),
                $filename
            );
            
            $curl = curl_init();
            
            curl_setopt_array($curl, [
                CURLOPT_URL => 'http://localhost:5000/klasifikasi',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => ['gambar' => $cfile],
                CURLOPT_TIMEOUT => 30,
                CURLOPT_CONNECTTIMEOUT => 10,
            ]);
            
            $response = curl_exec($curl);
            
            if (curl_errno($curl)) {
                \Log::error('Klasifikasi Flask (cURL) error: ' . curl_error($curl));
                Storage::delete($imageUrl);
                return back()->withErrors(['error' => 'Gagal kirim ke API Flask: ' . curl_error($curl)]);
            }
            
            curl_close($curl);
            
            // $hasil = json_decode($response, true)['hasil'] ?? 'Tidak diketahui';
            // \Log::info("Hasil klasifikasi: $hasil");
            Storage::delete($imageUrl);
            
            \Log::info("Response dari Flask: $response");
            return response()->json([
                'status' => 'success',
                'message' => 'Klasifikasi berhasil',
                'data' => json_decode($response, true)
            ]);
        } catch (\Exception $e) {
            \Log::error('Klasifikasi Flask error: ' . $e->getMessage());
            Storage::delete($imageUrl);
            return back()->withErrors(['error' => 'Gagal klasifikasi: ' . $e->getMessage()]);
        }
    }
}
