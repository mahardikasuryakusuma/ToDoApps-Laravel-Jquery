<?php

namespace App\Http\Controllers;

use App\Models\JadwalMinggu;
use Illuminate\Http\Request;
use DataTables;

class JadwalMingguController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $userId= auth()->user()->id;
        if ($request->ajax()) {
            $data = JadwalMinggu::where('user_id','=',$userId)->orderBy('waktu','asc')->get();
            return Datatables::of($data)
                    // ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-sm editProduct"><i class="fas fa-edit"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-sm deleteProduct"><i class="fas fa-trash-alt"></i></a>';
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
            'waktuMinggu.*'=>'required',
            'jadwalMinggu.*'=>'required'
        ]);
        foreach($request->waktuMinggu as $key => $value){
            JadwalMinggu::updateOrCreate([
                'id'=>$request->id
            ],
            [
                'waktu' => $request->waktuMinggu[$key],
                'jadwal' => $request->jadwalMinggu[$key],
                'user_id'=>auth()->user()->id
            ]);
        }
        return response()->json(['success'=>'Product saved successfully.']);
    }
    public function update(Request $request, $id){
        $model= JadwalMinggu::find($id);
        $userId = $model-> user_id;
        $confirmId = auth()->user()->id;
        if($userId == $confirmId){
            JadwalMinggu::where('id', $model->id)
            ->update([
                'id' => $request ->id,
                'waktu' => $request->waktuMinggu,
                'jadwal' => $request->jadwalMinggu,
                'user_id'=>auth()->user()->id
            ]);
        }
        return response()->json(['success'=>'Product saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JadwalMinggu  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $product = JadwalMinggu::find($id);
        return response()->json($product);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JadwalMinggu  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        JadwalMinggu::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
    }



    // public function store(Request $request){
    //     JadwalMinggu::updateOrCreate([
    //                 'id'=>$request->id
    //             ],
    //             [
    //                 'waktu' => $request->waktu,
    //                 'jadwal' => $request->jadwal,
    //                 'user_id'=>auth()->user()->id
    //             ]);
    //     return response()->json(['success'=>'Product saved successfully.']);
    // }





    // function fetch_data(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //         $data = DB::table('jadwal_minggu')->orderBy('id','asc')->get();
    //         echo json_encode($data);
    //     }
    // }
    // public function store(Request $request){
        // if($request->ajax())
        // {
            // $validatedData=$request->validate([
            //     'waktuMinggu.*'=>'required',
            //     'jadwalMinggu.*'=>'required'
            // ]);
            // foreach($request->waktuMinggu as $key => $value){
            //     JadwalMinggu::create([
            //         'waktu' => $request->waktuMinggu[$key],
            //         'jadwal' => $request->jadwalMinggu[$key],
            //         'user_id'=>auth()->user()->id
            //     ]);
            // }

        // }
// ------------------------------------------------------------ Batas Percobaan
        // $validatedData=$request->validate([
        //     'waktuMinggu.*'=>'required',
        //     'jadwalMinggu.*'=>'required'
        // ]);
        // // dd($validatedData->waktuMinggu);
        // foreach($request->waktuMinggu as $key => $value){
        //     JadwalMinggu::create([
        //         'waktu' => $request->waktuMinggu[$key],
        //         'jadwal' => $request->jadwalMinggu[$key],
        //         'user_id'=>auth()->user()->id
        //     ]);
        // }
        // $userId= auth()->user()->id;
        // $model = JadwalMinggu::where('user_id','=',$userId)->get();
        // $data=$model->all();
        // return redirect('dashboard');


        // $model=new JadwalMinggu;
        // $data= $model->all();
        // dd($data);
        // return view('dashboard');
    // }




    // public function add_data(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //         $data = array(
    //             'waktu'    =>  $request->first_name,
    //             'jadwal'     =>  $request->last_name
    //         );
    //         $id = DB::table('tbl_sample')->insert($data);


    //         if($id > 0)
    //         {
    //             echo '<div class="alert alert-success">Data Inserted</div>';
    //         }
    //     }
    // }
    // public function update(){
    //     if($request->ajax())
    //     {
    //         $data = array(
    //             "waktu"=> $request->waktu,
    //             "jadwal"=> $request->jadwal
    //         );
    //         dd($request->id);
    //         DB::table('jadwal_minggus')
    //             ->where('id', $request->id)
    //             ->update($data);
    //     }
    // }
}
