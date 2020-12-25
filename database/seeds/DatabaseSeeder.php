<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            RoleTableSeeder::class,
            PostTableSeeder::class,
            CourseTableSeeder::class,
            SummaryTableSeeder::class,
            EventTableSeeder::class,
            WwbatAreasTableSeeder::class,
            BigWordsAreasTableSeeder::class,
            ScheduleAreasTableSeeder::class,
            DoNowAreasTableSeeder::class,
            ExitTicketAreasTableSeeder::class,
            GuidedPracticeAreasTableSeeder::class,
            IndividualPracticeAreasTableSeeder::class,
        ]);
    }
}
