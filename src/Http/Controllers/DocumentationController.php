<?php

namespace webbundels\documentation\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use webbundels\documentation\Models\DocumentationChapter;
use webbundels\documentation\Http\Requests\EditDocumentationRequest;
use webbundels\documentation\Http\Requests\ViewDocumentationRequest;
use webbundels\documentation\Http\Requests\StoreDocumentationRequest;
use webbundels\documentation\Http\Requests\CreateDocumentationRequest;
use webbundels\documentation\Http\Requests\DeleteDocumentationRequest;
use webbundels\documentation\Http\Requests\UpdateDocumentationRequest;
use webbundels\documentation\Http\Requests\ChangeOrderDocumentationRequest;

class DocumentationController extends Controller
{
    public function index(ViewDocumentationRequest $request)
    {
        $documentationChapters = DocumentationChapter::all();

        return view('DocumentationPackage::index', compact('documentationChapters'));
    }

    public function create(CreateDocumentationRequest $request)
    {
        $titles = DocumentationChapter::pluck('title');
        $documentationChapter = new DocumentationChapter;

        return view('DocumentationPackage::edit', compact('documentationChapter', 'titles'));
    }

    public function store(StoreDocumentationRequest $request)
    {
        $documentationChapter = new DocumentationChapter();
        $documentationChapter->fill($request->all());
        $documentationChapter->save();

        return redirect()
            ->route('documentation.index');
    }

    public function changeOrder(ChangeOrderDocumentationRequest $request)
    {
        $chapters = $request->get('chapters');

        foreach ($chapters as $index => $chapter) {
            $chapter['sequence'] = ($index+1);
            if (array_key_exists('id', $chapter)) {
                DocumentationChapter::where('id', $chapter['id'])->update(Arr::only($chapter, ['sequence']));
            }
        }

        return redirect()
            ->route('documentation.index');
    }

    public function edit(EditDocumentationRequest $request, $id)
    {
        $documentationChapter = DocumentationChapter::find($id);
        $titles = DocumentationChapter::pluck('title');

        return view('DocumentationPackage::edit', compact('documentationChapter', 'titles'));
    }

    public function update(UpdateDocumentationRequest $request, $id)
    {
        DocumentationChapter::where('id', $id)->update(Arr::except($request->all(), ['_token']));

        return redirect()
            ->route('documentation.index');
    }

    public function delete(DeleteDocumentationRequest $request, $id)
    {
        DocumentationChapter::destroy($id);

        return redirect()
            ->route('documentation.index');
    }
}
