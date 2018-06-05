<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home');
        // $country = \App\Model\Region::create([
        //     'name' => '中国',
        //     'short' => 'PRC',
        //     'depth' => 1,
        // ]);
        // $country_id = $country->id;

        $province = '北京|1|72|1,上海|2|78|1,天津|3|51035|1,重庆|4|113|1,河北|5|142,山西|6|303,河南|7|412,辽宁|8|560,吉林|9|639,黑龙江|10|698,内蒙古|11|799,江苏|12|904,山东|13|1000,安徽|14|1116,浙江|15|1158,福建|16|1303,湖北|17|1381,湖南|18|1482,广东|19|1601,广西|20|1715,江西|21|1827,四川|22|1930,海南|23|2121,贵州|24|2144,云南|25|2235,西藏|26|2951,陕西|27|2376,甘肃|28|2487,青海|29|2580,宁夏|30|2628,新疆|31|2652,港澳|52993|52994,台湾|32|2768,钓鱼岛|84|84';

        // https://d.jd.com/area/get?fid=1159

        $provinces = explode(',', $province);
        foreach ($provinces as $province) {
            $tmp = explode('|', $province);
            $name = $tmp[0];
            $id = $tmp[1];
            $depth = 1;
        }
    }
}
