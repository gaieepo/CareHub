<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProtocolController extends Controller
{
	public function index()
	{
        $page_title = "Protocol List";
		return view('protocols.protocolIndex') -> with('page_title', $page_title);
	}
    public function show($id)
    {
        $page_title = "Protocol List";
        return view('protocols.protocol'.$id) -> with('page_title', $page_title);
    }

}
