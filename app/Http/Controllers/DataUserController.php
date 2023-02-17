<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Validator;
use Illuminate\Support\Facades\Hash;


class DataUserController extends Controller
{
    public function index()
    {
        return view('superadmin.user', [
            'data' => User::all()
        ]);
    }

    public function destroy(User $user){
        User::destroy($user->id);
        return redirect('/superadmin/dataadmin')->with('success', 'Akun berhasil dihapus');
    }

    public function store(Request $request){
        $rules = array(
            'name' => 'required',
            'email' => ['required', 'email:dns', Rule::unique('users', 'email')],
            'role_id' => 'required',
            'password' => ['required', Password::min(5)->mixedCase()->symbols(), 'confirmed'],
        );
        $messages = array(
        
            'name.required' => 'Username wajib diisi.',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak sesuai',
            'email.unique' => 'Email sudah dipakai',
            'role_id.required' => 'Pilih salah satu role',
            'password.confirmed' => 'Password tidak sesuai',
            'password.min' => 'Password minimal 5 karakter',
            'password.mixedCase' => 'Password harus disertai dengan satu huruf besar dan simbol',
            'password.symbols' => 'Password harus disertai dengan satu huruf besar dan simbol',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('/superadmin/dataadmin')->with('error', 'Input data gagal, mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/superadmin/dataadmin')->with('success', 'Akun berhasil ditambahkan');
    }

    public function update(Request $request, User $user){

        if($request->password != ''){
            $rules = array(
                'name' => 'required',
                'email' => ['required', 'email:dns'],
                'role_id' => 'required',
                'password' => [Password::min(5)->mixedCase()->symbols(), 'confirmed'],
            );
            $messages = array(
            
                'name.required' => 'Username wajib diisi.',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Email tidak sesuai',
                'role_id.required' => 'Pilih salah satu role',
                'password.confirmed' => 'Password tidak sesuai',
                'password.min' => 'Password minimal 5 karakter',
                'password.mixedCase' => 'Password harus disertai dengan satu huruf besar dan simbol',
                'password.symbols' => 'Password harus disertai dengan satu huruf besar dan simbol',
            );

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()){
                return redirect('/superadmin/dataadmin')->with('error', 'Input data gagal, mohon periksa kembali.')
                ->withErrors($validator)
                ->withInput();
            }
    
            User::where('id', $user->id)->update([
                'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
            ]);

        } else{
            $rules = array(
                'name' => 'required',
                'email' => ['required', 'email:dns'],
                'role_id' => 'required',
    
            );
            $messages = array(
            
                'name.required' => 'Username wajib diisi.',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Email tidak sesuai',
                'role_id.required' => 'Pilih salah satu role',
           
            );

            $validator = Validator::make([
                'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            
            ], $rules, $messages);

            if ($validator->fails()){
                return redirect('/superadmin/dataadmin')->with('error', 'Input data gagal, mohon periksa kembali.')
                ->withErrors($validator)
                ->withInput();
            }
    
            User::where('id', $user->id)->update([
                'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            
            ]);
        }


        return redirect('/superadmin/dataadmin')->with('success', 'Akun berhasil diupdate');
    }
}
