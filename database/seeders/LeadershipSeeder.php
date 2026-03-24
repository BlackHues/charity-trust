<?php

namespace Database\Seeders;

use App\Models\LeadershipMember;
use Illuminate\Database\Seeder;

class LeadershipSeeder extends Seeder
{
    public function run(): void
    {
        if (LeadershipMember::query()->exists()) {
            return;
        }

        $rows = [
            ['name' => 'Mr. R. Manikandan', 'qualifications' => 'B.Com.', 'designation' => 'Founder & Managing Trustee', 'sort_order' => 1],
            ['name' => 'Mrs. Sri Sowmiya @ G. Kokila Suresh', 'qualifications' => 'M.A., D.El.Ed.', 'designation' => 'Secretary & Financial Trustee', 'sort_order' => 2],
            ['name' => 'Mr. V. Shivakumar', 'qualifications' => 'B.Sc.', 'designation' => 'Financial Management Trustee', 'sort_order' => 3],
            ['name' => 'Mr. K. Govindarasu', 'qualifications' => 'M.B.A.', 'designation' => 'Trustee', 'sort_order' => 4],
            ['name' => 'Mr. N. Duraisingam', 'qualifications' => 'B.A.', 'designation' => 'Trustee', 'sort_order' => 5],
            ['name' => 'Mr. K. Ranganathan @ Dr. Kasi Aranganathan', 'qualifications' => null, 'designation' => 'Trustee', 'sort_order' => 6],
        ];

        foreach ($rows as $row) {
            LeadershipMember::query()->create($row);
        }
    }
}
