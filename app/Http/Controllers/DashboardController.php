<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\TugasDeadline;
use App\Models\TugasDone;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard');
    }
    public function fetchData(){

        $userId= auth()->user()->id;
        $tugas = Tugas::where('user_id','=',$userId)->get();
        $done = TugasDone::where('user_id','=',$userId)->get();
        $deadline = TugasDeadline::where('user_id','=',$userId)->get();
        $tugasCount = count($tugas);
        $doneCount = count($done);
        $deadlineCount = count($deadline);
        $output[]=array(
            $tugasCount,
            $doneCount,
            $deadlineCount
        );
        echo json_encode($output);
    }
    public function setting(){
        return view('setting');
    }
    public function about(){
        return view('about');
    }
}
