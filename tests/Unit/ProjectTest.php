<?php

namespace Tests\Unit;

use App\Project;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProjectTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function can_get_formatted_start() {
        // Arrange
        $project = factory(Project::class)->create([
            'started_at' => Carbon::parse('2017-12-01 7:00pm')
        ]);

        // Assert
        $this->assertEquals('December 1, 2017', $project->formatted_start);
    }

    /** @test */
    public function can_get_formatted_finish() {
        // Arrange
        $project = factory(Project::class)->create([
            'finished_at' => Carbon::parse('2017-12-02 5:00pm')
        ]);

        // Assert
        $this->assertEquals('December 2, 2017', $project->formatted_finish);
    }
}
