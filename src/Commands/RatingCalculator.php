<?php

namespace Corals\UtilityRating\Commands;

use Corals\UtilityRating\Facades\RatingManager;
use Illuminate\Console\Command;

class RatingCalculator extends Command
{

    protected $signature = 'ratings:avg {model_class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recalculate the Rating Averages for Class';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        RatingManager::CalculateAvgByClass($this->argument('model_class'));
    }
}
