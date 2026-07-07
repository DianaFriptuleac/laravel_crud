<?php

// Namespace
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /**
     * Metodo eseguito quando lancio la migration con:
     * php artisan migrate
     */
    public function up(): void
    {
         // Crea una nuova tabella chiamata "notes"
        Schema::create('notes', function (Blueprint $table) {
            // Crea la colonna "id" (BIGINT, auto incrementale e Primary Key)
            $table->id();

            // Crea una colonna VARCHAR chiamata "title"
            // unique() impedisce di inserire due titoli uguali
              $table->string('title')->unique();  // -> ritorner

              // Crea una colonna TEXT chiamata "content"
            // utilizzata per contenere testi lunghi
                $table->text('content');

                // Crea automaticamente le colonne:
            // created_at  -> data e ora di creazione
            // updated_at  -> data e ora dell'ultima modifica
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
     /**
     * Metodo eseguito quando facio il rollback:
     * php artisan migrate:rollback
     */
    public function down(): void
    {
         // Elimina la tabella "notes" se esiste
        Schema::dropIfExists('notes');
    }
};
