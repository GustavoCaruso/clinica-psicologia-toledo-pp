@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile</h1>

    <!-- Bloco de atualização de informações do perfil -->
    <div class="card my-4">
        <div class="card-header">Atualizar Informações do Perfil</div>
        <div class="card-body">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <!-- Bloco de atualização de senha -->
    <div class="card my-4">
        <div class="card-header">Atualizar Senha</div>
        <div class="card-body">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <!-- Bloco de exclusão de usuário -->
    <div class="card my-4">
        <div class="card-header">Excluir Conta</div>
        <div class="card-body">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
