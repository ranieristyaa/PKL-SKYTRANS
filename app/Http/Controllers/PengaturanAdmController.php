<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengaturanAdmController extends Controller
{
    public function index(){
        return view('admin.akun', [
            'data' => User::where('id', Auth::user()->id)
        ]);
    }
    public function update(Request $request, User $user){
        if($request->password != ''){
        
            $old = User::where('id', Auth::user()->id)->first();
            if ($old->email != $request->email){
                $rules = array(
                'name' => 'required',
                'email' => ['required', 'email:rfc,dns', 'unique:users,email'],
           
                'password' => [Password::min(5)->numbers()->symbols(), 'confirmed'],
                
            );
            $messages = array(
            
                'name.required' => 'Username wajib diisi.',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Email tidak sesuai',
                'email.unique' => 'Email sudah dipakai oleh pengguna lain.',
                'password.confirmed' => 'Password tidak sesuai',
                'password.min' => 'Password minimal 5 karakter',
                'password.mixedCase' => 'Password harus disertai dengan satu huruf besar dan simbol',
                'password.symbols' => 'Password harus disertai dengan satu huruf besar dan simbol',
            );

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()){
                return redirect('/admin/pengaturan_akun')->with('error', 'Input data gagal, mohon periksa kembali.')
                ->withErrors($validator)
                ->withInput();
            }

    
            User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => Auth::user()->role_id,
                'password' => Hash::make($request->password),
                
            ]);

            }
            else{
                $rules = array(
                    'name' => 'required',
          
               
                    'password' => [Password::min(5)->numbers()->symbols(), 'confirmed'],
                    
                );
                $messages = array(
                
                    'name.required' => 'Username wajib diisi.',
                
                    'password.confirmed' => 'Password tidak sesuai',
                    'password.min' => 'Password minimal 5 karakter',
                    'password.mixedCase' => 'Password harus disertai dengan satu huruf besar dan simbol',
                    'password.symbols' => 'Password harus disertai dengan satu huruf besar dan simbol',
                );

                $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()){
                return redirect('/admin/pengaturan_akun')->with('error', 'Input data gagal, mohon periksa kembali.')
                ->withErrors($validator)
                ->withInput();
            }

    
            User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
            
                'role_id' => Auth::user()->role_id,
                'password' => Hash::make($request->password),
                
            ]);

            }

            
           

            

        } else{
            $old = User::where('id', Auth::user()->id)->first();
            if ($old->email != $request->email){
                $rules = array(
                'name' => 'required',
                'email' => ['required', 'email:rfc,dns', 'unique:users,email'],
           
            
                
            );
            $messages = array(
            
                'name.required' => 'Username wajib diisi.',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Email tidak sesuai',
                'email.unique' => 'Email sudah dipakai oleh pengguna lain.',
               
            );

            $validator = Validator::make([
                'name' => $request->name,
            'email' => $request->email,
  
            
            ], $rules, $messages);

            if ($validator->fails()){
                return redirect('/admin/pengaturan_akun')->with('error', 'Input data gagal, mohon periksa kembali.')
                ->withErrors($validator)
                ->withInput();
            }
    
            User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
            'email' => $request->email,
            'role_id' => Auth::user()->role_id,
          
            
            ]);

            }
            else{
                $rules = array(
                    'name' => 'required',
          
                    
                );
                $messages = array(
                
                    'name.required' => 'Username wajib diisi.',
              
                );

                $validator = Validator::make([
                    'name' => $request->name,
                
      
                
                ], $rules, $messages);
    
                if ($validator->fails()){
                    return redirect('/admin/pengaturan_akun')->with('error', 'Input data gagal, mohon periksa kembali.')
                    ->withErrors($validator)
                    ->withInput();
                }
        
                User::where('id', Auth::user()->id)->update([
                    'name' => $request->name,
              
                'role_id' => Auth::user()->role_id,
              
                
                ]);
            }

           
        }

        return redirect('/admin/pengaturan_akun')->with('success', 'Akun berhasil diupdate');
    }
}
