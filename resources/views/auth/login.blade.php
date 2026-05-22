<x-form>
    <style>
        .login-btn {
            background: #0013c27a;
            color: #fff;

            &:hover {
                background: #0006c27a !important;
            }

            &:active {
                background: #0013c27a !important;
            }
        }
    </style>
    <form action="/login" method="POST">
        @csrf
        <h3>Login Here</h3>

        <label for="email">Email</label>
        <input type="email" placeholder="Email" id="email" name="email">
        @error('email')
        <span class="error">{{$message}}</span>
        @enderror

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">
        @error('password')
        <span class="error">{{$message}}</span>
        @enderror

        <input type="submit" value="Log in" class="btn login-btn">
    </form>
</x-form>