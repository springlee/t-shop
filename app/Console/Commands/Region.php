<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Region extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'regions:jd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Region Data From JD';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Starting');

        $o_province = $this->addRegions(4744);

        $this->line('Provinces:' . count($o_province) . ' added');
file_put_contents('a_province.log', print_r($o_province, true));

        $o_city = [];
        foreach ($o_province as $id => $v) {
            $this->addRegions($id, $v['name'], 2, $v['p_id'], $o_city);
            usleep(500000);
        }
        $this->line('Cities:' . count($o_city) . ' added');
file_put_contents('a_city.log', print_r($o_city, true));
        $o_district = [];
        foreach ($o_city as $id => $v) {
            $this->addRegions($id, $v['name'], 3, $v['p_id'], $o_district);
            usleep(500000);
        }
        $this->line('Districts:' . count($o_district) . ' added');
file_put_contents('a_district.log', print_r($o_district, true));
        $o_street = [];
        foreach ($o_district as $id => $v) {
            $this->addRegions($id, $v['name'], 4, $v['p_id'], $o_street);
            usleep(500000);
        }
        $this->line('Streets:' . count($o_street) . ' added');
file_put_contents('a_street.log', print_r($o_street, true));

        return 'Done';
    }

    private function addRegions($id, $name = '', $depth = 1, $p_id = 0, &$data = [])
    {
        // 直辖市
        if ($depth === 2 && in_array($id, [1, 2, 3, 4])) {
            $new_id = \App\Model\Region::insertGetId([
                'p_id' => $p_id,
                'name' => $name . '市',
                'depth' => $depth,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $data[$id] = [
                'p_id' => $new_id,
                'name' => $name . '市',
                'id' => $id,
            ];
        } else {
            $url = 'https://d.jd.com/area/get?fid=' . $id;
            $tmp = json_decode(file_get_contents($url), true);
$this->warn('pull from ' . $url);
            foreach ($tmp as $v) {
                $data[$v['id']] = $v;

                $new_id = \App\Model\Region::insertGetId([
                    'p_id' => $p_id,
                    'name' => $v['name'],
                    'depth' => $depth,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
                $data[$v['id']]['p_id'] = $new_id;
            }
        }

        return $data;
    }
}
