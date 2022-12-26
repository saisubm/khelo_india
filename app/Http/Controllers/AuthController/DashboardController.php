<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function dashboard()
  {
    return view('dashboard.dashboard');
  }

  public function index($id)
  {
    try {
      $dashboard_data = Http::get('https://nsrsapi.kheloindia.gov.in/api/GetDashboardCountSummary');
      $data = $dashboard_data->collect();
      $sqlQuery = "SELECT SUM(school_name) as total FROM `fit_india_school_details`";
      $fit_india = DB::select(DB::raw($sqlQuery));
      $fit_sqlQuery = "SELECT SUM(event_participation_amt) as fit_total FROM `fit_india_event_data`";
      $fit_india_res = DB::select(DB::raw($fit_sqlQuery));

      $participation = "SELECT SUM(athlete_participation) as total FROM `additional_asc_details`";
      $participation_data = DB::select(DB::raw($participation));

      return view('index', [
        'AcademyCount' => $data['AcademyCount'], 'AthleteCount' => $data['AthleteCount'], 'CoachCount' => $data['CoachCount'],
        'SupportStaffCount' => $data['SupportStaffCount'], 'total_fit_india' => $fit_india[0]->total, 'fit_total_res' => $fit_india_res[0]->fit_total, 'participation' => $participation_data[0]->total, 'route_id' => decode5t($id)
      ]);
    } catch (\Exception $th) {
      return view('server_error');
      //abort(503, 'Server Error occured');
    }
  }
}
