<?php

namespace App\Http\Controllers;

use App\Models\BloodGroup;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::role('patient')->get();
        return view('backend.users.patient', compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function hr()
    {
        $users = User::role(['admin', 'staff', 'laboratorian'])->get();
        // $roles = $user->getRoleNames();
        $roles = Role::all();
        return view('backend.users.hrs', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'digits:11', 'regex:/(01)[0-9]{9}/', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'],
            'gender' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'blood_groups_id' => $request->blood_groups_id,
            'about' => $request->about,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'salary' => $request->salary,

        ]);
        // SweetAlert::info('User Create', 'A user account is create!');
        // event(new Registered($user));
        $user->assignRole([$request->role]);
        // Alert::toast('User created successfully.', 'Success message');
        alert()->success('Success message', 'User created successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function show(User $user)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $roles = $user->getRoleNames();
        $roles = Role::all();
        $bloodGroups = BloodGroup::all();
        return view('backend.users.user_edit', compact('user', 'roles', 'bloodGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            //'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'digits:11', 'regex:/(01)[0-9]{9}/', 'unique:users'],
            //'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user->update($request->all());
        return redirect()->back();
    }

    public function addSalary($id)
    {
        $user = User::find($id);
        return view('backend.users.showSalary', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->forceDelete();
        return redirect()->route('users.patient');
    }
}
