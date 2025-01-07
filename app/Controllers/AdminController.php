<?php

namespace App\Controllers;

use App\Models\Blog;
use App\Models\Link;
use App\Models\Plan;
use App\Models\User;
use App\Models\About;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Category;
use App\Models\SEOService;
use App\Controllers\BaseController;


class AdminController extends BaseController
{

     public function __construct()
    {
        helper(['url','form']);
    }


    // <!-----------------------  Admin login ------------------>
    public function dashboard()
    {
        $user = new User();
        $data['users'] = $user->findall();
        return view('admin/dashboard',$data);
    }


//<!------------------------ Contact Us -------------------->

    public function adminEnquiry()
    {
        $model = new Contact();
        $data['contacts'] = $model->findall();
        return view('admin/contacts',$data);
    }

// <!----------------------- Admin About  ------------------>

    public function adminAbout()
    {
        $about = new About;
        $data['abouts'] = $about->findall();
        return view('admin/about',$data);
    }

    public function adminNewAbout()
    {
        return view('admin/aboutNew');
    }

    public function adminNewPostAbout()
    {
        
        $rules = [
            'description' => 'required|string',
            'thumbnail' => 'uploaded[thumbnail]'
        ];
        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('admin/aboutNew',$data);
        }else{
              
              $image = $this->request->getFile('thumbnail');

            if($image->isValid() && ! $image->hasMoved())
            {
                $imgName = $image->getRandomName();
                $uploaded = $image->move('upload/',$imgName);
                if($uploaded){
                $about = new About();
                $data = [
                   'about_us' => $this->request->getPost('description'),
                   'thumbnail' => $imgName,
                ];
                $about->save($data);
                return redirect()->to('adminAbout')->with('success','About Us added successfully.');
               } 
        }
        return view('admin/aboutNew');
    }
}


    public function adminEditAbout($id)
    {
        $model = new About;
        $data['about'] = $model->find($id);

        return view('admin/aboutEdit',$data);
    }

    public function adminEditPostAbout($id)
    {
        $rules = [
            'description' => 'required|string'
        ];

        $model = new About();
        $data['about'] = $model->find($id);

        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('admin/aboutEdit',$data);
        }else
        {
    
        $image = $this->request->getFile('thumbnail');  

        if($image != "" && $image->isValid() && ! $image->hasMoved())
        {
          $imgName = $image->getRandomName();
          $uploaded = $image->move('upload/',$imgName); 
          @unlink("upload/".$this->request->getPost('old_thumbnail'));
        }else{
          $imgName = $this->request->getPost('old_thumbnail');
        }

        $data = [
                   'about_us' => $this->request->getPost('description'),
                   'thumbnail' => $imgName,
                ];
        $model->update($id,$data);
        return redirect()->to(base_url('adminAbout'))->with('success','Edit About Us successfully!!');
        }

    }

    public function adminDeleteAbout($id)
    {
        $model = new About;
        $about = $model->find($id);
        $result = $model->where('id',$id)->delete();
        if($result){
          @unlink("upload/".$about['thumbnail']);
          return redirect()->to(base_url('adminAbout'))->with('success','Deleted About Us successfully!!');
        }
    }



//<!----------------------- Admin Services ----------------------->

    public function adminServices()
    {
        $model = new Service();
        $data['services'] = $model->findall();
        return view('admin/services',$data);
    }

    public function adminNewService()
    {
        return view('admin/serviceNew');
    }

    public function adminNewPostService()
    {
        $rules = [
            'title' => 'required|string|max_length[255]',
            'thumbnail' => 'uploaded[thumbnail]',
            'description' => 'required'
        ];

        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('admin/serviceNew',$data);
        }else
        {
            $image = $this->request->getFile('thumbnail');

            if($image->isValid() && ! $image->hasMoved())
            {
                $imgName = $image->getRandomName();
                $uploaded = $image->move('services/',$imgName);
                if($uploaded){

                $model = new Service();
                $data = [
                    'title' => $this->request->getPost('title'),
                    'thumbnail' => $imgName,
                    'description' => $this->request->getPost('description')
                ];
                $model->save($data);
                return redirect()->to(base_url('adminServices'))->with('success','Service Add successfully.');
        }
    }
  }
}

    public function adminEditService($id)
    {
        $model = new Service();
        $data['service'] = $model->find($id);
        return view('admin/serviceEdit',$data);
    }

    public function adminEditPostService($id)
    {
        $model = new Service();
        $data['service'] = $model->find($id);
        $rules = [
            'title' => 'required|string',
            'description' => 'required',
        ];
        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('admin/serviceEdit',$data);
        }else{

            $image = $this->request->getFile('thumbnail');
            if($image != '' && $image->isValid() && !$image->hasMoved())
            {
              $imgName = $image->getRandomName();
              $uploaded = $image->move('services/',$imgName); 
              @unlink("services/".$this->request->getPost('old_thumbnail'));
            }else
            {
                $imgName = $this->request->getPost('old_thumbnail');
            }

            
            $data =  [
                    'title' => $this->request->getPost('title'),
                    'thumbnail' => $imgName,
                    'description' => $this->request->getPost('description')
                ];
            $model->update($id,$data);
            return redirect()->to(base_url('adminServices'))->with('success','Service Edit Successfully.');
        }
    }

    public function adminDeleteService($id)
    {
        $model = new Service();
        $data = $model->find($id);
        $delete = $model->where('id',$id)->delete();
        if($delete)
        {
            @unlink('services/'.$data['thumbnail']);
        }
        return redirect()->to(base_url('adminServices'))->with('success','Service Delete Successfully');
    }



//<!-------------------- SEO Services --------------------->

    public function adminSEOServices()
    {
        $model = new SEOService();
        $data['seoservices'] = $model->findall();
        return view('admin/SEOServices',$data);
    }

    public function adminNewSEOService()
    {
        return view('admin/newSEOService');
    }

    public function adminNewPostSEOService()
    {
        $rules = [
            'title' => 'required|string|max_length[255]',
            'thumbnail' => 'uploaded[thumbnail]',
            'description' => 'required'
        ];

        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('admin/serviceNew',$data);
        }else
        {
            $image = $this->request->getFile('thumbnail');

            if($image->isValid() && ! $image->hasMoved())
            {
                $imgName = $image->getRandomName();
                $uploaded = $image->move('seo-services/',$imgName);
                if($uploaded){

                $model = new SEOService();
                $data = [
                    'title' => $this->request->getPost('title'),
                    'thumbnail' => $imgName,
                    'description' => $this->request->getPost('description')
                ];
                $model->save($data);
                return redirect()->to(base_url('adminSEOServices'))->with('success','SEO Service Add successfully.');
        }
    }
  }
}
    
    public function adminEditSEOService($id)
    {
        $model = new SEOService();
        $data['service'] = $model->find($id);
        return view('admin/editSEOService',$data);
    }


    public function adminEditPostSEOService($id)
    {
        $model = new SEOService();
        $data['service'] = $model->find($id);
        $rules = [
            'title' => 'required|string',
            'description' => 'required',
        ];
        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('admin/editSEOService',$data);
        }else{

            $image = $this->request->getFile('thumbnail');

            if($image != '' && $image->isValid() && !$image->hasMoved())
            {
              $imgName = $image->getRandomName();
              $uploaded = $image->move('seo-services/',$imgName); 
              @unlink("seo-services/".$this->request->getPost('old_thumbnail'));
            }else
            {
                $imgName = $this->request->getPost('old_thumbnail');
            }

            $data =  [
                    'title' => $this->request->getPost('title'),
                    'thumbnail' => $imgName,
                    'description' => $this->request->getPost('description')
                ];
            $model->update($id,$data);
            return redirect()->to(base_url('adminSEOServices'))->with('success','Service Edit Successfully.');
        }
    }


    public function adminDeleteSEOService($id)
    {
        $model = new SEOService();
        $data = $model->find($id);
        $delete = $model->where('id',$id)->delete();
        if($delete)
        {
            @unlink('seo-services/'.$data['thumbnail']);
        }
        return redirect()->to(base_url('adminSEOServices'))->with('success','SEO Service Delete Successfully');
    }



//<!------------------------ Pricing Plan ------------------->

    public function adminPlans()
    {
        $model = new Plan();
        $data['plans'] = $model->findall();
        return view('admin/plan',$data);
    }

    public function adminNewPlan()
    {
        return view('admin/newPlan');
    }

    public function adminNewPostPlan()
    {
        $rules = [
            'description' => 'required'
        ];

        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('admin/newPlan',$data);
        }else
        {
            $model = new Plan();
            $data = [
                'plan' => $this->request->getPost('description'),
            ];

            $model->save($data);
            return redirect()->to(base_url('adminPlan'))->with('success','Plan Add Successfully');
        }
    }


    public function adminEditPlan($id)
    {
        $model = new Plan();
        $data['plan'] = $model->find($id);
        return view('admin/editPlan',$data);
    }

    public function adminEditPostPlan($id)
    {
        $model = new Plan();
        $data['plan'] = $model->find($id);
        $rules = [
            'description' => 'required',
        ];
        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('admin/editPlan',$data);
        }else{
            $data = [
                'plan' => $this->request->getPost('description'),
            ];
            $model->update($id,$data);
            return redirect()->to(base_url('adminPlan'))->with('success','Plan Edit Successfully');
        }
    }

    public function adminDeletePlan($id)
    {
        $model = new Plan();
        $delete = $model->where('id',$id)->delete();
        return redirect()->to(base_url('adminPlan'))->with('success','Plan Delete Successfully');
    }




//<!------------------------ Category ----------------------->

    public function adminCategory()
    {
        $model = new Category();
        $data['categories'] = $model->findall();
        return view('admin/Category',$data);
    }

    public function adminNewCategory()
    {
        return view('admin/newCategory');
    }

    public function adminNewPostCategory()
    {
        $rules = [
            'category' => 'required|string',
        ];
        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('admin/newCategory',$data);
        }else{
            $model = new Category();
            $data = [
                'name' => $this->request->getPost('category'),
            ];
            $model->save($data);
            return redirect()->to(base_url('adminCategory'))->with('success','Category Add Successfully');
        }
    }

    public function adminEditCategory($id)
    {
        $model = new Category();
        $data['category'] = $model->find($id);
        return view('admin/editCategory',$data);
    }

    public function adminEditPostCategory($id)
    {
      $model = new Category();
        $data['category'] = $model->find($id);
        $rules = [
            'category' => 'required',
        ];
        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('admin/editCategory',$data);
        }else{
            $data = [
                'name' => $this->request->getPost('category'),
            ];
            $model->update($id,$data);
            return redirect()->to(base_url('adminCategory'))->with('success','Category Edit Successfully');
        }  
    }

    public function adminDeleteCategory($id)
    {
        $model = new Category();
        $delete = $model->where('id',$id)->delete();
        return redirect()->to(base_url('adminCategory'))->with('success','Category Delete Successfully');
    }


//<!-------------------- Admin Blog  ------------------->

    public function adminBlog()
    {
        $model = new Blog();
        $data = ['blogs' => $model->select('blogs.*, categories.id as cate_id,categories.name')->join('categories','categories.id = blogs.category_id')->paginate(6),
        'pager' => $model->pager,
       ];
        return view('admin/Blog',$data);
    }


    public function adminNewBlog()
    {
        $model = new Category();
        $data['categories'] = $model->findall();
        return view('admin/newBlog',$data);
    }


    public function adminNewPostBlog()
    {
        $model = new Category();
        $data['categories'] = $model->findall();
        $rules = [
            'category' => 'required',
            'title' => 'required|string|max_length[255]',
            'description' => 'required',
            'thumbnail' => 'uploaded[thumbnail]',
        ];

        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('admin/newBlog',$data);
        }else
        {
            $image = $this->request->getFile('thumbnail');

            if($image->isValid() && ! $image->hasMoved())
            {
                $imgName = $image->getRandomName();
                $uploaded = $image->move('blogs/',$imgName);
                if($uploaded){

                $model = new Blog();
                $data = [
                    'category_id' => $this->request->getPost('category'),
                    'user_id' => session()->get('loggedUser'), 
                    'title' => $this->request->getPost('title'),
                    'thumbnail' => $imgName,
                    'description' => $this->request->getPost('description')
                ];
                $model->save($data);
                return redirect()->to(base_url('adminBlog'))->with('success','Blog Add successfully.');
        }
    }
  }

}

public function adminEditBlog($id)
{
    $model = new Blog();
    $category = new Category();
    $data['blog'] = $model->find($id);
    $data['categories'] = $category->findall();
    return view('admin/editBlog',$data);
}

public function adminEditPostBlog($id)
{
    $model = new Blog();
    $category = new Category();
    $data['blog'] = $model->find($id);
    $data['categories'] = $category->findall();

    $rules = [
        'category' => 'required',
        'title' => 'required|string|max_length[255]',
        'description' => 'required',
    ];

    if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('admin/editBlog',$data);
        }else{

            $image = $this->request->getFile('thumbnail');

            if($image != '' && $image->isValid() && !$image->hasMoved())
            {
              $imgName = $image->getRandomName();
              $uploaded = $image->move('blogs/',$imgName); 
              @unlink("blogs/".$this->request->getPost('old_thumbnail'));
            }else
            {
                $imgName = $this->request->getPost('old_thumbnail');
            }

            $data =  [
                    'category_id' => $this->request->getPost('category'),
                    'user_id' => session()->get('loggedUser'), 
                    'title' => $this->request->getPost('title'),
                    'thumbnail' => $imgName,
                    'description' => $this->request->getPost('description')
                ];
            $model->update($id,$data);
            return redirect()->to(base_url('adminBlog'))->with('success','Blog Edit Successfully.');
        }
}


    public function adminDeleteBlog($id)
    {
        $model = new Blog();
        $blog = $model->find($id);
        $result = $model->where('id',$id)->delete();
        if($result)
        {
            @unlink('blogs/'.$blog['thumbnail']);
        }
        return redirect()->to(base_url('adminBlog'))->with('success','Blog Delete Successfully.');
    }



//<!------------------------ Admin Links ------------------->


    public function adminLink()
    {
        $model = new Link();
        $data['links'] = $model->findall();
        return view('admin/link',$data);
    }

    public function adminNewLink()
    {
        return view('admin/newLink');
    }

    public function adminNewPostLink()
    {
        $rules = [
            'facebook' => 'required|max_length[255]',
            'twitter' => 'required|max_length[255]',
            'google' => 'required|max_length[255]',
            'instagram' => 'required|max_length[255]',
            'youtube' => 'required|max_length[255]',
        ];

        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('admin/newLink',$data);
        }else
        {
            $model = new Link();
            $data = [
            'facebook' => $this->request->getPost('facebook'),
            'twitter' => $this->request->getPost('twitter'),
            'google' => $this->request->getPost('google'),
            'instagram' => $this->request->getPost('instagram'),
            'youtube' => $this->request->getPost('youtube'),
        ];

        $model->save($data);
        return redirect()->to(base_url('adminLink'))->with('success','Links Add successfully.');
        }   
    }

    public function adminEditlink($id)
    {
        $model = new Link();
        $data['link'] = $model->find($id);
        return view('admin/editLink',$data);
    }

    public function adminEditPostLink($id)
    {
        $model = new Link();
        $data['link'] = $model->find($id);
        $rules = [
            'facebook' => 'required|max_length[255]',
            'twitter' => 'required|max_length[255]',
            'google' => 'required|max_length[255]',
            'instagram' => 'required|max_length[255]',
            'youtube' => 'required|max_length[255]',
        ];

        if(!$this->validate($rules))
        {
            $data['validation'] = $this->validator;
            return view('admin/editLink',$data);
        }else
        {
            $data = [
            'facebook' => $this->request->getPost('facebook'),
            'twitter' => $this->request->getPost('twitter'),
            'google' => $this->request->getPost('google'),
            'instagram' => $this->request->getPost('instagram'),
            'youtube' => $this->request->getPost('youtube'),
        ];

        $model->update($id,$data);
        return redirect()->to(base_url('adminLink'))->with('success','Links Edit successfully.');
    }
}

    public function adminDeleteLink($id)
    {
        $model = new Link();
        $link = $model->find($id);
        $delete= $model->where('id',$id)->delete();
        return redirect()->to(base_url('adminLink'))->with('success','Links Delete successfully.');
    }

// <!-----------------------  Admin logout ------------------>

    public function logout()
    {
            session()->destroy('loggedUser');
            return redirect()->to('login');
    }
}
