<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AttendanceController extends Controller
{
    public function getAcademies()
    {
        try {
            $academies = Http::get('http://nsrsapi.kheloindia.gov.in/api/GetSchemeWiseAcademySummary')->collect();
            //dd($academies['schemeAcademySummary']);
            return view('auth.academies_attendance', ['data' => $academies['schemeAcademySummary']]);
        } catch (\Exception $ex) {
            return view('server_error');
        }
    }


    public function academic_details($role_id, $scheme_name)
    {
        try {
            $response = Http::post('https://nsrsapi.kheloindia.gov.in/api/NSRS/Academydetails', [
                'role_detail_id' => decode5t($role_id),
            ]);
            $data = $response->collect()['data'];

            return view('academy_details', ['data' => $data, 'scheme_name' => $scheme_name, 'role_id' => decode5t($role_id)]);
        } catch (\Exception $ex) {
            return view('server_error');
        }
    }
    public function attendance_summary_report(Request $request)
    {

        try {
            $response = Http::post('https://nsrsapi.kheloindia.gov.in/api/NSRS/Attendance_Summary_report', [
                'Sports_training_centre' => $request->Sports_training_centre,
                'entity' => $request->entity,
                'Type' => $request->Type,
                'date' => $request->date,
                'IsKIA' => ($request->Type == 6) ? 'yes' : $request->IsKIA,
            ]);
            if (!empty($response->collect()['data'])) {
                $data = $response->collect()['data']['Table'][0];
                return response()->json(['success' => true, 'data' => $data]);
            } else {
                return response()->json(['success' => false, 'message' => 'data not found']);
            }
        } catch (\Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }
}
