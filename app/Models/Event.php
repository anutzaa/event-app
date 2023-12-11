<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Event extends Model
{
    use HasFactory;

    public function up()
    {
        Schema::create('events', function(Blueprint $table){
            $table->increments('id');
            $table->string("title", 300)->nullable();
            $table->string("description", 500)->nullable();
            $table->date("date")->nullable();
            $table->time("time")->nullable();
            $table->string("location", 250)->nullable();
            $table->double("price", 10, 2)->nullable();
            $table->foreign("contact_ID")->references('id')->on('contact');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
