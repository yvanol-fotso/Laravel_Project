<?php

namespace App\Http\Controllers;
use App\Models\Compagny;

use Illuminate\Http\Request;

class CompagnyController extends Controller
{
    //

    public function index(){
    	$companies = Compagny::orderBy('id','desc')->paginate(5);
    	return view('companies.index',compact('companies'));
    	// return view('companies.index');

    }

    //

    public function create(){
    	return view('companies.create');
    }

    //

    public function store(Request $request){

    	$request->validate([

         'name' => 'required',
         'email' => 'required',
         'address' => 'required',


    	]);

    	Compagny::create($request->post());

    	return redirect()->route('companies.index')->with('success','Compagny has been create successfully.');

    }



    //
    public function show(Compagny $compagny){

    	return view('companies.show',compact('compagny'));

    }



    //

    public function edit(Compagny $compagny){

    	return view('companies.edit',compact('compagny'));

    }



    //

    public function update(Request $request, Compagny $compagny ){

        $request->validate([

         'name' => 'required',
         'email' => 'required',
         'address' => 'required',


    	]);

    	$compagny->fill($request->post())->save();

    	return redirect()->route('companies.index')->with('success','Compagny has been updated successfully.');
    }



    //

    public function destroy(Compagny $compagny){

    	$compagny->delete();
    	return redirect()->route('companies.index')->with('success','Compagny has been deleted successfully.');
    }

}
