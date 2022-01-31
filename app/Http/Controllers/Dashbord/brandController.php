<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbord\brandRequest;
use App\Models\Dashbord\Brand;
use App\Models\Dashbord\BrandTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class brandController extends Controller
{
    // get html for view,add,editcategories

    public function view(){

            $brand =  Brand::OrderBy('id','DESC')->paginate(15);

            return view('dashbord.brands.view',compact('brand'));

    }
    public function select( $action){
        try{
            if($action == 'active'){
                $brand = Brand::OrderBy('id','DESC')->where('is_active',1)->paginate(15);
            }if($action == 'inactive'){
                $brand = Brand::OrderBy('id','DESC')->where('is_active',0)->paginate(15);
            }
            return view('dashbord.brands.view',compact('brand'));
        }catch (\Exception $ex){
            return redirect()->route('admin.brand');
        }

    }
    public function createForm(){
        return view('dashbord.brands.add');
    }
    public function detail($id ){
        $brand = Brand::orderBy('id', 'DESC')->find($id);
        return view('dashbord.brands.detail',compact('brand'));
    }
    public function editForm($id){
        try{
            $category  = Brand::select()->find($id);
            if($category){
                $allbrand = Brand::orderBy('id', 'DESC')->get();
                $brandTrans = BrandTranslation::where('category_id',$id)->select()->get();
                return view('dashbord.brands.edit',compact(['brandTrans','allbrand']));
            }
        }catch(Exception $ex){
            $alert = __('admin.error-brand-edit') ;
            return redirect()->route('admin.brand')->with(['error' => $alert]);
        }

    }

//    // check for add , editBrand

    public function storeDb(brandRequest $request){

        try {
            if(isset($request -> image )){
                $request -> image = $request->has('image') ? uploadeImage('brand',$request->image) : '' ;
            }
            DB::beginTransaction();
            $data = $request->except(['_token','brand']);
            $brand_id = Brand::insertGetId($data);
            foreach ($request->brand as $brand){
                $brands[]=[
                    'name' => $brand['name'],
                    'description' => $brand['description'],
                    'locale' => $brand['locale'],
                    'brand_id' => $brand_id,
                ];
            }
            DB::commit();
            BrandTranslation::insert($brands);
            $alert = __('admin/category/add.success-cat-add');
            return redirect()->route('admin.brands')->with(['success' => $alert]);
        }catch(\Exception $ex){
            return $ex;
            DB::rollback();
            $alert = __('admin/category/add.error-cat-add');
            return redirect()->route('admin.categories')->with(['error' => $alert]);
        }
    }
    public function updateDb($id, brandRequest $request){

        try{
            if($id){
                $updateCat = Category::find($id);
                $updateCat->update($request->except(['_token','category','type','image']));
                if(isset($request -> image )){
                    $filePath = $request->has('image') ? uploadeImage('mainCategory',$request->image) : '' ;
                    $updateCat->update(['image'=>$filePath]);
                }

                foreach($request->category as  $category){
                    CategoryTranslation::where('id',$category['id'])->update([
                        'name'=>$category['name'],
                        'description'=> $category['description']
                    ]);
                }
                $alert = __('admin.success-cat-add') ;
                return dd($request->query());
                return redirect()->route('admin.categories',$request->type)->with(['success' => $alert]);
            }
        }catch(\Exception $ex){
            return $ex;
            $alert = __('admin.error-cat-edit') ;
            return redirect()->route('admin.categories',$request->type)->with(['error'=>$alert]);
        }
    }
    public function isActive($type , $id){
        $category = Category::find($id);
        if(!$category){
            return redirect()->route('admin.error');
        }
        try{
            $active = $category -> is_active == 1 ? 0 : 1 ;
            Category::where('id',$id)->update(['is_active' => $active]);
            $alert = __('admin.success-cat-active') ;
            return redirect()->back()->with(['success' => $alert]);
        }catch(\Exception $ex){
            $alert = __('admin.error-cat-active') ;
            return redirect()->back()->with(['error' => $alert]);
        }
    }
    public function deleteCategorie($id){
        $categorie = Category::find($id);
        if(!$categorie){
            return redirect()->route('admin.error');
        }
        try{
            $categorie -> delete();
            $alert = __('admin.success-cat-delete') ;
            return redirect()->route('admin.viewcategories')->with(['success' => $alert]);
        }catch(Exception $ex){
            $alert = __('admin.error-cat-delete') ;
            return redirect()->route('admin.viewcategories')->with(['error' => $alert]);
        }
    }
}
