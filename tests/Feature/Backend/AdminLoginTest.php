<?php

namespace Tests\Feature\Backend;

use App\User;
use Tests\TestCase;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminLoginTest extends TestCase {

    use DatabaseMigrations, DatabaseTransactions;

    /** @test */
    public function admin_can_see_login_form() {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /** @test */
    public function logging_in_with_valid_credentials() {
        // Arrange
        $user = factory(User::class)->create([
            'email' => 'jane@example.com',
            'password' => bcrypt('super-secret-password')
        ]);

        // Act
        $response = $this->post('/login', [
            'email' => 'jane@example.com',
            'password' => 'super-secret-password'
        ]);

        // Assert
        $response->assertStatus(302);
        $response->assertRedirect('/admin');
        $this->assertTrue(Auth::check());
        $this->assertTrue(Auth::user()->is($user));

    }

    /** @test */
    public function logging_in_with_invalid_credentials() {
        // Arrange
        $user = factory(User::class)->create([
            'email' => 'jane@example.com',
            'password' => bcrypt('super-secret-password')
        ]);

        // Act
        $response = $this->post('/login', [
            'email' => 'jane@example.com',
            'password' => 'super-wrong-password'
        ]);

        // Assert
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors(['email' => trans('auth.failed')]);
        $this->assertFalse(Auth::check());
    }

    /** @test */
    public function logging_in_with_an_account_that_does_not_exist() {
        // Act
        $response = $this->post('/login', [
            'email' => 'nope@example.com',
            'password' => 'super-wrong-password'
        ]);

        // Assert
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors(['email' => 'These credentials do not match our records.']);
        $this->assertFalse(Auth::check());
    }

    /** @test */
    public function logging_in_with_invalid_email_field() {
        //Act
        $response= $this->post('/login', [
            'email' => '',
            'password' => 'super-wrong-password'
        ]);

        // Assert
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors(['email' => 'The email field is required.']);
        $this->assertFalse(Auth::check());
    }

    /** @test */
    public function logging_in_with_invalid_password_field() {
        //Act
        $response = $this->post('/login', [
            'email' => 'nope@example.com',
            'password' => ''
        ]);

        // Assert
        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('password');
        $this->assertFalse(Auth::check());
    }

    /** @test */
    public function login_throttle_increments_on_failure() {
        $this->markTestSkipped('Need to use facade mock functions to ensure cache is hit with key from limiter.');
        Cache::shouldReceive('get')
            ->once()
            ->with('key')
            ->andReturn('value');
    }

    /** @test */
    public function login_throttles_user_after_exceeding_failure_limit() {
        // Turn off exception handling so we don't redirect
        $this->withoutExceptionHandling();

        // Run 5 login attempts to trigger throttle
        for($i = 0; $i < 5; $i++) {
            // Expect validation exception
            try {
                $this->post('/login', [
                    'email' => 'jane@example.com',
                    'password' => 'super-wrong-password'
                   ]);
            } catch (\Exception $e) {
                // This is an exception on invalid credentials
                $this->assertEquals(422, $e->status);
            }
        }

        // Expect validation exception but for throttle
        try {
            $this->post('/login', [
                'email' => 'jane@example.com',
                'password' => 'super-wrong-password'
               ]);
        } catch (\Exception $e) {
            // This is an exception on login throttle
            $this->assertEquals(429, $e->status);
        }
    }

    /** @test */
    public function login_throttle_clears_on_success() {
        $this->markTestSkipped('Needs to be added after finishing login_throttle_increments_on_failure().');
    }

    /** @test */
    public function logging_out_as_authenticated_user() {
        // Arrange
        $user = factory(User::class)->create();

        // Act
        $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->post('/logout');

        // Assert
        $response->assertStatus(302);
        $this->assertFalse(Auth::check());
        $response->assertSessionMissing('foo');
    }
}