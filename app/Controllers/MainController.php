<?php

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;

class MainController extends CoreController
{
    public function index()
    {
        $pokemonObject = new Pokemon;
        $pokemonList = $pokemonObject->findAll();
        $this->show(
            "home",
            [
                "pokemons" => $pokemonList
            ]
        );
    }

    /**
     * Méthode qui se charge d'afficher le détail d'un pkmn
     *
     * @return void
     */
    public function detail($params)
    {
        $pokemonObject = new Pokemon;
        $pokemonDetail = $pokemonObject->find($params['numero']);
        $types = $pokemonDetail->getTypes();
        $this->show(
            'detail',
            [
                'pokemon' => $pokemonDetail,
                'types' => $types
            ]
        );
    }

    public function types()
    {
        $typeObject = new Type();
        $types =  $typeObject->findAll();
        $this->show('types', [
            'types' => $types
        ]);
    }

    public function type($params)
    {
        $pokemonObject = new Pokemon();
        $pokemons = $pokemonObject->findByType($params['type']);
        $this->show('home', [
            'pokemons' => $pokemons
        ]);
    }


    public function notFound()
    {
        header('HTTP/1.1 404 Not Found');
        $this->show('error404', []);
    }
}
