<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class ImageUpload extends Controller
{
 
    public function index()
    {    
        return view('image');
    }    
 
    public function upload_image()
    {    
         helper(['form', 'url']);
         
        $database = \Config\Database::connect();
        $user = $database->table('cards');
 
 
 $msg = 'Please select a valid files';
 if ($this->request->getFileMultiple('file')) {
 
             foreach($this->request->getFileMultiple('file') as $file)
             {   
 
                $file->move(WRITEPATH . 'uploads');
 
              $data = [
                'question_image_1' =>  $file->getClientName(),
 //               'type'  => $file->getClientMimeType()
              ];
 
              $user->insert($data);
              $msg = 'Files has been uploaded';
             }
        }
    
       
 return redirect()->to( base_url('image') )->with('msg', $msg);
    }
}
 
?>