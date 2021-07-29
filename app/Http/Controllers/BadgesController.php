<?php

namespace App\Http\Controllers;

use App\Http\Resources\BadgeResource;
use App\Http\Resources\EmployeeResource;
use App\Models\Badge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BadgesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['badges' => BadgeResource::collection(Badge::all())];
    }

    public function getEmployeesWithNoBadge() {

        $employees = EmployeeResource::collection(User::whereDoesntHave('badge')->get());

        if(sizeof($employees) == 0) {
            
            $employees = [[
                'id' => null,
                'fullname' => 'Aucun collaborateur sans badge',
                'unavailable' => true
            ]];
        }
        
        return ['employees' => $employees];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $badge = $request->badge;
        
        Validator::make($badge, [
            'badge_id' => ['required', 'string', 'max:255'],
            'user_id' => ['max:255']
        ])->validate();

        $newBadge = Badge::create($badge);

        return response()->json(['message' => 'Le badge no '. $newBadge->badge_id .' à été enregistrer avec succés.'], 200);

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
    public function destroy(Badge $badge)
    {
        $badge->delete();

        return response()->json(['message' => 'Le badge no '. $badge->badge_id .' à été supprimer avec succés.'], 200);
    }
}
