<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Master;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('pages.home', compact('services'));
    }
    public function addService(){
        return view('pages.add-service');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|unique:services|max:255',
            'address'=>'required',
            'manager'=>'required',
        ]); 
        Service::create([
            'name'=>request('name'),
            'address'=>request('address'),
            'manager'=>request('manager'),
        ]);

        return redirect('/');
    }
    public function showService(){
        $services = Service::all();
        return view('pages.show-service', compact('services'));
    }
    public function editService(Service $service){
        return view('pages.edit-service', compact('service'));
    }
    public function storeUpdate(Service $service,Request $request){
        Service::where('id',$service->id)->update(
            $request->only(['name', 'address', 'manager'])
            
        );
        return redirect('/');
    }
    public function delete(Service $service){
        $service->delete();
        return redirect('/');
    }
}
