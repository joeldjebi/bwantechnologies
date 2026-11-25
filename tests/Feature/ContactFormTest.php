<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_visitor_can_send_a_contact_message(): void
    {
        $this->post(route('contact.store'), [
            'name' => 'Awa Koné',
            'email' => 'awa@example.com',
            'phone' => '+225 07 00 00 00 00',
            'company' => 'Entreprise CI',
            'subject' => 'Demande de devis',
            'message' => 'Bonjour, nous souhaitons une application mobile.',
        ])
            ->assertRedirect(route('contact'))
            ->assertSessionHas('status');

        $this->assertDatabaseHas(ContactMessage::class, [
            'email' => 'awa@example.com',
            'subject' => 'Demande de devis',
        ]);
    }

    public function test_required_fields_are_validated(): void
    {
        $this->from(route('contact'))
            ->post(route('contact.store'), ['email' => 'pas-un-email'])
            ->assertRedirect(route('contact'))
            ->assertSessionHasErrors(['name', 'email', 'subject', 'message']);

        $this->assertDatabaseCount(ContactMessage::class, 0);
    }

    public function test_validation_errors_and_old_input_are_shown_on_the_form(): void
    {
        $this->followingRedirects()
            ->from(route('contact'))
            ->post(route('contact.store'), ['name' => 'Awa Koné'])
            ->assertOk()
            ->assertSee('Le champ sujet est obligatoire.')
            ->assertSee('value="Awa Koné"', false);
    }
}
