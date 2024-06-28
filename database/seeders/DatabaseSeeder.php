<?php

namespace Database\Seeders;

use App\Http\Models\User;
use App\Http\Models\Admin;
use Illuminate\Database\Seeder;
use Database\Factories\CityFactory;
use Database\Factories\PostFactory;
use Database\Factories\RoleFactory;
use Database\Factories\UserFactory;
use Database\Factories\AdminFactory;
use Database\Factories\FollowFactory;
use Database\Factories\TravelFactory;
use Database\Factories\CompanyFactory;
use Database\Factories\CountryFactory;
use Database\Factories\FeatureFactory;
use Database\Factories\ProgramFactory;
use Database\Factories\Series_Factory;
use Database\Factories\StationFactory;
use Database\Factories\EmployeeFactory;
use Database\Factories\SubscribeFactory;
use Database\Factories\RecommandedFactory;
use Database\Factories\CompanyImagesFactory;
use Database\Factories\EmployeeTravelFactory;
use Database\Factories\Feature_travelFactory;
use Database\Factories\PullmanDescriptionFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
     {
    //     (new RoleFactory())->count(20)->create();
    //     (new CountryFactory())->count(1)->create();
    //     (new CityFactory())->count(5)->create();
    //     (new SubscribeFactory())->count(3)->create();
    //     (new CompanyFactory())->count(6)->create();
    //     (new PullmanDescriptionFactory())->count(2)->create();
    //     (new ProgramFactory())->count(10)->create();
    //     (new Series_Factory())->count(2)->create();
    //     (new StationFactory())->count(20)->create();
    //     (new TravelFactory())->count(300)->create();
    //     (new FeatureFactory())->count(5)->create();
    //     (new Feature_travelFactory())->count(900)->create();
    //     (new PostFactory())->count(70)->create();
    //     (new CompanyImagesFactory())->count(25)->create();
   // (new EmployeeFactory())->count(25)->create();

        // (new UserFactory())->count(25)->create();
        // (new RecommandedFactory())->count(5)->create();
        // (new FollowFactory())->count(3)->create();
        

         // (new AdminFactory())->count(5)->create();
         (new EmployeeTravelFactory())->count(5)->create();



        // Admin::factory()->count(5)->create();
        // User::factory()->create();
        // \App\Models\User::factory(10)->create();
    }
}
