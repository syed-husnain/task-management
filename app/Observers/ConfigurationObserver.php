<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\Configuration;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ConfigurationObserver
{
    public function created(Request $request, Model $model)
    {
        ActivityLog::create([
            'notifiable_type' => Configuration::class,
            'notifiable_id' => $model->id,
            'submitted_type' => User::class,
            'submitted_id' => Auth::id(),
            'data' => json_encode($request->all()),
        ]);
    }

    public function updated(Model $model)
    {
        ActivityLog::create([
            'notifiable_type' => Configuration::class,
            'notifiable_id' => $model->id,
            'submitted_type' => User::class,
            'submitted_id' => Auth::id(),
            'data' => json_encode($model->getDirty()),
        ]);
    }

    public function deleted(Model $model)
    {
        ActivityLog::create([
            'notifiable_type' => Configuration::class,
            'notifiable_id' => $model->id,
            'submitted_type' => User::class,
            'submitted_id' => Auth::id(),
            'data' => json_encode($model->getOriginal()),
        ]);
    }

    public function restored(Model $configuration)
    {
        //
    }

    public function forceDeleted(Model $configuration)
    {
        //
    }
}
