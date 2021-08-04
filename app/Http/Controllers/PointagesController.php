<?php

namespace App\Http\Controllers;

use App\Http\Resources\PointageResource;
use App\Models\Pointage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PointagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PointageResource::collection(Pointage::where('user_id', auth()->user()->id)->orderBy('pointage', 'desc')->get());;
    }

    public function ancienpointages() {
        return PointageResource::collection(Pointage::where('user_id', auth()->user()->id)->orderBy('pointage', 'desc')->take(4)->get());;
    }
   
      public function getTransactionFile(Request $request) {

        $file = Storage::disk('local')->get($request->path);
        
        return response()->json(['file' => $file], 200);
    }
 
    public function getDirectoriesAndFiles() {
        
        $entreprise = Str::slug(auth()->user()->tenant->enterprise, '_');


        $directories = Storage::directories($entreprise);
        $history = [];

        foreach( $directories as $directory) {

            if(str_contains($directory, '/current'))
                continue;
            
            $f = Storage::files($directory);
           
            foreach($f as $filename) {
                $tmp = substr(str_replace($entreprise, '', $filename), 1, 14);
                $date = Carbon::parse($tmp)->tz('Europe/Zurich');

                array_push($history, ['date' => $date->format('d-m-Y'), 'heure' => $date->format('H:i:s'), 'download' => $filename] );
            }
           
        }
        
        
        return response()->json(['files' => $history]);
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_transactions_file()
    {
        
        $path = Str::slug(auth()->user()->tenant->enterprise, '_');

        $oldPath = $path . '/current/TRANSACTIONS.TXT';
        $newPath = $path . '/' . Carbon::now()->format('YmdHis') . '/TRANSACTIONS.TXT';
        
        if (Storage::disk('local')->exists($oldPath)) {
        
            Storage::move($oldPath, $newPath);

            $file = Storage::disk('local')->get($path . '/' . Carbon::now()->format('YmdHis') . '/TRANSACTIONS.TXT');
            
            return response()->json(['file' => $file], 200);
        }

        return response()->json(['message' => 'Aucun fichier trouver'], 404);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pointage = Carbon::parse($request->pointage);
        
        $pointage = Pointage::create([
            'badge_id' => auth()->user()->badge->badge_id,
            'user_id' => auth()->user()->id,
            'pointage' => $pointage,
            'type' => $request->type,
        ]);

        $path = Str::slug($pointage->tenant->enterprise, '_');
  
        $timestamp_year_month_date = Carbon::parse($pointage->pointage)->format('Ymd');
        $timestamp_HHMMSS = Carbon::parse($pointage->pointage)->format('His');

        $line = $timestamp_year_month_date . "," . $timestamp_HHMMSS . ",0,," . $pointage->badge_id . ",00,0,1, \r\n";
  
        Storage::disk('local')->append( $path . '/current/TRANSACTIONS.TXT', $line, null);

        return PointageResource::collection(Pointage::where('user_id', auth()->user()->id)->orderBy('pointage', 'desc')->take(4)->get());
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
        //
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
    public function destroy(Pointage $pointage)
    {
        $pointage->delete();

        return response()->json(['message' => 'Le pointage à été supprimer avec succés.'], 200);
    }
}
