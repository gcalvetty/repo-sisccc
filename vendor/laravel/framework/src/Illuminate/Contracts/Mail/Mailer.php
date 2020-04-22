<?php

namespace Illuminate\Contracts\Mail;

interface Mailer
{
    /**
     * Begin the process of mailing a mailable class instance.
     *
     * @param  mixed  $users
     * @return \Illuminate\Mail\PendingMail
     */
    public function to($users);

    /**
     * Begin the process of mailing a mailable class instance.
     *
     * @param  mixed  $users
     * @return \Illuminate\Mail\PendingMail
     */
    public function bcc($users);

    /**
     * Send a new message with only a raw text part.
     *
     * @param  string  $text
     * @param  mixed  $callback
     * @return void
     */
    public function raw($text, $callback);

    /**
     * Send a new message using a view.
     *
<<<<<<< HEAD
     * @param  string|array|\Illuminate\Contracts\Mail\Mailable  $view
=======
     * @param  \Illuminate\Contracts\Mail\Mailable|string|array  $view
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
     * @param  array  $data
     * @param  \Closure|string|null  $callback
     * @return void
     */
    public function send($view, array $data = [], $callback = null);

    /**
     * Get the array of failed recipients.
     *
     * @return array
     */
    public function failures();
}
