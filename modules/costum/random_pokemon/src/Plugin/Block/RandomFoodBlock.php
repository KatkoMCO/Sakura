<?php

/**
 * @file
 * RandomFoodBlock.
 */

 namespace Drupal\random_pokemon\Plugin\Block;

use Drupal\Core\Block\BlockBase;

    /**
    * Provides a 'RandomFoodBlock' block.
    *
    * @Block(
    *  id = "random_food_block",
    *  admin_label = @Translation("Random Food Block"),
    *  category = @Translation("Random Food Block"),
    * )
    */
    class RandomFoodBlock extends BlockBase {
        /**
        * {@inheritdoc}
        */
        public function build() {         
            $pokeUrl = "https://www.themealdb.com/api/json/v1/1/random.php";

            $data = file_get_contents($pokeUrl);
            $data = json_decode($data, TRUE);

            $pokeName = $data['meals'][0]['strMeal'];
            $pokeImage = $data['meals'][0]['strMealThumb'];

            $html = "<div class='col-12 col-sm-6 col-md-4 col-lg-3'>
                <img class='img-fluid rounded img-thumbnail' src='$pokeImage' alt='$pokeName' />
                <h3 class='text-center'>$pokeName</h3>
            </div>";  
            
            return [
                '#type' => 'markup',
                '#markup' => $this->t('
                    <div class="d-flex flex-wrap">
                        ' . $html . '
                    </div>  
                '),
            ];
        }
    }
    