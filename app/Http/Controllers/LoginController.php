<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //

    public function login()
    {
        return view('user.login'); 
    }

    public function register()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        $data = $request->only('name', 'address', 'customer_wa', 'email', 'password', 'passwordConfirmation');
        $validasi = Validator::make($data, [
            'name' => 'required|string',
            'address' => 'required|string',
            'customer_wa' => 'required|string|unique:customers,customer_wa',
            'email' => 'nullable|email',
            'password' => 'required',
            'passwordConfirmation' => 'required|same:password'
        ], [
            'name.required' => 'Nama harus diisi',
            'address.required' => 'Alamat harus diisi',
            'customer_wa.required' => 'Nomor WA harus diisi',
            'email.email' => 'Email tidak valid',
            'customer_wa.unique' => 'Nomor WA sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Password tidak sama',
            'passwordConfirmation.required' => 'Konfirmasi password harus diisi',
            'passwordConfirmation.same' => 'Konfirmasi password tidak sama'
        ]);
        if ($validasi->fails()) {
            return back()->withErrors($validasi)->withInput();
        }
        $data['password'] = Hash::make($data['password']);
        Customer::create($data);
        return redirect()->route('login')->with('success', 'Registrasi berhasil');
    }

    public function logins(Request $request)
    {
        $creds = $request->only('customer_wa', 'password');
        $validate = Validator::make(
            $creds,
            [
                'customer_wa' => 'required|exists:customers,customer_wa',
                'password' => 'required|string',
            ],
            [
                'customer_wa.required' => 'customer_wa is required',
                'customer_wa.exists' => 'Nomor telepon atau password salah',
                'password.required' => 'Password is required',
                'password.string' => 'Password must be string',
            ],
        );
        foreach ($validate->errors()->all() as $error) {
            return redirect()->to(route('login'))->with('error', $error);
        }
        $panitia = Customer::where('customer_wa', $creds['customer_wa'])->first();
        if (!$panitia || !Hash::check($creds['password'], $panitia->password)) {
            $error = !$panitia ? 'Akun belum terdaftar silahkan melakukan registrasi' : 'Invalid credentials';
            return redirect()->to(route('login'))->with('error', $error);
        }
        $request->session()->put('id', $panitia->id);
        $request->session()->put('phone', $panitia->customer_wa);
        $request->session()->put('name', $panitia->name);
        return redirect()->to(route('user.home'));
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->to(route('login'));
    }
}
