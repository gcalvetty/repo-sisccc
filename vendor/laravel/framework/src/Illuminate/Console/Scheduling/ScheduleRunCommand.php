<?php

namespace Illuminate\Console\Scheduling;

use Illuminate\Console\Command;
<<<<<<< HEAD
=======
use Illuminate\Console\Events\ScheduledTaskFinished;
use Illuminate\Console\Events\ScheduledTaskStarting;
use Illuminate\Contracts\Events\Dispatcher;
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
use Illuminate\Support\Facades\Date;

class ScheduleRunCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'schedule:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the scheduled commands';

    /**
     * The schedule instance.
     *
     * @var \Illuminate\Console\Scheduling\Schedule
     */
    protected $schedule;

    /**
     * The 24 hour timestamp this scheduler command started running.
     *
     * @var \Illuminate\Support\Carbon;
     */
    protected $startedAt;

    /**
     * Check if any events ran.
     *
     * @var bool
     */
    protected $eventsRan = false;

    /**
<<<<<<< HEAD
=======
     * The event dispatcher.
     *
     * @var \Illuminate\Contracts\Notifications\Dispatcher
     */
    protected $dispatcher;

    /**
>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->startedAt = Date::now();

        $this->startedAt = Date::now();

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @param  \Illuminate\Contracts\Events\Dispatcher  $dispatcher
     * @return void
     */
    public function handle(Schedule $schedule, Dispatcher $dispatcher)
    {
<<<<<<< HEAD
=======
        $this->schedule = $schedule;
        $this->dispatcher = $dispatcher;

>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
        foreach ($this->schedule->dueEvents($this->laravel) as $event) {
            if (! $event->filtersPass($this->laravel)) {
                continue;
            }

            if ($event->onOneServer) {
                $this->runSingleServerEvent($event);
            } else {
                $this->runEvent($event);
            }

            $this->eventsRan = true;
        }

        if (! $this->eventsRan) {
            $this->info('No scheduled commands are ready to run.');
        }
    }

    /**
     * Run the given single server event.
     *
     * @param  \Illuminate\Console\Scheduling\Event  $event
     * @return void
     */
    protected function runSingleServerEvent($event)
    {
        if ($this->schedule->serverShouldRun($event, $this->startedAt)) {
            $this->runEvent($event);
        } else {
            $this->line('<info>Skipping command (has already run on another server):</info> '.$event->getSummaryForDisplay());
        }
    }

    /**
     * Run the given event.
     *
     * @param  \Illuminate\Console\Scheduling\Event  $event
     * @return void
     */
    protected function runEvent($event)
    {
        $this->line('<info>Running scheduled command:</info> '.$event->getSummaryForDisplay());

<<<<<<< HEAD
        $event->run($this->laravel);

=======
        $this->dispatcher->dispatch(new ScheduledTaskStarting($event));

        $start = microtime(true);

        $event->run($this->laravel);

        $this->dispatcher->dispatch(new ScheduledTaskFinished(
            $event,
            round(microtime(true) - $start, 2)
        ));

>>>>>>> ebb8527f6a804a1a73e920c9f634529630f5ec33
        $this->eventsRan = true;
    }
}
