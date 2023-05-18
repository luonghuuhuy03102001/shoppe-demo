<?php 


 namespace App\Http\Services;

 class UploadService { 
    

    public function store($request) {
        try {
            if($request->hasFile('file')) {
                $name = $request->file('file')->getClientOriginalName();
                $pathFull = 'uploads/' . date('Y/m/d');
                $request->file('file')->storeAs('public/' .$pathFull,  $name);
    
                return ' /storage/' . $pathFull . '/' . $name;
            }
        } catch (\Exception $error) {
            return false;
        }
        
    }

 }