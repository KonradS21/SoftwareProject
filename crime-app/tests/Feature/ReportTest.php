<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_create_report()
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('reports.store'), [
            'name' => 'Test Report',
            'date' => now()->toDateString(),
            'description' => 'Test description',
            'latitude' => 12.34,
            'longitude' => 56.78,
            'severity_scale' => 'low',
            'image' => UploadedFile::fake()->image('test.jpg'),
        ]);

        $response->assertRedirect(route('reports.index'));

        $this->assertDatabaseHas('reports', [
            'name' => 'Test Report',
            'user_id' => $user->id,
        ]);
    }

    /** @test */
    public function report_creation_fails_with_invalid_data()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('reports.store'), [
            'name' => '', // invalid
            'date' => 'not-a-date',
            'description' => '',
            'latitude' => 'abc',
            'longitude' => null,
            'severity_scale' => 'invalid',
        ]);

        $response->assertSessionHasErrors([
            'name',
            'date',
            'description',
            'latitude',
            'longitude',
            'severity_scale',
        ]);
    }

    /** @test */
    public function user_can_update_report()
    {
        $user = User::factory()->create();

        $report = Report::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->put(route('reports.update', $report), [
            'name' => 'Updated Name',
            'date' => now()->toDateString(),
            'description' => 'Updated description',
            'latitude' => 99.99,
            'longitude' => 88.88,
            'severity_scale' => 'high',
        ]);

        $response->assertRedirect(route('reports.index'));

        $this->assertDatabaseHas('reports', [
            'id' => $report->id,
            'name' => 'Updated Name',
            'severity_scale' => 'high',
        ]);
    }

    /** @test */
    public function user_can_delete_report()
    {
        $user = User::factory()->create();

        $report = Report::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->delete(route('reports.destroy', $report));

        $response->assertRedirect(route('reports.index'));

        $this->assertDatabaseMissing('reports', [
            'id' => $report->id,
        ]);
    }

    /** @test */
    public function user_can_view_reports_index()
    {
        $user = User::factory()->create();

        Report::factory()->count(3)->create();

        $response = $this->actingAs($user)->get(route('reports.index'));

        $response->assertStatus(200);
        $response->assertViewIs('reports.index');
    }

    /** @test */
    public function user_can_view_single_report()
    {
        $user = User::factory()->create();

        $report = Report::factory()->create();

        $response = $this->actingAs($user)->get(route('reports.show', $report));

        $response->assertStatus(200);
        $response->assertViewIs('reports.show');
        $response->assertViewHas('report', $report);
    }
}