<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'title' => 'Example title',
        'subtitle' => 'example subtitle',
        'description' => 'example description',
        'started_at' => Carbon::parse('-2 weeks'),
        'finished_at' => Carbon::parse('+2 weeks'),
        'href' => 'http://example.app',
        'source' => 'http://github.com/example/example',
        'additional' => 'example additional'
    ];

});
