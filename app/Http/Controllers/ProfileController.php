<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->file('picture') != null) {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            // if (!in_array($file, ['png', 'jpg', 'jpeg', 'pdf'])) continue;
            $filename = auth()->user()->name . '-' . time() . '.' . $extension;
            $filename = str_replace(' ', '-', $filename);
            $file->move('profile-picture', $filename);
            // dd($filename);
        }
        $id = $request->id;
        User::where('id', $id)->update(['picture' => $filename]);
        return redirect()->route('profile.index')->with('message', 'Berhasil Mengubah Foto');
    }

    /**
     * Display the specified resource.
     */
    public function reset(Request $request, User $user)
    {
        $this->validate($request, [
            'password1' => 'required',
            'password2' => 'required',
        ]);
        $id = $request->id;
        $pass1 = $request->password1;
        $pass2 = $request->password2;

        if ($pass1 === $pass2) {
            $convPass = bcrypt($pass1);
            User::where('id', $id)->update(['password' => $convPass]);
            return redirect()->route('profile.index')->with('message', 'Password Berhasil diubah');
        } else {
            return redirect()->route('profile.index')->with('message', 'Password tidak sama');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditProfileRequest $request, User $user, $id)
    {
        $findUser = User::find($id);
        $findUser->update($request->validated());
        return redirect()->route('profile.index')->with('message', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
