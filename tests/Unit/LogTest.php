<?php

namespace Tests\Unit;

use Tests\TestCase;

class LogTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_api_log()
    {
        $response = $this->get(route('log.count'));

        $response->assertStatus(200);


    }

    public function test_api_count()
    {
        $response = $this->get(route('log.count'));

        $response->assertStatus(200);
        $response->assertJsonStructure(
        [
            'count',
        ]);


    }

    public function test_api_count_with_service_name()
    {

        $response = $this->get('api/logs/count?serviceNames=invoice-service');

        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                'count',
            ]);

    }

    public function test_api_count_with_code()
    {

        $response = $this->get('api/logs/count?statusCode=201');

        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                'count',
            ]);

    }

    public function test_api_count_with_date()
    {

        $response = $this->get('api/logs/count?startDate=[17/Sep/2022:10:21:53]&endDate=[17/Sep/2022:10:23:54]');

        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                'count',
            ]);
    }

    public function test_api_count_with_only_end_date()
    {

        $response = $this->get('api/logs/count?endDate=[17/Sep/2022:10:23:54]');

        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                'count',
            ]);
    }

    public function test_api_count_with_only_start_date()
    {

        $response = $this->get('api/logs/count?startDate=[17/Sep/2022:10:23:54]');

        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                'count',
            ]);
    }

    public function test_api_count_with_mix_value()
    {

        $response = $this->get('api/logs/count?serviceNames=invoice-service&statusCode=201&startDate=[17/Sep/2022:10:21:53]&endDate=[17/Sep/2022:10:23:54]');

        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                'count',
            ]);
    }
}
