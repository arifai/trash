<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Segment implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Jika jumlah segment uri >= 2 maka segment ke 2
        // diganti dengan karakter `/`
        $uri = service('uri');
        if ($uri->getTotalSegments() >= 2) {
            $segment = '/';

            return redirect()->to($segment);
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
