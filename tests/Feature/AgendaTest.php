<?php
namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Faker;

class AgendaTest extends TestCase
{
    public function testCriarEntradaAgenda()
    {
        $data = [
            'idResp'        => 3,
            'dtInicio'      => "2023-06-23 20:52:44",
            'dtFinal'       => "2023-06-06 20:52:44",
            'dtConclusao'   => null,
            'status'        => 0,
            'titulo'        => "Agenda 3",
            'descricao'     => "Descrição da agenda 3."
        ];

        $response = $this->json('POST','/api/agenda/criarAgenda', $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('agenda', $data);
    }

    public function testRotaIndex()
    {

        $response = $this->json('GET','/api/agenda');
        $response->assertStatus(200);
    }

    public function testRotaVisualizarRegistroEspecifico()
    {
        $id = 1;

        $response = $this->json('GET','/api/agenda/visualizar/'.$id);
        $response->assertStatus(200);
    }

    public function testRotaVisualizarPessoaEspecifico()
    {
        $id = 1;

        $response = $this->json('GET','/api/agenda/visualizarAgenda/'.$id);
        $response->assertStatus(200);
    }

    public function testRotaRangeData()
    {
        $data = [
            'dtInicio'  => "2023-05-20",
            'dtFinal'   => "2023-06-06"
        ];

        $response = $this->json('POST','/api/agenda/visualizarIntervalo', $data);
        $response->assertStatus(200);
    }

    public function testRotaDeletarRegistro()
    {
        $agenda = new Agenda();
        $user = new User();
        $faker = \Faker\Factory::create();

        $userCreate = $user->create([
            'name' => $faker->name,
            'email' => $faker->email(),
            'password' => bcrypt('password')
        ]);

        $data = [
            'idResp'        => $userCreate->id,
            'dtInicio'      => "2023-06-23 20:52:44",
            'dtFinal'       => "2023-06-06 20:52:44",
            'dtConclusao'   => null,
            'status'        => 0,
            'titulo'        => "Agenda 3",
            'descricao'     => "Nesta atividade, você deverá fazer a criação de um card via integração."
        ];

        $agendaCreate = Agenda::create($data);

        $delete = [
            'id' => $agendaCreate->id
        ];

        $response = $this->json('DELETE', '/api/agenda/removerRegistro', $delete);
        $response->assertStatus(200);
    }

    public function testRotaEditarRegistro()
    {
        $agenda = new Agenda();
        $user = new User();
        $faker = \Faker\Factory::create();

        $userCreate = $user->create([
            'name' => $faker->name,
            'email' => $faker->email(),
            'password' => bcrypt('password')
        ]);
        $teste = $agenda->create();

        $data = [
            'id'            => 1,
            'idResp'        => 12,
            'dtInicio'      => "2023-06-23 20:52:44",
            'dtFinal'       => "2023-06-06 20:52:44",
            'dtConclusao'   => null,
            'status'        => 0,
            'titulo'        => "Agenda 3",
            'descricao'     => "Nesta atividade, você deverá fazer a criação de um card via integração."
        ];

        $response = $this->post('/api/agenda/editarRegistro', $teste->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('agenda', $data);
    }
}
