@extends('mainlayoutb')

@section('maincontent')
    <main class="main-content">
  <div class="account-card">
  <div class="profile-header">
    <img src="{{ asset($user->foto) }}" alt="Avatar" class="avatar-large">
    <div>
      <h2 class="username">{{$user->name}}</h2>
      <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="edit-profile">✏️ Ubah Profil</a>
    </div>
  </div>

  <ul class="account-menu">
    <li><a href="#"><span class="icon">👤</span> Profil</a></li>
    <li><a href="#"><span class="icon">🏦</span> Bank & Kartu</a></li>
    <li><a href="#"><span class="icon">🏠</span> Alamat</a></li>
    <li><a href="#"><span class="icon">🔒</span> Ubah Password</a></li>
    <li><a href="#"><span class="icon">🔔</span> Notifikasi</a></li>
    <li><a href="#"><span class="icon">🔏</span> Privasi</a></li>
  </ul>
</div>

  </main>
</body>
</html>
@endsection