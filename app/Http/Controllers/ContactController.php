<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GeniusTS\HijriDate\Date;

use Illuminate\Support\Facades\Cache;

use App\contact;

use Carbon\Carbon;

use DB;

class ContactController extends Controller
{
       public function index()
        {
            $date =Carbon::now();
            $hijri_string_date = \GeniusTS\HijriDate\Hijri::convertToHijri($date)->format('j F Y');
            $string_date = $date->format('l j F Y');
            return view('contact',['hijri_string_date' => $hijri_string_date , 'string_date'=>$string_date]);
        }

        public function postContact(Request $request){

            $this->validate($request,[
               'email'=>'required|email',
               'name'=>'min:3',
               'message'=>'min:10']);

            $contact = new contact;
            $date =Carbon::now();
            $hijri_string_date = \GeniusTS\HijriDate\Hijri::convertToHijri($date)->format('j F Y');
            $string_date = $date->format('l j F Y');
            $contact->name = $request->name;
            $contact->message = $request->message;
            $contact->email = $request->email;
            $contact->hijri_string_date =$hijri_string_date;
            $contact->string_date = $string_date;
            $contact->save();

            $expiresAt = Carbon::now()->addMinutes(10);

            Cache::forget('contacts');

            $value = Cache::remember('contacts', $expiresAt, function () {
               return DB::select('SELECT * FROM contact ORDER BY created_at DESC');
            });

            return redirect('contact')->with('status', 'Thank you for contact US');

            }

        public function getData(){

           $contact = new contact;
           $expiresAt = Carbon::now()->addMinutes(10);
           $contacts = Cache::remember('contacts', $expiresAt, function () {
                      return DB::select('SELECT * FROM contact ORDER BY created_at DESC');
                  });
           return view('ViewContacts',['contacts' => $contacts]);
        }

}
