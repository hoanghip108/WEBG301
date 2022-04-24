<?php

namespace App\Http\Controllers;

use App\Repository\PuppyRepos;
use App\Repository\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function index()
    {
        $pets = User::GetAllPet();
        $breeds = PuppyRepos::GetAllBreeds();
        return view('Userview.index', [
            'pets' => $pets,
            'breed' => $breeds
        ]);

    }

    public function FilterPet($id)
    {
        $breeds = PuppyRepos::GetAllBreeds();
        $pet = User::GetPetByID($id);
        return view('Userview.FilterPet', [
            'pet' => $pet,
            'breed' => $breeds
        ]);
    }

    public function GetPetById($id)
    {
        $pet = User::GetPetByID($id);
        return view('UserView.Detail', ['pet' => $pet]);
    }

    public function ClientSearchPet()
    {
        $pet = $_GET['petname'];
        $result = PuppyRepos::FindPetByName($pet);
//        dd($result);
        return view('UserView.index', [
            'pets' => $result
        ]);
    }
    public function AboutUs(){
        return view('UserView.aboutus');
    }

}
