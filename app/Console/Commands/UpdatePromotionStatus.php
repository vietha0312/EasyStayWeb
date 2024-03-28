<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\KhuyenMai;
use Carbon\Carbon;

class UpdatePromotionStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promotions:check-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for expired promotions and update their status';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredPromotions = KhuyenMai::where('ngay_ket_thuc', '<', Carbon::now())
                                    ->where('trang_thai', 0) // Khuyến mãi đang áp dụng
                                    ->get();

        foreach ($expiredPromotions as $promotion) {
            $promotion->trang_thai = 1; // Đã kết thúc
            $promotion->save();
        }

        $this->info('Expired promotions checked and updated successfully.');
    }

    
}
