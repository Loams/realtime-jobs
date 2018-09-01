<?php
namespace App\Http\Controllers;

use App\Jobs\DummyJob;
use function redirect;

class JobController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function dummyJob()
    {
        DummyJob::dispatch(['delay'=>2,'loop'=>3])
            ->onQueue('default');
        return redirect()->back()->with(['status'=>'Job queued!']);
    }
}