<?php

namespace App\Service;

use App\Http\Controllers\CoreController;
use App\Models\Agenda;
use App\Constants\Messages;
use App\Repositories\AgendaRepository;
use League\Flysystem\InMemory\StaticInMemoryAdapterRegistry;

class AgendaService
{

    public function __construct()
    {
        $this->repository = new AgendaRepository();
    }

    public function index()
    {
        try {
            if(!Agenda::first()) {
                return Messages::REG_VOID;
            }

            return Agenda::all();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function create(array $data)
    {
        try {
            if($this->verifyWeekend($data['dtInicio'], $data['dtFinal']) == false) {
                return Messages::DATE_WEEKEND;
            }

            $regBd = $this->repository->getByIdAndDate($data);

            if($regBd > 0) {
                return Messages::REG_EXIST;
            }

            $evento = $this->repository->create($data);

            if($evento->save()) {
                return Messages::REG_RECORDED;
            }

        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $reg = $this->repository->getById($id);

            if($reg->count() == 0) {
                return Messages::REG_NOINFORMATION;
            }

            return $reg;
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function edit(array $data)
    {
        try {
            if($this->verifyWeekend($data['dtInicio'], $data['dtFinal']) == false) {
                return Messages::DATE_WEEKEND;
            }

            $totReg = $this->repository->getByIdAndDate($data);

            if($totReg > 0)
            {
                return Messages::REG_EXIST;
            }

            $update = $this->repository->edit($data);

            if(!$update) {
                return Messages::REG_GENERICERROR;
            }

            return Messages::REG_UPDATED;
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function destroy(array $data)
    {
        try {
            $destroy = $this->repository->destroy($data['id']);

            if(!$destroy) {
                return Messages::REG_GENERICERROR;
            }

            return Messages::REG_DESTROYED;
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function showByPerson($id)
    {
        try {
            $regs = $this->repository->showByPerson($id);

            if($regs->count() == 0) {
                return Messages::REG_NOREGISTERS;
            }

            return $regs;
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function visualizarIntervalo(array $dates)
    {
        try {
            $regInt = $this->repository->visualizarIntervalo($dates);

            if($regInt->count() == 0) {
                return Messages::REG_NOTFOUNDRANGE;
            }

            return $regInt;
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function verifyWeekend($dtInitial, $dtFinal)
    {
        if(date('D', strtotime($dtInitial)) == "Sat" || date('D', strtotime($dtInitial)) == "Sun") {
            return false;
        }
        if(date('D', strtotime($dtFinal)) == "Sat" || date('D', strtotime($dtFinal)) == "Sun") {
            return false;
        }

        return true;
    }
}
