<?php

namespace Illuminate\Contracts\Mail;

interface MailQueue
{
    /**
     * Queue a new e-mail message for sending.
     *
<<<<<<< HEAD
     * @param  string|array|\Illuminate\Contracts\Mail\Mailable  $view
=======
     * @param  \Illuminate\Contracts\Mail\Mailable|string|array  $view
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
     * @param  string|null  $queue
     * @return mixed
     */
    public function queue($view, $queue = null);

    /**
     * Queue a new e-mail message for sending after (n) seconds.
     *
     * @param  \DateTimeInterface|\DateInterval|int  $delay
<<<<<<< HEAD
     * @param  string|array|\Illuminate\Contracts\Mail\Mailable  $view
=======
     * @param  \Illuminate\Contracts\Mail\Mailable|string|array  $view
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
     * @param  string|null  $queue
     * @return mixed
     */
    public function later($delay, $view, $queue = null);
}
