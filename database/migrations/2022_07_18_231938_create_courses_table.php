<?php

use App\Models\admin\Course;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->enum('status', [Course::BORRADOR, Course::REVISION, Course::PUBLICADO])->default(1);
            $table->string('slug');
            // Forma resumida de poner claves externas foráneas
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('level_id')->nullable()->constrained()->cascadeOnDelete('set null')->cascadeOnUpdate();
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete('set null')->cascadeOnUpdate();
            $table->foreignId('price_id')->nullable()->constrained()->cascadeOnDelete('set null')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};