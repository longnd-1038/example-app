<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $file_to_read = fopen(Storage::path('public/video.csv'), 'r');
        $data2 = [];
        if($file_to_read !== FALSE){

            while(($data = fgetcsv($file_to_read, 100, ',')) !== FALSE){
                for($i = 0; $i < count($data); $i++) {
                    $data2[] = $data[$i];
                }
            }

            fclose($file_to_read);
        }

        $collectData = collect($data2);

        $items = $collectData->forPage($request->get('page') ?? 1, 50); //Filter the page var


        return view('welcome', ['videos' => $items, 'current' => $request->get('page') ?? 1]);
    }
}
