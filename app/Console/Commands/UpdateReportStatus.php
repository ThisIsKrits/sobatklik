<?php

namespace App\Console\Commands;

use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateReportStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reports:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update report status after 7 days without response from customer';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reports = Report::whereIn('status', [0, 1])->get();

        foreach ($reports as $report) {
            $lastResponseDate = null;

            if ($report->status == 0) {
                // Cek balasan terakhir dari pelanggan
                $lastResponseDate = $report->response()->latest('created_at')->first()->created_at ?? null;
            } elseif ($report->status == 1) {
                // Cek balasan terakhir dari admin
                $lastResponseDate = $report->response()->latest('created_at')->first()->created_at ?? null;
            }

            // Hitung jumlah hari sejak balasan terakhir
            $daysSinceLastResponse = $lastResponseDate ? Carbon::now()->diffInDays($lastResponseDate) : null;

            // Update status laporan jika tidak ada respons dalam waktu yang ditentukan
            if ($daysSinceLastResponse !== null && (
                ($report->status == 0 && $daysSinceLastResponse > 5) ||
                ($report->status == 1 && $daysSinceLastResponse > 7)
            )) {
                $report->update(['status' => 2]);
            }
        }

        $this->info('Report statuses updated successfully.');
    }
}
