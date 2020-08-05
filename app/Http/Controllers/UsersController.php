<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);

        return view('admin.users.index', compact('users'));
    }

    
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        if($user->role == 'admin') {
            return back()->with('error', 'You cant downgrade other admin role');
        } else {
            $user->role = $request->newRole;
            $user->save();
            return back()->with('success', $user->name.' Role changed successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if($user->role == 'admin') {
            return back()->with('error', 'Cant delete Admin user');
        } 
        else {
            $user->delete();
            return back()->with('success', $user->name.' deleted successfully');
        }

    }
}
