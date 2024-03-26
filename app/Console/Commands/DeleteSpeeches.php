<?php

namespace App\Console\Commands;

use App\Models\Speech;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteSpeeches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speeches:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete old speeches';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
            Speech::where('created_at', '<=', Carbon::now()->subHours(24))->delete();

            $this->info('Old speeches deleted successfully.');
    }
}
