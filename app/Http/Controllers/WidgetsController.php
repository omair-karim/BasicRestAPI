<?php

namespace App\Http\Controllers;

use App\widgets;
use Illuminate\Http\Request;
use App\Http\Requests\WidgetsRequest; 

class WidgetsController extends Controller
{
    public function __construct()
    {
        $this->widgets = new widgets();
    }
    
    public function index()
    {
        $widgets = $this->widgets->get()->toArray();
        return response()->json([ 'data' => $widgets], 200);
    }

   
    public function create()
    {
        //
    }

   
    public function store(WidgetsRequest $request)
    {
        $data = $request->validated();
        $widget = $this->widgets->create($data);
        return response()->json([ 'data' => $widget], 200);
    }

    
    public function show($id)
    {
        
        $widget = $this->widgets->find($id);
        return response()->json(['data' => $widget], 200);
    }

  
    public function edit(widgets $widgets)
    {
        //
    }

    
    public function update(WidgetsRequest $request, $id)
    {
        $data = $request->validated();
        $widget = $this->widgets->find($id)->first();
        $widget->update($data);
        return response()->json([ 'data' => $widget], 200);
    }

    public function update_name($id, $name )
    {
        $widget = $this->widgets->find($id);
        if(!$widget){
            return response()->json(['message' => 'Bad Request'], 400);
        }
        $widget->name = $name;
        $widget->update();
        return response()->json([ 'data' => $widget], 200);
    }
    
    public function destroy($id)
    {
        $this->widgets->destroy($id);
        $msg = "Widget : " . $id . " deleted.";
        return response()->json(['message' => $msg], 200);
    }
}
