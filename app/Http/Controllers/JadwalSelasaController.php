<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalSelasa;
use DataTables;

class JadwalSelasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $userId= auth()->user()->id;
        if ($request->ajax()) {
            $data = JadwalSelasa::where('user_id','=',$userId)->orderBy('waktu','asc')->get();
            return Datatables::of($data)
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-sm editSelasa"><i class="fas fa-edit"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm deleteSelasa"><i class="fas fa-trash-alt"></i></a>';
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
            'waktuSelasa.*'=>'required',
            'jadwalSelasa.*'=>'required'
        ]);
        foreach($request->waktuSelasa as $key => $value){
            JadwalSelasa::updateOrCreate([
                'id'=>$request->id
            ],
            [
                'waktu' => $request->waktuSelasa[$key],
                'jadwal' => $request->jadwalSelasa[$key],
                'user_id'=>auth()->user()->id
            ]);
        }
        return response()->json(['success'=>'Product saved successfully.']);
    }
    public function update(Request $request, $id){
        $model= JadwalSelasa::find($id);
        $userId = $model-> user_id;
        $confirmId = auth()->user()->id;
        if($userId == $confirmId){
            JadwalSelasa::where('id', $model->id)
            ->update([
                'id' => $request ->id,
                'waktu' => $request->waktuSelasa,
                'jadwal' => $request->jadwalSelasa,
                'user_id'=>auth()->user()->id
            ]);
        }
        return response()->json(['success'=>'Product saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JadwalSelasa  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $product = JadwalSelasa::find($id);
        return response()->json($product);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JadwalSelasa  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        JadwalSelasa::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
