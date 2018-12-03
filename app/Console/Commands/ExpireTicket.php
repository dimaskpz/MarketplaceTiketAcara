<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// use App\User;
use App\Mail\ExpireSoon;
use App\Transaksi;
use Carbon\Carbon;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Mail;
class ExpireTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tiket:expiresoon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirim email ke pemesan bahwa tiket akan segera expire dalam waktu 1 jam';

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
     * @return mixed
     */
    public function handle()
    {
      $sekarang = Carbon::now();
      $jarak = Carbon::now()->addHours(1);
      $transaksis = Transaksi::where('due_at', '>', $sekarang)->where('due_at', '<', $jarak)->first();
      // dd($sekarang, $jarak, $transaksis->toarray());
      if (is_array($transaksis)) {
        foreach ($transaksis as $transaksi) {
          Mail::to($transaksi->email)->send(new ExpireSoon($transaksi));
        }
      } else {
        if ($transaksis) {
          Mail::to($transaksis->email)->send(new ExpireSoon($transaksis));
          // code...
        }
      }
      // Mail::to('dimaskpz@gmail.com')->send(new ExpireSoon($transaksis));
    }
}
