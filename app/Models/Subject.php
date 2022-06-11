<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed name
 * @property mixed description
 * @property mixed students
 * @method static create(array $validated)
 * @method static withCount(string $string)
 * @method static findorfail(mixed $get)
 */
class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_time_in', 'start_time_out', 'user_id', 'description'];

    protected $dates = ['created_at'];

     /**
     * @return BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * @return BelongsTo
     */
    public function teacher_subjects(): BelongsTo
    {
        return $this->belongsTo(User::class, 'subject_user', 'subject_id', 'user_id');
    }

    /**
     * @return BelongsToMany
     */
    public function students(): BelongsToMany
    {

        return $this->belongsToMany(Student::class, 'subject_student', 'subject_id', 'student_id')->withTimestamps();
    }

    /**
     * @return HasMany
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
