<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLinkListRequest;
use App\Http\Requests\UpdateLinkListRequest;
use App\Repositories\LinkListRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LinkListController extends AppBaseController
{
    /** @var  LinkListRepository */
    private $linkListRepository;

    public function __construct(LinkListRepository $linkListRepo)
    {
        $this->linkListRepository = $linkListRepo;
    }

    /**
     * Display a listing of the LinkList.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->linkListRepository->pushCriteria(new RequestCriteria($request));

        $linkLists = $this->linkListRepository->model()::orderBy('created_at','desc')->paginate(15);

        return view('link_lists.index')
            ->with('linkLists', $linkLists);
            
    }

    /**
     * Show the form for creating a new LinkList.
     *
     * @return Response
     */
    public function create()
    {
        return view('link_lists.create');
    }

    /**
     * Store a newly created LinkList in storage.
     *
     * @param CreateLinkListRequest $request
     *
     * @return Response
     */
    public function store(CreateLinkListRequest $request)
    {
        $input = $request->all();

        $linkList = $this->linkListRepository->create($input);

        Flash::success('添加成功.');

        return redirect(route('linkLists.index'));
    }

    /**
     * Display the specified LinkList.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $linkList = $this->linkListRepository->findWithoutFail($id);

        if (empty($linkList)) {
            Flash::error('Link List not found');

            return redirect(route('linkLists.index'));
        }

        return view('link_lists.show')->with('linkList', $linkList);
    }

    /**
     * Show the form for editing the specified LinkList.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $linkList = $this->linkListRepository->findWithoutFail($id);

        if (empty($linkList)) {
            Flash::error('Link List not found');

            return redirect(route('linkLists.index'));
        }

        return view('link_lists.edit')->with('linkList', $linkList);
    }

    /**
     * Update the specified LinkList in storage.
     *
     * @param  int              $id
     * @param UpdateLinkListRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLinkListRequest $request)
    {
        $linkList = $this->linkListRepository->findWithoutFail($id);

        if (empty($linkList)) {
            Flash::error('Link List not found');

            return redirect(route('linkLists.index'));
        }

        $linkList = $this->linkListRepository->update($request->all(), $id);

        Flash::success('更新成功.');

        return redirect(route('linkLists.index'));
    }

    /**
     * Remove the specified LinkList from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $linkList = $this->linkListRepository->findWithoutFail($id);

        if (empty($linkList)) {
            Flash::error('Link List not found');

            return redirect(route('linkLists.index'));
        }

        $this->linkListRepository->delete($id);

        Flash::success('删除成功.');

        return redirect(route('linkLists.index'));
    }
}
