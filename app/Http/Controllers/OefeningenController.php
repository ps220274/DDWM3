<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\oefeningen;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class OefeningenController extends Controller
{
    public function index(Request $request)
    {
        try {
        
            $data = oefeningen::all();
            $content = [
                'success' => true,
                'data'    => $data,
                'message' => 'Registration successful'
            ];
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            $content = [
                'success' => false,
                'data' => $th,
            ];
        }

        return response()->json($content,200);
        // return response()->json(['message' => 'Registration successful'], 200);
        
        // try{ 
        //     return oefeningen::All();

        //     \Log::channel('summaMoveAPI')->info('Get all oefeningen requested');

        // } catch (\Throwable $th) {
            
        //     Log::error($th->getMessage());
        // }
    }

    public function show(oefeningen $oefening)
    {
        Log::channel('apiLog')->info('Show');
        return $oefening;
    }

    public function store(Request $request)
    {
        Log::channel('apiLog')->info('Post new creation requested');

        $validator = Validator::make($request->all(), [
            'naamNL' => 'required',
            'omschrijvingNL' => 'required',
            'naamEN' => 'required',
            'omschrijvingEN' => 'required', 
            'img' => 'required',         
        ]);
 
        if ($validator->fails()) {
            return response('{"Foutmelding":"Data niet correct"}', 400)
                ->header('Content-Type','application/json');

        }
        else return oefeningen::create($request->all());
    }

    public function update(Request $request, oefeningen $oefeningen)
    {
        \Log::channel('apiLog')->info('PUT/PATCH selected and updated');

        $validator = Validator::make($request->all(), [
            'naamNL' => 'required',
            'omschrijvingNL' => 'required',
            'naamEN' => 'required',
            'omschrijvingEN' => 'required', 
            'img' => 'required',         
        ]);
 
        if ($validator->fails()) {
            return response('{"Foutmelding":"Data niet correct"}', 400)
                ->header('Content-Type','application/json');

        }
        else $oefeningen->update($request->all());
        return $oefeningen;
    }
    
    public function delete($id){
        oefeningen::where('id',$id)->delete();
        \Log::channel('apiLog')->info('Deleted oefeningen from db');
    }
}