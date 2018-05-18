<?php

namespace Tests\Feature;

use App\Project;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewProjectTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_can_view_project_index() {
        // Arrange
        $projects = factory(Project::class, 3)->make()->each(function($project, $i) {
            $project->title = 'An Amazing Project ' . $i;
            $project->save();
        });

        // Act
        $response = $this->get('/project/');

        // Assert
        $response->assertStatus(200);
        $response->assertSee('An Amazing Project 0');
        $response->assertSee('An Amazing Project 1');
        $response->assertSee('An Amazing Project 2');
    }

    /** @test */
    public function user_can_view_a_project() {
        // Arrange
        // Create a project
        $project = Project::create([
            'title' => 'The roadkill one',
            'subtitle' => 'it\'s a killer web app',
            'description' => 'it records roadkill, nationally.',
            'started_at' => Carbon::parse('December 8, 2017'),
            'finished_at' => Carbon::parse('December 30, 2017'),
            'href' => 'http://roadkill.app',
            'source' => 'http://github.com/manning390/notreally',
            'additional' => 'This is actually something I made.'
        ]);

        // Act
        // View the project
        $response = $this->get('/project/'.$project->id);

        // Assert
        // See the project details
        $response->assertStatus(200);
        $response->assertSee('The roadkill one');
        $response->assertSee(e('it\'s a killer web app'));
        $response->assertSee('it records roadkill, nationally.');
        $response->assertSee('December 8, 2017');
        $response->assertSee('December 30, 2017');
        $response->assertSee('http://roadkill.app');
        $response->assertSee('http://github.com/manning390/notreally');
        $response->assertSee('This is actually something I made.');
    }

    /** @test */
    public function is_accessible_via_named_route() {
        $project = factory(Project::class)->create();

        $response = $this->get(route('project.index'));
        $response->assertStatus(200);

        $response = $this->get(route('project.show', $project));
        $response->assertStatus(200);
    }
}
