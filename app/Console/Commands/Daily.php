<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\Certificate\CertificateRepositoryInterface;
use Carbon\Carbon;

class Daily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:update';
    protected $cert;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status of certificate when expired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CertificateRepositoryInterface $cert)
    {
        parent::__construct();
        $this->cert = $cert;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $certificates = $this->cert->getData(['user'], ['status' => 0]);

        foreach ($certificates as $certificate) {
            if (strtotime($certificate->valid_to_time) < strtotime(Carbon::now())) {
                $this->cert->update($certificate->id, ['status' => 1]);
                $certificate->delete();
            }
        }
    }
}
