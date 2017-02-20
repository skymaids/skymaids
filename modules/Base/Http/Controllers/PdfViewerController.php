<?php

namespace Modules\Base\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * Class PdfViewerController
 * @package Modules\Base\Http\Controllers
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @Date 02/15/2017
 * @version 1.0
 */
class PdfViewerController extends Controller
{
    /**
     * Mount page to view the PDF
     * @return $this
     */
    public function index(Request $request)
    {
        $file = "/storage/app/public/".$request->file;
        $permission = false;
        return view('modules.base.pdf.index')->with(compact('file','permission'));
    }
}