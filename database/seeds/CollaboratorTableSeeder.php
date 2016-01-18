<?php

use Illuminate\Database\Seeder;
use \App\Collaborator;

class CollaboratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $tree = $this->getTreeArray($faker, 4, 5);

        Collaborator::buildTree($tree);

    }

    /**
     * get array for nested sets build
     *
     * @param $faker
     * @param $step - children count
     * @param $count - levels count
     * @return array
     */
    private function getTreeArray($faker, $step, $count){

        if($count < 1){

            return [];

        }else{

            if($count > 1){

                for($i = 0 ; $i < $step; $i++){

                    $result[] = [
                        'full_name' => $faker->name,
                        'post' => $faker->randomElement(['manager', 'developer', 'SEO', 'tester']),
                        'salary' => $faker->randomElement([1000, 1500, 2000, 2500, 3000]),
                        'create_at' => $faker->dateTimeThisMonth($max = 'now'),
                        'children' => $this->getTreeArray($faker, $step, $count - 1),
                    ];

                }

            }else{

                for($i = 0 ; $i < $step; $i++){

                    $result[] = [
                        'full_name' => $faker->name,
                        'post' => $faker->randomElement(['manager', 'developer', 'SEO', 'tester']),
                        'salary' => $faker->randomElement([1000, 1500, 2000, 2500, 3000]),
                        'create_at' => $faker->dateTimeThisMonth($max = 'now'),
                    ];

                }

            }

            return $result;
        }


    }
}
