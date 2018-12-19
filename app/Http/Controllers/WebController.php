<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Header;
use App\About;
use App\Service;
use App\Article;
use App\Contact;

class WebController extends Controller
{
    public function index() {
		$headers  = Header::orderBy('id', 'DESC')->where('status', true)->get();
		$abouts   = About::orderBy('id', 'DESC')->paginate(1);
		$services = Service::orderBy('id', 'ASC')->where('status', true)->paginate(4);
		$articles = Article::orderBy('id', 'DESC')->where('status', true)->paginate(3);
		$contacts = Contact::orderBy('id', 'DESC')->paginate(1);
    	return view('web.index')
    			->with('headers', $headers)
    			->with('abouts', $abouts)
    			->with('services', $services)
    			->with('articles', $articles)
    			->with('contacts', $contacts);
    }

    public function service($slug) {
		$service   = Service::where('slug', $slug)->first();
		$servicios = Service::orderBy('id', 'ASC')->where('status', true)->paginate(4);
		$contacts  = Contact::orderBy('id', 'DESC')->paginate(1);
    	return view('web.service')
    			->with('service', $service)
    			->with('servicios', $servicios)
    			->with('contacts', $contacts);
    }

    public function blog() {
		$articles = Article::orderBy('id', 'DESC')->where('status', true)->paginate(6);
		$headers  = Header::orderBy('id', 'DESC')->get();
		$contacts = Contact::orderBy('id', 'DESC')->paginate(1);
		return view('web.blog.index')
				->with('articles', $articles)
				->with('headers', $headers)
				->with('contacts', $contacts);
    }

    public function blog_show($slug) {
		$article  = Article::where('slug', $slug)->first();
		$headers  = Header::orderBy('id', 'DESC')->get();
		$contacts = Contact::orderBy('id', 'DESC')->paginate(1);
		return view('web.blog.show')
				->with('article', $article)
				->with('headers', $headers)
				->with('contacts', $contacts);
    }

    public function contact(Request $request) {
    	if ($request->ajax()) {
    		$rules = [
				'name'    => 'required|min:2',
				'company' => 'required|min:2',
				'email'   => 'email|required',
				'tel'     => 'required|min:2',
				'message' => 'required|min:2'
            ];

            $messages = [
				'name.required'    => ' Este campo es necesario',
				'name.min'         => ' Mínimo 2 caracteres',
				
				'company.required' => ' Este campo es necesario',
				'company.min'      => ' Mínimo 2 caracteres',
				
				'email.required'   => ' Este campo es necesario',
				'email.email'      => ' No tiene formato de email',
				
				'tel.required'     => ' Este campo es necesario',
				'tel.min'          => ' Mínimo 2 caracteres',
				
				'message.required' => ' Este campo es necesario',
				'message.min'      => ' Mínimo 2 caracteres'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'fail'   => true,
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } elseif ($validator->passes()) {                
     //            $data = [
					// 'name'    => $request->name,
					// 'company' => $request->company,
					// 'email'   => $request->email,
					// 'tel'     => $request->tel,
					// 'message' => $request->message
     //            ];

     //            Mail::send('emails.contact', $data, function($message) use ($data) {
     //                $message->to('correo@jeffco.com.mx', 'Carlos Jeffery')->subject($data['name'] . ' contactó');
     //                $message->from('notificaciones@jeffco.com.mx', 'Notificaciones JeffCo');
     //            });

                return response()->json([
                    'send' => true
                ]);
            }
    	}
    }
}
