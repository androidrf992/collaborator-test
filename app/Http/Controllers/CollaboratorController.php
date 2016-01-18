<?php

namespace App\Http\Controllers;

use App\Collaborator;
use Illuminate\Http\Request;
use App\Http\Requests\SortRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\EditCollaboratorRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CollaboratorController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth', ['except' => ['tree', 'nodes']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Collaborator $collaborator)
    {
        $model = $collaborator->all();

        return view('collaborator.index', [
            'model' => $model,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Collaborator $collaborator)
    {
        $model = $collaborator->find($id);

        $chief = $collaborator->find($model->parent_id);

        return view('collaborator.show', [
           'model' => $model,
            'chief' => $chief,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Collaborator $collaborator)
    {
        $model = $collaborator->find($id);

        $chief = $collaborator->find($model->parent_id);

        return view('collaborator.edit', [
            'model' => $model,
            'chief' => $chief,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCollaboratorRequest $request, $id, Collaborator $collaborator)
    {
        $data = $request->all();

        $model = $collaborator->find($id);

        if($request->file('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $file_name = uniqid() . '.' . $extension;
            \Image::make($request->file('photo'))->save(public_path() . '/uploads/origin/' . $file_name);
            \Image::make($request->file('photo'))->resize(70, 70)->save(public_path() . '/uploads/small/' . $file_name);
            $data['photo'] = $file_name;
        }else{
            $data['photo'] = $model->photo;
        }

        $model->update($data);

        if($request->get('chief') != $model->parent_id){
            $chief = $collaborator->find($request->get('chief'));

            $model->makeChildOf($chief);
        }

        return redirect('/collaborator/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Collaborator $collaborator)
    {
        $model = $collaborator->find($id);

        $model->remove();

        echo json_encode(['success']);
    }

    public function sort(SortRequest $request, Collaborator $collaborator)
    {

        $model = $collaborator->sort($request->get('column'), $request->get('type'))->get();

        return view('collaborator.blocks.filter', [
            'model' => $model,
        ]);
    }

    public function search(SearchRequest $request, Collaborator $collaborator)
    {

        $model = $collaborator->search($request->get('column'), $request->get('value'))->get();

        return view('collaborator.blocks.filter', [
            'model' => $model,
        ]);
    }

    public function person(Request $request, Collaborator $collaborator)
    {
        $model = $collaborator->search('full_name', $request->get('value'))->get();

        echo json_encode($model);
    }

    public function nodes(Request $request, Collaborator $collaborator)
    {
        $data = $collaborator->getTree($request->get('node'));

        $json = json_decode($data, true);

        echo json_encode($json);
    }
}
