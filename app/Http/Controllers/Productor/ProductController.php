<?php

namespace App\Http\Controllers\Productor;

use App\Http\Requests\Productor\NewModelRequest;
use App\Http\Requests\Productor\NewProductRequest;
use App\Managers\FileManager;
use App\Model\Image;
use App\Model\Model;
use App\Model\Product;
use App\Model\Transformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function models() {
        $models = auth()->user()->productor->models()->orderBy('name','desc')->get();
        return view('productor.models',compact('models'));
    }

    public function model($id) {
        $model = Model::find($id);
        if ($model) {
            return view('productor.model',compact('model'));
        }
        return abort(404);
    }

    public function storeProduct(NewProductRequest $request) {
        $model = Model::find($request->input('model_id'));
        if ($model) {
           $product = Product::create([
               'model_id' => $model->id,
               'quantity' => $request->input('quantity')
           ]);
           return ['productId' => $product->id,
               'date' => $product->created_at->format("d-m-y h:i") ,
               'quantity' => $product->quantity
           ];
        }
        return abort(404);
    }

    public function index() {
        return view('productor.products');
    }

    public function newModelForm() {
        return view('productor.new_model_form');
    }

    public function storeNewModel(NewModelRequest $request) {
        $image = FileManager::storeImage($request->image,config('yorutracer.transformation_image_folder'));
        $image_1 = FileManager::storeImage($request->image_1,config('yorutracer.transformation_image_folder'));
        $image_2 = FileManager::storeImage($request->image_2,config('yorutracer.transformation_image_folder'));
        $image_3 = FileManager::storeImage($request->image_3,config('yorutracer.transformation_image_folder'));


        $model = Model::create([
            'name' => $request->input('name'),
            'productor_id' => auth()->user()->productor->id,
        ]);

        $t = Transformation::create([
            'title' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $image,
            'productor_id' => auth()->user()->productor->id,
            'prev_transformation_id' => null,
            'type' => 'INITIAL',
            'unit' => $request->input('unit'),
            'model_id' => $model->id,
        ]);

        Image::create([
            'file_name' => $image_1,
            'transformation_id' => $t->id
        ]);

        Image::create([
            'file_name' => $image_2,
            'transformation_id' => $t->id
        ]);

        Image::create([
            'file_name' => $image_3,
            'transformation_id' => $t->id
        ]);

        return redirect()->route('productor.model',['id'=> $model->id]);
    }

}
