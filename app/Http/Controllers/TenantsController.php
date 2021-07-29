<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TenantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['tenants' => Tenant::withCount('employees')->get()];
    }

    public function getTenantsCount() {
        return Tenant::count();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tenant = $request->tenant;


        Validator::make($tenant, [
            'enterprise' => ['required', 'string', 'max:255'],
            'enterprise_logo' => 'nullable',
            'title' => 'nullable|string',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed'
        ])->validate();


        $newTenant = Tenant::create([
            'enterprise' => $tenant['enterprise']
        ]);

        User::create([
            'title' => $tenant['title'],
            'firstname' => $tenant['firstname'],
            'lastname' => $tenant['lastname'],
            'email' => $tenant['email'],
            'password' => Hash::make($tenant['password']),
            'role_id' => 2,
            'tenant_id' => $newTenant->id
        ]);

        return response()->json(['message' => 'Le tenant ' . $newTenant->entreprise . ' à été enregistrer avec succés.'], 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();

        return response()->json(['message' => 'Le tenant ' . $tenant->entreprise . ' à été supprimer avec succés.'], 200);

    }
}
