<?php

namespace App\Listeners;

use App\Events\ClassCanceled;
use App\Mail\ClassCancelMail;
use App\Notifications\ClassCanceledNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotifyClassCanceled
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClassCanceled $event): void
    {

        // Log::info($scheduledClass);

        // $members = $event->scheduledClass->members();
        $members = $event->scheduledClass->members()->get();

        $className = $event->scheduledClass->classType->name;
        $classDateTime = $event->scheduledClass->date_time;

        $details = compact('className','classDateTime');

        // $members->each(function($user) use ($details){
        //     Mail::to($user)->send(new ClassCancelMail($details));
        // });

        Notification::send($members, new ClassCanceledNotification($details));
    }
}
