<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class IsAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // $uri = service('uri');
        $logged = session()->get('isLoggedIn');
        if ($logged) {
            // $segment = $uri->getSegment(1);
            return redirect()->to('dashboard');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
