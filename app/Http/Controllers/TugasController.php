<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use DataTables;
use Carbon\Carbon;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->ajax()) {
            $userId= auth()->user()->id;
            // $date = now();
            // $new_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d\TH:i');
            $data = Tugas::where('user_id','=',$userId)->orderBy('waktu_akhir','asc')->get();
            Tugas::select("*")
                ->where('waktu_akhir','<', now())
                ->each(function ($oldRecord) {
                    $newRecord = $oldRecord->replicate();
                    $newRecord->setTable('tugas_deadlines');
                    $newRecord->save();
                    $oldRecord->delete();
                });
            return Datatables::of($data)
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-sm editTugas"><i class="fas fa-edit"></i> Edit</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm deleteTugas"><i class="fas fa-trash-alt"></i> Delete</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Done" class="btn btn-sm doneTugas"><i class="fa-solid fa-circle-check"></i> Done</a>';
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
            Tugas::updateOrCreate([
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
     * @param  \App\Tugas  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $product = Tugas::find($id);
        return response()->json($product);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tugas  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Tugas::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
    }
    /**
        * Update the specified resource in storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function done($id){
        Tugas::select("*")
        ->where('id','=',$id)
        ->each(function ($oldRecord) {
            $newRecord = $oldRecord->replicate();
            $newRecord->setTable('tugas_dones');
            $newRecord->save();
            $oldRecord->delete();
        });;
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
