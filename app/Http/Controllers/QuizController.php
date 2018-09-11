<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\QuizRepository;
use App\Repositories\ExtraitRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class QuizController extends Controller
{

    protected $quizRepository;

    protected $nbrPerPage = 10;

    public function __construct(QuizRepository $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $quizs = $this->quizRepository->getWithQuizAndExtraitsPaginate($this->nbrPerPage);
        $links = $quizs->render();

        return view('Quiz/index', compact('quizs', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $extraits = DB::table('extraits')->select('source', 'id','debut','fin')->get();
        $typesquiz = DB::table('typesquiz')->select('code', 'id')->get();

        return view('Quiz/create', compact('extraits','typesquiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ExtraitRepository $extraitRepository)
    {
        //
        $inputs = array_merge($request->all());

        $quiz = $this->quizRepository->store($inputs);

        $extraitRepository->storeExtraitsForQuiz($quiz, Input::get('extraits'));

        return redirect(route('quiz.index'));
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
        $quiz = $this->quizRepository->getById($id);

        return view('Quiz/show',  compact('quiz'));
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
        $quiz = $this->quizRepository->getById($id);
        $extraits = DB::table('extraits')->pluck('source', 'id');

        return view('Quiz/edit',  compact('quiz','extraits'));
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
        $this->quizRepository->update($id, $request->all(),Input::get('extraits'));
        
        return redirect('quiz')->withOk("Le quiz " . $request->input('nom') . " a été modifié.");
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
        $this->quizRepository->destroy($id);

        return back();
    }
}
