<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productors',function (Blueprint $table) {
            $table->foreign('user_id')->references('id')
                ->on('users');
        });



        Schema::table('distributors',function (Blueprint $table) {
            $table->foreign('user_id')->references('id')
                ->on('users');
        });


        Schema::table('models',function (Blueprint $table) {
            $table->foreign('productor_id')->references('id')
                ->on('productors');
        });


        Schema::table('products',function (Blueprint $table) {
            $table->foreign('model_id')->references('id')
                ->on('models');
            $table->foreign('distributor_id')->references('id')
                ->on('distributors');
        });

        Schema::table('transformations',function (Blueprint $table) {
            $table->foreign('productor_id')->references('id')
                ->on('productors');

            $table->foreign('prev_transformation_id')->references('id')
                ->on('transformations');

            $table->foreign('model_id')->references('id')
                ->on('models');
        });

        Schema::table('product_transformation',function (Blueprint $table) {
            $table->foreign('transformation_id')->references('id')
                ->on('transformations');
            $table->foreign('product_id')->references('id')
                ->on('products');
        });


        Schema::table('images',function (Blueprint $table) {
            $table->foreign('transformation_id')->references('id')
                ->on('transformations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productors',function (Blueprint $table) {
            $table->dropForeign('productors_user_id_foreign');
        });

        Schema::table('distributors',function (Blueprint $table) {
            $table->dropForeign('distributors_user_id_foreign');
        });

        Schema::table('products',function (Blueprint $table) {
            $table->dropForeign('products_model_id_foreign');
            $table->dropForeign('products_distributor_id_foreign');
        });

        Schema::table('models',function (Blueprint $table ) {
            $table->dropForeign('models_productor_id_foreign');
        });

        Schema::table('transformations',function (Blueprint $table) {
            $table->dropForeign('transformations_productor_id_foreign');
            $table->dropForeign('transformations_prev_transformation_id_foreign');
            $table->dropForeign('transformations_model_id_foreign');
        });

        Schema::table('product_transformation',function (Blueprint $table) {
            $table->dropForeign('product_transformation_product_id_foreign');
            $table->dropForeign('product_transformation_transformation_id_foreign');
        });

        Schema::table('images',function (Blueprint $table) {
            $table->dropForeign('images_transformation_id_foreign');
        });
    }
}
