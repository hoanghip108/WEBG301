<?php

namespace App\Http\Controllers;


use App\Repository\PuppyRepos;
use App\Repository\ToyRepos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ToyController extends Controller
{
    public function index(){
        $toys = ToyRepos::GetAllToys();

        return view('toywebsite.index', [
            'toys' => $toys
        ]);
    }
    public function SearchProduct()
    {
        $product_name = $_GET['product_name'];
        $result = ToyRepos::FindProductByName($product_name);
        return view('toywebsite.index', [
            'toys' => $result
        ]);
    }

    public function getCategories()
    {
        $categories = ToyRepos::getCategories();
        return view('toywebsite.categories', [
            'categories' => $categories
        ]);
    }

    public function categoryEdit(Request $rq, $id)
    {
        $product_categories = [
            'product_categories' => $rq->input('title')
        ];
        ToyRepos::UpdateCategory($product_categories, $id);
        return redirect()->route('toy.getCategories');
    }

    public function categoryUpdate($id)
    {
        $product_categories = ToyRepos::GetCategoryById($id);
        return view('toywebsite.categoryDetail', [
            'product_categories' => $product_categories
        ]);
    }

    public function categoryConfirm($id)
    {
        $product_categories = ToyRepos::GetCategoryById($id);
        $hasProducts = ToyRepos::HasProductsInCategory($id);

        if ($hasProducts) {
            return redirect()->route('toy.getCategories')->with('error', 'Cannot remove category with products.');
        }
        return view('toywebsite.confirmCategory', [
            'product_category' => $product_categories
        ]);
    }

    public function create()
    {
        $product_categories = ToyRepos::GetCategories();
        return view('toyWebsite.create', [
                'categories' => $product_categories,
                'product' => (object)[
                    'id' => '',
                    'name' => '',
                    'price'=>'',
                    'product_category_id' => '',
                    'img' => '',
                    'description' => '',
                ],
            ]
        );

    }
    public function createCategory()
    {
       $product_categories=ToyRepos::GetCategories();
        return view('toywebsite.createCategory', [
            'product_categories'=>$product_categories,
                'product_category' => (object)[
                    'product_category' => ''
                ]
            ]
        );
    }

    public function storeCategory(Request $rq)
    {
        $this->validateCategory($rq)->validate();
        $product_category = (object)[
            'id' => Str::uuid(),
            'product_category' => $rq->input('title')
        ];
        ToyRepos::storeCategory($product_category);
        return redirect()->route('toy.index');
    }

    public function store(Request $rq)
    {
        $this->validateProduct($rq)->validate();
        $product = (object)[
            'id' => Str::uuid(),
            'name' => $rq->input('name'),
            'price' => $rq->input('price'),
            'description' => $rq->input('description'),
            'img' => $rq->input('img'),
            'product_category_id' => $rq->product_category_id,
        ];
        $toyRepos = new ToyRepos();
        $toyRepos->Store($product);
        return redirect()->route('toy.index');
    }
    private function validateProduct($rq)
    {
        return Validator::make($rq->all(), [
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'product_category_id' => ['required'],
            'img' => ['required'],
            'description' => ['required'],
        ], [
            'price.numeric' => 'The price must be a number.',
        ]);
    }
    public function edit($id)
    {
        $products = ToyRepos::GetProductById($id);
        $category = ToyRepos::GetCategories();
        return view('toywebsite.update',
            [
                'products' => $products,
                'category' => $category
            ]);
    }

    public function update(Request $rq, $id)
    {
        $this->validateProduct($rq)->validate();
        $product = (object)[
            'id' => Str::uuid(),
            'name' => $rq->input('name'),
            'price'=>$rq->input('price'),
            'description' => $rq->input('description'),
            'img' => $rq->input('img'),
            'product_category_id' => $rq->product_category_id,
        ];
        ToyRepos::update($id, $product);
        return redirect()->route('toy.index');
    }



    private function validation($rq)
    {
        return Validator::make($rq->all(),
            [
                'name' => ['required',],
                'desciption' => ['required'],
                'product_category_id' => ['required'],
                'img' => ['required'],
            ]);
    }

    private function validateCategory($rq)
    {
        return Validator::make($rq->all(), [
            'title' => ['required'],
        ]);
    }

    public function confirm($id)
    {
        $product = ToyRepos::GetProductById($id);
        return view('toywebsite.confirm', [
            'product' => $product
        ]);
    }

    public function delete($id)
    {
        ToyRepos::delete($id);
        return redirect()->Route('toy.index');
    }
public function categoryDelete($id)
{
    $hasProducts = ToyRepos::HasProductsInCategory($id);

    if ($hasProducts) {
        if ($hasProducts) {
            return redirect()->route('toy.getCategories')->with('error', 'Cannot delete category while it still has products.');
        }
    }

    ToyRepos::deleteCategory($id);
    return redirect()->route('toy.getCategories');
}
}
