<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\Tag;
use Illuminate\Http\Requests;
use Illuminate\Support\Facades\Auth;


class ServiziController extends Controller
{


   public function servizi () {
   $servizi = Service::all();
    return view('servizi.services', ['servizi' => $servizi]);
}


public function create() {
    $tags = Tag::all();
    
   return view('servizi.create', compact('tags'));
}

    public function store(ServiceRequest $request) {
        $servizio = new Service();
        $servizio->name = $request->name;
        $servizio->description = $request->description;
        $servizio->price = $request->price;
        $servizio->img = $request->file('img')->store('images', 'public');
        $servizio->user_id = Auth::user()->id;
       $servizio->save();

       $servizio->tags()->attach($request->tags);

       return redirect()->route('home')->with('successMessage','Servizio creato con successo!');
    }

    public function show(Service $servizio) {
        
        return view('servizi.show', ['servizio' => $servizio]);
    }

    public function edit(Service $servizio) {
        if ($servizio->user_id == Auth::user()->id) {
            return view('servizi.edit', compact('servizio'));
        } else {
            return redirect()->route('home')->with('errorMessage', 'Non hai i permessi per modificare questo servizio.');
        }
        
    }

    public function update(ServiceRequest $request, Service $servizio) {
       if ($servizio->user_id == Auth::user()->id) {
    $servizio->update([
         'name' => $request->name,
         'description' => $request->description,
         'price' => $request->price,
        ]);
        if($request->hasFile('img')) {
            $servizio->img = $request->file('img')->store('images', 'public');
        }
       $servizio->save();
       return redirect()->route('home')->with('successMessage','Servizio modificato con successo!'); 
           } else {
            return redirect()->route('home')->with('errorMessage', 'Non hai i permessi per modificare questo servizio.');
        }
       
       
       }

       public function destroy(Service $servizio) {
        if ($servizio->user_id == Auth::user()->id) {
       $servizio->delete();
        return redirect()->route('home')->with('successMessage','Servizio eliminato con successo!');   
         } else {
            return redirect()->route('home')->with('errorMessage', 'Non hai i permessi per modificare questo servizio.');
        }
        }
}

