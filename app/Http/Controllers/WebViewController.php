<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FruitsModel;
use App\Models\SitesettingsModel;
use App\Models\BannerModel;
use App\Models\User;
use App\Models\Cartmodel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Exception;

class WebViewController extends Controller
{
   
     
    public function index(Request $request){  
             
           
        $user_id = session('user_id');
        $userdetails = User::where('id',  $user_id)->first();  
    
        $user_id = session('user_id');

        // $products = FruitsModel::get(); 
        $cartitems = Cartmodel::get(); 

   

        $products = FruitsModel::leftJoin('carts', function($join) use ($user_id) {
            $join->on('fruits.id', '=', 'carts.product_id')
                 ->where('carts.user_id', '=', $user_id);
        })
        ->select('fruits.*', 'carts.user_id', 'carts.quantity')
        ->get(); 
             

        foreach ($products as $item ){
            $item->image =   url('images/').'/'.$item->image;
            $item->stock_validation =  $item->stock - $item->quantity; 
        }
        
        $sitesettings = SitesettingsModel::first(); 
        $banners = BannerModel::get();   

            
        return view('fruitables.index', compact('userdetails','products','sitesettings','banners','cartitems')); 
    }
       

    public function shop(){
        return view('fruitables.shop');
    } 

    public function shopdetail(){
        return view('fruitables.shopdetail');
    } 
     
 
    public function productWithCategoriesList(Request $request) {
        try {
            $user_id = session('user_id');
            $category = $request->input('category');

      
            // Modify your database query to include the category filter
            $query = FruitsModel::leftJoin('carts', function($join) use ($user_id) {
                $join->on('fruits.id', '=', 'carts.product_id')
                     ->where('carts.user_id', '=', $user_id);
            })
            ->select('fruits.*', 'carts.user_id', 'carts.quantity');

            // Apply the category filter if $category is not null
            if (!is_null($category)) {
                $query->where('fruits.category', $category);
            }
    
            // Execute the query
            $productsWithCategoriesData = $query->get();

                      foreach ($productsWithCategoriesData as $item ){
                $item->image =   url('images/').'/'.$item->image;
                $item->stock_validation =  $item->stock - $item->quantity; 
            }
       
            // Modify the response as needed and return
            return response()->json(['products' => $productsWithCategoriesData]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    } 

     
        
      
    // public function productWithCategoriesList(Request $request) {
    //     try {
    //         $user_id = session('user_id');
    //         if (!$user_id) {
    //             throw new Exception("User not authenticated");
    //         }
    
    //         $productsWithCategoriesData = FruitsModel::leftJoin('carts', function($join) use ($user_id) {
    //             $join->on('fruits.id', '=', 'carts.product_id')
    //                  ->where('carts.user_id', '=', $user_id);
    //         })
    //         ->select('fruits.*', 'carts.user_id', 'carts.quantity')
    //         ->get();

    //         foreach ($productsWithCategoriesData as $item ){
    //             $item->image =   url('images/').'/'.$item->image;
    //             $item->stock_validation =  $item->stock - $item->quantity; 
    //         }
    
    //         return response()->json(['products' => $productsWithCategoriesData]);
    //     } catch (Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }
      
           
    
}
