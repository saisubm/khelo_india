<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Medal;
use Illuminate\Support\Facades\DB;
use App\Models\MedalUg;
use App\Models\AthleteRecord;
class AnnualSportsCompetetionController extends Controller
{
  public function getCategoryDetails($category)
  {
 
    $category = decode5t($category);
    //dd($category);
    $asc_ids = DB::table('basic_details_asc')->where('category', $category)->pluck('id')->toArray();
    $year_list = DB::table('additional_asc_details')->whereIn('asc_id', $asc_ids)->orderBy('year')->pluck('year')->toArray();
    $query = "SELECT (select basic_details_asc.name from basic_details_asc where basic_details_asc.id = additional_asc_details.asc_id) as `name`,`viewerships` as `data`,`gv`,`ssv`,`to`,`year`,`total_expenditure`,`winner`,`winner_medal_count`  FROM additional_asc_details WHERE asc_id IN(" . implode(',', $asc_ids) . ") ORDER BY year asc";
    $map_data = DB::select(DB::raw($query));
    
    // $state_ids = DB::table('basic_details_asc')->where('category', $category)->pluck('state_id')->toArray();
    // $query2 = "SELECT asc_participations.*, (select basic_details_asc.date from basic_details_asc where basic_details_asc.state_id = asc_participations.state_id and basic_details_asc.status != 'upcoming' ) as `year`  FROM asc_participations WHERE state_id IN(" . implode(',', $state_ids) . ")  ORDER BY year desc ";
    //$state_ids = DB::table('basic_details_asc')->where('category', $category)->pluck('state_id')->toArray();
    $query_yg = 'SELECT event_year,sum(no_of_athletes) as "no_of_athletes",sum(no_of_boys) as "no_of_boys", sum(no_of_girls) as "no_of_girls" FROM participate_yg_ug where event_edition="KIYG" group by event_year;';
   
    $asc_participations_yg = DB::select(DB::raw($query_yg));
    $query_ug = 'SELECT event_year,sum(no_of_athletes) as "no_of_athletes",sum(no_of_boys) as "no_of_boys", sum(no_of_girls) as "no_of_girls" FROM participate_yg_ug where event_edition="KIUG" group by event_year;';
   
    $asc_participations_ug = DB::select(DB::raw($query_ug));
  
    return view('annual_sports_details', ['data' => json_encode($map_data), 'years' => json_encode($year_list), 'category' => $category,'asc_participations_yg' => json_encode($asc_participations_yg), 'asc_participations_ug' => json_encode($asc_participations_ug)]);
  }

  public function athleteDetailsYearWise($category = 0, $year = 0)
  {
    
    $category = decode5t($category);
    $total_participation = 'total_participants_' . $year;
    $boys_participation = 'boys_' . $year;
    $girls_participation = 'girls_' . $year;
    $participant_list = DB::table('asc_participations')->select('state_id', 'states_master.state_name', $total_participation, $boys_participation, $girls_participation)
      ->join('states_master', 'asc_participations.state_id', '=', 'states_master.id')
      ->get()->toArray();
      $records = AthleteRecord::orderBy('discipline');


    $athletes_records = AthleteRecord::with(['state'])->get()->groupBy('discipline')->toArray();
    ksort($athletes_records);
   //dd($athletes_records);
    return view('athletes_year_wise', ['participant_list' => json_encode($participant_list), 'category' => $category, 'year' => $year,'athletes_records' => $athletes_records]);
  }

  public function getWinnerYearWise($category, $year)
  {
    $category = decode5t($category);
   
    if($category == 'YG'){
      $medal_telly = Medal::with('state')->where('year',decode5t($year))->orderBy('rank')->get();
      
    }else{
      $medal_telly = MedalUg::with('state')->orderBy('rank')->get();  
    }
    
    $asc_ids = DB::table('basic_details_asc')->where([['category', '=', $category], ['date', '=', decode5t($year)]])->pluck('id')->toArray();
    $medal_list = DB::table('additional_asc_details')->whereIn('asc_id', $asc_ids)->orderBy('winner_medal_count', 'desc')->pluck('winner_medal_count')->toArray();
    $medal_state_name = DB::table('additional_asc_details')->whereIn('asc_id', $asc_ids)->orderBy('winner_medal_count', 'desc')->pluck('winner')->toArray();
    return view('winners_year_wise', ['medal_list' => json_encode($medal_list), 'medal_state_name' => json_encode($medal_state_name), 'category' => $category, 'year' => decode5t($year),'medal_telly' => $medal_telly]);
  }
  public function getExpenditureYearWise($category, $year)
  {

    $category = decode5t($category);
    $year = decode5t($year);
    $asc_ids = DB::table('basic_details_asc')->where([['category', '=', $category]])->pluck('id')->toArray();
    $host_exp = DB::table('additional_asc_details')->whereIn('asc_id', $asc_ids)->where('Year', $year)->sum('host_state');
    $sai_exp = DB::table('additional_asc_details')->whereIn('asc_id', $asc_ids)->where('Year', $year)->sum('sai_mays');
    $additional_exp = DB::table('additional_asc_details')->whereIn('asc_id', $asc_ids)->where('Year', $year)->sum('additional_spending_by_state');
    return view('expenditure_year_wise', ['category' => $category, 'year' => $year, 'host_exp' => $host_exp, 'sai_exp' => $sai_exp,'additional_exp' => $additional_exp]);
  }
}
