<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Interpro\Origin\Concept\Agent\DeleteAgent as DeleteAgentInterface;
use Interpro\Origin\Concept\Agent\InitAgent as InitAgentInterface;
use Interpro\Origin\Concept\Agent\SaveAgent as SaveAgentInterface;

/**
 * Инициализация элементов групп, их удаление, сохранение блоков и элементов групп
 *
 * Class MainController
 * @package App\Http\Controllers
 */
class MainController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \Interpro\Origin\Concept\Agent\InitAgent $initAgent
     *
     * @return array
     */
    public function init(Request $request, InitAgentInterface $initAgent)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'entity_name' => 'string|required'
            ]
        );

        if($validator->fails()){
            return response()->error($validator->errors()->setFormat(':message<br>')->all());
        }

        try
        {
            $refs = [];

            if($request->has('refs'))
            {
                $refs = $request->input('refs');
            }

            $item = $initAgent->init($request->input('entity_name'), $refs);

            $entity_name = $item->getType()->getName();

            //Создание вьюшки нового item'a, если надо ($item), проверить, есть ли такой шаблон (back/groups/items):
            $itemview = view('back/groups/items/'.$entity_name, ['item' => $entity_name])->render();

            return response()->success(['itemview'=>$itemview]);
        }
        catch(\Exception $e)
        {
            return response()->error($e->getMessage());
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Interpro\Origin\Concept\Agent\SaveAgent $saveAgent
     *
     * @return array
     */
    public function save(Request $request, SaveAgentInterface $saveAgent)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'agrs' => 'required'
            ]
        );

        if($validator->fails()){
            return response()->error($validator->errors()->setFormat(':message<br>')->all());
        }

        try
        {
            $saveAgent->save($request->input('agrs'));

            return response()->success([]);
        }
        catch(\Exception $e)
        {
            return response()->error($e->getMessage());
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Interpro\Origin\Concept\Agent\DeleteAgent $deleteAgent
     * @return array
     */
    public function delete(Request $request, DeleteAgentInterface $deleteAgent)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'agrs' => 'required'
            ]
        );

        if($validator->fails()){
            return response()->error($validator->errors()->setFormat(':message<br>')->all());
        }

        try
        {
            $deleteAgent->delete($request->input('agrs'));

            return response()->success([]);
        }
        catch(\Exception $e)
        {
            return response()->error($e->getMessage());
        }
    }
}
