<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewAtheltesSupportController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'App\Http\Controllers\AtheltesSupportController@index')->name('annual.save');

Route::get('athletes', 'App\Http\Controllers\AtheltesSupportController@athelete_support');
Route::get('athletes/state-wise/{state_id}/{state_name}', 'App\Http\Controllers\AtheltesSupportController@athelete_supportStateWise');
Route::get('overview', 'App\Http\Controllers\AtheltesSupportController@overview');
Route::get('expenditure', 'App\Http\Controllers\AtheltesSupportController@spending');
Route::get('dashboard-state/{id}', 'App\Http\Controllers\AtheltesSupportController@dashboard_state');
Route::get('vertical', 'App\Http\Controllers\AtheltesSupportController@vertical');
Route::get('vertical-wise-expenditure-details/{parent_id}/{total}', 'App\Http\Controllers\AtheltesSupportController@verticalWiseExpanditureDetails');
Route::get('annual-sport', 'App\Http\Controllers\AtheltesSupportController@anual_sport');
Route::post('getCenterNameDistrictWise', 'App\Http\Controllers\AtheltesSupportController@getCenterNameDistrictWise');
Route::get('annual-sport/{category}', 'App\Http\Controllers\AnnualSportsCompetetionController@getCategoryDetails');
Route::get('coaches-support-staff', 'App\Http\Controllers\AtheltesSupportController@coaches_support_staff');
Route::get('athlete-details-year-wise/{category}/{year}', 'App\Http\Controllers\AnnualSportsCompetetionController@athleteDetailsYearWise');
Route::get('winners-year-wise/{category}/{year}', 'App\Http\Controllers\AnnualSportsCompetetionController@getWinnerYearWise');
Route::get('expenditure-year-wise/{category}/{year}', 'App\Http\Controllers\AnnualSportsCompetetionController@getExpenditureYearWise');
Route::get('community-coaches', 'App\Http\Controllers\AtheltesSupportController@community_coaches');
Route::get('academic_support', 'App\Http\Controllers\AtheltesSupportController@academic_support');


Route::get('get-seb-vertical/{id}', 'App\Http\Controllers\AtheltesSupportController@getSubVertical');

Route::get('financial-year-fit-india', 'App\Http\Controllers\AtheltesSupportController@financial_year_fit_india');
Route::get('fit-india-year-wise/{year}', 'App\Http\Controllers\AtheltesSupportController@fit_india_year_wise');
Route::get('state-wise-academic-support/{state_name}/{state_id}', 'App\Http\Controllers\AtheltesSupportController@academic_supportStateWise');

Route::get('fit-india-school-details', 'App\Http\Controllers\AtheltesSupportController@fit_india_school_details');
Route::get('participation-khelo-india-games-dasboard', 'App\Http\Controllers\AtheltesSupportController@participationKIGDashboard');
Route::get('participation-khelo-india-games/{id}', 'App\Http\Controllers\AtheltesSupportController@participation_khelo_india_games');
Route::get('sports-infr-state-wise-expenditure', 'App\Http\Controllers\AtheltesSupportController@SportInfraStateWise');
Route::get('physical-fitness-fo-school-onging-children', 'App\Http\Controllers\AtheltesSupportController@pffscoChild');
Route::get('talent-search-development', 'App\Http\Controllers\AtheltesSupportController@talentSearchDevelopment');
Route::get('play-field', 'App\Http\Controllers\AtheltesSupportController@play_field');
Route::get('expenditure/state-wise/{state_id}', 'App\Http\Controllers\AtheltesSupportController@expenditureStateWise');


Route::get('athletes-supported',[NewAtheltesSupportController::class,'GetFinancialAssitanceAthleteSummary'])->name('GetFinancialAssitanceAthleteSummary');
Route::get('add-csv-files','App\Http\Controllers\CsvController@create');
Route::post('save-csv','App\Http\Controllers\CsvController@save');
Route::post('login','App\Http\Controllers\LoginController@login')->name('user.login');
Route::post('forget-password','App\Http\Controllers\ForgotPasswordController@submitForgetPasswordForm')->name('user.forget.password');
Route::get('reset-password/{token}/{email}', 'App\Http\Controllers\ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'App\Http\Controllers\ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');
Route::group(['middleware' => ['auth']],function(){
    Route::post('logout','App\Http\Controllers\LoginController@logout')->name('user.logout');
    Route::get('attendance','App\Http\Controllers\AuthController\AttendanceController@getAcademies')->name('user.attendance');
    Route::get('academic_details/{role_id}/{scheme_name}', 'App\Http\Controllers\AuthController\AttendanceController@academic_details');
    Route::post('attendance_summary_report', 'App\Http\Controllers\AuthController\AttendanceController@attendance_summary_report');
    Route::get('dashboard','App\Http\Controllers\AuthController\DashboardController@dashboard')->middleware('role_check')->name('admin.dashboard');
    Route::get('dashboard/index/{id?}', 'App\Http\Controllers\AuthController\DashboardController@index');

});



// Route::view('khelo-india-centers-dashboard', 'khelo_india_centers_dashboard');
Route::view('champion-atheletes', 'champion_athelete');


//Route::get('state_level_khelo_india_centers', 'App\Http\Controllers\KicCenterController@stateLevelKheloIndiaCenters')->name('state-level-khelo-india-centers');

Route::get('khelo-india-center-dashboard','App\Http\Controllers\KicCenterController@index');
Route::get('state-wise-khelo-india-centers','App\Http\Controllers\KicCenterController@stateWiseKic');
Route::get('district-wise-khelo-india-centers/{id}', 'App\Http\Controllers\KicCenterController@districtWiseKheloIndiaCenters');

Route::get('promotion-of-rural-and-indigenous-or-tribal-games', 'App\Http\Controllers\PromotionSportsController@promotionIndigenousgGames');
Route::get('promotion-of-rural-and-indigenous-or-tribal-games/{dis}', 'App\Http\Controllers\PromotionSportsController@promotionIndigenousgGamesDiscipline');
Route::get('sports-for-peace-and-development', 'App\Http\Controllers\PromotionSportsController@SportsForPeaceAndDevelopment');
Route::get('promotion-of-sports-among-persons-with-disabilities', 'App\Http\Controllers\PromotionSportsController@promotionOfSportsAmongPersonsWithDisabilities');


Route::get('state-wise-kisce','App\Http\Controllers\KicCenterController@stateWiseKisec');
Route::get('kisce-details/{id}','App\Http\Controllers\KicCenterController@kisecDetails');
//Route::get('kisce-finance','App\Http\Controllers\KicCenterController@kisecFinance');



Route::get('kisce-finance','App\Http\Controllers\KicCenterController@kisecFinance');
Route::get('kic-finance','App\Http\Controllers\KicCenterController@kicFinance');
Route::get('community-coaching','App\Http\Controllers\AtheltesSupportController@communityCoaching');
Route::get('support-to-national','App\Http\Controllers\AtheltesSupportController@supportToNationa');
Route::get('sport-for-peace-and-devlopment','App\Http\Controllers\AtheltesSupportController@sportForPeace');
Route::get('promotion-of-sports-among-persons-with-disabilities','App\Http\Controllers\AtheltesSupportController@promotionOfSportsAmong');

Route::get('sports-for-women','App\Http\Controllers\KicCenterController@sportForWomen');
Route::get('sports-for-women-discipline-wise','App\Http\Controllers\KicCenterController@sportForWomenDisciplineWise');
Route::get('sports-for-women-discipline-wise-athletes','App\Http\Controllers\KicCenterController@sportForWomenDisciplineWiseAthlete');
Route::get('sports-for-women-discipline-wise-prize-money','App\Http\Controllers\KicCenterController@sportForWomenDisciplineWisePrize');
Route::get('sports-for-women-discipline-wise-technical-official','App\Http\Controllers\KicCenterController@sportForWomenDisciplineWiseTechOff');
Route::get('sports-for-women-discipline-wise-identified-talents','App\Http\Controllers\KicCenterController@sportForWomenDisciplineWiseIdentifiedTalent');
Route::get('sports-for-women-discipline-wise-beneficiaries','App\Http\Controllers\KicCenterController@sportForWomenDisciplineWiseBeneficiaries');
Route::get('absc-details','App\Http\Controllers\KicCenterController@abscDetails');
Route::get('absc-finance','App\Http\Controllers\KicCenterController@abscFinance');
Route::view('ss-details','sport_school.details');
Route::view('ss-finance','sport_school.finance');
Route::view('women-national-records','women.women_national_records');

