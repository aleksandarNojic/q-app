<?php

namespace App\Console\Commands;

use App\Services\Client;
use Faker\Factory as Faker;
use Exception;

use Illuminate\Console\Command;

class CreateAuthors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:authors {count=2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new author';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Client $client)
    {
        try {
            $response = $client->post('token', [
                'email' => config('admin.email'),
                'password' => config('admin.password')
            ]);

            if (isset($response->token_key)) {
                $faker = Faker::create();

                for ($i = 0; $i < $this->argument('count'); $i++) {
                    $gender = $faker->randomElement(['male', 'female']);

                    $client->createAuthors(
                        $response->token_key,
                        [
                            'first_name' => $faker->unique()->firstName($gender),
                            'last_name' => $faker->unique()->lastName($gender),
                            "birthday" => $faker->date('Y-m-d', '200-01-01'),
                            "biography" => $faker->text(),
                            'gender' => $gender,
                            "place_of_birth" => $faker->city()
                        ]
                    );
                }

                return $this->info("Successfuly created {$this->argument('count')} authors!");
            }

            return $this->error($response->title . " " . "STATUS:" . $response->status);
        } catch (Exception $e) {
            return  $this->error($e->getTraceAsString());
        }
    }
}
