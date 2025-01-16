<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Thêm cột 'returned' vào bảng 'transactions'
        Schema::table('transactions', function (Blueprint $table) {
            $table->boolean('returned')->default(false); // Trường 'returned' kiểu boolean, mặc định là false
        });
    }

    public function down(): void
    {
        // Xóa cột 'returned' trong trường hợp rollback migration
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('returned');
        });
    }
};
