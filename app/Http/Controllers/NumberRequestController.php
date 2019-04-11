<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Repositories\NumberRequest\NumberRequestRepositoryInterface;
use App\User;
use Auth;
use App\Models\Token;
use App\Notifications\SendRegisterCert;

class NumberRequestController extends Controller
{
    protected $numberRequest;

    public function __construct(NumberRequestRepositoryInterface $numberRequest)
    {
        $this->numberRequest = $numberRequest;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $with = ['user'];
        $dataSelect = [
            'id',
            'user_id',
            'days_to_return',
            'status',
            'created_at',
            'updated_at',
        ];
        $numberRequests = $this->numberRequest->getData($with, [], $dataSelect);

        return view('admin.requests.index', compact('numberRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tokens = Token::all();
        $numberRequest = $this->numberRequest->findById($id);

        return view('admin.requests.edit', compact('numberRequest', 'tokens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegisterRequest $request, $id)
    {
        $update_request_cert = $this->numberRequest->update($id, $request->all());
        $request_cert = $this->numberRequest->findById($id);
        $receiver = User::where('id', $request_cert->user_id)->first();
        try {
            if ($request->status == 1) {
                $message = 'Yêu cầu đã được xử lý';
            } elseif ($request->status == 2) {
                $message = 'Yêu cầu không được chấp nhận';
            }
            $receiver->notify(new SendRegisterCert(Auth::user(), $message, $id));

            return redirect()->route('number-requests.index')->withSuccess('Đã xử lý thành công');
        } catch (Exception $e) {
            return redirect()->route('number-requests.index')->withError('Xử lý thất bại');
        }
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
    }
}
