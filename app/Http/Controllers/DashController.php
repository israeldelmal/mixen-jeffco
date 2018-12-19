<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use Validator;
use Auth;
use File;

use App\User;
use App\Header;
use App\About;
use App\Service;
use App\Article;
use App\Contact;

class DashController extends Controller
{
    public function index() {
    	return view('dashboard.index');
    }

    // Usuarios
    public function users() {
    	$users = User::orderBy('id', 'DESC')->paginate(5);
    	return view('dashboard.users.index')->with('users', $users);
    }

    public function users_edit($id) {
    	$user = User::find($id);
    	return view('dashboard.users.edit')->with('user', $user);
    }

    public function users_update(Request $request, $id) {
    	$rules = [
    		'status' => 'required'
    	];

    	$messages = [
    		'status.required' => 'Este campo es necesario'
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
			return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
    	} elseif ($validator->passes()) {
			$user         = User::find($id);
			$user->status = $request->status;
    		$user->save();

    		return redirect('/escritorio/usuarios');
    	}
    }

    // Cabecera
    public function header() {
    	$headers = Header::orderBy('id', 'DESC')->paginate(5);
    	return view('dashboard.headers.index')->with('headers', $headers);
    }

    public function header_create() {
    	return view('dashboard.headers.create');
    }

    public function header_store(Request $request) {
    	$rules = [
    		'image' => 'required|mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
    	];

    	$messages = [
    		'image.required'   => 'Este campo es necesario',
            'image.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'image.max'        => 'Peso máximo de 5MB',
            'image.dimensions' => 'Las medidas son de 1920x1080',
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
			return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
    	} elseif ($validator->passes()) {
    		$image = $request->file('image');
            $name  = uniqid('header_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/cabeceras/';
            $image->move($path, $name);

			$header          = new Header($request->all());
			$header->image   = $name;
			$header->user_id = Auth::user()->id;
    		$header->save();

    		return redirect('/escritorio/cabecera');
    	}
    }

    public function header_edit($id) {
		$header = Header::find($id);
    	return view('dashboard.headers.edit')->with('header', $header);
    }

    public function header_update(Request $request, $id) {
    	$rules = [
			'image'  => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
			'status' => 'required',
    	];

    	$messages = [
			'status.required'  => 'Este campo es necesario',
			
			'image.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
			'image.max'        => 'Peso máximo de 5MB',
			'image.dimensions' => 'Un ancho máximo de 1920px',
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
			return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
    	} elseif ($validator->passes()) {
			$header = Header::find($id);

			if ($request->hasFile('image')) {
				File::delete(public_path() . '/assets/images/cabeceras/' . $header->image);

				$image = $request->file('image');
				$name  = uniqid('header_', true) . '.' . $image->getClientOriginalExtension();
				$path  = public_path() . '/assets/images/cabeceras/';
				$image->move($path, $name);

				$header->image   = $name;
			}

			$header->status = $request->status;
    		$header->save();

    		return redirect('/escritorio/cabecera');
    	}
    }

    // Nosotros
    public function about_edit($id) {
    	$about = About::find($id);
    	return view('dashboard.about.edit')->with('about', $about);
    }

    public function about_update(Request $request, $id) {
    	$rules = [
			'h1'      => 'required|min:4',
			'content' => 'required|min:4',
    	];

    	$messages = [
			'h1.required'      => 'Este campo es necesario',
			'h1.min'           => 'Mínimo 4 caracteres',
			
			'content.required' => 'Este campo es necesario',
			'content.min'      => 'Mínimo 4 caracteres',
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
			return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
    	} elseif ($validator->passes()) {
			$about          = About::find($id);
			$about->h1      = $request->h1;
			$about->content = html_entity_decode($request->content);
    		$about->save();

    		return redirect('/escritorio/nosotros/1');
    	}
    }

    // Servicios
    public function services() {
    	$services = Service::orderBy('id', 'DESC')->paginate(5);
    	return view('dashboard.services.index')->with('services', $services);
    }

    public function services_create() {
    	return view('dashboard.services.create');
    }

    public function services_store(Request $request) {
    	$rules = [
			'icon'        => 'required|mimes:png,svg',
			'h1'          => 'required|min:4',
			'description' => 'required|min:4',
			'content'     => 'required|min:4',
			'image'       => 'required|mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1280,min_width=1280,min_height=720,max_height=720',
    	];

    	$messages = [
			'icon.required'        => 'Este campo es necesario',
			'icon.mimes'           => 'Sólo imágenes PNG y SVG',
			
			'h1.required'          => 'Este campo es necesario',
			'h1.min'               => 'Mínimo 4 caracteres',
			
			'description.required' => 'Este campo es necesario',
			'description.min'      => 'Mínimo 4 caracteres',
			
			'content.required'     => 'Este campo es necesario',
			'content.min'          => 'Mínimo 4 caracteres',
			
			'image.required'       => 'Este campo es necesario',
			'image.mimes'          => 'Sólo imágenes JPG, JPEG y PNG',
			'image.max'            => 'Peso máximo de 5MB',
			'image.dimensions'     => 'Las medidas son de 1280x720',
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
			return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
    	} elseif ($validator->passes()) {
    		$icon_image = $request->file('icon');
            $icon_name  = uniqid('icon_', true) . '.' . $icon_image->getClientOriginalExtension();
            $icon_path  = public_path() . '/assets/images/servicios/iconos/';
            $icon_image->move($icon_path, $icon_name);

    		$image = $request->file('image');
            $name  = uniqid('service_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/servicios/';
            $image->move($path, $name);

			$service              = new Service($request->all());
			$service->icon        = $icon_name;
			$service->h1          = $request->h1;
			$service->slug        = str_slug($request->h1);
			$service->description = $request->description;
			$service->content     = html_entity_decode($request->content);
			$service->image       = $name;
			$service->user_id     = Auth::user()->id;
    		$service->save();

    		return redirect('/escritorio/servicios');
    	}
    }

    public function services_edit($id) {
		$service = Service::find($id);
    	return view('dashboard.services.edit')->with('service', $service);
    }

    public function services_update(Request $request, $id) {
    	$rules = [
            'icon'        => 'mimes:png,svg',
			'h1'          => 'required|min:4',
			'description' => 'required|min:4',
			'content'     => 'required|min:4',
			'image'       => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1280,min_width=1280,min_height=720,max_height=720',
			'status'      => 'required',
    	];

    	$messages = [
            'icon.mimes'           => 'Sólo imágenes PNG y SVG',

			'h1.required'          => 'Este campo es necesario',
			'h1.min'               => 'Mínimo 4 caracteres',
			
			'description.required' => 'Este campo es necesario',
			'description.min'      => 'Mínimo 4 caracteres',
			
			'content.required'     => 'Este campo es necesario',
			'content.min'          => 'Mínimo 4 caracteres',

			'status.required'      => 'Este campo es necesario',
			
			'image.mimes'          => 'Sólo imágenes JPG, JPEG y PNG',
			'image.max'            => 'Peso máximo de 5MB',
			'image.dimensions'     => 'Un ancho máximo de 1920px',
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
			return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
    	} elseif ($validator->passes()) {
            $service = Service::find($id);

            if ($request->hasFile('icon')) {
                File::delete(public_path() . '/assets/images/servicios/iconos/' . $service->icon);

                $image = $request->file('icon');
                $name  = uniqid('icon_', true) . '.' . $image->getClientOriginalExtension();
                $path  = public_path() . '/assets/images/servicios/iconos/';
                $image->move($path, $name);

                $service->icon = $name;
            }

            $service->h1   = $request->h1;
            $service->slug = str_slug($request->h1);

			if ($request->hasFile('image')) {
				File::delete(public_path() . '/assets/images/servicios/' . $service->image);

				$image = $request->file('image');
				$name  = uniqid('service_', true) . '.' . $image->getClientOriginalExtension();
				$path  = public_path() . '/assets/images/servicios/';
				$image->move($path, $name);

				$service->image = $name;
			}

			$service->description = $request->description;
			$service->content     = html_entity_decode($request->content);
			$service->status      = $request->status;
    		$service->save();

    		return redirect('/escritorio/servicios');
    	}
    }

    // Blog
    public function blog() {
        $articles = Article::orderBy('id', 'DESC')->paginate(5);
        return view('dashboard.blog.index')->with('articles', $articles);
    }

    public function blog_create() {
        return view('dashboard.blog.create');
    }

    public function blog_store(Request $request) {
        $rules = [
            'title'   => 'required|min:4|unique:articles',
            'content' => 'required|min:4',
            'image'   => 'required|mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
            'title.required'   => 'Este campo es necesario',
            'title.min'        => 'Mínimo 4 caracteres',
            'title.unique'     => 'Ya existe este título, prueba otro',
            
            'content.required' => 'Este campo es necesario',
            'content.min'      => 'Mínimo 4 caracteres',
            
            'image.required'   => 'Este campo es necesario',
            'image.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'image.max'        => 'Peso máximo de 5MB',
            'image.dimensions' => 'Las medidas son de 1920x1080',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $image = $request->file('image');
            $name  = uniqid('service_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/articulos/';
            $image->move($path, $name);

            $article          = new Article($request->all());
            $article->title   = $request->title;
            $article->slug    = str_slug($request->title);
            $article->content = html_entity_decode($request->content);
            $article->image   = $name;
            $article->user_id = Auth::user()->id;
            $article->save();

            return redirect('/escritorio/blog');
        }
    }

    public function blog_edit($id) {
        $article = Article::find($id);
        return view('dashboard.blog.edit')->with('article', $article);
    }

    public function blog_update(Request $request, $id) {
        $rules = [
            'title'   => 'required|min:4',
            'content' => 'required|min:4',
            'image'   => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
            'status'  => 'required',
        ];

        $messages = [            
            'title.required'   => 'Este campo es necesario',
            'title.min'        => 'Mínimo 4 caracteres',
            
            'content.required' => 'Este campo es necesario',
            'content.min'      => 'Mínimo 4 caracteres',

            'image.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'image.max'        => 'Peso máximo de 5MB',
            'image.dimensions' => 'Las medidas son de 1920x1080',
            
            'status.required'  => 'Este campo es necesario',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $article        = Article::find($id);
            $article->title = $request->title;
            $article->slug  = str_slug($request->title);

            if ($request->hasFile('image')) {
                File::delete(public_path() . '/assets/images/articulos/' . $article->image);

                $image = $request->file('image');
                $name  = uniqid('article_', true) . '.' . $image->getClientOriginalExtension();
                $path  = public_path() . '/assets/images/articulos/';
                $image->move($path, $name);

                $article->image = $name;
            }

            $article->content = html_entity_decode($request->content);
            $article->status  = $request->status;
            $article->save();

            return redirect('/escritorio/blog');
        }
    }

    // Contacto
    public function contact_edit($id) {
        $contact = Contact::find($id);
        return view('dashboard.contact.edit')->with('contact', $contact);
    }

    public function contact_update(Request $request, $id) {
        $rules = [
            'image' => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080'
        ];

        $messages = [
            'image.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'image.max'        => 'Peso máximo de 5MB',
            'image.dimensions' => 'Las medidas son de 1920x1080'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $contact = Contact::find($id);

            File::delete(public_path() . '/assets/images/pie/' . $contact->image);

            $image = $request->file('image');
            $name  = uniqid('pie_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/pie/';
            $image->move($path, $name);

            $contact->image = $name;
            $contact->save();

            return redirect('/escritorio');
        }
    }
}