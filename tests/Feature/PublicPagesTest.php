<?php

namespace Tests\Feature;

use App\Enums\ArticleCategory;
use App\Enums\ContractType;
use App\Enums\ProjectType;
use App\Models\Article;
use App\Models\JobOffer;
use App\Models\Realisation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return array<string, array{string}>
     */
    public static function staticRoutes(): array
    {
        return [
            'accueil' => ['home'],
            'à propos' => ['about'],
            'services' => ['services'],
            'équipe' => ['team'],
            'contact' => ['contact'],
            'réalisations' => ['realisations.index'],
            'blog' => ['blog.index'],
            'emplois' => ['jobs.index'],
        ];
    }

    #[DataProvider('staticRoutes')]
    public function test_public_pages_render(string $routeName): void
    {
        $this->get(route($routeName))->assertOk()->assertSee('BWAN TECHNOLOGIES');
    }

    public function test_home_page_lists_the_latest_published_articles(): void
    {
        $published = Article::factory()->create(['title' => 'Article publié', 'published_at' => now()->subDay()]);
        Article::factory()->create(['title' => 'Article programmé', 'published_at' => now()->addWeek()]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee($published->title)
            ->assertDontSee('Article programmé');
    }

    public function test_home_page_lists_published_realisations(): void
    {
        $published = Realisation::factory()->create(['title' => 'Projet publié']);
        Realisation::factory()->create(['title' => 'Projet masqué', 'is_published' => false]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee($published->title)
            ->assertSee(route('realisations.show', $published))
            ->assertDontSee('Projet masqué');
    }

    public function test_realisations_can_be_filtered_by_type(): void
    {
        Realisation::factory()->create(['title' => 'Projet mobile', 'type' => ProjectType::ApplicationMobile]);
        Realisation::factory()->create(['title' => 'Projet web', 'type' => ProjectType::PlateformeWeb]);

        $this->get(route('realisations.index', ['type' => ProjectType::ApplicationMobile->value]))
            ->assertOk()
            ->assertSee('Projet mobile')
            ->assertDontSee('Projet web');
    }

    public function test_realisation_detail_page_shows_project_details(): void
    {
        $realisation = Realisation::factory()->create([
            'client' => 'Client Test',
            'features' => ['Paiement mobile'],
            'technologies' => ['Laravel'],
        ]);

        $this->get(route('realisations.show', $realisation))
            ->assertOk()
            ->assertSee($realisation->title)
            ->assertSee('Client Test')
            ->assertSee('Paiement mobile')
            ->assertSee('Laravel');
    }

    public function test_unpublished_realisation_is_not_found(): void
    {
        $realisation = Realisation::factory()->create(['is_published' => false]);

        $this->get(route('realisations.show', $realisation))->assertNotFound();
    }

    public function test_blog_can_be_filtered_by_category(): void
    {
        Article::factory()->create(['title' => 'Article TIC', 'category' => ArticleCategory::ActualitesTic, 'published_at' => now()->subDay()]);
        Article::factory()->create(['title' => 'Article billetterie', 'category' => ArticleCategory::InnovationBilletterie, 'published_at' => now()->subDay()]);

        // The "recent articles" sidebar lists every category, so assert on the paginated list itself.
        $this->get(route('blog.index', ['category' => ArticleCategory::ActualitesTic->value]))
            ->assertOk()
            ->assertViewHas('articles', fn ($articles) => $articles->pluck('title')->all() === ['Article TIC']);
    }

    public function test_article_detail_page_shows_content_and_tags(): void
    {
        $article = Article::factory()->create([
            'content' => 'Contenu complet de l’article.',
            'tags' => ['innovation'],
            'published_at' => now()->subDay(),
        ]);

        $this->get(route('blog.show', $article))
            ->assertOk()
            ->assertSee($article->title)
            ->assertSee('Contenu complet de l’article.')
            ->assertSee('#innovation');
    }

    public function test_scheduled_article_is_not_found(): void
    {
        $article = Article::factory()->create(['published_at' => now()->addDay()]);

        $this->get(route('blog.show', $article))->assertNotFound();
    }

    public function test_job_offers_can_be_filtered_by_contract_type(): void
    {
        JobOffer::factory()->create(['title' => 'Offre en CDI', 'contract_type' => ContractType::Cdi]);
        JobOffer::factory()->create(['title' => 'Offre de stage', 'contract_type' => ContractType::Stage]);

        $this->get(route('jobs.index', ['contract_type' => ContractType::Stage->value]))
            ->assertOk()
            ->assertSee('Offre de stage')
            ->assertDontSee('Offre en CDI');
    }

    public function test_inactive_job_offer_is_not_found(): void
    {
        $jobOffer = JobOffer::factory()->create(['is_active' => false]);

        $this->get(route('jobs.show', $jobOffer))->assertNotFound();
    }

    public function test_seeders_import_the_archived_content(): void
    {
        $this->seed();

        $this->assertSame(12, Realisation::count());
        $this->assertSame(10, Article::count());
        $this->assertSame(4, JobOffer::count());

        $this->get(route('realisations.show', 'app-de-livraison-quickfood-ci'))
            ->assertOk()
            ->assertSee('QuickFood CI');
    }
}
