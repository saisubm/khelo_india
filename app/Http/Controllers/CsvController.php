<?php

namespace App\Http\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use IOFactory;
use DB;
use Session;
use Hash;
use Auth;
use App\Models\MedalUg;
use App\Models\AthleteRecord;
use App\Models\AscParticipations;
use App\Models\AscPart;
use App\Models\Academy;
class CsvController extends Controller
{


        public function manageimages(Request $request)
        {
            $permision = DB::table('permision')->where('user_id',auth()->user()->id)->where('module_id', 11)->first();
            $image_list=Images::orderBy('id','desc')->get();
            return view('admin.media.manageimages',['list'=>$image_list,'permision'=>$permision]);
        }
        public function create(Request $request)
        {

            return view('csv.create');

        }
        public function save(Request $request)
        {

                //session_start();
                //require_once 'vendor/autoload.php';
                //$conn = mysqli_connect("localhost","root","","h_php");



       if (isset($_POST['submit'])) {

        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $fileName=$_FILES['file']['name'];
        $checking = explode('.', $fileName);
        $extension = end($checking);
        if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes))
        {

            $targetPath = $_FILES['file']['tmp_name'];
    /*         if('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } */
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            //$userdata=User::where('id',auth()->user()->id)->first();

            // $user_data=[
            //     'name'=>$request->name,
            //     'email'=>$request->email,
            //     'password'=>Hash::make($request->password),
            //     'role'=>'Registar',
            //     ];

          $isheader = 0;
          if (!empty($sheetData)) {
                foreach ($sheetData as $data)
                {
                    if($isheader)
                    {
                        $state = DB::table('states_master')->where('state_name',trim($data[0]))->first();
                        if($state){

                            $state_id = $state->id;
                        }
                        
                        else{

                            $state_id = $data[0];
                        }
                        // $pass="12345678";

                        // $password = Hash::make($pass);
                        // $user_data=[
                        //         'name'=>$data[1],
                        //         'password'=>Hash::make($password),
                        //         'role'=>'Registar',
                        //         ];

                        //     $result=User::create($user_data);

                        //     $user_id = $result->id;

                            //$id = $data[0];
                           // echo $id;
                            //$name = $data[1];
                            //$website = $data[2];
                            // $registar_data = RegistarRegistration::where('id',$id)->get()->toArray();

                            // if(count($registar_data)>0)
                            // {

                            // 	$update_registar=RegistarRegistration::where('id',$id)->update([
                            //         'name' => $name,'website' => $website,'user_id'=>$userdata->id,'email'=>$userdata->email,'password'=>$userdata->password
                            //      ]);
                            // 	$msg=1;
                            // }
                            // else
                            // {
             // $TOTAL = array_sum([$data[4],$data[5],$data[6]]);
                                //foreach($user_id as $user){
                                //     $insert_registar= MedalUg::create([
                                //     'rank'=>$data[0],
                                //     'university_name'=>$data[1],
                                //     'state_id'=>isset($state_id) ? $state_id : trim($data[2]),
                                //     'gold'=>$data[5],
                                //     'silver'=>$data[6],
                                //     'bronze'=>$data[7],
                                //     'total'=>$data[8],
                                //     'event_name'=>$data[3],
                                //     'year'=>$data[4],
                                //   ],




                                // );
$total = $data[4]*1 + $data[5]*1 + $data[6]*1 ; 
                                    $insert_registar= AscPart::create([
                                    'rank'=>$data[3],
                                    'state_id'=>$state_id,
                                    'gold'=>$data[4],
                                    'silver'=>$data[5],
                                    'bronze'=>$data[6],
                                    'total'=>$total,
                                    'event_name'=>$data[1],
                                    'year'=>2021,
                                 ],




                                );
                               // }



                                $msg=1;
                            //}
                    }

                    else
                    {
                        $isheader = 1;
                    }


                }
                die;
                if(isset($msg))
                {
                    Session::flash('message', 'File uploaded successfully.');
                     return redirect('secure-admin/add-csv-files');

                }
                else
                {
                    Session::flash('message', 'File fail to upload.');
                    return redirect('secure-admin/add-csv-files');
                }
            }

        }
         else
        {
            Session::flash('message', 'Invalid file.');
            return redirect('secure-admin/add-csv-files');

        }
    }
        }

        public function editimages(Request $request)
        {
             $images_edit=Images::where('id',decode5t($request->id))->first();
            return view('admin.media.edit_images',['images_edit'=>$images_edit]);
        }
        public function updateimages(Request $request)
        {

                    $images_edit=Images::where('id',decode5t($request->id))->first();
                    $validator = Validator::make($request->all(),[
                        'title' => 'required',
                        'images' => 'mimes:jpg,jpeg,png',
                    ]);
                    if ($validator->fails())
                    {
                        $errors=$validator->errors();
                        return back()->withErrors($errors);
                    }
                    else
                    {


                            if ($file = $request->file('images'))
                             {
                                $destinationPath = 'public/uploads/images/';
                                $image = date('YmdHis') . "." . $file->getClientOriginalExtension();
                                $file->move($destinationPath, $image);
                                $data = $image;
                            }

                            else
                            {
                                $data=$request->updated_images;
                            }
                        $images_arr=[
                            'title'=>trim($request->title),
                            'filename'=>$data,
                            'status'=>$images_edit->status,
                            'updated_by'=>auth()->user()->id,
                            'ip_address'=>getenv('REMOTE_ADDR'),
                        ];
                       $result=Images::where('id',decode5t($request->id))->update($images_arr);
                        if($result){
                            Session::flash('message', 'Image updated successfully.');
                            return redirect('secure-admin/manageimages');
                        }
                        else {
                            Session::flash('message', 'We are facing some issues. Please try again later.');
                            return redirect('secure-admin/manageimages');
                        }

                    }
        }

        public function deleteimages(Request $request)
        {

                $table = $request->table;
                $id = $request->id;
                $data = DB::table($table)->where('id',decode5t($request->id))->delete();
                if($data){
                    Session::flash('message', 'Record deleted sucessfully');
                    return response()->json(['success'=>true,'message'=>' Record deleted sucessfully.']);
                }else{
                    Session::flash('message', 'Something went wrong.please try again.');
                  return response()->json(['success'=>false,'message'=>'Something went wrong.please try again.']);
                }

        }


    }
