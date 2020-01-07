<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $customers = [
            [
                "name"=>"小菅達矢",
                "email"=>"castero1219@gmail.com",
            ],
            [
                "name"=>"ちゅりちゃん",
                "email"=>"tatsuya@arrown-blog.com",
            ],
            [
                "name"=>"やそきち",
                "email"=>"castero1219@hotmail.com",
            ],
        ];

        foreach($customers as $customer){
            DB::table('customers')->insert($customer);
        }

    }
}
