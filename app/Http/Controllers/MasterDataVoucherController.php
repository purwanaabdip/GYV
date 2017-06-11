<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Members;

class MasterDataVoucherController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = Members::get();
        $data = ['members' => $members];

        if (isset($request->status)) {
            $request->session()->flash('success', 'Data berhasil Dihapus');
        }

        return view('masterdata.mdvoucher', $data);
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
        Members::find($id)->update(['is_use' => 1]);
        return redirect()->route('masterdata.index')
            ->with('success','Voucher is Used');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Members::find($id)->delete();

        return response()->json([
            'status' => $status,
            'url' => route('masterdata.index').'?status=deleted'
        ]);
    }
}
