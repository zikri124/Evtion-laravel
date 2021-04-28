<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class UsersController extends Controller
{
    public function check()
    {
        return 'berhasil';
    }
    
    public function displayImage($type, $filename)
    {
        $path = $type.'/'.$filename;

        if (!Storage::exists($path)) {
            abort(404);
        }
        $file = Storage::get($path);
        $type = Storage::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        
        return $response;
    }
    
    public function signin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!$validated) {
            return redirect('/masuk')->with('status', 'Profile updated!');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        } else {
            return redirect('/masuk');
        }
    }

    public function signup(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'cPassword' => 'required|same:password',
            'file' => 'image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'email.unique'=>'Email sudah terdaftar', 
            'password.min'=>'Panjang password minimal ialah 8',
            'cPassword.same'=>'Harus sama dengan password yang dimasukkan sebelumnya',
            'file.mimes'=>'Format file yang diizinkan .jpg, .jpeg, .png',
            'file.max'=>'Ukuran maksimal foto ialah 2 MB'
        ]);

        $emailExist = User::select('*')
                ->where('email', $request->email)
                ->get();
        
        $userId = Auth::id();

        $user = User::find($userId);

        if (sizeof($emailExist) == 0) {
            $hashed = Hash::make($request->password);

            if (!$request->file) {
                $path = 'asset/default-profile.png';
            } else {
                $path = Storage::putFile('profile', $request->file('file'));
            }

            User::create(['name'=>$request->name, 'email'=>$request->email, 'password'=>$hashed, 'photo'=>$path]);

            Auth::attempt(['email' => $request->email, 'password' => $request->password]);

            return redirect('/');
        } else {
            return redirect('/daftar');
        }
    }

    public function editProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'max:50',
            'password' => 'min:8|same:cPassword',
            'cPassword' => 'same:password',
            'file' => 'image|mimes:jpeg,png,jpg|max:2048'
        ], [ 
            'password.min'=>'Panjang password minimal ialah 8',
            'password.same'=>'Harus sama dengan password pada kolom konfirmasi',
            'cPassword.same'=>'Harus sama dengan password yang dimasukkan sebelumnya',
            'file.mimes'=>'Format file yang diizinkan .jpg, .jpeg, .png',
            'file.max'=>'Ukuran maksimal foto ialah 2 MB'
        ]);
        
        $userId = Auth::id();
        
        $user = Auth::user();
        
        $change = false;

        if ($request->name) {
            $user->name = $request->name;
            $change = true;
        }

        if ($request->password) {
            $user->password = $request->password;
            $change = true;
        }

        if ($request->file('file')) {
            Storage::delete($user->photo);
        
            $path = Storage::putFile('profile', $request->file('file'));

            $user->photo = $path;
            $change = true;
        }

        if ($change) {
            $user->save();
        }

        return redirect('/profile');
    }

    public function signout(Request $request)
    {
        Auth::logout();
        
        return redirect('/masuk');
    }
}
