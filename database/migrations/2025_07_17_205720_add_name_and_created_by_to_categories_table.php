<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up(): void
{
Schema::table('categories', function (Blueprint $table) {
$table->string('name');
$table->string('created_by');
});
}

public function down(): void
{
Schema::table('categories', function (Blueprint $table) {
$table->dropColumn(['name', 'created_by']);
});
}
};
