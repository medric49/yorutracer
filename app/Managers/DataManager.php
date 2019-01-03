<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 03/01/19
 * Time: 19:02
 */

namespace App\Managers;


class DataManager
{

    public static function modelIdString() {

        $tab = [];

        foreach (auth()->user()->productor->models()->orderBy('name','desc')->get() as $model) {
            $tab[''.$model->id] = 0;
        }
        return json_encode($tab);
    }
}