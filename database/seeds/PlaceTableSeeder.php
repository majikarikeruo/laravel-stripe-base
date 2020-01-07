<?php

use Illuminate\Database\Seeder;

class PlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $places = [
            [
                "name"=>"eye candy 秋葉原スタジオ",
                "url"=>"http://eyecandypole.com/access/",
                "access"=>"秋葉原駅、御茶ノ水駅より徒歩５分以内",
            ],
            [
                "name"=>"スタジオALOHA",
                "url"=>"https://www.instabase.jp/space/2379099478?catalog=true",
                "access"=>"御徒町駅より徒歩３分、仲御徒町駅より徒歩１分",
            ],
        ];

        foreach($places as $place){
            DB::table('places')->insert($place);
        }
    }
}
