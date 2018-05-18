<?php

use App\Post;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => 'Example Title',
        'body'  => 'example body',
        'published_at' => Carbon::parse('-3 weeks')
    ];
});

$factory->state(Post::class, 'unpublished', [
    'published_at' => Carbon::parse('+3 weeks')
]);
