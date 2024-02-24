<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ContactController
 */
final class ContactControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $contacts = Contact::factory()->count(3)->create();

        $response = $this->get(route('contact.index'));

        $response->assertOk();
        $response->assertViewIs('contact.index');
        $response->assertViewHas('contacts');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('contact.create'));

        $response->assertOk();
        $response->assertViewIs('contact.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ContactController::class,
            'store',
            \App\Http\Requests\ContactStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $first_name = $this->faker->firstName();
        $last_name = $this->faker->lastName();
        $email = $this->faker->safeEmail();
        $job_title = $this->faker->word();
        $city = $this->faker->city();
        $country = $this->faker->country();

        $response = $this->post(route('contact.store'), [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'job_title' => $job_title,
            'city' => $city,
            'country' => $country,
        ]);

        $contacts = Contact::query()
            ->where('first_name', $first_name)
            ->where('last_name', $last_name)
            ->where('email', $email)
            ->where('job_title', $job_title)
            ->where('city', $city)
            ->where('country', $country)
            ->get();
        $this->assertCount(1, $contacts);
        $contact = $contacts->first();

        $response->assertRedirect(route('contact.index'));
        $response->assertSessionHas('contact.id', $contact->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->get(route('contact.show', $contact));

        $response->assertOk();
        $response->assertViewIs('contact.show');
        $response->assertViewHas('contact');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->get(route('contact.edit', $contact));

        $response->assertOk();
        $response->assertViewIs('contact.edit');
        $response->assertViewHas('contact');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ContactController::class,
            'update',
            \App\Http\Requests\ContactUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $contact = Contact::factory()->create();
        $first_name = $this->faker->firstName();
        $last_name = $this->faker->lastName();
        $email = $this->faker->safeEmail();
        $job_title = $this->faker->word();
        $city = $this->faker->city();
        $country = $this->faker->country();

        $response = $this->put(route('contact.update', $contact), [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'job_title' => $job_title,
            'city' => $city,
            'country' => $country,
        ]);

        $contact->refresh();

        $response->assertRedirect(route('contact.index'));
        $response->assertSessionHas('contact.id', $contact->id);

        $this->assertEquals($first_name, $contact->first_name);
        $this->assertEquals($last_name, $contact->last_name);
        $this->assertEquals($email, $contact->email);
        $this->assertEquals($job_title, $contact->job_title);
        $this->assertEquals($city, $contact->city);
        $this->assertEquals($country, $contact->country);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->delete(route('contact.destroy', $contact));

        $response->assertRedirect(route('contact.index'));

        $this->assertModelMissing($contact);
    }
}
