<?php

    namespace Tests\Feature;

    use App\Models\User;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Tests\TestCase;

    class NewsControllerTest extends TestCase
    {
        use RefreshDatabase;

        /** @test */
    public function it_returns_a_json_response_with_news_ordered_by_created_at()
    {
        $this->withoutMiddleware(); // Desactivar middleware para evitar interferencias

        $users = User::factory()->count(3)->create();

        // Llama a la función index del controlador a través de una solicitud GET
        $response = $this->getJson('/api/news');

        // Verifica que la respuesta tiene el código de estado 200 (OK)
        $response->assertStatus(200);

        // Verifica que la respuesta JSON contiene los datos correctos y en el orden correcto
        $response->assertJsonCount(3); // Verifica que hay 3 registros en la respuesta
        $response->assertJsonStructure([
            '*' => ['id', 'name', 'email', 'created_at', 'updated_at'],
        ]);

        // Verifica que los registros están ordenados por 'created_at' en orden descendente
        $this->assertTrue($users->sortByDesc('created_at')->pluck('id')->toArray() === $response->json('*.id'));
    }
}