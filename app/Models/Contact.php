<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contact extends Model
{
    use HasFactory;

    public function up()
    {
        Schema::create('contacts', function(Blueprint $table){
            $table->increments('id');
            $table->string("surname", 300)->nullable();
            $table->string("name", 300)->nullable();
            $table->string("email", 300)->nullable();
            $table->string("phone", 300)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
