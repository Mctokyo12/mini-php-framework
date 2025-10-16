@extends("layouts.app")

@section("title" , "Signup")

@section("content")


    @if (!empty($errors))
        <ul style="color:red">
            @foreach ($errors as $fieldErros) 
                @foreach ($fieldErros as $error) 
                    <li>{{ $error }}</li>
               @endforeach
            @endforeach
        </ul>
    @elseif(isset($user))
        <p>Utilisateur ,{{  $user['prenom'] }} a ete creer  avec succes !</p>
    @else
        <h1>Inscription</h1>
    
        <form action="<?=BASE_PATH?>/inscrire" method="post">
            <label for="nom">Name:</label>
            <input type="text" name="nom" id=""><br>
            <label for="name">Prenom:</label>
            <input type="text" name="prenom" id=""><br>
            <label for="name">Email:</label>
            <input type="text" name="email" id=""><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id=""><br>
            <input type="submit" value="s'inscrire">
        </form>
    @endif
    

@endsection    