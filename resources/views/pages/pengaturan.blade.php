@extends('mainlayoutb')

@section('maincontent')
    <main class="main-content">
  <div class="account-card">
  <div class="profile-header">
<img src="{{ asset($user->foto ?: 'assets/foto/images.png') }}" alt="Avatar" class="avatar-large">
    <div>
      <h2 class="username">{{$user->name}}</h2>
      <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="edit-profile">✏️ Ubah Profil</a>
    </div>
  </div>

  <ul class="account-menu">
    <li><a href="{{route("profil")}}"><span class="icon">👤</span> Profil</a></li>
    <li><a href="{{route("tersimpan")}}"><span class="icon">🔖</span> Tersimpan</a></li>
  </ul>
</div>

  </main>
</body>
</html>
@endsection