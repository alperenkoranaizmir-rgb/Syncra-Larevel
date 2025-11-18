<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('tckn')->nullable()->after('birthdate')->comment('T.C. Kimlik No');
            $table->string('phone')->nullable()->after('tckn');
            $table->string('address_city')->nullable()->after('phone');
            $table->string('address_district')->nullable()->after('address_city');
            $table->text('address_line')->nullable()->after('address_district');
            $table->string('education')->nullable()->after('address_line')->comment('Eğitim durumu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['tckn','phone','address_city','address_district','address_line','education']);
        });
    }
};
