<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalSenin;
use DataTables;

class JadwalSeninController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $userId= auth()->user()->id;
        if ($request->ajax()) {
            $data = JadwalSenin::where('user_id','=',$userId)->orderBy('waktu','asc')->get();
            return Datatables::of($data)
                    // ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-sm editSenin"><i class="fas fa-edit"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm deleteSenin"><i class="fas fa-trash-alt"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validatedData=$request->validate([
            'waktuSenin.*'=>'required',
            'jadwalSenin.*'=>'required'
        ]);
        // $id = $request->id;
        // $model= JadwalSenin::find($id);
        // $userId = $model-> user_id;
        // $confirmId = auth()->user()->id;
        // if($userId == $confirmId){
        // }
        foreach($request->waktuSenin as $key => $value){
            JadwalSenin::updateOrCreate([
                'id'=>$request->id
            ],
            [
                'waktu' => $request->waktuSenin[$key],
                'jadwal' => $request->jadwalSenin[$key],
                'user_id'=>auth()->user()->id
            ]);
        }
        return response()->json(['success'=>'Product saved successfully.']);
    }
    public function update(Request $request, $id){
        $model= JadwalSenin::find($id);
        $userId = $model-> user_id;
        $confirmId = auth()->user()->id;
        if($userId == $confirmId){
            JadwalSenin::where('id', $model->id)
            ->update([
                'id' => $request ->id,
                'waktu' => $request->waktuSenin,
                'jadwal' => $request->jadwalSenin,
                'user_id'=>auth()->user()->id
            ]);
        }
        return response()->json(['success'=>'Product saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JadwalSenin  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $product = JadwalSenin::find($id);
        return response()->json($product);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JadwalSenin  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        JadwalSenin::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
