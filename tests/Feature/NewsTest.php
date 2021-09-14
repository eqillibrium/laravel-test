<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function is_response_successful ()
    {
        $response = $this->get('/news');
        $response->assertSuccessful();
    }

    public function test_a_feedback_view_can_be_rendered()
    {
        $view = $this->view('static/feedback');

        $view->assertSee('form');
    }

    public function test_a_news_view_has_success_status()
    {
        $response = $this->get('/admin/news');

        $response->assertLocation('http://example-app.test');
    }

    public function test_a_categories_has_ok_status()
    {
        $response = $this->get('/categories');

        $response->assertOk();
    }

}
