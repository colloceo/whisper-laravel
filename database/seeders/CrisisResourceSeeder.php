<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrisisResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resources = [
            [
                'name' => 'Basic Needs Kenya',
                'url' => 'https://basicneeds.org/kenya', // Placeholder URL
                'type' => 'organization',
                'is_active' => true,
            ],
            [
                'name' => 'Mental Health Kenya',
                'url' => 'https://mentalhealth.go.ke', // Placeholder URL
                'type' => 'organization',
                'is_active' => true,
            ],
            [
                'name' => 'WHO Mental Health',
                'url' => 'https://www.who.int/health-topics/mental-health',
                'type' => 'website',
                'is_active' => true,
            ],
            // Pre-existing from hardcoded HTML
            [
                'name' => 'Befrienders Kenya',
                'phone' => '+254722178177',
                'type' => 'hotline',
                'is_active' => true,
            ],
            [
                'name' => 'Child Helpline Kenya',
                'phone' => '116',
                'type' => 'hotline',
                'is_active' => true,
            ],
            [
                'name' => 'Gender Violence Recovery Centre',
                'phone' => '1195',
                'type' => 'hotline',
                'is_active' => true,
            ],
        ];

        foreach ($resources as $resource) {
            \App\Models\CrisisResource::firstOrCreate(['name' => $resource['name']], $resource);
        }
    }
}
