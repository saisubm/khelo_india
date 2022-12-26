<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewAtheltesSupportController extends Controller
{
    public function GetFinancialAssitanceAthleteSummary(){
        try {
            $financial_response = Http::get('https://nsrsapi.kheloindia.gov.in/api/GetFinancialAssitanceAthleteSummary');
            $scheme_response  = Http::get('https://nsrsapi.kheloindia.gov.in/api/GetSchemeWiseAthleteSummary');
            
                    $financial = json_decode($financial_response->body());
                    $scheme = json_decode($scheme_response->body());
                   // dd($financial);
            if(isset($financial->financialAssistanceSummary)){
                $financial_category = [];
                $financial_male = [];
                $financial_female = [];
               
                    foreach($financial->financialAssistanceSummary as $key => $value){
                       
                        $financial_male[] =  $value->Mcount;
                        $financial_female[] =  $value->Fcount;
                        $financial_category[$key] = $value->scholarship_type;
                     }
                
                
                $financial_data_json = [
                    ['name' => 'Female','data' =>$financial_female ],
                    ['name' => 'Male','data' =>$financial_male ],
                    
                ];
            }else{
                $financial_category = [];
                $financial_data_json = [];

            }
            
            if(isset($scheme->schemeSummary)){
                    $scheme_category = [];
                    $scheme_male = [];
                    $scheme_female = [];
                   foreach($scheme->schemeSummary as $key => $value){
                            $scheme_male[] =  $value->Mcount;
                            $scheme_female[] =  $value->Fcount;
                            $scheme_category[$key] = $value->SchemeName;
                         }
                   $scheme_data_json = [
                        ['name' => 'Female','data' =>$scheme_female ],
                        ['name' => 'Male','data' =>$scheme_male ],
                        
                    ];
            }else{
                $scheme_category = [];
                $scheme_data_json = [];
            }
            return view('athletesSupport.athletes_support',['financial_data' => $financial,
                                                         'scheme_data' => $scheme,
                                                         'financial_category' => json_encode($financial_category),
                                                         'financial_data_json' =>json_encode($financial_data_json),
                                                         'scheme_data_json' =>json_encode($scheme_data_json),
                                                         'scheme_category' =>json_encode($scheme_category),
                                                         ]);
            
        } catch (\Exception $th) {
           abort(503);
        }
     }
}
