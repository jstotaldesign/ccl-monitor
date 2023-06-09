<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Issue extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'issues';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nuber_excel',
        'jobtype_id',
        'categorize_priority_id',
        'subject',
        'responsibility_id',
        'requester_id',
        'department_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function subjectDetailOfSubjects()
    {
        return $this->hasMany(DetailOfSubject::class, 'subject_id', 'id');
    }

    public function jobtype()
    {
        return $this->belongsTo(JobType::class, 'jobtype_id');
    }

    public function categorize_priority()
    {
        return $this->belongsTo(CtergorizePriority::class, 'categorize_priority_id');
    }

    public function responsibility()
    {
        return $this->belongsTo(Responsibility::class, 'responsibility_id');
    }

    public function requester()
    {
        return $this->belongsTo(Requester::class, 'requester_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
