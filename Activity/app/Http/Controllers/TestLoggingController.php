<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Data\Utility\ILoggerService;

class TestLoggingController extends Controller
{
    protected $logger;
    public function __construct(ILoggerService $logger){
        $this->logger = $logger;
    }
    public function index(){
        echo "In Index<br>";
        $this->logger->info("Entering TestLoggingController.index()");
        echo "Out of Index";
    }
}
