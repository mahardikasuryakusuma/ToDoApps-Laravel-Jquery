<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalSabtu;
use DataTables;

class JadwalSabtuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $userId= auth()->user()->id;
        if ($request->ajax()) {
            $data = JadwalSabtu::where('user_id','=',$userId)->orderBy('waktu','asc')->get();
            return Datatables::of($data)
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-sm editSabtu"><i class="fas fa-edit"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm deleteSabtu"><i class="fas fa-trash-alt"></i></a>';
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
            'waktuSabtu.*'=>'required',
            'jadwalSabtu.*'=>'required'
        ]);
        foreach($request->waktuSabtu as $key => $value){
            JadwalSabtu::updateOrCreate([
                'id'=>$request->id
            ],
            [
                'waktu' => $request->waktuSabtu[$key],
                'jadwal' => $request->jadwalSabtu[$key],
                'user_id'=>auth()->user()->id
            ]);
        }
        return response()->json(['success'=>'Product saved successfully.']);
    }
    public function update(Request $request, $id){
        $model= JadwalSabtu::find($id);
        $userId = $model-> user_id;
        $confirmId = auth()->user()->id;
        if($userId == $confirmId){
            JadwalSabtu::where('id', $model->id)
            ->update([
                'id' => $request ->id,
                'waktu' => $request->waktuSabtu,
                'jadwal' => $request->jadwalSabtu,
                'user_id'=>auth()->user()->id
            ]);
        }
        return response()->json(['success'=>'Product saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JadwalSabtu  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $product = JadwalSabtu::find($id);
        return response()->json($product);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JadwalSabtu  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        JadwalSabtu::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
