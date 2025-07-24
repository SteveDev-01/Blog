<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up(): void
{
Schema::table('posts', function (Blueprint $table) {
$table->string('title');
$table->text('content');
$table->string('image');
$table->string('created_by');
$table->string('category');
});
}

public function down(): void
{
Schema::table('posts', function (Blueprint $table) {
$table->dropColumn(['title', 'content', 'image', 'created_by', 'category']);
});
}
};
