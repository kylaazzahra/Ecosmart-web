<?php
namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use App\Models\KlasifikasiHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function GuzzleHttp\default_ca_bundle;

class KlasifikasiController extends Controller
{
    public function form()
    {
        return view('camera');
    }

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
                mime_content_type($rilPath),
                $filename
            );
    
            $curl = curl_init();
    
            curl_setopt_array($curl, [
                CURLOPT_URL => 'http://localhost:5000/api/klasifikasi',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => ['gambar' => $cfile],
                CURLOPT_TIMEOUT => 30,
                CURLOPT_CONNECTTIMEOUT => 10,
            ]);
    
            $response = curl_exec($curl);
    
            if (curl_errno($curl)) {
                \Log::error('Klasifikasi Flask (cURL) error: ' . curl_error($curl));
                return response()->json(['status' => 'error', 'message' => 'Gagal klasifikasi']);
            }
    
            curl_close($curl);
            $hasil = json_decode($response, true)['data'] ?? 'Tidak diketahui';
            switch($hasil) {
                case 0:
                    $jenis = "Kardus";
                    break;
                case 1:
                    $jenis = "Metal/Kaleng";
                    break;
                case 2:
                    $jenis = "Kertas";
                    break;
                case 3:
                    $jenis = "Botol Plastik/Plastik";
                    break;
                case 4:
                    $jenis = "Sampah";
                    break;
                default:
                    $jenis = "Tidak Di Ketahui";
            }
            session([
                'hasil_klasifikasi' => $hasil,
                'gambar_url' => 'images/temp/' . $filename 
            ]);
            \Log::info("Hasil klasifikasi: $hasil");
            \Log::info("Hasil Klasifikasi From Switch: $jenis");
            \Log::info("Response dari Flask: $response");
            
            \Log::info(response()->json([
                'status' => 'success',
                'message' => 'Klasifikasi berhasil',
                'data' => [
                    'hasil' => $hasil,
                    'gambar_url' => asset('images/temp/' . $filename), 
                    'redirect_url' => route('hasil.klasifikasi')
                ]
            ]));
            return response()->json([
                'status' => 'success',
                'message' => 'Klasifikasi berhasil',
                'data' => [
                    'hasil' => $hasil,
                    'redirect_url' => route('hasil.klasifikasi')
                ]
            ]);
    
        } catch (\Exception $e) {
            \Log::error('Klasifikasi Flask error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Gagal klasifikasi']);
        }
    }

    public function hasil()
    {
        $hasil = session('hasil_klasifikasi');
        $gambar = session('gambar_url');
        $deskripsi = Klasifikasi::where('itemid', $hasil)->first()->description ?? 'Deskripsi tidak ditemukan';
        $hasil_name = Klasifikasi::where('itemid', $hasil)->first()->name ?? 'Tidak diketahui';
    
        return view('hasil', [
            'hasil' => $hasil_name,
            'gambar' => asset($gambar), 
            'deskripsi' => $deskripsi
        ]);
    }

    public function simpan(Request $request)
    {
        $userId = auth()->id();
        if (!$userId) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        KlasifikasiHistory::create([
            'hasil' => $request->hasil,
            'gambar' => $request->gambar,
            'user_id' => $userId,
        ]);

        return response()->json(['message' => 'Hasil disimpan!']);
    }

    public function history(Request $request)
    {
        // dd(auth()->user());
        $userId = $request->query('id', Auth::id());
        \Log::info("Mengambil history klasifikasi untuk user ID: $userId");
        $history = KlasifikasiHistory::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get(['hasil', 'gambar', 'created_at']);
        if ($history->isEmpty()) {
            \Log::info("Tidak ada history klasifikasi untuk user ID: $userId");
            return response()->json(['message' => 'Tidak ada history klasifikasi']);
        }
        return response()->json($history);
    }
}
