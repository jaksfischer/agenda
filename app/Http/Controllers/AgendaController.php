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
