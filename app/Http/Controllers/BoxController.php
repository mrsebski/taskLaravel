<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    // private $n = array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    // private $c = array();
    // private $n = array(0,0,0,0,0,0);
    // private $order = 0;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function findBoxes()
    {
        foreach($this->c as $key => $size) {
            if ($key === array_key_first($this->c)){

                while ($this->order >= $size)
                {
                    $this->order -= $size;
                    $this->n[$key]++;
                }
                $this->sumLooker($this->c, $this->order);
            }else
            {
                while ($this->order >= $size)
                {
                    $this->order -= $size;
                    $this->n[$key]++;
                }
                $this->sumLooker($this->c, $this->order);

                if ($key === array_key_last($this->c))
                {
                    if($this->order > 0) {
                        if ( $this->n[$key] > 0 )
                        {
                            $this->order = 0;
                            $this->n[$key-1]+=10;
                            $this->n[$key]=0;
                        }
                            else{
                            $this->order = 0;
                            $this->n[$key]++;
                        }
                    }
                }
            }
        }

    }

    public function sumLooker($a, $val, $i = 0) {
    $r = array();

    while($i < count($a)) {
        $v = $a[$i];
        if($v == $val)
            $r[] = $v;
            foreach($this->sumLooker($a, $val - $v, $i + 1) as $s){
                 $vKey = array_search($v, $this->c);
                 $this->n[$vKey]++;
                 $sKey = array_search($s, $this->c);
                 $this->n[$sKey]++;
                 $this->order -= $this->c[$sKey] + $this->c[$vKey];
            }
        $i++;
    }
    return $r;
}

    public function check(Request $request)
    {

         $validatedData = $request->validate([
            'order' => 'required|numeric',
            ]);

         $this->order = $request->order;

         $boxes = Box::orderBy('size', 'desc')->get();




        echo "<h1>Order: $this->order </h1><br>";

        foreach ($boxes as $key => $box) {
            $b = $boxes[$key]->toArray();
            $this->n[] = 0;
            $this->c[$key] = $b['size'];
        }

        $this->findBoxes();

        echo "<h1> You need to use:</h1>";


        foreach ($this->c as $key => $co) {
            echo "<h3> $co x".$this->n[$key]."</h3>";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $validatedData = $request->validate([
        'size' => 'required|unique:boxes|max:255',

    ]);

        $box = new Box;

            $box->size = $request->size;

        $box->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function show(Box $box)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function edit(Box $box)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Box $box)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function destroy(Box $box)
    {
        $box->delete();

        return redirect()->route('index');
    }
}
