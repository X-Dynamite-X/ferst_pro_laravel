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
        Schema::create('chat_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_user_id'); // معرف المستخدم الذي أرسل الرسالة
            $table->unsignedBigInteger('receiver_user_id'); // معرف المستخدم الذي سيتلقى الرسالة
            $table->text('message_body'); // الرسالة نفسها
            $table->timestamps();

            // إضافة العلاقة مع جدول المستخدمين للمرسل
            $table->foreign('sender_user_id')->references('id')->on('users')->onDelete('cascade');

            // إضافة العلاقة مع جدول المستخدمين للمستقبل
            $table->foreign('receiver_user_id')->references('id')->on('users')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_users');
    }
};
