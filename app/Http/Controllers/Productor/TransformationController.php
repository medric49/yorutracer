<?php

namespace App\Http\Controllers\Productor;

use App\Http\Requests\Productor\NewTransformationRequest;
use App\Managers\FileManager;
use App\Model\Image;
use App\Model\Transformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransformationController extends Controller
{
    public function index() {
        $transformations = auth()->user()->productor->transformations()->orderBy('title','desc')->get();
        return view('productor.transformations',compact('transformations'));
    }

    public function newTransformationForm() {
        $transformations = Transformation::all();
        return view('productor.new_transformation_form',compact('transformations'));
    }

    public function transformation($id) {
        $transformation = Transformation::find($id);
        if ($transformation) {
            return view('productor.transformation',compact('transformation'));
        }
        return abort(404);
    }

    public function storeTransformation(NewTransformationRequest $request) {
        $prev_transformation = Transformation::find($request->input('prev_transformation_id'));
        if ($prev_transformation) {
            $image = FileManager::storeImage($request->image,config('yorutracer.transformation_image_folder'));
            $image_1 = FileManager::storeImage($request->image_1,config('yorutracer.transformation_image_folder'));
            $image_2 = FileManager::storeImage($request->image_2,config('yorutracer.transformation_image_folder'));
            $image_3 = FileManager::storeImage($request->image_3,config('yorutracer.transformation_image_folder'));

            $t = Transformation::create([
                'title' => $request->input('title'),
                'prev_transformation_id'=> $request->input('prev_transformation_id'),
                'image' => $image,
                'description' => $request->input('description'),
                'productor_id' => auth()->user()->productor->id,
                'type' => $request->input('type'),
                'unit' => $request->input('unit'),
                'model_id' => $prev_transformation->model->id
            ]);

            Image::create([
                'file_name' => $image_1,
                'transformation_id' => $t->id,
            ]);

            Image::create([
                'file_name' => $image_2,
                'transformation_id' => $t->id,
            ]);

            Image::create([
                'file_name' => $image_3,
                'transformation_id' => $t->id,
            ]);
            return redirect()->route('productor.transformation',['id' => $t->id]);
        }
        return redirect()->route('productor.new_transformation')->withErrors(['prev_transformation_form','Le produit d\'origine n\'existe pas.']);
    }
}
