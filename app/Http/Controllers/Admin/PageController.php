<?php namespace App\Http\Controllers\Admin;

use App\Http\Services\Page\PageService;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class PageController
 * @package App\Http\Controllers\Admin
 */
class PageController extends BaseController
{
    /**
     * @var PageService
     */
    protected $page;

    /**
     * @param PageService $page
     */
    public function __construct(PageService $page)
    {
        $this->page = $page;
        $this->middleware('user');
    }

    /**
     * Pages list
     *
     */
    public function index()
    {
        $pages = $this->page->all();

        return view('admin.page.index', compact('pages'));
    }

    /**
     * Create Page
     *
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store page
     * @param Request $request
     *
     * @return
     */
    public function store(Request $request)
    {
        $input = [
            'title'   => $request->input('title'),
            'content' => $request->input('content'),

        ];


        if ($this->page->create($input)) {
            return redirect()->route('admin.page')->withSuccess('Page successfully created.');
        }

        return redirect()->route('admin.page')->withError('Sorry! Page you are trying to create already exists');
    }

    /**
     * Edit page
     *
     * @param $slug
     * @return \Illuminate\View\View
     * @internal param $id
     */
    public function edit($slug)
    {
        $page = $this->page->find($slug)->Country()->first();

        if (!$page) {
            abort(404);
        }

        return view('admin.page.edit', compact('page'));
    }

    /**
     * Update Page
     *
     * @param Request $request
     * @param         $slug
     * @return bool
     * @internal param $page
     */
    public function update(Request $request, $slug)
    {
        $input = [
            'title'   => $request->input('title'),
            'content' => $request->input('content')
        ];


        if ($this->page->save($slug, $input)) {
            return redirect()->route('admin.page')->withSuccess('Page successfully updated.');
        }

        return redirect()->route('admin.page')->withError('Page could not be updated.');
    }

}
