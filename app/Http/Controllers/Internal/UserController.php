<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_users = User::get();
        
        return view('internal.user.index',compact('data_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('internal.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|confirmed'
        ],[
            'name.required' => 'Nama tidak boleh dikosongkan!',
            'email.required' => 'Email tidak boleh dikosongkan!',
            'password.required' => 'Password tidak boleh dikosongkan!'
        ]);

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('user.index')->with('success','Success Add User');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_users = User::find($id);


        return view('internal.user.edit',compact('data_users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validatE($request,[
            'name' => 'required',
            'email' => 'required'
        ],[
            'name.required' => 'Nama tidak boleh dikosongkan!',
            'email.required' => 'Email tidak boleh dikosongkan!'
        ]);
        $data_users = User::find($id);
        $data_users->update([
            'name' => $request->get('name'),
            'email' => $request->get('email')
        ]);


        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $data_users = User::find($id);

        if ($data_users->last_active=='active') {
            return redirect()->route('user.index')->with('warning','PERHATIAN! Tidak bisa menghapus User yang sedang login!');
        }else{
            $data_users->delete();
        }
         return redirect()->route('user.index')->with('success','Berhasil menghapus data!');

   }
}
