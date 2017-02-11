<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Response;
use App\User;

class UserController extends BaseController{

	protected $user = null;

	public function __construct(User $user){
		$this->user = $user;
	}

	public function allUsers(){
		return response($this->user->allUsers(), Response::HTTP_OK);
	}

	public function getUser($id){
		$user = $this->user->getUser($id);
		if(!$user){
			return response(['response' => 'Usuario nao encontrado!'], Response::HTTP_NOT_FOUND);
		}
		return response($user, Response::HTTP_OK);
	}

	public function saveUser(){
		return response($this->user->saveUser(), Response::HTTP_OK);
	}

	public function updateUser($id){
		$user = $this->user->updateUser($id);
		if(!$user){
			return response(['response' => 'Usuario nao encontrado!'], Response::HTTP_NOT_FOUND);
		}
		return response($user, Response::HTTP_OK);
	}

	public function deleteUser($id){
		$user = $this->user->deleteUser($id);
		if(!$user){
			return response(['response' => 'Usuario nao encontrado!'], Response::HTTP_NOT_FOUND);
		}
		return response(['response' => 'Usuario removido com sucesso!'], Response::HTTP_OK);
	}
}