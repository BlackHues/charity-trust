<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gallery_albums', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_description', 400)->nullable();
            $table->text('full_description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('gallery_album_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_album_id')->constrained()->cascadeOnDelete();
            $table->string('image_path');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        if (Schema::hasTable('gallery_images')) {
            $legacyRows = DB::table('gallery_images')->orderBy('sort_order')->orderBy('id')->get();

            if ($legacyRows->isNotEmpty()) {
                $now = now();
                $albumId = DB::table('gallery_albums')->insertGetId([
                    'title' => 'Gallery',
                    'short_description' => 'Migrated images from previous gallery setup.',
                    'full_description' => null,
                    'sort_order' => 0,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);

                foreach ($legacyRows as $row) {
                    DB::table('gallery_album_images')->insert([
                        'gallery_album_id' => $albumId,
                        'image_path' => $row->image_path,
                        'sort_order' => (int) ($row->sort_order ?? 0),
                        'created_at' => $row->created_at ?? $now,
                        'updated_at' => $row->updated_at ?? $now,
                    ]);
                }
            }
        }

        Schema::dropIfExists('gallery_images');
    }

    public function down(): void
    {
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image_path');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        if (Schema::hasTable('gallery_albums') && Schema::hasTable('gallery_album_images')) {
            $firstAlbum = DB::table('gallery_albums')->orderBy('sort_order')->orderBy('id')->first();

            if ($firstAlbum) {
                $rows = DB::table('gallery_album_images')
                    ->where('gallery_album_id', $firstAlbum->id)
                    ->orderBy('sort_order')
                    ->orderBy('id')
                    ->get();

                foreach ($rows as $row) {
                    DB::table('gallery_images')->insert([
                        'title' => null,
                        'image_path' => $row->image_path,
                        'sort_order' => (int) ($row->sort_order ?? 0),
                        'created_at' => $row->created_at,
                        'updated_at' => $row->updated_at,
                    ]);
                }
            }
        }

        Schema::dropIfExists('gallery_album_images');
        Schema::dropIfExists('gallery_albums');
    }
};
