<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlanetController extends Controller
{
    
    /**
     *  @OA\Post(
     *      path="/planet",
     *      operationId="createPlanet",
     *      tags={"Planet"},
     *      security={{"token": {}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Planet create payload",
     *          @OA\JsonContent(
     *              required={"name", "description"},
     *              @OA\Property(property="name", type="string", example="Earth"),
     *              @OA\Property(property="description", type="string", example="Beautiful planet, that only one in this solar system that can contain life"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response="201",
     *          description="Response description",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="message", type="string", description="Message", example="Pllanet created successfully"),
     *              ),
     *          )
     *      ),
     *      @OA\Response(
     *          response="400",
     *          description="Error: Forbiden access. When rest-api client isn't authorized to use this API",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="error_message", type="object", description="Error Message",
     *                      @OA\Property(property="name", type="array",
     *                          @OA\Items(type="string", example="Name is required"),
     *                      ),
     *                      @OA\Property(property="amount", type="array",
     *                          @OA\Items(type="integer", example="Amount"),
     *                      ),
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="Error: Unauthorized. When rest-api client isn't authorized to use this API",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="message", type="string", description="Message", example="Unauthorized"),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response="403",
     *          description="Error: Forbiden access. When user doesn't have permission to access this API.",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="message", type="string", description="Message", example="Forbiden access"),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response="500",
     *          description="Error: Internal server error. This is happen when server had internal error",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="message", type="string", description="Message", example="Internal server error"),
     *              ),
     *          ),
     *     ),
     * )
     */
    public function Create(Request $request){
        $response = [
            "request" => $request,
            "message" => "Create success"
        ];
        return response($response, 201);
    }

    
    /**
     *  @OA\Get(
     *      path="/planet",
     *      operationId="selectPlanet",
     *      tags={"Planet"},
     *      security={{"token": {}}},
     *      @OA\Parameter(
     *          name="id",
     *          in="query",
     *          description="",
     *          required=false,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Response description",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  allOf={
     *                      @OA\Schema(
     *                          @OA\Property(property="message", type="string", description="Message", example="Planet fetched successfully"),
     *                      ),
     *                      @OA\Schema(
     *                          @OA\Property(property="data", type="array", description="Planet data",
     *                              @OA\Items(ref="#/components/schemas/GetPlanet"),
     *                          ),
     *                      ),
     *                  },
     *              ),
     *          )
     *      ),
     *      @OA\Response(
     *          response="400",
     *          description="Error: Bad Request. Request doesnt not comply with requirement",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="message", type="string", description="Message", example="BadRequest"),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="Error: Unauthorized. When rest-api client isn't authorized to use this API",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="message", type="string", description="Message", example="Unauthorized"),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response="403",
     *          description="Error: Forbiden access. When user doesn't have permission to access this API.",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="message", type="string", description="Message", example="Forbiden access"),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response="500",
     *          description="Error: Internal server error. This is happen when server had internal error",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="message", type="string", description="Message", example="Internal server error"),
     *              ),
     *          ),
     *     ),
     * )
     */
    public function Select(Request $request){
        $path = Storage::disk('jsons')->get('planets.json');
        $planets = json_decode($path);
        $response = [
            "data" => $planets,
            "message" => "Select success"
        ];
        return response($response, 200);
    }
}
