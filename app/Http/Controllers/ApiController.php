<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function products(Request $request) {

        $data = json_decode($request->input('data'));

        $ids = $data->ids;

        $products = Product::whereIn('id',$ids)->get();

        $results = [];

        foreach ($products as $product) {
            $results[] = [
                'model_id' => $product->model_id,
                'productId' => $product->id,
                'quantity' => $product->quantity,
                'date' => $product->created_at->format('d-m-y h:i')
            ];
        }


        return ['res' => $results];
    }

    public function savePublicKey(Request $request) {
        $data = json_decode($request->input('data'));

        $pk = $data->status;

        auth()->user()->update([
            'public_key' => $pk
        ]);

        return ['status' => 'success'];

    }
}
