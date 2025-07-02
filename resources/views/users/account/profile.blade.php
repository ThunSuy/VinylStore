{{-- filepath: resources/views/users/account/profile.blade.php --}}
@extends('users.index')

@section('content')
    @if (session('success'))
        <div class="alert alert-success ">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" novalidate>

        <div class="profile-wrapper">

            @csrf
            <div class="profile-left">

                {{-- Title  --}}
                <div class="profile-header">Hồ Sơ Của Tôi</div>
                <div class="profile-subtitle">Quản lý thông tin hồ sơ để bảo mật tài khoản</div>

                {{-- Form  --}}


                {{-- Input Name --}}
                <div class="form-group">
                    <label for="name" class="form-label">Họ Tên</label>
                    <input type="text" id="name" name="full_name" class="form-control"
                        placeholder="Nhập tên của bạn"
                        style="width:100%;padding:8px 10px;border:1px solid #dacaa4;border-radius:4px;"
                        value="{{ old('full_name', $user->full_name) }}">
                </div>

                @error('full_name')
                    <div style="color:red; font-size:14px; margin-top:0px;">{{ $message }}</div>
                @enderror

                {{-- Email --}}
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <div class="profile-row">
                        <span>{{ old('email', $user->email) }}</span>
                    </div>
                </div>

                {{-- Input Phone  --}}
                <div class="form-group">
                    <label for="name" class="form-label">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" class="form-control"
                        placeholder="Nhập số điện thoại của bạn"
                        style="width:100%;padding:8px 10px;border:1px solid #dacaa4;border-radius:4px;"
                        value="{{ old('phone', $user->phone) }}">
                </div>

                @error('phone')
                    <div style="color:red; font-size:14px; margin-top:0px;">{{ $message }}</div>
                @enderror

                {{-- Input Address  --}}
                <div class="form-group">
                    <label for="name" class="form-label">Địa chỉ</label>
                    <input type="text" id="address" name="address" class="form-control"
                        placeholder="Nhập địa chỉ của bạn"
                        style="width:100%;padding:8px 10px;border:1px solid #dacaa4;border-radius:4px;"
                        value="{{ old('address', $user->address) }}">
                </div>

                @error('address')
                    <div style="color:red; font-size:14px; margin-top:0px;">{{ $message }}</div>
                @enderror

                {{-- Btn Save  --}}
                <button class="save-btn">Lưu</button>


            </div>
            <div class="profile-right">

                {{-- Avatar  --}}
                <div class="avatar-placeholder">
                    <img src="{{ $user->avatar_url }}?v={{ time() }}" alt="avatar"
                        style="width:100%;height:100%;border-radius:50%;object-fit:cover;object-position:center;"
                        id="avatarImg">
                </div>
                {{-- <div class="avatar-placeholder">
                    <img src="{{ $user->avatar_url }}" alt="avatar"
                        style="width:100%;height:100%;border-radius:50%; ;object-fit:cover;object-position:center;"
                        id="avatarImg">
                </div> --}}

                {{-- Btn change avt --}}
                <label class="avatar-upload-btn" style="border:1px solid #dacaa4;">
                    Chọn Ảnh
                    <input type="file" name="avatar" accept=".jpg,.jpeg,.png,.webp" style="display:none;"
                        id="avatarInput">
                </label>
                <div class="avatar-note">
                    Dung lượng file tối đa 4 MB<br>
                    Định dạng: .JPEG, .PNG, WEBP
                </div>


            </div>

        </div>
    </form>
    <script>
        document.getElementById('avatarInput').addEventListener('change', function(e) {
            const [file] = e.target.files;
            if (file) {
                const img = document.getElementById('avatarImg');
                img.src = URL.createObjectURL(file);
            }
        });
    </script>
@endsection
