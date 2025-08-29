<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategorySetup;

class CategorySetupController extends Controller
{
     public function categorysetup(){
        // $Gbranchcode=session('Mbranchcode');
        // $Gbranchcode=session('Mbranchcode');
        // $Mcategorysetup=CategorySetup::where('branchcode',$Gbranchcode)->Orderby('CategoryCode','desc')->get();

        // return view('categorysetup',[
        //     'catkey'=>$Mcategorysetup
        // ]);

     return view('products.categorysetup');

    }

        public function categorysetuppost(Request $request)
        {
            $request->validate(
                [
                    'categoryname'=>'required'
                ]
            );

            // echo"<pre>";
            // print_r($request->all());
            // echo"</pre>";
            // $Gbranchcode=session('Mbranchcode');
            //$Gbranchcode = session('Mbranchcode');
            //$Gbranchcode = session('Mbranchcode');


            $Mcategroysetup = CategorySetup::where('categorycode','=',$request->categorycode)->first();


if (!$Mcategroysetup) {
    $Mcategroysetup = new CategorySetup;

    $maxCategoryCode = CategorySetup::max('categorycode');
    $maxCategoryCode = $maxCategoryCode + 1;
} else {
    $maxCategoryCode = $Mcategroysetup->categorycode;
}
                $Mcategroysetup->categorycode = $maxCategoryCode;
                $Mcategroysetup->categoryname = $request->categoryname;
               // $Mcategroysetup->branchcode =  $Gbranchcode;
                $Mcategroysetup->itempic =  $request->itempicfile;



                //$categorycode=$Mcategroysetup->categorycode;



                info($maxCategoryCode);
                // info($request->itempicfile);

     if($request->itempic !== $request->itempicfile){

        if($request->file('itempic')){

            $image = $request->file('itempic');

            $image_name = 'cateid_'.$maxCategoryCode.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image_name);

            $Mcategroysetup->itempic=$image_name;

          }
      }
                $Mcategroysetup->save();

                return redirect()->back();
        }
        



        public function categorydelete(Request $request)
        {
            $request->validate(
                [
                    'categorycode'=>'required'
                ]
            );

            $Gbranchcode=session('Mbranchcode');

            $Mcategroysetup = CategorySetup::where('branchcode',$Gbranchcode)->where('categorycode','=',$request->categorycode)->first();
            if($Mcategroysetup)
            {
                CategorySetup::where('branchcode',$Gbranchcode)->where('categorycode','=',$request->categorycode)->delete();
            }
                return redirect('categorysetup');
        }


        ///////// retrive data from category code

        public function categorygetdata(Request $request)
        {
            $Gbranchcode=session('Mbranchcode');
            $Mcategroysetup = CategorySetup::where('branchcode',$Gbranchcode)->where('categorycode','=',$request->categorycode)->first();
            if($Mcategroysetup)
            {
                return response()->json($Mcategroysetup);
            }
            else{
                return response()->json(['error' => 'Item not found'], 404);
            }


        }




        /////////////////////////////////////


/////////////search category modal
public function categorysearch(Request $request){

    $Gbranchcode=session('Mbranchcode');
    $category=CategorySetup::where('branchcode',$Gbranchcode)->where('categoryname', 'like', '%' . $request->categorysearch . '%')->get();

    if($category){
        $result="success";
        return response()->json($category);
      }
      else{
        return response()->json(['error' => 'Item not found'], 404);
      }

        //return redirect('itemsetup');
    }


    ////////////////////////////
//
}
