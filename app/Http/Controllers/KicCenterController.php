<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Medal;
use Illuminate\Support\Facades\DB;
use App\Models\MedalUg;
use App\Models\AthleteRecord;
use App\Models\KicDetailsMap;

class KicCenterController extends Controller
{


  public function index()
  {
    return view('khelo_india_center_dashboard');
  }


  public function stateWiseKic()
  {



    $sqlQuery = "SELECT count(DISTINCT(kic_id)) as 'kic_count' FROM `kic_details_map`;";
    $kic_count = DB::select(DB::raw($sqlQuery));
    $sqlQuery = "SELECT count(DISTINCT(state_code)) as 'state_count' FROM `kic_details_map`;";
    $state_count = DB::select(DB::raw($sqlQuery));
    $sqlQuery = "SELECT count(DISTINCT(discipline)) as 'discipline_count' FROM `kic_details_map`;";
    $discipline_count = DB::select(DB::raw($sqlQuery));
    $sqlQuery = "SELECT count(DISTINCT(district_code)) as 'district_count' FROM `kic_details_map`;";
    $district_count = DB::select(DB::raw($sqlQuery));
    $sqlQuery = "SELECT sum(no_of_athletes) as 'athletes_count' FROM `kic_details_map`;";
    $athletes_count = DB::select(DB::raw($sqlQuery));
    $sqlQuery = "SELECT sum(no_of_coaches_deployed) as 'coach_count' FROM `kic_details_map`;";
    $coach_count = DB::select(DB::raw($sqlQuery));


    $sqlQuery = "SELECT state_code,count(distinct(kic_id)) as 'count_kic',count(distinct(discipline)) as 'count_discipline',count(distinct(district_code)) as 'count_district',sum(no_of_coaches_deployed) as 'count_coaches' FROM `kic_details_map` group by(state_code);";
    $result = DB::select(DB::raw($sqlQuery));

    return view('state_wise_data_centres', [
      'data' => json_encode($result),
      'kic_count' => $kic_count[0]->kic_count,
      'state_count' => $state_count[0]->state_count,
      'discipline_count' => $discipline_count[0]->discipline_count,
      'district_count' => $district_count[0]->district_count,
      'athletes_count' => $athletes_count[0]->athletes_count,
      'coach_count' => $coach_count[0]->coach_count,
    ]);
  }

  public function stateLevelKheloIndiaCenters()
  {

    return view('state_level_khelo_india_centers');
  }


  public function districtWiseKheloIndiaCenters($id)
  {


    $sqlQuery = "SELECT count(DISTINCT(kic_id)) as 'kic_count' FROM `kic_details_map` where state_code = $id;";
    $kic_count = DB::select(DB::raw($sqlQuery));
    $sqlQuery = "SELECT count(DISTINCT(state_code)) as 'state_count' FROM `kic_details_map` where state_code = $id;";
    $state_count = DB::select(DB::raw($sqlQuery));
    $sqlQuery = "SELECT count(DISTINCT(discipline)) as 'discipline_count' FROM `kic_details_map` where state_code = $id;";
    $discipline_count = DB::select(DB::raw($sqlQuery));
    $sqlQuery = "SELECT count(DISTINCT(district_code)) as 'district_count' FROM `kic_details_map` where state_code = $id;";
    $district_count = DB::select(DB::raw($sqlQuery));
    $sqlQuery = "SELECT sum(no_of_athletes) as 'athletes_count' FROM `kic_details_map` where state_code = $id group by state_code;";
    $athletes_count = DB::select(DB::raw($sqlQuery));
    $sqlQuery = "SELECT sum(no_of_coaches_deployed) as 'coach_count' FROM `kic_details_map` where state_code = $id;";
    $coach_count = DB::select(DB::raw($sqlQuery));



    $sqlQuery = "SELECT state_code,kic_id,district_code,district_code,centre_name,discipline,no_of_coaches_deployed,pac_name FROM `kic_details_map` WHERE state_code = $id;";
    $result = DB::select(DB::raw($sqlQuery));
    // dd($result);
    return view('district_wise_map', [
      'state_id' => $id, 'data' => json_encode($result),
      'kic_count' => $kic_count[0]->kic_count,
      'state_count' => $state_count[0]->state_count,
      'discipline_count' => $discipline_count[0]->discipline_count,
      'district_count' => $district_count[0]->district_count,
      'athletes_count' => $athletes_count[0]->athletes_count,
      'coach_count' => $coach_count[0]->coach_count,
    ]);
  }



  public function stateWiseKisec()
  {

    $sqlQuery = "select count(distinct(kisce_id)) as count_kicse,count(distinct(state_code)) as state_count,count(distinct(details_kisce.oscg_discipline)) as discipline_count from details_kisce;";
    $kisce_count = DB::select(DB::raw($sqlQuery));

    $sqlQuery = "select state_code,count(distinct(kisce_id)) as 'count' from details_kisce group by state_code;";
    $kisce_details = DB::select(DB::raw($sqlQuery));


    $state_list = DB::table('arc_gis_codes')->orderBy('state_name')->pluck('state_name', 'state_code');
    //dd($state_list);

    return view('kisce.state_wise_kisce', ['kisce_count' => $kisce_count[0], 'kisce_details' => json_encode($kisce_details), 'state_list' => $state_list]);
  }

  public function kisecDetails($id)
  {
    $state_id = base64_decode(urldecode($id));
    $sqlQuery = "SELECT kisce_id,center_name,
 sum(no_of_athletes_u_14) as 'no_of_athletes_u_14',
 sum(no_of_athletes_u_18) as 'no_of_athletes_u_18',
 sum(no_of_athletes_senior) as 'no_of_athletes_senior',
 sum(no_of_athletes_male) as 'no_of_athletes_male',
 sum(no_of_athletes_female) as 'no_of_athletes_female'
FROM details_kisce where state_code = '" . $state_id . "' group by kisce_id,center_name;";
    $kisce_details = DB::select(DB::raw($sqlQuery));
    //dd($kisce_details);
    //$sqlQuery = "SELECT kisce_id, oscg_discipline,sum(no_of_athletes_male) as 'no_of_athletes_male',sum(no_of_athletes_female) as 'no_of_athletes_female' FROM `details_kisce` where state_code = $state_id group by kisce_id, oscg_discipline;";

    $sqlQuery = "SELECT kisce_id, oscg_discipline,no_of_athletes_male,no_of_athletes_female FROM `details_kisce` where state_code = $state_id;";
    $kisce = DB::select(DB::raw($sqlQuery));
    //dd($kisce);
    return view('kisce.kisce_details', ['kisce_details' => $kisce_details, 'kisce' => $kisce, 'kisce_json' => json_encode($kisce_details), 'kisce_discipline' => json_encode($kisce), 'state_id' => $state_id]);
  }


  public function kisecFinance()
  {
    // $data = DB::table('kisce_budgets')->select(
    //   DB::raw('details_kisce.state_code,
    //            details_kisce.center_name,
    //            kisce_budgets.kisce_id,
    //            kisce_budgets.year,
    //            kisce_budgets.rec_sanctioned,
    //            kisce_budgets.rec_released,
    //            kisce_budgets.non_rec_sanctioned,
    //            kisce_budgets.non_rec_released
    //            ')
    //   )
    // ->join('details_kisce','details_kisce.kisce_id','=','kisce_budgets.kisce_id')
    // ->get();
    // dd($data);
    $sqlQuery = "SELECT distinct(details_kisce.kisce_id), details_kisce.center_name,details_kisce.state_code,kisce_budgets.* FROM `kisce_budgets` inner join details_kisce on kisce_budgets.kisce_id=details_kisce.kisce_id;";
    $data = DB::select(DB::raw($sqlQuery));

    return view('kisce.finance', ['data' => $data]);
  }
  public function kicFinance()
  {
    // $data = DB::table('kisce_budgets')->select(
    //   DB::raw('details_kisce.state_code,
    //            details_kisce.center_name,
    //            kisce_budgets.kisce_id,
    //            kisce_budgets.year,
    //            kisce_budgets.rec_sanctioned,
    //            kisce_budgets.rec_released,
    //            kisce_budgets.non_rec_sanctioned,
    //            kisce_budgets.non_rec_released
    //            ')
    //   )
    // ->join('details_kisce','details_kisce.kisce_id','=','kisce_budgets.kisce_id')
    // ->get();
    // dd($data);
    $sqlQuery = "SELECT * FROM `kic_finance`;";
    $data = DB::select(DB::raw($sqlQuery));

    return view('kic_finance', ['data' => $data]);
  }
  public function sportForWomen()
  {
    // dd("done");
    $sqlQuery = "SELECT sum(event_count) as event_count,sum(no_of_technical_officials) as no_of_technical_officials, sum(no_identified_talents) as no_identified_talents, sum(no_of_athletes) as no_of_athletes FROM `sfw_details`;";
    $cards = DB::select(DB::raw($sqlQuery));
    $sqlQuery = "SELECT sum(events_planned) as events_planned, sum(sanctioned_prize_money) as sanctioned_prize_money,sum(beneficiaries_as_of_now) as no_of_beneficiaries FROM `sfw_discipline_details`;";
    $m_cards = DB::select(DB::raw($sqlQuery));
    $sqlQuery = "select name_of_event, event_count, date, location, state, latitude, longitude, no_of_athletes,state_code from sfw_details;";
    $map_data = DB::select(DB::raw($sqlQuery));

    return view('women.sports_for_women', ['m_cards' => $m_cards[0], 'cards' => $cards[0], 'map_data' => json_encode($map_data)]);
  }


  public function sportForWomenDisciplineWise()
  {
    $sqlQuery = "select discipline,events_planned, events_completed from sfw_discipline_details;";
    $dis_data = DB::select(DB::raw($sqlQuery));
    return view('women.discipline_wise', ['dis_data' => json_encode($dis_data)]);
  }

  public function sportForWomenDisciplineWiseAthlete()
  {
    $sqlQuery = "select discipline, sum(no_of_athletes) as 'no_of_athletes'  from sfw_details group by discipline;";
    $dis_data = DB::select(DB::raw($sqlQuery));
    return view('women.discipline_wise_athlete', ['dis_data' => json_encode($dis_data)]);
  }
  public function sportForWomenDisciplineWisePrize()
  {
    $sqlQuery = "SELECT discipline,sum(sanctioned_prize_money) as 'prize_money_decided' FROM `sfw_discipline_details` group by discipline;";
    $dis_data = DB::select(DB::raw($sqlQuery));
    return view('women.prize_money', ['dis_data' => json_encode($dis_data)]);
  }
  public function sportForWomenDisciplineWiseTechOff()
  {
    $sqlQuery = "SELECT discipline,sum(no_of_technical_officials) as 'no_of_technical_officials' FROM sfw_details group by discipline;";
    $dis_data = DB::select(DB::raw($sqlQuery));

    return view('women.tech_off', ['dis_data' => json_encode($dis_data)]);
  }
  public function sportForWomenDisciplineWiseIdentifiedTalent()
  {
    $sqlQuery = "SELECT discipline,sum(no_identified_talents) as 'no_identified_talents' FROM sfw_details group by discipline;";
    $dis_data = DB::select(DB::raw($sqlQuery));

    return view('women.identified_talent', ['dis_data' => json_encode($dis_data)]);
  }
  public function sportForWomenDisciplineWiseBeneficiaries()
  {
    $sqlQuery = "SELECT discipline,sum(beneficiaries_as_of_now) as 'beneficiaries_as_of_now' FROM sfw_discipline_details group by discipline;";
    $dis_data = DB::select(DB::raw($sqlQuery));

    return view('women.beneficiaries', ['dis_data' => json_encode($dis_data)]);
  }


  public function abscDetails()
  {
    $sqlQuery = "SELECT * FROM `absc_details`";
    $data = DB::select(DB::raw($sqlQuery));

    return view('absc.details', ['data' => json_encode($data)]);
  }
  public function abscFinance()
  {


    return view('absc.finance');
  }
}
