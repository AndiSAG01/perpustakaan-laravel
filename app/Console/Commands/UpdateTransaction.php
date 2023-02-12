<?php

namespace App\Console\Commands;

use App\Models\Late;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
{
    $late_id = Late::where('id', 1)->first()->body;

    $transactions = Transaction::where('status', 0)->where('return', '<=', now())->get();
    foreach ($transactions as $transaction) {
            $return = Carbon::parse($transaction->return);
            $now = Carbon::now();
            $lateDay = $return->diffInDays($now);
            $transaction->update([
                'lateDay' => $lateDay,
                'description' => 'Total Denda Rp. ' . $lateDay * $late_id,

            ]);
        }

    $ongoing = Transaction::where('status', 0)->where('return', '>=', now())->get();
    foreach ($ongoing as $going)
        $going->update([
            'description' => 'Masih Dipinjam'
        ]);

    $ends = Transaction::whereStatus(1)->get();
    foreach ($ends as $end){
        $end->update([
            'description' => 'Peminjaman selesai'
        ]);
    }
}

}
