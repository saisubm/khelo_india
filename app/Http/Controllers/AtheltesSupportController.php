<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Expenditure;
use App\Models\Vertical;
use Illuminate\Support\Facades\Http;
use App\Models\InfraSanc;
use App\Models\KiaaDetails;
use App\Models\KicDetails;
use App\Models\KisceDetails;
use App\Models\Pfscg;
use App\Models\State;
use Illuminate\Support\Facades\Hash;

DB::statement("SET SQL_MODE=''");

class AtheltesSupportController extends Controller
{

  public function index()
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
        'SupportStaffCount' => $data['SupportStaffCount'], 'total_fit_india' => $fit_india[0]->total, 'fit_total_res' => $fit_india_res[0]->fit_total, 'participation' => $participation_data[0]->total
      ]);
    } catch (\Exception $th) {
      // dd($th->getMessage());
      return view('server_error');
      //abort(503, 'Server Error occured');
    }
  }

  public function index1()
  {
    try {

      //$dashboard_data = Http::get('https://nsrsapi.kheloindia.gov.in/api/GetDashboardCountSummary');
      //$data = $dashboard_data->collect();
      $sqlQuery = "SELECT SUM(school_name) as total FROM `fit_india_school_details`";
      $fit_india = DB::select(DB::raw($sqlQuery));
      $fit_sqlQuery = "SELECT SUM(event_participation_amt) as fit_total FROM `fit_india_event_data`";
      $fit_india_res = DB::select(DB::raw($fit_sqlQuery));

      $participation = "SELECT SUM(athlete_participation) as total FROM `additional_asc_details`";
      $participation_data = DB::select(DB::raw($participation));

      return view('index1', [
        'total_fit_india' => $fit_india[0]->total, 'fit_total_res' => $fit_india_res[0]->fit_total, 'participation' => $participation_data[0]->total
      ]);
    } catch (\Exception $th) {
      return view('server_error');
      //abort(503, 'Server Error occured');
    }
  }

  public function talentSearchDevelopment()
  {

    //$discipline = DB::table('achivement_of_kia')->select('discipline',DB::raw("COUNT(id) as total"))->groupBy('discipline')->get();

    $sqlQuery = "SELECT state_code, gender,count(id) as 'total_athelete'  FROM `achivement_of_kia` group by state_code,gender;";
    $state_wise = DB::select(DB::raw($sqlQuery));
    $sqlQuery = "SELECT id,discipline, gender,count(id) as 'total_athlete'  FROM `achivement_of_kia` group by discipline , gender;";
    $discipline_wise = DB::select(DB::raw($sqlQuery));
    $sqlQuery = "SELECT discipline,sum(boys) as boys_count,sum(girls) as girls_count,sum(total) as total FROM `new_kiaa_details` group by(discipline);";
    $discipline_wise_kia = DB::select(DB::raw($sqlQuery));
    $kiaa_dis_cat = [];
    $kiaa_dis_data = [];
    $kiaa_dis_data[0]["name"] = "Female";
    $kiaa_dis_data[0]["data"] = [];
    $kiaa_dis_data[1]["name"] = "Male";
    $kiaa_dis_data[1]["data"] = [];
    foreach ($discipline_wise_kia as $k => $val) {
      $kiaa_dis_cat[] = $val->discipline;

      $kiaa_dis_data[0]["data"][] = $val->girls_count;
      $kiaa_dis_data[1]["data"][] = $val->boys_count;
    }

    $kia_details_st_wise = DB::table('new_kiaa_details')->get();

    return view('talent_search_dev', ['discipline' => json_encode($discipline_wise), 'state_wise' => json_encode($state_wise), 'kia_details_st_wise' => json_encode($kia_details_st_wise), 'kiaa_dis_cat' => json_encode($kiaa_dis_cat), 'kiaa_dis_data' => json_encode($kiaa_dis_data)]);
  }



  public function athelete_support(Request $request)
  {

    try {
      $m_data = Http::get('https://nsrsapi.kheloindia.gov.in/api/GetstateWiseAthleteSummary');
      $athletes_discipline_wise = Http::get('https://nsrsapi.kheloindia.gov.in/api/GetDeciplineWiseAthleteSummary');
      $scheme = Http::get('https://nsrsapi.kheloindia.gov.in/api/GetSchemeWiseAthleteSummary');

      $m_data = $m_data->collect();

      $scheme_data = $scheme->collect();

      $discipline_wise = $athletes_discipline_wise->collect();
      //dd($discipline_wise);
      if (isset($scheme_data['schemeSummary'])) {
        $scheme_category = [];
        $scheme_total = [];
        $scheme_male = [];
        $scheme_female = [];
        if (isset($scheme_data['schemeSummary']) && count($scheme_data['schemeSummary'])) {
          foreach ($scheme_data['schemeSummary'] as $key => $value) {
            // $scheme_total[] =  $value['Athletecount'];
            $scheme_male[] =  $value['Mcount'];
            $scheme_female[] =  $value['Fcount'];
            $scheme_category[$key] = $value['SchemeName'];
          }
        }

        $scheme_data_json = [
          ['name' => 'Female', 'data' => $scheme_female],
          ['name' => 'Male', 'data' => $scheme_male],

        ];
      } else {
        $scheme_category = [];
        $scheme_data_json = [];
      }


      if (isset($discipline_wise['deciplineSummary'])) {
        $discipline_wise_category = [];
        $discipline_wise_male = [];
        $discipline_wise_female = [];

        foreach ($discipline_wise['deciplineSummary'] as $key => $value) {

          $discipline_wise_male[] =  $value['Mcount'];
          $discipline_wise_female[] =  $value['Fcount'];
          $discipline_wise_category[$key] = $value['SportsName'];
        }


        $discipline_data_json = [
          ['name' => 'Female', 'data' => $discipline_wise_female],
          ['name' => 'Male', 'data' => $discipline_wise_male],

        ];
        $gender_wise_distribution = [['name' => 'Male', 'y' => array_sum($discipline_wise_male)], ['name' => 'Female', 'y' => array_sum($discipline_wise_female)]];
      } else {
        $discipline_wise_category = [];
        $discipline_data_json = [];
        $gender_wise_distribution = [];
      }

      // dd($discipline_data_json);
      // dd($discipline_wise_category);
      return view('atheltes_support', [
        'discipline_data_json' => json_encode($discipline_data_json),
        'discipline_wise_category' => json_encode($discipline_wise_category),
        'map_data' => json_encode($m_data),
        'scheme_data_json' => json_encode($scheme_data_json),
        'scheme_category' => json_encode($scheme_category),
        'gender_wise_distribution' => json_encode($gender_wise_distribution),
      ]);
    } catch (\Exception $e) {
      return view('server_error');
    }
  }


  public function overview()
  {
    return view('overview');
  }



  public function vertical()
  {
    $vertical =   DB::table('vertical_master')->whereDashboardStatus(true)->get();
    //dd($vertical);
    return view('vertical', ['vertical' => $vertical]);
  }




  public function getSubVertical($id)
  {

    $vertical_details = DB::table('vertical_master')->find($id);
    $sub_vertical =   DB::table('vertical_master')->where('parent_id', $id)->get();
    return response()->json(['success' => true, 'sub_vertical' => $sub_vertical, 'vertical_details' => $vertical_details]);
  }


  public function spending()
  {

    $sqlQuery = "SELECT name,parent_id,id,(SELECT SUM(amount)/100   FROM expenditure WHERE expenditure.vertical_id = vertical_master.id) as y FROM vertical_master where parent_id IS NULL";
    $vertical_1 = DB::select(DB::raw($sqlQuery));


    $sqlQueryMap = "SELECT states_master.id,states_master.state_name, SUM(kiaa_details.amount) as kiaa_amt,
                  SUM(kic_details.amount) as kic_amt,
                  SUM(kisce_details.recurring_released + kisce_details.non_recurring_released) as kisce_amt,
                  SUM(infrastrcture_san_amt.amt_release) as infra_amt
                  FROM states_master
                  INNER JOIN kiaa_details ON kiaa_details.state_id = states_master.id
                  INNER JOIN kic_details ON kic_details.state_id = states_master.id
                  INNER JOIN kisce_details ON kisce_details.state_id = states_master.id
                  INNER JOIN infrastrcture_san_amt ON infrastrcture_san_amt.state_id = states_master.id
                  GROUP BY states_master.id";
    $map_data = DB::select(DB::raw($sqlQueryMap));
    $vertical = [];
    foreach ($vertical_1 as $value) {
      $sub_data = DB::table('vertical_master')->where('parent_id', $value->id)->pluck('id');
      $expend = DB::table('expenditure')->whereIn('vertical_id', $sub_data)->select(DB::raw('SUM(amount)/100 as total'))->first();
      $vertical[] = ['name' => '<a href="' . url('/vertical-wise-expenditure-details/' . encode5t($value->id) . '/' . encode5t($value->y + $expend->total) . '') . '">' . $value->name . '</a>', 'y' => (($value->y + $expend->total))];
    }
    $expenditure = DB::table('expenditure')->select('financial_year', DB::raw('sum(amount) as total'))->groupBy('financial_year')->get();
    return view('spending', ['vertical' => json_encode($vertical), 'expenditure' => json_encode($expenditure), 'map_data' => json_encode($map_data)]);
  }

  public function dashboard_state($id)
  {
    $state_details = DB::table('states_master')->find(decode5t($id));
    $district_ids = DB::table('disctrict_state_master')->where('state_id', $state_details->id)->pluck('id')->toArray();

    $count = DB::table('academy_details')->whereIn('district_id', $district_ids)->distinct('centere_name')->count();

    $sqlQuery = "SELECT id,district_name,(select count(DISTINCT(centere_name)) from academy_details where academy_details.district_id= disctrict_state_master.id )

  as total FROM `disctrict_state_master` WHERE disctrict_state_master.state_id = " . $state_details->id . "   ORDER BY disctrict_state_master.id";
    $map_data = DB::select(DB::raw($sqlQuery));

    return view('state_dashboard', ['state_details' => $state_details, 'map_data' => json_encode($map_data), 'count' => $count]);
  }


  public function anual_sport()
  {

    $basic_details_YG = DB::table('basic_details_asc')->select('id', 'state_id', 'location_name', 'date', 'status')->where('category', 'YG')->get();

    $basic_details_UG = DB::table('basic_details_asc')->select('id', 'state_id', 'location_name', 'date', 'status')->where('category', 'UG')->get();
    return view('anual-sport', ['basic_details_YG' => json_encode($basic_details_YG), 'basic_details_UG' => json_encode($basic_details_UG)]);
  }

  public function getCenterNameDistrictWise(Request $request)
  {
    $district_details = DB::table('disctrict_state_master')->find($request->district_id);
    $query = "SELECT centere_name,google_map_link,
  GROUP_CONCAT(disciplines SEPARATOR ', ') as disciplines
FROM academy_details where district_id= " . $request->district_id . "
GROUP BY centere_name";
    $list = DB::select(DB::raw($query));
    $html = '<thead><tr>
  <th>Center Name</th>
  <th>Discipline</th>
  <th>Map Link</th>
  </tr></thead>';
    if (count($list)) {
      foreach ($list as  $value) {
        $html .= '<tbody><tr>
   <td>' . (isset($value->centere_name) ? $value->centere_name : 'NA') . '</td>
   <td>' . (isset($value->disciplines) ? $value->disciplines : 'NA') . '</td>
   <td>' . (isset($value->google_map_link) ? $value->google_map_link : 'NA') . '</td>
   </tr></tbody>';
      }
    } else {
      $html .= '<tr>
   <td colspan="3">
   No Data Found
   </td>
   </tr>';
    }
    return response()->json(['success' => true, 'html' => $html, 'district_details' => $district_details]);
  }

  public function coaches_support_staff()
  {
    try {
      $coach_discipline_wise = Http::get('https://nsrsapi.kheloindia.gov.in/api/GetDeciplineWiseCoachSummary');
      $coach_scheme_wise = Http::get('https://nsrsapi.kheloindia.gov.in/api/GetSchemeWiseCoachSummary');
      $coach_discipline_wise = $coach_discipline_wise->collect();

      $coach_scheme_wise = $coach_scheme_wise->collect();

      $scheme_category = [];
      $scheme_coaches = [];
      $scheme_support = [];
      if (isset($coach_scheme_wise['schemeCoachSummary'])) {
        foreach ($coach_scheme_wise['schemeCoachSummary'] as $key => $value) {
          // $financial_total[] =  $value['Athletecount'];
          $scheme_coaches[] =  $value['CoachCount'];
          $scheme_support[] =  $value['SupportStaffCount'];
          $scheme_category[$key] = $value['SchemeName'];
        }
        $scheme_data_json = [
          ['name' => 'Support Staff', 'data' => $scheme_support],
          ['name' => 'Coaches', 'data' => $scheme_coaches],


        ];
      } else {
        $scheme_data_json = [];
        $scheme_category = [];
      }
      return view('coaches_support_staff', [
        'discipline_data' => json_encode(isset($coach_discipline_wise['coachSummary']) ? $coach_discipline_wise['coachSummary'] : []),
        'TotalCoach' => isset($coach_discipline_wise['TotalCoach']) ? $coach_discipline_wise['TotalCoach'] : 0,
        'scheme_data_json' => json_encode($scheme_data_json),
        'scheme_category' => json_encode($scheme_category),
        'coach_scheme_data' => $coach_scheme_wise
      ]);
    } catch (\Exception $th) {
      return view('server_error');
    }
  }

  public function community_coaches()
  {
    $sqlQuery =    "SELECT states_master.id,states_master.state_name,(SELECT COALESCE(sum(no_of_coaches),0) FROM academy_details WHERE states_master.id = academy_details.state_id) as total FROM states_master";
    $no_of_coaches = DB::select(DB::raw($sqlQuery));
    return view('no_of_coaches', ['no_of_coaches' => json_encode($no_of_coaches)]);
  }


  public function academic_support()
  {


    try {
      $coach_discipline_wise = Http::get('http://nsrsapi.kheloindia.gov.in/api/GetSchemeWiseAcademySummary');

      $GetDeciplineWiseAcademySummary = Http::get('https://nsrsapi.kheloindia.gov.in/api/GetDeciplineWiseAcademySummary');
      $state_wise_academy = Http::get('http://nsrsapi.kheloindia.gov.in/api/GetstateWiseAcademySummary');
      //dd($athletes_discipline_wise->collect());

      $discipline_wise_count = [];
      $discipline_name = [];
      $pie_data = [];


      foreach ($GetDeciplineWiseAcademySummary->collect()['deciplineAcademySummary'] as $key => $value) {
        $discipline_wise_count[] =  $value['academyCount'];
        $discipline_name[] =  $value['sport_name'];
      }

      foreach ($coach_discipline_wise->collect()['schemeAcademySummary'] as $key => $value) {
        // $pie_data[$key]['name'] =  '<a href="'.url('/academic_details/'.encode5t($value['SchemeId'])).'">'.$value['SchemeName'].'</a>';
        $pie_data[$key]['name'] =  $value['SchemeName'];
        $pie_data[$key]['y'] =  $value['AcademyCount'];
        $pie_data[$key]['url'] =  url('/academic_details/' . encode5t($value['SchemeId']) . '/' . encode5t($value['SchemeName']));
      }

      return view(
        'acadmic_support',
        [
          'total_count' =>  $coach_discipline_wise->collect()['TotalAcademy'], 'discipline_wise_count' =>  json_encode($discipline_wise_count),
          'discipline_name' => json_encode($discipline_name), 'pie_data' => json_encode($pie_data), 'map_data' => json_encode($state_wise_academy->collect()['stateAcademySummary'])
        ]
      );
    } catch (\Exception $th) {
      return view('server_error');
    }
  }



  public function academic_supportStateWise($state_name = null, $state_id = null)
  {
    try {
      $scheme_state_wise = Http::get('http://nsrsapi.kheloindia.gov.in/api/GetSchemeWiseAcademySummary?state_id=' . decode5t($state_id) . '');
      $scheme_state_wise_data = $scheme_state_wise->collect();
      //dd($scheme_state_wise_data['TotalAcademy']);

      $scheme_array = [];
      $scheme_array2 = [];
      foreach ($scheme_state_wise_data['schemeAcademySummary'] as $key => $value) {
        $scheme_array[] = $value['SchemeName'];
        $scheme_array2[] = $value['AcademyCount'];
      }


      return view('state_wise_acadmey', [
        'scheme_data' => $scheme_state_wise_data, 'scheme_name' => json_encode($scheme_array), 'scheme_count' => json_encode($scheme_array2),
        'total_count' => json_encode($scheme_state_wise_data['TotalAcademy']), 'state_name' => $state_name
      ]);
    } catch (\Exception $th) {
      return view('server_error');
    }
  }




  public function athelete_supportStateWise($state_id = null, $state_name = null)
  {


    $scheme_state_wise = Http::get('http://nsrsapi.kheloindia.gov.in/api/GetSchemeWiseAthleteSummary?state_id=' . decode5t($state_id) . '');


    $scheme_state_wise = $scheme_state_wise->collect();
    $scheme_category = [];
    $scheme_total = [];
    $scheme_male = [];
    $scheme_female = [];
    if (isset($scheme_state_wise['schemeSummary']) && count($scheme_state_wise['schemeSummary'])) {
      foreach ($scheme_state_wise['schemeSummary'] as $key => $value) {
        // $scheme_total[] =  $value['Athletecount'];
        $scheme_male[] =  $value['Mcount'];
        $scheme_female[] =  $value['Fcount'];
        $scheme_category[$key] = $value['SchemeName'];
      }
    }

    $scheme_data_json = [
      ['name' => 'Female', 'data' => $scheme_female],
      ['name' => 'Male', 'data' => $scheme_male],

    ];
    return view('state_wise_athletes', ['scheme_category' => json_encode($scheme_category), 'scheme_data_json' => json_encode($scheme_data_json), 'scheme_data' => $scheme_state_wise, 'state_name' => $state_name]);
  }

  public function verticalWiseExpanditureDetails($parent_id, $total)
  {
    $main_vertical = DB::table('vertical_master')->find(decode5t($parent_id));
    //dd();
    $sqlQuery = "SELECT name,(SELECT SUM(amount)/100   FROM expenditure WHERE expenditure.vertical_id = vertical_master.id) as y FROM vertical_master where parent_id =" . decode5t($parent_id) . "";
    $vertical = DB::select(DB::raw($sqlQuery));

    return view('vertical_wise_expenditure', ['vertical' => json_encode($vertical), 'main_vertical' => $main_vertical, 'total' => decode5t($total)]);
  }


  public function financial_year_fit_india()
  {
    $sqlQuery = "SELECT id,event,fy_year,SUM(event_participation_amt) as event_participation_amt,SUM(social_media) as social_media FROM `fit_india_event_data` GROUP by fy_year;";
    $fy_data = DB::select(DB::raw($sqlQuery));
    $fy_year = [];
    $amt = [];

    foreach ($fy_data as $key => $value) {
      $fy_year[] = $value->fy_year;
      $amt[] = $value->event_participation_amt * 100;
    }

    return view('fy_fit_india', ['fy_data' => $fy_data, 'fy_year' => json_encode($fy_year), 'amt' => json_encode($amt)]);
  }

  public  function fit_india_year_wise($year = null)
  {
    $sqlQuery = "SELECT event,event_participation_amt FROM `fit_india_event_data` WHERE fy_year = '$year' AND event_participation_amt!=0 GROUP by event";
    $fy_data = DB::select(DB::raw($sqlQuery));
    return view('fit_india_year_wise', ['fy_data' => $fy_data, 'year' => $year, 'grap_fy_data' => json_encode($fy_data)]);
  }

  public function fit_india_school_details()
  {
    $sqlquery = "SELECT school_name,state_id,
(SELECT states_master.state_name FROM states_master WHERE states_master.id = fit_india_school_details.state_id) as state_name FROM fit_india_school_details ORDER BY fit_india_school_details.state_id";
    $sqlQuery = "SELECT sum(school_name) as total FROM `fit_india_school_details`";
    $fit_india_school_details = DB::select(DB::raw($sqlQuery));
    $map_data = DB::select(DB::raw($sqlquery));

    return view('fit_india_school_details', ['map_data' => json_encode($map_data), 'total' => $fit_india_school_details[0]->total, 'data' =>  $map_data]);
  }

  public function participation_khelo_india_games($id)
  {

    $category = decode5t($id);

    // $sql = "SELECT asc_participations.boys_2018 as boys_2018,asc_participations.girls_2018,asc_participations.total_participants_2018 ,asc_participations.boys_2019 ,asc_participations.girls_2019 ,asc_participations.total_participants_2019,asc_participations.boys_2020 ,asc_participations.girls_2020,asc_participations.total_participants_2020,asc_participations.boys_2021 ,asc_participations.girls_2021,asc_participations.total_participants_2021,(SELECT states_master.state_name FROM states_master WHERE asc_participations.state_id = states_master.id) as state_name FROM `asc_participations` GROUP BY asc_participations.state_id";
    // $map_data = DB::select(DB::raw($sql));
    // $participation = "SELECT SUM(total_participants_2018 + total_participants_2019 + total_participants_2020 + total_participants_2021) as total FROM `asc_participations`";
    // $participation_data = DB::select(DB::raw($participation));
    $sql = "SELECT sum(no_of_athletes) as 'no_of_athletes',sum(no_of_boys) as 'no_of_boys',sum(no_of_girls) as 'no_of_girls' FROM `participate_yg_ug` where event_edition = '" . $category . "';";
    $total_c = DB::select(DB::raw($sql));
    $sql = "SELECT state,sum(no_of_athletes) as 'no_of_athletes',sum(no_of_boys) as 'no_of_boys',sum(no_of_girls) as 'no_of_girls' FROM `participate_yg_ug` where event_edition = 'KI" . $category . "' group by (state) order by state;";
    $data = DB::select(DB::raw($sql));

    return view('participation_khelo_india_games', ['data' => $data, 'total' => $total_c[0]->no_of_athletes, 'category' => $category]);
  }
  public function participationKIGDashboard()
  {




    // $participation = "SELECT SUM(total_participants_2018 + total_participants_2019 + total_participants_2020 + total_participants_2021 ) as total FROM `asc_participations`";
    // $participation_data = DB::select(DB::raw($participation));
    $participation = "SELECT sum(no_of_athletes) as 'no_of_athletes',sum(no_of_boys) as 'no_of_boys',sum(no_of_girls) as 'no_of_girls' FROM `participate_yg_ug` where event_edition = 'KIYG';";
    $yg_participation_data = DB::select(DB::raw($participation));
    $participation = "SELECT sum(no_of_athletes) as 'no_of_athletes',sum(no_of_boys) as 'no_of_boys',sum(no_of_girls) as 'no_of_girls' FROM `participate_yg_ug` where event_edition = 'KIUG';";
    $ug_participation_data = DB::select(DB::raw($participation));
    return view('participation_kig_dashboard', ['yg_participation_data' => $yg_participation_data[0]->no_of_athletes, 'ug_participation_data' => $ug_participation_data[0]->no_of_athletes]);
  }

  public function play_field()
  {
    try {
      $playfield_data =   Http::get("http://192.168.20.212:8080/infra_dashboard/api/playfield");
      $play_filed = $playfield_data->collect();
      $discipline_name = [];
      $discipline_wise_count = [];
      foreach ($play_filed['discipline_wise_playfield'] as $key => $value) {
        $discipline_name[] = $value['discipline_name'];
        $discipline_wise_count[] = $value['total'];
      }
      return view('play_filed', ['data' => $play_filed, 'data' => $play_filed['play_fields'], 'discipline_name' => json_encode($discipline_name), 'discipline_wise_count' => json_encode($discipline_wise_count), 'map_data' => json_encode($play_filed['play_fields']), 'total_play_filed' => $play_filed['total_play_filed']]);
    } catch (\Exception $th) {
      return view('server_error');
    }
  }

  public function SportInfraStateWise()
  {
    $data = InfraSanc::with(['state'])->get();
    //dd($data);
    return view('sport_infra_amt', ['data' => $data]);
  }
  public function pffscoChild()
  {
    $board_wise_distribution = Pfscg::with('state:id,state_name')->select('id', 'state_id', 'board_cbse', 'board_cisce', 'board_state_board', 'board_others', 'board_total')->get()->toArray();
    $age_wise_distribution = Pfscg::with('state:id,state_name')->select('id', 'state_id', 'five_to_nine_age', 'ten_to_fiften_age', 'fiften_to_eighteen', 'age_wise_total')->get();
    $training_development = Pfscg::with('state:id,state_name')->select('id', 'state_id', 'master_tranier_pet', 'regional_trainers', 'principlas', 'training_devlopment_total')->get();
    return view('pfscg', ['map_data' => json_encode($board_wise_distribution), 'age_wise_distribution' => $age_wise_distribution, 'training_development' => $training_development]);
  }


  public function expenditureStateWise($state_id)
  {
    $infra = InfraSanc::with(['state'])->where('state_id', decode5t($state_id))->get();
    $kiaa = KiaaDetails::with('state')->where('state_id', decode5t($state_id))->get();
    $kic = KicDetails::with('state')->where('state_id', decode5t($state_id))->get();
    $kisce = KisceDetails::with('state')->where('state_id', decode5t($state_id))->get();
    $state_details = State::find(decode5t($state_id));
    //dd($kiaa);
    return view('expenditure_state_wise', [
      'infra' => $infra,
      'kiaa' => $kiaa,
      'kic' => $kic,
      'kisce' => $kisce,
      'state_details' => $state_details,
    ]);
  }

  public function communityCoaching()
  {
    return view('community_coaching');
  }
  public function supportToNationa()
  {
    return view('support_to_nationa');
  }
  public function sportForPeace()
  {
    return view('sport_for_peace');
  }
  public function promotionOfSportsAmong()
  {
    return view('promotionOfSportsAmong');
  }
}
