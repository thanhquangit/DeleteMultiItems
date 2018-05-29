<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use DB;
use Excel;
class ExcelController extends Controller
{
    public function importExport()
	{
		return view('Import');
	}
	public function downloadExcel($type)
	{
		$data = Items::get()->toArray();
		return Excel::create('ListItems', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	public function importExcel()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['name' => $value->name, 'description' => $value->description,'price'=>$value->price];
				}
				if(!empty($insert)){
					DB::table('product')->insert($insert);
					return redirect('listProduct');
				}
			}
		}
		return back();
	}
	public function DeleteAll(){
		DB::table('items')->delete();
		return redirect('listItem');
	}
}
