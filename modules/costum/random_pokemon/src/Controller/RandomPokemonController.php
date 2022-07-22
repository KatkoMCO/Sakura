<?php

/**
 * @file
 * RandomPokemonController.
 */

 namespace Drupal\random_pokemon\Controller;

 use Drupal\Core\Controller\ControllerBase;

 class RandomPokemonController extends ControllerBase{
    public function getRandomPokemon()
    {
        $urlApi = "www.themealdb.com/api/json/v1/1/lookup.php?i=";

        $html = '';
        
        for($i = 0; $i < 5; $i++)
        {
            $pokeId = rand(1, 50000);
            $pokeUrl = $urlApi . 52772;

            $pokeUrl = "https://www.themealdb.com/api/json/v1/1/random.php";

            $data = file_get_contents($pokeUrl);
            $data = json_decode($data, TRUE);

            $pokeName = $data['meals'][0]['strMeal'];
            $pokeImage = $data['meals'][0]['strMealThumb'];

            $html .= "<div class='col-12 col-sm-6 col-md-4 col-lg-3'>
                <img class='img-fluid rounded img-thumbnail' src='$pokeImage' alt='$pokeName' />
                <h3 class='text-center'>$pokeName</h3>
            </div>";
        }

        return [
            '#type' => 'markup',
            '#markup' => $this->t('
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Random Food Recipe</h2>
                                <div class="d-flex flex-wrap">
                                    ' . $html . '
                                </div>                            
                        <p>
                            <strong>Random Food Recipe</strong>
                        </p>
                    </div>
            '),
        ];
    }
}
?>