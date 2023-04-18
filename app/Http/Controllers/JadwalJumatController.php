<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalJumat;
use DataTables;

class JadwalJumatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $userId= auth()->user()->id;
        if ($request->ajax()) {
            $data = JadwalJumat::where('user_id','=',$userId)->orderBy('waktu','asc')->get();
            return Datatables::of($data)
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-sm editJumat"><i class="fas fa-edit"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm deleteJumat"><i class="fas fa-trash-alt"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('dashboard');
    }
    public function update(Request $request, $id){
        $model= JadwalJumat::find($id);
        $userId = $model-> user_id;
        $confirmId = auth()->user()->id;
        if($userId == $confirmId){
            JadwalJumat::where('id', $model->id)
            ->update([
                'id' => $request ->id,
                'waktu' => $request->waktuJumat,
                'jadwal' => $request->jadwalJumat,
                'user_id'=>auth()->user()->id
            ]);
        }
        return response()->json(['success'=>'Product saved successfully.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validatedData=$request->validate([
            'waktuJumat.*'=>'required',
            'jadwalJumat.*'=>'required'
        ]);
        foreach($request->waktuJumat as $key => $value){
            JadwalJumat::updateOrCreate([
                'id'=>$request->id
            ],
            [
                'waktu' => $request->waktuJumat[$key],
                'jadwal' => $request->jadwalJumat[$key],
                'user_id'=>auth()->user()->id
            ]);
        }
        return response()->json(['success'=>'Product saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JadwalJumat  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $product = JadwalJumat::find($id);
        return response()->json($product);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JadwalJumat  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        JadwalJumat::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
