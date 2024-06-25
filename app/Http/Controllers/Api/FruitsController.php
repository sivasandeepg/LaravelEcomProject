<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FruitsModel;

class FruitsController extends Controller
{


          
    public function getProducts()
    {
        $fruits = FruitsModel::all(); // Assuming you want to fetch all fruits
          foreach ($fruits as $item){
            $item->image =   url('images/').'/'.$item->image;
          }


        return response()->json($fruits);
    }


 
    
    public function fruite_list(){

        $fruits= FruitsModel::all();

        foreach ( $fruits as $item){
            $item->image =  url('/images').'/'.$item->image;
        }

        return $fruits;

    }

     


    public function fruitsadd(Request $request)
    { 

        
    // Move the uploaded image to the public/images directory
    $imageName = md5(rand(11111,99999).time()).'.'.$request->image->extension();
    $request->image->move(public_path('images'), $imageName);

 
    $fruit = new FruitsModel();
    $fruit->fruit_name = $request->fruit_name;
    $fruit->stock = $request->stock;
    $fruit->image = $imageName; // Save the image name to the database
    $fruit->save();  

    // Return a JSON response indicating success
    return response()->json(['message' => 'Fruit added successfully']); 
   // $user = FruitsModel::create([
    //     'fruit_name' =>  $request->fruit_name,
    //     'stock' => $request->stock,
    //     'image' =>$imageName
    // ]);
  

    } 




}
