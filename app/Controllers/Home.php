<?php

namespace App\Controllers;

use App\Models\Blog;
use App\Models\Plan;
use App\Models\User;
use App\Models\About;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Category;
use App\Models\Newslatter;
use App\Models\SEOService;

class Home extends BaseController
{
    public function __construct()
    {
        helper(['url','form']);
    }
    
    public function index()
    {
        $service = new Service();
        $data['services'] = $service->findall();
        $about = new About();
        $data['abouts'] = $about->findAll();
        $seo_service = new SEOService();
        $data['seo_services'] = $seo_service->findall();
        $plan = new Plan();
        $data['plans'] = $plan->findall();
        $blog = new Blog();
        $data['blogs'] = $blog->paginate(3);
        return view('index',$data);
    }

    public function about()
    {
        $about = new About();
        $data['abouts'] = $about->findAll();
         $plan = new Plan();
        $data['plans'] = $plan->findall();
        return view ('about',$data);
    }

    public function service()
    {
        $service = new Service();
        $data['services'] = $service->findall();
        $seo_service = new SEOService();
        $data['seo_services'] = $seo_service->findall();
        return view ('service',$data);
    }

    public function blog()
    {
        $blog = new Blog();
        $data['blogs'] = $blog->paginate(8);
        $data['pager'] = $blog->pager;
        $category = new Category();
        $data['categories'] = $category->findall();
       return view ('blog',$data); 
    }

    public function blogDetails($id)
    {
        $blogModel = new Blog();
        $data['blogs'] = $blogModel->orderBy('id','desc')->paginate(3);
        $data['blog'] = $blogModel->select('blogs.*, users.id as userId ,users.name')->join('users','users.id = blogs.user_id')->find($id);
        $modelComment = new Comment();
        $data['comment'] = count($modelComment->where('blog_id',$id)->findall());
        $categoryModel = new Category();
        $data['categories'] = $categoryModel->findall();
        return view('blog-details',$data);
    }

    public function postComment()
    {
        $id = $this->request->getPost('blog_id');
        $blogModel = new Blog();
        $data['blogs'] = $blogModel->orderBy('id','desc')->paginate(3);
        $data['blog'] = $blogModel->select('blogs.*, users.id as userId ,users.name')->join('users','users.id = blogs.user_id')->find($id);
        $categoryModel = new Category();
        $data['categories'] = $categoryModel->findall();
        $modelComment = new Comment();
        $data['comment'] = count($modelComment->where('blog_id',$id)->findall());
        $rules = [
            'blog_id' => 'required',
            'commentName' => 'required|string|max_length[255]',
            'commentEmail' => 'required|valid_email|is_unique[comments.email,blog_id,{blog_id}]',
            //'required|valid_email',
            'commentMessage' => 'required'
        ];
        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('blog-details',$data);
        }else{

            $model = new Comment();
            $data = [
                'blog_id' => $this->request->getVar('blog_id'),
                'name' => $this->request->getVar('commentName'),
                'email' => $this->request->getVar('commentEmail'),
                'message' => $this->request->getVar('commentMessage'),
            ];
            $model->save($data);
            return redirect()->to('blog-details/'.$this->request->getVar('blog_id'))->with('success','Thank you for posting your comment.');
    }
}

    public function category($id)
    {
        $model = new Blog();
        $data['blogs'] = $model->where('category_id',$id)->findall();
        $modelCategory = new Category();
        $data['category'] = $modelCategory->find($id);
        return view('category',$data); 
    }

    public function contact()
    {
        return view('contact');
    }

    public function postContact()
    {
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|valid_email|is_unique[contact_us.email]',
            'subject' => 'required|string|max_length[255]',
            'message' => 'required',
        ];
        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('contact',$data);
        }else{

            $model = new Contact();
            $data = [
                'first_name' => $this->request->getPost('first_name'),
                'last_name' => $this->request->getPost('last_name'),
                'email' => $this->request->getPost('email'),
                'subject' => $this->request->getPost('subject'),
                'message' => $this->request->getPost('message'),
            ];
            $model->save($data);
            return redirect()->to(base_url('contact'))->with('success','Your Query has been submitted successfully. We will contact you soon.');
        }
    }

    public function subscribe()
    {
        $rules = [
            'email' => 'required|valid_email|is_unique[newslatter.email]',
        ];
        if(!$this->validate($rules))
        {
            return redirect()->back()->with('validation','Something going wrong.');
        }else{

            $model = new Newslatter();
            $data = [
                'email' => $this->request->getPost('email'),
            ];
            $model->save($data);
            return redirect()->back()->with('success_footer','Thanks you for Subscribe us. We will contact you soon.');
        }
    }
}
