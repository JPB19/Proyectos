<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Varietal;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::All();
      $varieCabernet = Varietal::find(1);
      $varieMalbec = Varietal::find(2);
      $varieTorrontes = Varietal::find(3);
      return view('front/products', compact('products', 'varieCabernet', 'varieMalbec', 'varieTorrontes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function varietalMalbec()
    {
      $varietals = Varietal::all();
      return view('front/prodmalbec', compact('varietals'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function varietalCabernet()
    {
      $varietals = Varietal::all();
      return view('front/prodcabernet', compact('varietals'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function varietalTorrontes()
    {
      $varietals = Varietal::all();
      return view('front/prodtorrontes', compact('varietals'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Product::find($id);
  		return view('front.showprod', compact('product'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search()
    {
      return view('front.busqueda');
    }

    public function result(Request $request)
    {
      $products = Product::where('name', 'LIKE', '%' . $request->word . '%')->get();

      return view('front.result', compact('products'));
    }
}
