<?php

namespace App\Http\Controllers;

use App\Models\Crawl;
use GuzzleHttp\Psr7\Request;
use HeadlessChromium\BrowserFactory;

class CrawlController extends Controller
{

    public function index()
    {
        $browserFactory = new BrowserFactory('google-chrome');

        $browser = $browserFactory->createBrowser([
            'headless' => true,
            'debugLogger' => 'php://stdout',
            "--no-sandbox"
        ]);

        $page = $browser->createPage();
        $browser->close();
    }
    /**
     * 
     * public function index()
     * {
     *     $client = new GuzzleHttpClient();
     * 
     *     // Send an asynchronous request.
     *     $request = new \GuzzleHttp\Psr7\Request('GET', 'https://vnexpress.net/covid-19/covid-19-viet-nam');
     *     $promise = $client->sendAsync($request)->then(function ($response) {
     *         echo 'I completed! ' . $response->getBody();
     *     });
     *     $promise->wait();
     * }
     * 
     * 
     */
    /**
     * 
     * public function index()
     * {
     *     //      https://vnexpress.net/covid-19/covid-19-viet-nam
     *     $url = "https://vnexpress.net/covid-19/covid-19-viet-nam";
     *     $arguments = [
     *         "--headless",
     *         "--window-size=1200,1100",
     *         "--disable-gpu",
     *         "--auto-open-devtools-for-tabs",
     *         "--no-sandbox",
     *         "--disable-dev-shm-usage",
     *     ];
     *     $client = Client::createChromeClient(base_path("drivers/chromedriver"), $arguments, ["port" => 9558]);
     *
     *     $crawler = $client->request('GET', $url);
     *     // $client->waitForVisibility('.muc-do');
     *
     *     // dd($crawler);
     }
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Crawl $crawl
     * @return \Illuminate\Http\Response
     */
    public function show(Crawl $crawl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Crawl $crawl
     * @return \Illuminate\Http\Response
     */
    public function edit(Crawl $crawl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Crawl $crawl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crawl $crawl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Crawl $crawl
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crawl $crawl)
    {
        //
    }
}
