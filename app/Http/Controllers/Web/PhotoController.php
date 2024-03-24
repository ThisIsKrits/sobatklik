<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PhotoController extends Controller
{
    public function store(Request $request)
    {

        $base64Image = $request->name;

        // Decode base64 image
        $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

        // Generate nama unik untuk file gambar
        $imageName = time() . '_' . uniqid() . '.png'; // Menggunakan ekstensi PNG karena base64 biasanya PNG

        // Simpan gambar ke dalam folder public/uploads/report
        $path = storage_path('app/public/uploads/photo/') . $imageName;
        file_put_contents($path, $decodedImage);

        $photo = Photo::create([
            'user_id'  => Auth::user()->id,
            'name'  => $imageName
        ]);

        return redirect()->route('code.view');
    }
}
