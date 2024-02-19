<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectUser extends Model
{
    use HasFactory;

    protected $table = 'subject_user'; // اسم الجدول المرتبط بالنموذج

    protected $fillable = ['user_mark']; // حقول يمكن تعبئتها

    // إضافة العلاقة بين المستخدمين والمواضيع
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
