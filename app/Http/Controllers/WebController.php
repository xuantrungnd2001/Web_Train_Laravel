<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWebRequest;
use App\Http\Requests\UpdateWebRequest;
use App\Models\Web;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (session('user')->role === 'admin') {
            $data = Web::get();
        } else {
            $data = Web::where('account', session('user')->account)->get();
        }
        return view('web.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('web.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWebRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWebRequest $request)
    {
        //
        $request = $request->validated();
        $data = [];
        $data['listname'] = $request['listname'];
        $data['account'] = session('user')->account;
        $data['ip'] = array();
        $data['port'] = array();
        $data['hostname'] = array();
        $hosts = fopen($request['file'], 'r');
        while (!feof($hosts)) {
            $host = fgets($hosts);
            $host = trim($host);
            $replace = ['http://', 'https://', 'www.', '/', ':', '\n'];
            $host = str_replace($replace, '', $host);
            if (!empty($host)) {
                array_push($data['hostname'], $host);
                $ipl = gethostbynamel($host);
                $hostr = str_replace('.', '-', $host);
                $data['status'][$hostr] = array();
                $data['ip'][$hostr] = array();
                $ipr = "not found";
                if ($ipl) {
                    foreach ($ipl as $ip) {
                        $ipexplode = explode('.', $ip)[0];

                        if ($ipexplode !== '127' && $ipexplode !== '0') {
                            array_push($data['ip'][$hostr], $ip);
                            exec("ping -c 1 " . $ip, $output, $status);
                            $ipr = str_replace('.', '-', $ip);
                            if ($status === 0) {
                                $data['status'][$hostr] = 'active';
                                if (!empty($request['startport']) && !empty($request['endport'])) {

                                    exec("nmap -p " . $request['startport'] . "-" . $request['endport'] . " " . $ip, $outputnmap, $status);
                                } else exec("nmap " . $ip, $outputnmap, $status);
                                $data['port'][$ipr] = array();
                                foreach ($outputnmap as $line) {
                                    if (strpos($line, 'open') !== false) {
                                        $a = explode('/', $line);
                                        array_push($data['port'][$ipr], $a[0]);
                                    }
                                }
                            } else {
                                $data['status'][$hostr] = 'inactive';
                                $data['port'][$ipr] = array();
                                array_push($data['port'][$ipr], "null");
                            }
                            unset($outputnmap);
                        }
                    }
                } else {
                    $data['port'][$ipr] = array();
                    $data['status'][$hostr] = 'inactive';
                    array_push($data['ip'][$hostr], "not found");
                    array_push($data['port'][$ipr], "null");
                }
            }
        }
        Web::create($data);
        unset($data['port'], $data['ip'], $data['status']);
        fclose($hosts);
        return redirect()->route('web.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function show(Web $web)
    {

        if (session('user')->role === 'admin' || session('user')->account === $web->account) {
            return view('web.show', ['web' => $web]);
        } else {
            return abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function edit(Web $web)
    {
        //
        if (session('user')->role === 'admin' || session('user')->account === $web->account) {
            return view('web.edit', ['web' => $web]);
        } else {
            return abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWebRequest  $request
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWebRequest $request, Web $web)
    {
        //
        if (session('user')->role === 'admin' || session('user')->account === $web->account) {
            $request = $request->validated();
            $data = [];
            $data['listname'] = $request['listname'];
            $data['account'] = session('user')->account;
            $data['ip'] = array();
            $data['port'] = array();
            $data['hostname'] = array();
            $hosts = fopen($request['file'], 'r');
            while (!feof($hosts)) {
                $host = fgets($hosts);
                $host = trim($host);
                $replace = ['http://', 'https://', 'www.', '/', ':', '\n'];
                $host = str_replace($replace, '', $host);

                if (!empty($host)) {
                    array_push($data['hostname'], $host);
                    $ipl = gethostbynamel($host);

                    $hostr = str_replace('.', '-', $host);
                    $data['status'][$hostr] = array();
                    $data['ip'][$hostr] = array();
                    $ipr = "not found";
                    if ($ipl) {
                        foreach ($ipl as $ip) {
                            $ipexplode = explode('.', $ip)[0];

                            if ($ipexplode !== '127' && $ipexplode !== '0') {
                                array_push($data['ip'][$hostr], $ip);
                                exec("ping -c 1 " . $ip, $output, $status);
                                $ipr = str_replace('.', '-', $ip);
                                if ($status === 0) {
                                    $data['status'][$hostr] = 'active';
                                    if (!empty($request['startport']) && !empty($request['endport'])) {

                                        exec("nmap -p " . $request['startport'] . "-" . $request['endport'] . " " . $ip, $outputnmap, $status);
                                    } else exec("nmap " . $ip, $outputnmap, $status);
                                    $data['port'][$ipr] = array();
                                    foreach ($outputnmap as $line) {
                                        if (strpos($line, 'open') !== false) {
                                            $a = explode('/', $line);
                                            array_push($data['port'][$ipr], $a[0]);
                                        }
                                    }
                                } else {
                                    $data['status'][$hostr] = 'inactive';
                                    $data['port'][$ipr] = array();
                                    array_push($data['port'][$ipr], "null");
                                }
                                unset($outputnmap);
                            }
                        }
                    } else {
                        $data['port'][$ipr] = array();
                        $data['status'][$hostr] = 'inactive';
                        array_push($data['ip'][$hostr], "not found");
                        array_push($data['port'][$ipr], "null");
                    }
                }
            }
            $web->update($data);
            unset($data['port'], $data['ip']);
            fclose($hosts);
            return redirect()->route('web.show', ['web' => $web]);
        } else {
            return abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function destroy(Web $web)
    {
        //
        if (session('user')->role === 'admin' || session('user')->account === $web->account) {
            $web->delete();
            return redirect()->route('web.index');
        } else {
            return abort(403);
        }
    }
}