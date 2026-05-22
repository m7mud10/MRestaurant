<x-page>
    <style>
        .wrapper-images {
            position: fixed;
        }

        .container {
            background: transparent;
        }

        .glass {
            height: auto;
            overflow-y: scroll;

            &::-webkit-scrollbar {
                display: none;
            }
        }

        .recipe-ingradients {
            text-align: left;
            padding: 0 20px;
            overflow-wrap: break-word;
        }

        /* .container .main-title {
            margin-top: 200vh;
        } */

        .btn:active {
            transform: scale(0.95) !important;
        }

        .edit-btn {
            background: #33333314;
        }

        .delete-btn {
            color: #fff !important;
            background: #a72222c6;

            &:hover {
                transform: scale(1.05) !important;
                background: #ff0000a2 !important;
            }

            &:active {
                background: #a72222c6;
                transform: scale(0.95) !important;
            }
        }

        .btn-Add {
            width: 300px !important;
            background: #13c2007a;
            color: #fff;

            &:hover {
                background: #1aff0089 !important;
            }

            &:active {
                background: #13c2007a !important;
            }
        }

        input[type=submit] {
            margin: 0 auto;
        }

        .main-buttons {
            margin-bottom: 100px;
            display: flex;
            flex-flow: column wrap;
        }

        .recipe-name {
            margin-top: 50px;
        }

        b {
            color: #a72222;
        }

        .auth {
            width: 30%;
            display: flex;
            flex-flow: row nowrap;
            justify-content: space-around;
            align-items: center;
        }

        .alert {
            width: 30%;
            margin: auto;
            padding: 20px 50px;
            border-radius: 10px;
            background: #2ed201ff;
            color: #fff;
            font-size: 25px;
            text-align: center;
        }

        .per-time {
            position: absolute;
            /* width: 40px;
            height: 40px; */
            right: 1%;
            top: 1%;
            z-index: 3;
            padding: 10px;
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(15px);
            border-radius: 10px;
            box-shadow: 1px 1px 0 0 rgba(255, 255, 255, 0.8) inset,
                3px 5px 10px 0 rgba(0, 0, 0, 0.1);
            text-decoration: none;
            will-change: color, text-shadow, font-size;
        }
    </style>
    <header>
        <nav>
            <div class="glass nav-bar">
                <p class="logo">
                    MRestaurant
                </p>
                <div class="auth">
                    @guest
                    <a href="/auth/login" class="btn">Log in</a>
                    @endguest
                    @auth()
                    <p>{{Auth::user()->name}}</p>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <input type="submit" class="btn delete-btn" value="Log out">
                    </form>
                    @endauth
                </div>
            </div>
            @if(Session::has('success'))
            <div class="alert" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
        </nav>
        <div class="container">
            <h1 class="main-title">Popular Recipes</h1>
            <p class="main-description">Explore our collection of delicious recipes, from quick meals to gourmet delights</p>
            @auth()
            <div class="main-buttons">
                <a href="/dashboard/admin/create" class="glass btn btn-Add">Add New Recipe</a>
            </div>
            @endauth
            <div class="menu">
                @foreach ($recipe as $recipe)
                <div class="glass">
                    <p class="per-time">{{$recipe->time}} min</p>
                    <div class="recipe-img"><img src="{{asset('imgs/'.$recipe->img)}}" alt=""></div>
                    <h3 class="recipe-name">{{$recipe->name}}</h3>
                    <p class="recipe-ingradients"><b>Ingradients:</b><br><br>{{$recipe->ingradients}}</p>
                    @auth()
                    <div class="main-buttons">
                        <a href="/dashboard/admin/{{$recipe->id}}/edit" class="glass btn edit-btn">Edit</a>
                        <form action="/dashboard/admin/{{$recipe->id}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="glass btn delete-btn" value="Delete">
                        </form>
                    </div>
                    @endauth
                </div>
                @endforeach
            </div>
        </div>
    </header>
</x-page>