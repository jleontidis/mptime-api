<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Resources\PointageResource;

class EmployeesController extends Controller
{
    use PasswordValidationRules;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EmployeeResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user;
        
        Validator::make($user, [
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'role_id' => ['required'],
            'password' => $this->passwordRules(),
        ])->validate();


        $user['password'] = Hash::make($user['password']);

        
        $newUser = User::create($user);

        return response()->json(['data' =>  EmployeeResource::collection(User::all()),
                                'message' => 'L\'utilisateur '. $newUser->fullname .' à été enregistrer avec succés.'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $employee)
    {
        $user = $request->values;
    
        Validator::make($user, [
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user['id']),
            ],
            'role_id' => ['required'],
            'password' => ['nullable','string', 'confirmed'],
            ])->validate();
            
            //Remove null values
            $user = array_filter($user);

            if(isset($user['password'])) {
                $user['password'] = Hash::make($user['password']);
            }
            
            $employee->update($user);

        return response()->json(['message' => 'Utilisateur à été modifier avec succés.'], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employee)
    {
      $employee->delete();

      return response()->json(['message' => 'Utilisateur '. $employee->fullname .' à été supprimer avec succés.'], 200);

    }

    public function getListPointagesByEmployee(User $employee){
        return PointageResource::collection($employee->pointages()->orderBy('pointage', 'desc')->get());
    }
}
