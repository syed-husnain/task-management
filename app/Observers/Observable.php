<?php

namespace App\Observers;

use App\Models\ActivityLog;
use Auth;
use Exception;
use Illuminate\Database\Eloquent\Model;

trait Observable
{
    private array $unset = ['updated_at', 'created_at', '_token', 'remember_token', 'password'];

    protected function filter(array $data): array
    {
        foreach ($this->unset as $item)
            unset($data[$item]);
        return $data;
    }

    public static function bootObservable()
    {
        /*foreach (array_keys(config('auth.guards')) as $guard) {
            try {
                if (Auth::guard($guard)->check())
                    break;
            } catch (Exception $e) {
                // print_r($e->getMessage());
                return;
            }
        }

        $instance = new self;

        static::created(function (Model $model) use ($guard, $instance) {
            ActivityLog::create([
                'notifiable_type' => self::getClassName(),
                'notifiable_id' => $model->id,
                'submitted_type' => (auth()->guard()->check() ? get_class(auth($guard)->user()) : self::getClassName()) ?? null,
                'submitted_id' => (auth()->guard()->check() ? auth($guard)->id() : $model->id) ?? null,
                'original_data' => '[]',
                'action' => 'Created',
                'data' => json_encode(
                    $instance->filter(request()->all())
                ),
            ]);
        });

        static::deleted(function (Model $model) use ($guard, $instance) {
            ActivityLog::create([
                'notifiable_type' => self::getClassName(),
                'notifiable_id' => $model->id,
                'submitted_type' => (auth()->guard()->check() ? get_class(auth($guard)->user()) : self::getClassName()) ?? null,
                'submitted_id' => (auth()->guard()->check() ? auth($guard)->id() : $model->id) ?? null,
                'original_data' => null,
                'action' => 'Deleted',
                'data' => json_encode(
                    $instance->filter($model->getOriginal())
                ),
            ]);
        });

        static::updated(function (Model $model) use ($guard, $instance) {
            ActivityLog::create([
                'notifiable_type' => self::getClassName(),
                'notifiable_id' => $model->id,
                'submitted_type' => (auth()->guard()->check() ? get_class(auth($guard)->user()) : self::getClassName()) ?? null,
                'submitted_id' => (auth()->guard()->check() ? auth($guard)->id() : $model->id) ?? null,
                'original_data' => json_encode(
                    $instance->filter($model->getOriginal())
                ),
                'action' => 'Updated',
                'data' => json_encode(
                    $instance->filter($model->getDirty())
                ),
            ]);
        });*/
    }

    public static function getClassName()
    {
        return static::class;
    }
}
