<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Member;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = [
        [
            'name' => 'Laravel',
            'status'=> 'active',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'name' => 'Node JS',
            'status'=> 'active',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'name' => 'Python',
            'status'=> 'active',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'name' => 'Java',
            'status'=> 'active',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'name' => 'React',
            'status'=> 'active',
            'created_at' => now(),
            'updated_at' => now()
        ],
    ];
        Tag::insert($data);
    }
}
