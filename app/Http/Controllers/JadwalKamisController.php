<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKamis;
use DataTables;

class JadwalKamisController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $userId= auth()->user()->id;
        if ($request->ajax()) {
            $data = JadwalKamis::where('user_id','=',$userId)->orderBy('waktu','asc')->get();
            return Datatables::of($data)
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-sm editKamis"><i class="fas fa-edit"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm deleteKamis"><i class="fas fa-trash-alt"></i></a>';
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
            'waktuKamis.*'=>'required',
            'jadwalKamis.*'=>'required'
        ]);
        foreach($request->waktuKamis as $key => $value){
            JadwalKamis::updateOrCreate([
                'id'=>$request->id
            ],
            [
                'waktu' => $request->waktuKamis[$key],
                'jadwal' => $request->jadwalKamis[$key],
                'user_id'=>auth()->user()->id
            ]);
        }
        return response()->json(['success'=>'Product saved successfully.']);
    }
    public function update(Request $request, $id){
        $model= JadwalKamis::find($id);
        $userId = $model-> user_id;
        $confirmId = auth()->user()->id;
        if($userId == $confirmId){
            JadwalKamis::where('id', $model->id)
            ->update([
                'id' => $request ->id,
                'waktu' => $request->waktuKamis,
                'jadwal' => $request->jadwalKamis,
                'user_id'=>auth()->user()->id
            ]);
        }
        return response()->json(['success'=>'Product saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JadwalKamis  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $product = JadwalKamis::find($id);
        return response()->json($product);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JadwalKamis  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        JadwalKamis::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
