<?php

class DatabaseSeeder extends Seeder {

    /**
     * The order of these seeders is important.
     * A sport must be seeded before the player seeder can be called
     */
    public function run()
    {
        $this->call('SkillTableSeeder');
        $this->call('SportTableSeeder');
        $this->call('PlayerTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('RatingsTableSeeder');
        $this->call('RatingsProfileTableSeeder');
        $this->call('ProfileSkillTableSeeder');
        $this->call('PlayerEnglishPremierLeagueSeeder');
        // for when moved player populater into a seeder...
        // $this->call('englishPremierLeagueSeeder');
    }

}