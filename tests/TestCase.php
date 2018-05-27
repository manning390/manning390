<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp() {
        parent::setUp();

        $test = $this;

        TestResponse::macro('followRedirects', function ($testCase = null) use ($test) {
            $response = $this;
            $testCase = $testCase ?: $test;

            while ($response->isRedirect()) {
                $response = $testCase->get($response->headers->get('Location'));
            }

            return $response;
        });

    }

    /**
     * I can never remember this so syntatic sugar/note.
     *
     * Runs Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling@withoutExceptionHandling()
     *
     * @param array $exceptions
     * @return $this
     */
    protected function disableExceptionHandling(array $exceptions = []) {
        return $this->withoutExceptionHandling($exceptions);
    }

    // Same as above
    protected function de(array $e = []) {
        return $this->withoutExceptionHandling($e);
    }

}
