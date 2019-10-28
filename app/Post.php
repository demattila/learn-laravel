<?php

namespace App;

use App\Events\PostCreated;
use App\Mail\PostCreated as PostCreatedMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Mail;

/**
 * App\Post
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 * @mixin /Eloquent
 */
class Post extends Model
{
    protected $fillable = [
        'name',
        'description',
        'owner_id'
    ];

    protected $dispatchesEvents = [
        'created' => PostCreated::class
    ];

    //eloquent model hook
    protected static function boot()
    {
        parent::boot();
//      static::created(function ($post){
//            Mail::to($post->owner->email)->send(
//                new PostCreatedMail($post)
//            );
//        });
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function addTask($task)
    {
        $this->tasks()->create($task);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
