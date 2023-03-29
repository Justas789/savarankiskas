<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Master;
use File;

class MasterController extends Controller
{
    public function index(){
        $masters = Master::all();
        $services = Service::all();
        return view('pages.home', compact('masters'), compact('services'));
    }

    public function addMaster(){
        $services = Service::all();
        return view('pages.add-master', compact('services'));
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|unique:masters|max:255',
            'lastName'=>'required|unique:masters|max:255',
            'specialization'=>'required',
            'city'=>'required',
            'gender'=>'required',
            'service'=>'required',
            'photo'=>'mimes:jpeg,png,gif',
        ]); 

        $path = $request->file('photo')->store('public/images');
            $fileName = str_replace('public/','',$path);
            
        Master::create([
            'name'=>request('name'),
            'lastName'=>request('lastName'),
            'specialization'=>request('specialization'),
            'city'=>request('city'),
            'gender'=>request('gender'),
            'service_id'=>request('service'),
            'rating'=>request('rating'),
            'photo'=>$fileName,
        ]);
        return redirect('/');
    }
    public function delete(master $master){
        $master->delete();
        return redirect('/');
    }
    public function editMaster(Master $master){
        $services = Service::all();
        return view('pages.edit-master', compact('master'), compact('services'));
    }
    public function storeUpdate(Master $master,Request $request, Service $service){
        if(request()->hasFile('photo')){
            File::delete(storage_path('app/public/'.$master->photo));
            $path = $request->file('photo')->store('public/images');
            $fileName = str_replace('public','',$path);
            Master::where('id',$master->id)->update(['photo'=>$fileName]);
        }   
        Master::where('id',$master->id)->update(
            $request->only(['name', 'lastName', 'specialization', 'service_id', 'city', 'gender', 'rating'])
        );
        return redirect('/');
    }
    public function search(){
        return view('pages.search');
    }

    public function searchResults(Request $request){
        //$results = Master::where('name', 'like', '%'.request('search').'%')->get();
        $results = Master::all();
        if ($request->has('specialization')){
            $results = Master::where('specialization', 'like', '%'.request('specialization').'%')->get();
            return view('pages.search', compact('results'));
        }
        if ($request->has('service')){
            
            $results = Master::where('service_id', 'like', '%'.request('service').'%')->with('service')->get();
            return view('pages.search', compact('results'));
        }
        if ($request->has('city')){
            $results = Master::where('city', 'like', '%'.request('city').'%')->get();
            return view('pages.search', compact('results'));
        }
        if ($request->has('gender')){
            $results = Master::where('gender', 'like', '%'.request('gender').'%')->get();
            return view('pages.search', compact('results'));
        }
        // if ($request->has('rating')){
        //     $avg = 
        //     $results = Master::where(
        //     return view('pages.search', compact('results'));
        // }
        if ($request->has('search')){
            $results = Master::where('name', 'like', '%'.request('search').'%')->get();
            return view('pages.search', compact('results'));
         }
        }
    public function rateMaster(Master $master){
        Master::where('id',$master->id)->increment('rating');
        
        return redirect('/');
    }
    public function downrateMaster(Master $master){
        Master::where('id',$master->id)->increment('downrating');

        return redirect('/');
    }
}
