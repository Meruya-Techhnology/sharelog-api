<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    
    /**
     * Remove comment to use variable bellow
     *
     * @var String
     */
    // protected $table = 'user_confirmation';
    // protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        ///Write fillable table field here
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        ///Write hidden table field here
    ];

    
    /**
     *  @OA\Schema(
     *      schema="GetPlanet",
     *      allOf={
     *          @OA\Schema(
     *              @OA\Property(property="id", type="integer", description="Planet id", example=1),
     *              @OA\Property(property="name", type="string", description="Planet name", example= "Mercury"),
     *              @OA\Property(property="description", type="string", description="Planet description", example="Mercury—the smallest planet in our solar system and closest to the Sun—is only slightly larger than Earth's Moon. Mercury is the fastest planet, zipping around the Sun every 88 Earth days."),
     *              @OA\Property(property="image", type="string", description="Planet image", example="https://solarsystem.nasa.gov/system/feature_items/images/18_mercury_new.png"),
     *          ),
     *      },
     * ),
     */
}