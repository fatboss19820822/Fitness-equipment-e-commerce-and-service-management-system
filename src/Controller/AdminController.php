<?php
declare(strict_types=1);

namespace App\Controller;

class AdminController extends AppController
{
    public function dashboard()
    {
        $this->Authorization->skipAuthorization(); // <--- Add this
        $this->viewBuilder()->setLayout('admin');   // Optional if you have admin layout
    }
}
