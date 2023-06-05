<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Service\AgendaService;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    public function __construct()
    {
        $this->agenda = new Agenda();
        $this->service = new AgendaService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get (
     *     path="AgendaController",
     *     tags={"agenda"},
     *     summary="get agenda",
     *     operationId="getAgenda",
     *     @OA\Parameter(
     *      name="agenda",
     *     ),
     *     @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application-json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="id",
     *                      type="integer",
     *                      description="ID do registro"
     *                  ),
     *                  @OA\Property(
     *                      property="idResp",
     *                      type="integer",
     *                      description="ID usuário responsável pela atividade."
     *                  ),
     *                 @OA\Property(
     *                      property="dtInicio",
     *                      type="string",
     *                      description="Data de início da atividade"
     *                  ),
     *                 @OA\Property(
     *                      property="dtFinal",
     *                      type="string",
     *                      description="Data do prazo final da atividade"
     *                  ),
     *                 @OA\Property(
     *                      property="dtConclusao",
     *                      type="string",
     *                      description="Data de conclusão da atividade"
     *                  ),
     *                 @OA\Property(
     *                      property="status",
     *                      type="integer",
     *                      description="0 para não finalizado - 1 para finalizado"
     *                  ),
     *                 @OA\Property(
     *                      property="titulo",
     *                      type="string",
     *                      description="Título da atividade"
     *                  ),
     *                 @OA\Property(
     *                      property="descricao",
     *                      type="string",
     *                      description="Descrição da atividade"
     *                  ),
     *                 @OA\Property(
     *                      property="created_at",
     *                      type="string",
     *                      description="Data de inserção do registro"
     *                  ),
     *                 @OA\Property(
     *                      property="updtaed_at",
     *                      type="string",
     *                      description="Data de modificação do registro"
     *                  ),
     *              )
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *     ),
     * )
     *
     * @return array Agenda information
     * @throws Exception
     */
    public function index()
    {
        return $this->service->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $data)
    {
        return $this->service->edit($data->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $data)
    {
        return $this->service->destroy($data->all());
    }

    public function showByPerson($id)
    {
        return $this->service->showByPerson($id);
    }

    public function visualizarIntervalo(Request $request)
    {
        return $this->service->visualizarIntervalo($request->all());
    }
}
