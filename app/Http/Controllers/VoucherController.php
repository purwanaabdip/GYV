<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Members;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('voucher.voucher');
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
        $voucher = $this->generateVoucher();
        $tambah_tanggal = mktime(0,0,0,date('m')+0,date('d')+2,date('Y')+0);
        $valid_thru = date('Y-m-d',$tambah_tanggal);
        $request->request->add(['voucher' => $voucher]);
        $request->request->add(['valid_thru' => $valid_thru]);
        $dateForEmail = date('d F Y', strtotime($valid_thru));
//        $this->sendEmail($request->email,$request->name,$voucher,$dateForEmail);
        Members::create($request->all());
        return view('voucher.validasi');
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
        //
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
        //
    }

    public function generateVoucher(){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $voucher = '';
        for ($i = 0; $i < 8; $i++) {
            $voucher .= $characters[rand(0, $charactersLength - 1)];
        }
        return $voucher;
    }

    public function sendEmail($to,$name,$code_voucher,$valid){
        $data = array('name'=>$name);
        $data['voucher'] = $code_voucher;
        $data['valid'] = $valid;

        Mail::send(['text'=>'mail.mail'], $data, function($message) use($to,$name) {
            $message->to($to, $name)->subject
            ('Code Voucher');
            $message->from('steamangga@gmail.com','Admin');
        });
    }
}
