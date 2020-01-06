<?php

use Illuminate\Database\Seeder;

class InterestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $interests = ["HTML","CSS","JavaScript","PHP"];
        foreach($interests as $item ){
            DB::table('interests')->insert(["name"=>$item]);
        }
    }
}
