<?php
use App\Models\BlogWithTags;
use App\Models\Module;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\State;
use App\Models\District;
use App\Models\OwnershipInfra;
function encode5t($str)
{
	  for($i=0; $i<5;$i++)
	  {
		$str=strrev(base64_encode($str)); //apply base64 first and then reverse the string
	  }
	  return $str;
}
function decode5t($str)
{
	  	for($i=0; $i<5;$i++)
  		{
    		$str=base64_decode(strrev($str));
  		}
	    return $str;
}

function visit_count()
{
    $ip = DB::table('visit')->where('ip',$_SERVER['REMOTE_ADDR'])->get()->toArray();

      if(count($ip) < 1){
        $dataArr = [
                 'ip' => $_SERVER['REMOTE_ADDR'],
             ];
             $insert = DB::table('visit')->insertGetId($dataArr);
      }
        $count = DB::table('visit')->get()->count();
        return $count;
}

function getTotalAtheletes(){
	$total_ath = DB::table('athelete_supported')->count();
	if($total_ath){
     return $total_ath;
	}
	return '';
}
