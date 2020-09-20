<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Segment implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Jika jumlah segment uri >= 3 maka segment ke 3
        // redirect to path `/` dan jika total segment >= 2
        // dan segment ke 2 adalah `index` maka redirect to path `/`
        $uri = service('uri');
        if ($uri->getTotalSegments() >= 3) {
            $segment = '/';
        } elseif ($uri->getTotalSegments() >= 2 && $uri->getSegment(2) == 'index') {
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
