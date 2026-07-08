<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Controllers\PageController;

class Warga extends Authenticatable
{
    protected $table = 'wargas';

    protected $fillable = [
        'nik',
        'nama_warga',
        'alamat',
        'jenis_kelamin',
        'status',
        'pekerjaan',
        'email_warga',
        'password_warga',
        'tgl_lahir',
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
    ];

    public static function registerNew( $data)
    {
        return self::create([
            'nik' => $data['nik'],
            'nama_warga' => $data['nama_warga'],
            'email_warga' => $data['email_warga'],
            'password_warga' => Hash::make($data['password_warga']),
            'tgl_lahir' => $data['tgl_lahir'],
            'status' => $data['status'],
            'pekerjaan' => $data['pekerjaan'],
            'alamat' => $data['alamat'],
            'jenis_kelamin' => $data['jenis_kelamin'],
        ]);
    }
    public function getAuthPassword()
    {
        return $this->password_warga;
    }

    public static function showDetail($data)
    {
        $user = self::where('nik', $data)->first();
        return($user);
    }

   public static function updateProfil($data)
{
    // Mengambil instance user yang sedang login
    $user = Auth::guard('warga')->user();

    if (!$user) {
        return null;
    }

    // Melakukan update pada instance user tersebut
    $user->update([
        'nama_warga'    => $data->nama_warga,
        'email_warga'   => $data->email_warga,
        'tgl_lahir'     => $data->tgl_lahir,
        'alamat'        => $data->alamat,
        'jenis_kelamin' => $data->jenis_kelamin,
        'status'        => $data->status,
        'pekerjaan'     => $data->pekerjaan,
    ]);

    // Update password jika diisi
    if ($data->filled('password_warga')) {
        $user->password_warga = Hash::make($data->password_warga);
        $user->save(); 
    }

    return $user;
}
}
