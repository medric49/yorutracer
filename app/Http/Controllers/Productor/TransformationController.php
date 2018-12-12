<?php

namespace App\Http\Controllers\Productor;

use App\Http\Requests\Productor\NewTransformationRequest;
use App\Managers\FileManager;
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
        $models = auth()->user()->productor->models()->get();
        return view('productor.new_transformation_form',compact('models'));
    }

    public function transformation($id) {
        $transformation = Transformation::find($id);
        if ($transformation) {
            return view('productor.transformation',compact('transformation'));
        }
        return abort(404);
    }

    public function storeTransformation(NewTransformationRequest $request) {

        $t = Transformation::create([
            'title' => $request->input('title'),
            'model_id'=> $request->input('model_id'),
            'image' => FileManager::storeImage($request->image,config('yorutracer.transformation_image_folder')),
            'description' => $request->input('description'),
            'productor_id' => auth()->user()->productor->id
        ]);
        return redirect()->route('productor.transformation',['id' => $t->id]);
    }
}
