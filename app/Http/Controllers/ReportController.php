<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
	// set index page view
	public function index() {
		return view('admin.reports.sales-report');
	}
}
