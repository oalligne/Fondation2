<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ExtraitRepository;
use App\Repositories\MorceauRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ExtraitController extends Controller
{
    protected $extraitRepository;

    protected $nbrPerPage = 10;

    public function __construct(ExtraitRepository $extraitRepository)
    {
        $this->extraitRepository = $extraitRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $extraits = $this->extraitRepository->getPaginate($this->nbrPerPage);
        $links = $extraits->render();

        return view('Extrait/index', compact('extraits', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $morceaux = DB::table('morceaux')->select('nom','id')->get();
        return view('Extrait/create', compact('morceaux'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $inputs = array_merge($request->all());

        $extrait = $this->extraitRepository->store($inputs);

        return redirect(route('extrait.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $extrait = $this->extraitRepository->getById($id);        

        return view('Extrait/show',  compact('extrait'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $extrait = $this->extraitRepository->getById($id);
        
        $morceaux = DB::table('morceaux')->select('nom','id')->get();

        return view('Extrait/edit',  compact('extrait','morceaux'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->extraitRepository->update($id, $request->all(),Input::get('morceaux'));
        
        return redirect('extrait')->withOk("L'extrait " . $request->input('nom') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->extraitRepository->destroy($id);

        return back();
    }
}
