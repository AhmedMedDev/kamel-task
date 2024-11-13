<?php

declare(strict_types=1);

namespace App\Observers;

class MediaObserver
{
    public function created($model): void
    {
        if (request()->hasFile('images') && request()->get('abilityToUpload')){
            $model->addMultipleMediaFromRequest(['images'])->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('images');
            });

            request()->merge([
                'abilityToUpload' => false,
            ]);
        }
    }

    public function deleting($model): void
    {
        // $model->getMedia('images')->delete();
    }
}
