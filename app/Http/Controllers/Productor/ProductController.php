<?php

namespace App\Http\Controllers\Productor;

use App\Http\Requests\Productor\NewModelRequest;
use App\Managers\FileManager;
use App\Model\Image;
use App\Model\Model;
use App\Model\ModelImage;
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

    public function index() {
        return view('productor.products');
    }

    public function newModelForm() {
        return view('productor.new_model_form');
    }

    public function storeNewModel(NewModelRequest $request) {
        $image = FileManager::storeImage($request->image,config('yorutracer.product_image_folder'));
        $image_1 = FileManager::storeImage($request->image_1,config('yorutracer.product_image_folder'));
        $image_2 = FileManager::storeImage($request->image_2,config('yorutracer.product_image_folder'));
        $image_3 = FileManager::storeImage($request->image_3,config('yorutracer.product_image_folder'));

        $image_file_1 = Image::create([
            'file_name' => $image_1,
            'type' => 'PRODUCT'
        ]);

        $image_file_2 = Image::create([
            'file_name' => $image_2,
            'type' => 'PRODUCT'
        ]);

        $image_file_3 = Image::create([
            'file_name' => $image_3,
            'type' => 'PRODUCT'
        ]);


        $model = Model::create([
            'name' => $request->input('name'),
            'image' => $image,
            'description' => $request->input('description'),
            'unit' => $request->input('unit'),
            'productor_id' => auth()->user()->productor->id,
        ]);

        ModelImage::create([
            'image_id' => $image_file_1->id,
            'model_id' => $model->id
        ]);

        ModelImage::create([
            'image_id' => $image_file_2->id,
            'model_id' => $model->id
        ]);

        ModelImage::create([
            'image_id' => $image_file_3->id,
            'model_id' => $model->id
        ]);

        return redirect()->route('productor.model');
    }

}
