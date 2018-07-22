<?php

namespace App\Http\Controllers;

use App\Card;
use App\CardLink;
use Illuminate\Http\Request;

use Auth;
use Session;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();
        return view('cards.index')->with('cards', $cards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'bg' => 'required|max:7',
        ]);

        $card = New Card;
        $card->name = $request->name;
        $card->bg = $request->bg;
        $card->font = fontColorCalculate($request->bg);
        $card->save();

        Session::flash('success', 'Card created');

        return redirect()->route('cards.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        if(Auth::user()->hasPermission('Card-Edit', $card->id)){
            return view('cards.edit')->with('card', $card);
        }else{
            Session::flash('danger', "You don't have access to that page.");

            return redirect()->route('cards.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $request->validate([
            'name' => 'required|max:255',
            'bg' => 'required|max:7',
        ]);

        // save card data
        $card->name = $request->name;
        $card->bg = $request->bg;
        $card->font = fontColorCalculate($request->bg);
        $card->save();

        // remove cardLinks
        $card->cardLinks()->delete();

        // create and sync cardLinks
        if($request->has('cardLinks')){
            // validate cardLinks


            for($index = 0; $index < count($request->cardLinks['name']); $index++){
                $cardLink = New CardLink;
                $cardLink->card_id = $card->id;
                $cardLink->sort_by = $request->cardLinks['sort_by'][$index];
                $cardLink->name = $request->cardLinks['name'][$index];
                $cardLink->url = $request->cardLinks['url'][$index];
                $cardLink->save();
            }
        }

        return redirect()->route('cards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->cardLinks()->delete();
        $card->delete();

        return redirect()->route('cards.index');
    }
}
