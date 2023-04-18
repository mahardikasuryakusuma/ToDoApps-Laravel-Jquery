<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TugasDone;
use DataTables;

class TugasDoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->ajax()) {
            $userId= auth()->user()->id;
            $data = TugasDone::where('user_id','=',$userId)->get();
            return Datatables::of($data)
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-sm editTugasDone"><i class="fas fa-edit"></i> Edit</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm deleteTugasDone"><i class="fas fa-trash-alt"></i> Delete</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Done" class="btn btn-sm moveTugasOn"><i class="fa-solid fa-ban"></i> Cancel</a>';
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
            TugasDone::updateOrCreate([
                'id'=>$request->id
            ],
            [
                'waktu_awal' => $request->waktu_awal,
                'waktu_akhir' => $request->waktu_akhir,
                'tugas' => $request->tugas,
                'description' => $request->description,
                'user_id'=>auth()->user()->id
            ]);
        return response()->json(['success'=>'Product saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TugasDone  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $product = TugasDone::find($id);
        return response()->json($product);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TugasDone  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        TugasDone::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
    }
    public function done($id){
        TugasDone::select("*")
        ->where('id','=',$id)
        ->each(function ($oldRecord) {
            $newRecord = $oldRecord->replicate();
            $newRecord->setTable('tugas');
            $newRecord->save();
            $oldRecord->delete();
        });;
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
