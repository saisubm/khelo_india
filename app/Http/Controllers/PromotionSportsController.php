<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PromotionSportsController extends Controller
{
    public function promotionIndigenousgGames(){

        $sqlQuery = "SELECT  discipline,sum(no_of_athletes_scholarship) as 'athletes_total',sum(no_of_coaches) as 'coaches_total' FROM `pritg_point_officer` group by discipline;";
        $pidg_details = DB::select(DB::raw($sqlQuery));
        $sqlQuery = "SELECT discipline,sum(total_funds) as 'total' FROM `pritg_finance` group by discipline;";
        $pidg_funds = DB::select(DB::raw($sqlQuery));
        $sqlQuery = "SELECT state_code,discipline,status_point_officer,sum(no_of_athletes_scholarship) as 'no_of_athletes_scholarship',sum(no_of_coaches) as 'no_of_coaches' FROM `pritg_point_officer` group by state_code,discipline,status_point_officer;";
        $status_wise = DB::select(DB::raw($sqlQuery));

        return view('promot_games.promotionIndigenousgGames',['pidg_details' => json_encode($pidg_details),'pidg_funds' => json_encode($pidg_funds),'status_wise' => json_encode($status_wise)]);
    }
    public function SportsForPeaceAndDevelopment(){
        return view('promot_games.sportsForPeaceAndDevelopment');
    }
    public function promotionOfSportsAmongPersonsWithDisabilities(){
        return view('promot_games.sportsForPeaceAndDevelopment');
    }

    public function promotionIndigenousgGamesDiscipline($dis){
        $id = decode5t($dis);
        
        $sqlQuery = "SELECT * FROM `pritg_details` where discipline = '".$id."';";
        $discipline_wise = DB::select(DB::raw($sqlQuery));
       
       return view('promot_games.discipline_wise',['discipline_wise' => json_encode($discipline_wise),'discipline' =>$id ]); 
    }
}
